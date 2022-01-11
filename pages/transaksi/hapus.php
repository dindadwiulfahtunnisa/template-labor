<?php
if (!isset($_GET['mo_faktur'])) {
    header("location: " . BASE_PATH . "?hal=transaksi/daftar");
    die();
}

$query_kendaraan = mysqli_query($koneksi, "SELECT * FROM transaksi WHERE no_faktur='$_GET[no_faktur]'");
$row_kendaraan = mysqli_num_rows($query_kendaraan);

if ($row_transaksi > 0) {
    $hapus = mysqli_query($koneksi, "DELETE FROM transaksi WHERE no_faktur='$_GET[no_faktur]'");
    if ($hapus) {
        header("location: " . BASE_PATH . "?hal=transaksi/daftar&msg=Data Berhasil Terhapus");
        die();
    } else {
        header("location: " . BASE_PATH . "?hal=transaksi/daftar&msg=Data Tidak Terhapus");
        die();
    }
}
