<?php
if (!isset($_GET['kode_pel'])) {
    header("location: " . BASE_PATH . "?hal=pelanggan/daftar");
    die();
}

$query_pelanggan = mysqli_query($koneksi, "SELECT * FROM pelanggan WHERE kode_pel='$_GET[kode_pel]'");
$pelanggan = mysqli_fetch_assoc($query_pelanggan);

if (isset($_POST['submit'])) {
    $nama_pel = $_POST['nama_pel'];
    $alamat = $_POST['alamat'];
    $kota = $_POST['kota'];

    if (!$nama_pel || !$alamat || !$kota) {
        $alert_error = "Isi Seluruh Form!";
    } else {
        $query_simpan = mysqli_query($koneksi, "UPDATE pelanggan SET nama_pel='$nama_pel', alamat='$alamat', kota='$kota' WHERE kode_pel='$_GET[kode_pel]'");

        if ($query_simpan) {
            $alert_success = "Data Berhasil di Edit";

            $query_pelanggan = mysqli_query($koneksi, "SELECT * FROM pelanggan WHERE kode_pel='$_GET[kode_pel]'");
            $pelanggan = mysqli_fetch_assoc($query_pelanggan);
        } else {
            $alert_error = "Data Gagal di Edit";
        }
    }
}
?>

<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Daftar Pelanggan</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Daftar Pelanggan</li>
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
                                <label for="nama_pel">Nama Pelanggan</label>
                                <input type="text" name="nama_pel" id="nama_pel" class="form-control" value="<?= $pelanggan['nama_pel'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <input type="text" name="alamat" id="alamat" class="form-control" value=" <?= $pelanggan['alamat'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="kota">Kota</label>
                                <input type="text" name="kota" id="kota" class="form-control" value="<?= $pelanggan['kota'] ?>">
                            </div>
                            <br>
                            <a href="?hal=pelanggan/daftar" class="btn btn-secondary">Kembali</a>
                            <button type="submit" name="submit" class="btn btn-primary float-sm-end">Ubah</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>