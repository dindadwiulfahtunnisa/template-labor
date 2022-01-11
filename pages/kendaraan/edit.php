<?php
if (!isset($_GET['kode_pel'])) {
    header("location: " . BASE_PATH . "?hal=kendaraan/daftar");
    die();
}

$query_pelanggan = mysqli_query($koneksi, "SELECT * FROM kendaraan WHERE kode_kendaraan='$_GET[kode_kendaraan]'");
$pelanggan = mysqli_fetch_assoc($query_pelanggan);

if (isset($_POST['submit'])) {
    $kode = $_POST['kode_kendaraan'];
    $merk = $_POST['merk_kendaraan'];
    $harga = $_POST['harga_kendaraan'];
    $stok = $_POST['stok_kendaraan'];

    if (!$kode || !$merk || !$harga || !$stok) {
        $alert_error = "Isi Seluruh Form!";
    } else {
        $query_simpan = mysqli_query($koneksi, "UPDATE kendaraan SET kode_kendaraan='$kode', merk_kendaraan='$merk', harga_kendaraan='$harga', stok_kendaraan ='$stok' WHERE kode_kendaraan='$_GET[kode_kendaraan]'");

        if ($query_simpan) {
            $alert_success = "Data Berhasil di Edit";

            $query_kendaraan = mysqli_query($koneksi, "SELECT * FROM kendaraan WHERE kode_kendaraan='$_GET[kode_kendaraan]'");
            $kendaraan = mysqli_fetch_assoc($query_kendaraan);
        } else {
            $alert_error = "Data Gagal di Edit";
        }
    }
}
?>

<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Daftar Kendaraan</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Daftar Kendaraan</li>
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
                                <label for="kode">Kode Kendaraan</label>
                                <input type="text" name="kode" id="kode" class="form-control" value="<?= $kendaraan['kode_kendaraan'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="merk">Merk Kendaraan</label>
                                <input type="text" name="merk" id="merk" class="form-control value=" <?= $kendaraan['merk_kendaraan'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="harga">Harga Kendaraan</label>
                                <input type="text" name="harga" id="harga" class="form-control" value="<?= $kendaraan['harga_kendaraan'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="stok">Stok Kendaraan</label>
                                <input type="text" name="stok" id="stok" class="form-control" value="<?= $kendaraan['stok_kendaraan'] ?>">
                            </div>
                            <br>
                            <a href="?hal=kendaraan/daftar" class="btn btn-secondary">Kembali</a>
                            <button type="submit" name="submit" class="btn btn-primary float-sm-end">Ubah</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>