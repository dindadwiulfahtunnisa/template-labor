<?php
if (isset($_POST['submit'])) {
    $no_faktur = $_POST['no_faktur'];
    $tgl_faktur = $_POST['tgl_faktur'];
    $kode_pel = $_POST['kode_pel'];

    if (!$no_faktur || !$tgl_faktur || !$kode_pel) {
        $alert_error = "Isi Seluruh Form!";
    } else {
        $query_last_ken = mysqli_query($koneksi, "SELECT no_faktur FROM transaksi ORDER BY no_faktur DESC LIMIT 1");
        $row_last_ken = mysqli_num_rows($query_last_ken);
        $fetch_last_ken = mysqli_fetch_assoc($query_last_ken);
        $last_kode_ken = ($row_last_ken > 0) ? $fetch_last_ken['no_faktur'] : 'HP00';

        $number = (int) substr($last_kode_ken, 2);
        $new_kode_ken = substr($last_kode_ken, 0, 2) . str_pad($number + 1, 4, 0, STR_PAD_LEFT);
        $query_simpan = mysqli_query($koneksi, "INSERT INTO Transaksi ('no_faktur', 'tgl_faktur', 'kode_pel') VALUES ('$new_no_faktur', '$tgl_faktur', '$kode_pel')");

        if ($query_simpan) {
            $alert_success = "Data berhasil disimpan";
        } else {
            $alert_error = "Data Gagal disimpan";
        }
    }
}
?>

<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Daftar Transaksi</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Daftar Transaksi</li>
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
                                <label for="no_faktur">Nomor Faktur</label>
                                <input type="text" name="no_faktur" id="no_faktur" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="tgl_faktur">Tanggal Faktur</label>
                                <input type="text" name="tgl_faktur" id="tgl_faktur" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="kode_pel">Kode Pelanggan</label>
                                <input type="text" name="kode_pel" id="kode_pel" class="form-control">
                            </div>
                            <br>
                            <a href="?hal=transaksi/daftar" class="btn btn-secondary">Kembali</a>
                            <button type="submit" name="submit" class="btn btn-primary float-sm-end">Tambahkan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>