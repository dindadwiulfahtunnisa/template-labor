<?php
    if(isset($_GET['msg'])) {
        echo "<script> alert('".$_GET['msg']."') </script>";    
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
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Kode Pelanggan</th>
                                                    <th>Nama Pelanggan</th>
                                                    <th>Alamat</th>
                                                    <th>Kota</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    $daftar_pelanggan = mysqli_query($koneksi, "SELECT * FROM pelanggan");
                                                    
                                                   while ($data = mysqli_fetch_assoc($daftar_pelanggan)) { ?>
                                                        <tr>
                                                            <td><?= $data['kode_pel']; ?></td>
                                                            <td><?= $data['nama_pel']; ?></td>
                                                            <td><?= $data['alamat']; ?></td>
                                                            <td><?= $data['kota']; ?></td>
                                                            <td>
                                                                <a href="<?= BASE_PATH.'?hal=pelanggan/edit&kode_pel='.$data['kode_pel'] ?>" class="btn btn-warning">Edit</a>
                                                                <a href="<?= BASE_PATH.'?hal=pelanggan/hapus&kode_pel='.$data['kode_pel'] ?>" class="btn btn-danger">Hapus</a>
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
   
    