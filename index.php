<?php
    include "config/main.php";
    include "config/koneksi.php";

    if(isset($_GET['hal'])) {
        $halaman = $_GET['hal'];

        include "layout/top.php";
        include "layout/navbar.php";
        include "layout/sidebar.php";

        if($halaman == "home"){
            include "pages/home.php";
        } else if($halaman == "pelanggan/daftar"){
            include "pages/pelanggan/daftar.php";
        } else if($halaman == "pelanggan/tambah"){
            include "pages/pelanggan/tambah.php";
        } else if($halaman == "pelanggan/edit"){
            include "pages/pelanggan/edit.php";
        } else if($halaman == "pelanggan/hapus"){
             include "pages/pelanggan/hapus.php";
        }

        include "layout/footer.php";
        include "layout/bottom.php";
    } else {
        echo "Halaman tidak ditemukan";
    }