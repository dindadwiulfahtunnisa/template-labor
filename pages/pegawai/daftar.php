<?php
if (isset($_GET['msg'])) {
    echo "<script> alert('" . $_GET['msg'] . "') </script>";
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
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID Pegawai</th>
                                    <th>Nama</th>
                                    <th>Alamat</th>
                                    <th>Jabatan</th>
                                    <th>Jenis Kelamin</th>
                                    <th>No HP</th>
                                    <th>Tanggal Lahir</th>
                                    <th>lama Kerja</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $daftar_pegawai = mysqli_query($koneksi, "SELECT * FROM pegawai");

                                while ($data = mysqli_fetch_assoc($daftar_pegawai)) { ?>
                                    <tr>
                                        <td><?= $data['id_pegawai']; ?></td>
                                        <td><?= $data['nama']; ?></td>
                                        <td><?= $data['alamat']; ?></td>
                                        <td><?= $data['jabatan']; ?></td>
                                        <td><?= $data['jenis_kelamin']; ?></td>
                                        <td><?= $data['nohp']; ?></td>
                                        <td><?= $data['tgl_lahir']; ?></td>
                                        <td><?= $data['lama_kerja']; ?></td>
                                        <td>
                                            <a href="<?= BASE_PATH . '?hal=pegawai/edit&kid_pegawai=' . $data['id_pegawai'] ?>" class="btn btn-warning">Edit</a>
                                            <a href="<?= BASE_PATH . '?hal=pegawai/hapus&id_pegawai=' . $data['id_pegawai'] ?>" class="btn btn-danger">Hapus</a>
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