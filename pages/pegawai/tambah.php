<?php
if (isset($_POST['submit'])) {
    $id_pegawai = $_POST['id_pegawai'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $jabatan = $_POST['jabatan'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $nohp = $_POST['nohp'];
    $tgl_lahir = $_POST['tgl_lahir'];
    $lama_kerja = $_POST['lama_kerja'];

    if (!$id_pegawai || !$nama || !$alamat || !$jabatan || !$jenis_kelamin || !$nohp || !$tgl_lahir || !$lama_kerja) {
        $alert_error = "Isi Seluruh Form!";
    } else {
        $query_last_pel = mysqli_query($koneksi, "SELECT id_pegawai FROM pegawai ORDER BY id_pegawai DESC LIMIT 1");
        $row_last_pel = mysqli_num_rows($query_last_pel);
        $fetch_last_pel = mysqli_fetch_assoc($query_last_pel);
        $last_kode_pel = ($row_last_pel > 0) ? $fetch_last_pel['id_pegawai'] : 'P_0000';

        $number = (int) substr($last_kode_pel, 2);
        $new_kode_pel = substr($last_kode_pel, 0, 2) . str_pad($number + 1, 4, 0, STR_PAD_LEFT);
        $query_simpan = mysqli_query($koneksi, "INSERT INTO pelanggan (id_pegawai, nama, alamat, jabatan, jenis_kelamin, nohp, tgl_lahir, lama_kerja) VALUES ('$new_id_pegawai', '$nama', '$alamat', '$jabatan' '$jenis_kelamin' '$nohp' '$tgl_lahir' '$lama_kerja')");

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
        <h1 class="mt-4">Daftar Pegawai</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Daftar Pegawai</li>
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
                                <label for="id_pegawai">ID Pegawai</label>
                                <input type="text" name="id_pegawai" id="id_pegawai" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" name="nama" id="nama" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <input type="text" name="alamat" id="alamat" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="jabatan">Jabatan</label>
                                <input type="text" name="jabatan" id="jabatan" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="jabatan">Jenis Kelamin</label>
                                <input type="text" name="jabatan" id="jabatan" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="nohp">No HP</label>
                                <input type="text" name="nohp" id="nohp" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="tgl_lahir">Tanggal Lahir</label>
                                <input type="text" name="tgl_lahir" id="tgl_lahir" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="lama_kerja">lama Kerja</label>
                                <input type="text" name="lama_kerja" id="lama_kerja" class="form-control">
                            </div>
                            <br>
                            <a href="?hal=pegawai/daftar" class="btn btn-secondary">Kembali</a>
                            <button type="submit" name="submit" class="btn btn-primary float-sm-end">Tambahkan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>