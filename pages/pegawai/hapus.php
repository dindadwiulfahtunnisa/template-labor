<?php
if (!isset($_GET['id_pegawai'])) {
    header("location: " . BASE_PATH . "?hal=pegawai/daftar");
    die();
}

$query_pegawai = mysqli_query($koneksi, "SELECT * FROM pegawai WHERE kode_pel='$_GET[id_pegawai]'");
$row_pegawai = mysqli_num_rows($query_pegawai);

if ($row_pegawai > 0) {
    $hapus = mysqli_query($koneksi, "DELETE FROM pegawai WHERE id_pegawai='$_GET[id_pegawai]'");
    if ($hapus) {
        header("location: " . BASE_PATH . "?hal=pegawai/daftar&msg=Data Berhasil Terhapus");
        die();
    } else {
        header("location: " . BASE_PATH . "?hal=pegawai/daftar&msg=Data Tidak Terhapus");
        die();
    }
}
