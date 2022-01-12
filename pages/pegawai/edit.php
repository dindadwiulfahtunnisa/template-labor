<?php
if (!isset($_GET['id_pegawai'])) {
    header("location: " . BASE_PATH . "?hal=pegawai/daftar");
    die();
}

$query_pelanggan = mysqli_query($koneksi, "SELECT * FROM pegawai WHERE id_pegawai='$_GET[id_pegawai]'");
$pelanggan = mysqli_fetch_assoc($query_pelanggan);

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
        $query_simpan = mysqli_query($koneksi, "UPDATE pegawai SET id_pegawai='$id_pegawai', nama='$nama', alamat='$alamat', jabatan ='$jabatan', jenis_kelamin ='$jenis_kelamin', nohp ='$nohp', tgl_lahir ='$tgl_lahir', lama_kerja ='$lama_kerja' WHERE id_pegawai='$_GET[id_pegawai]'");

        if ($query_simpan) {
            $alert_success = "Data Berhasil di Edit";

            $query_kendaraan = mysqli_query($koneksi, "SELECT * FROM pegawai WHERE id_pegawai='$_GET[id_pegawai]'");
            $pegawai = mysqli_fetch_assoc($query_kendaraan);
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
                                <label for="id_pegawai">Daftar Pegawai</label>
                                <input type="text" name="id_pegawai" id="id_pegawai" class="form-control" value="<?= $kendaraan['id_pegawai'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="Nama">Nama</label>
                                <input type="text" name="Nama" id="Nama" class="form-control" value=" <?= $kendaraan['nama'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <input type="text" name="alamat" id="alamat" class="form-control" value="<?= $kendaraan['alamat'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="jabatan">Jabatan</label>
                                <input type="text" name="jabatan" id="jabatan" class="form-control" value="<?= $kendaraan['jabatan'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="jenis_kelamin">Jenis Kelamin</label>
                                <input type="text" name="jenis_kelamin" id="jenis_kelamin" class="form-control" value="<?= $kendaraan['jenis_kelamin'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="nohp">NO HP</label>
                                <input type="text" name="nohp" id="nohp" class="form-control" value="<?= $kendaraan['nohp'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="tgl_lahir">Tanggal Lahir</label>
                                <input type="text" name="tgl_lahir" id="tgl_lahir" class="form-control" value="<?= $kendaraan['tgl_lahir'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="lama_kerja">Lama Kerja</label>
                                <input type="text" name="lama_kerja" id="lama_kerja" class="form-control" value="<?= $kendaraan['lama_kerja'] ?>">
                            </div>
                            <br>
                            <a href="?hal=pegawai/daftar" class="btn btn-secondary">Kembali</a>
                            <button type="submit" name="submit" class="btn btn-primary float-sm-end">Ubah</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>