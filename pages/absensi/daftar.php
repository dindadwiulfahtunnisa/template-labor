<?php
if (isset($_GET['msg'])) {
    echo "<script> alert('" . $_GET['msg'] . "') </script>";
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
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Kode Absen</th>
                                    <th>ID Pegawai</th>
                                    <th>Tanggal Absen</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $daftar_absensi = mysqli_query($koneksi, "SELECT * FROM absensi");

                                while ($data = mysqli_fetch_assoc($daftar_absensi)) { ?>
                                    <tr>
                                        <td><?= $data['kd_absen']; ?></td>
                                        <td><?= $data['id_pegawai']; ?></td>
                                        <td><?= $data['tgl_absen']; ?></td>
                                        <td>
                                            <a href="<?= BASE_PATH . '?hal=absen/edit&kid_absen=' . $data['id_absen'] ?>" class="btn btn-warning">Edit</a>
                                            <a href="<?= BASE_PATH . '?hal=absen/hapus&id_absen=' . $data['id_absen'] ?>" class="btn btn-danger">Hapus</a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>