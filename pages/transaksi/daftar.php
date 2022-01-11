<?php
if (isset($_GET['msg'])) {
    echo "<script> alert('" . $_GET['msg'] . "') </script>";
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
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Nomor Faktur</th>
                                    <th>Tanggal Faktur</th>
                                    <th>Kode Pelanggan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $daftar_kendaraan = mysqli_query($koneksi, "SELECT * FROM transaksi");

                                while ($data = mysqli_fetch_assoc($daftar_kendaraan)) { ?>
                                    <tr>
                                        <td><?= $data['no_faktur']; ?></td>
                                        <td><?= $data['tgl_faktur']; ?></td>
                                        <td><?= $data['kode_pel']; ?></td>
                                        <td>
                                            <a href="<?= BASE_PATH . '?hal=transaksi/edit&kode_kendaraan=' . $data['kode_kendaraan'] ?>" class="btn btn-warning">Edit</a>
                                            <a href="<?= BASE_PATH . '?hal=transaksi/hapus&kode_kendaraan=' . $data['kode_kendaraan'] ?>" class="btn btn-danger">Hapus</a>
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