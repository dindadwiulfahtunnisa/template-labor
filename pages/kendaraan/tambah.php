<?php
if (isset($_POST['submit'])) {
    $merk = $_POST['merk_kendaraan'];
    $harga = $_POST['harga_kendaraan'];
    $stok = $_POST['stok_kendaraan'];

    if (!$merk || !$harga || !$stok) {
        $alert_error = "Isi Seluruh Form!";
    } else {
        $query_last_ken = mysqli_query($koneksi, "SELECT kode_kendaraan FROM kendaraan ORDER BY kode_kendaraan DESC LIMIT 1");
        $row_last_ken = mysqli_num_rows($query_last_ken);
        $fetch_last_ken = mysqli_fetch_assoc($query_last_ken);
        $last_kode_ken = ($row_last_ken > 0) ? $fetch_last_ken['kode_kendaraan'] : 'P_0000';

        $number = (int) substr($last_kode_ken, 2);
        $new_kode_ken = substr($last_kode_ken, 0, 2) . str_pad($number + 1, 4, 0, STR_PAD_LEFT);
        $query_simpan = mysqli_query($koneksi, "INSERT INTO kendaraan ('kode_kendaraan', 'merk_kendaraan', 'harga_kendaraan', 'stok_kendaraan') VALUES ('$new_kode_ken', '$merk', '$harga', '$stok')");

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
                                <label for="merk_kendaraan">Merk Kendaraan</label>
                                <input type="text" name="merk_kendaraan" id="merk_kendaraan" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="harga_kendaraan">Harga Kendaraan</label>
                                <input type="text" name="harga_kendaraan" id="harga_kendaraan" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="stok_kendaraan">Stok Kendaraan</label>
                                <input type="text" name="stok_kendaraan" id="stok_kendaraan" class="form-control">
                            </div>
                            <br>
                            <a href="?hal=kendaraan/daftar" class="btn btn-secondary">Kembali</a>
                            <button type="submit" name="submit" class="btn btn-primary float-sm-end">Tambahkan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>