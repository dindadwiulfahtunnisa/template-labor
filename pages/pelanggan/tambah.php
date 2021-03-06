<?php
if (isset($_POST['submit'])) {
    $nama_pel = $_POST['nama_pel'];
    $alamat = $_POST['alamat'];
    $kota = $_POST['kota'];

    if (!$nama_pel || !$alamat || !$kota) {
        $alert_error = "Isi Seluruh Form!";
    } else {
        $query_last_pel = mysqli_query($koneksi, "SELECT kode_pel FROM pelanggan ORDER BY kode_pel DESC LIMIT 1");
        $row_last_pel = mysqli_num_rows($query_last_pel);
        $fetch_last_pel = mysqli_fetch_assoc($query_last_pel);
        $last_kode_pel = ($row_last_pel > 0) ? $fetch_last_pel['kode_pel'] : 'P_0000';

        $number = (int) substr($last_kode_pel, 2);
        $new_kode_pel = substr($last_kode_pel, 0, 2) . str_pad($number + 1, 4, 0, STR_PAD_LEFT);
        $query_simpan = mysqli_query($koneksi, "INSERT INTO pelanggan (kode_pel, nama_pel, alamat, kota) VALUES ('$new_kode_pel', '$nama_pel', '$alamat', '$kota')");

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
                                <input type="text" name="nama_pel" id="nama_pel" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <input type="text" name="alamat" id="alamat" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="kota">Kota</label>
                                <input type="text" name="kota" id="kota" class="form-control">
                            </div>
                            <br>
                            <a href="?hal=pelanggan/daftar" class="btn btn-secondary">Kembali</a>
                            <button type="submit" name="submit" class="btn btn-primary float-sm-end">Tambahkan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>