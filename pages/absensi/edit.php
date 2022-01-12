<?php
if (!isset($_GET['kd_absen'])) {
    header("location: " . BASE_PATH . "?hal=absensi/daftar");
    die();
}

$query_pelanggan = mysqli_query($koneksi, "SELECT * FROM absensi WHERE kd_absen='$_GET[kd_absen]'");
$pelanggan = mysqli_fetch_assoc($query_pegawai);

if (isset($_POST['submit'])) {
    $kd_absen = $_POST['kd_absen'];
    $id_pegawai = $_POST['id_pegawai'];
    $tgl_absen = $_POST['tgl_absen'];;

    if (!$kd_absen || !$id_pegawai || !$tgl_absen) {
        $alert_error = "Isi Seluruh Form!";
    } else {
        $query_simpan = mysqli_query($koneksi, "UPDATE absensi SET kd_absen='$kd_absen', id_pegawai='$id_pegawai', tgl_absen='$tgl_absen' WHERE kd_absen='$_GET[kd_absen]'");

        if ($query_simpan) {
            $alert_success = "Data Berhasil di Edit";

            $query_kendaraan = mysqli_query($koneksi, "SELECT * FROM absensi WHERE kd_absen='$_GET[kd_absen]'");
            $absensi = mysqli_fetch_assoc($query_absensi);
        } else {
            $alert_error = "Data Gagal di Edit";
        }
    }
}
?>

<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Absensi</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Absensi</li>
        </ol>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <?php
                        if (isset($alert_error)) {
                            echo $alert_error;
                        }

                        if (isset($alert_success)) {
                            echo $alert_success;
                        }
                        ?>
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="kd_absen">Kode Absen</label>
                                <input type="text" name="kd_absen" id="kd_absen" class="form-control" value="<?= $kendaraan['kd_absen'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="id_pegawai">id_pegawai</label>
                                <input type="text" name="id_pegawai" id="id_pegawai" class="form-control" value=" <?= $kendaraan['id_pegawai'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="tgl_absen">tgl_absen</label>
                                <input type="text" name="tgl_absen" id="tgl_absen" class="form-control" value="<?= $kendaraan['tgl_absen'] ?>">
                            </div>
                            <br>
                            <a href="?hal=absensi/daftar" class="btn btn-secondary">Kembali</a>
                            <button type="submit" name="submit" class="btn btn-primary float-sm-end">Ubah</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>