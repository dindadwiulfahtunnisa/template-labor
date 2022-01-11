<?php
if (!isset($_GET['kode_kendaran'])) {
    header("location: " . BASE_PATH . "?hal=kendaraan/daftar");
    die();
}

$query_kendaraan = mysqli_query($koneksi, "SELECT * FROM kendaraan WHERE kode_pel='$_GET[kode_pel]'");
$row_kendaraan = mysqli_num_rows($query_kendaraan);

if ($row_kendaraan > 0) {
    $hapus = mysqli_query($koneksi, "DELETE FROM kendaraan WHERE kode_kendaraan='$_GET[kode_kendaraan]'");
    if ($hapus) {
        header("location: " . BASE_PATH . "?hal=kendaraan/daftar&msg=Data Berhasil Terhapus");
        die();
    } else {
        header("location: " . BASE_PATH . "?hal=kendaraan/daftar&msg=Data Tidak Terhapus");
        die();
    }
}
