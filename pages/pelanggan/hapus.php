<?php
    if(!isset($_GET['kode_pel'])) {
        header("location: ".BASE_PATH."?hal=pelanggan/daftar");
        die();
    }
    
    $query_pelanggan = mysqli_query($koneksi, "SELECT * FROM pelanggan WHERE kode_pel='$_GET[kode_pel]'");
    $row_pelanggan = mysqli_num_rows($query_pelanggan);

    if($row_pelanggan > 0) {
        $hapus = mysqli_query($koneksi, "DELETE FROM pelanggan WHERE kode_pel='$_GET[kode_pel]'");
        if($hapus) {
            header("location: ".BASE_PATH."?hal=pelanggan/daftar&msg=Data Berhasil Terhapus");
            die();
        } else {
            header("location: ".BASE_PATH."?hal=pelanggan/daftar&msg=Data Tidak Terhapus");
            die();
        }
    }
