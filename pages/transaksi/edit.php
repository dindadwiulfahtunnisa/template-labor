<?php
if (!isset($_GET['no_faktur'])) {
    header("location: " . BASE_PATH . "?hal=transaksi/daftar");
    die();
}

$query_transaksi = mysqli_query($koneksi, "SELECT * FROM transaksi WHERE no_faktur='$_GET[no_faktur]'");
$transaksi = mysqli_fetch_assoc($query_transaksi);

if (isset($_POST['submit'])) {
    $kode = $_POST['no_faktur'];
    $merk = $_POST['tgl_faktur'];
    $harga = $_POST['kode_pel'];

    if (!$kode || !$merk || !$harga) {
        $alert_error = "Isi Seluruh Form!";
    } else {
        $query_simpan = mysqli_query($koneksi, "UPDATE transaksi SET no_faktur='$no', tgl_faktur='$tgl', kode_pel='$kode'");

        if ($query_simpan) {
            $alert_success = "Data Berhasil di Edit";

            $query_transaksi = mysqli_query($koneksi, "SELECT * FROM transaksi WHERE no_faktur='$_GET[no_faktur]'");
            $transaksi = mysqli_fetch_assoc($query_transaksi);
        } else {
            $alert_error = "Data Gagal di Edit";
        }
    }
}
?>

<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Transaksi</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Transaksi</li>
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
                                <label for="no_faktur">No  Faktur</label>
                                <input type="text" name="no_faktur" id="no_faktur" class="form-control" value="<?= $transaksi['no_faktur'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="tgl_faktur">Tanggal Faktur</label>
                                <input type="text" name="tgl_faktur" id="tgl_faktur" class="form-control" value=" <?= $transaksi['tgl_faktur'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="kode_pelanggan">Kode Pelanggan</label>
                                <input type="text" name="kode_pelanggan" id="kode_pelanggan" class="form-control" value="<?= $transaksi['kode_pelanggan'] ?>">
                            </div>
                            <br>
                            <a href="?hal=transaksi/daftar" class="btn btn-secondary">Kembali</a>
                            <button type="submit" name="submit" class="btn btn-primary float-sm-end">Ubah</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>