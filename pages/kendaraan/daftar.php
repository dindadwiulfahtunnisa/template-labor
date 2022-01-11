<?php
if (isset($_GET['msg'])) {
    echo "<script> alert('" . $_GET['msg'] . "') </script>";
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
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Kode Kendaraan</th>
                                    <th>Merk Kendaraan</th>
                                    <th>Harga Kendaraan</th>
                                    <th>Stok Kendaraan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $daftar_kendaraan = mysqli_query($koneksi, "SELECT * FROM kendaraan");

                                while ($data = mysqli_fetch_assoc($daftar_kendaraan)) { ?>
                                    <tr>
                                        <td><?= $data['kode_kendaraan']; ?></td>
                                        <td><?= $data['merk_kendaraan']; ?></td>
                                        <td><?= $data['harga_kendaraan']; ?></td>
                                        <td><?= $data['stok_kendaraan']; ?></td>
                                        <td>
                                            <a href="<?= BASE_PATH . '?hal=kendaraan/edit&kode_kendaraan=' . $data['kode_kendaraan'] ?>" class="btn btn-warning">Edit</a>
                                            <a href="<?= BASE_PATH . '?hal=kendaraan/hapus&kode_kendaraan=' . $data['kode_kendaraan'] ?>" class="btn btn-danger">Hapus</a>
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