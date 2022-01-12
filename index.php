<?php
    include "config/main.php";
    include "config/koneksi.php";

    if(isset($_GET['hal'])) {
        $halaman = $_GET['hal'];

        include "layout/top.php";
        include "layout/navbar.php";
        include "layout/sidebar.php";

       
        if($halaman == "home"){
            include "pages/home.php";
        }
        
        // Logic Pegawai
        else if($halaman == "pegawai/daftar"){
            include "pages/pegawai/daftar.php";
        } else if($halaman == "pegawai/tambah"){
            include "pages/pegawai/tambah.php";
        } else if($halaman == "pegawai/edit"){
            include "pages/pegawai/edit.php";
        } else if($halaman == "pegawai/hapus"){
            include "pages/pegawai/hapus.php";
        }

        // Logic Pelanggan
        else if($halaman == "absensi/daftar"){
            include "pages/absensi/daftar.php";
        } else if($halaman == "absensi/tambah"){
            include "pages/absensi/tambah.php";
        } else if($halaman == "absensi/edit"){
            include "pages/absensi/edit.php";
        } else if($halaman == "absensi/hapus"){
            include "pages/absensi/hapus.php";
        }

        // Logic Pelanggan
        else if($halaman == "pelanggan/daftar"){
            include "pages/pelanggan/daftar.php";
        } else if($halaman == "pelanggan/tambah"){
            include "pages/pelanggan/tambah.php";
        } else if($halaman == "pelanggan/edit"){
            include "pages/pelanggan/edit.php";
        } else if($halaman == "pelanggan/hapus"){
            include "pages/pelanggan/hapus.php";
        }

        // Logic Kendaraan
        else if($halaman == "kendaraan/daftar"){
            include "pages/kendaraan/daftar.php";
        } else if($halaman == "kendaraan/tambah"){
            include "pages/kendaraan/tambah.php";
        } else if($halaman == "kendaraan/edit"){
            include "pages/kendaraan/edit.php";
        } else if($halaman == "kendaraan/hapus"){
            include "pages/kendaraan/hapus.php";
        }
        
        // Logic Transaksi
        else if($halaman == "transaksi/daftar"){
            include "pages/transaksi/daftar.php";
        } else if($halaman == "transaksi/tambah"){
            include "pages/transaksi/tambah.php";
        } else if($halaman == "transaksi/edit"){
            include "pages/transaksi/edit.php";
        } else if($halaman == "transaksi/hapus"){
            include "pages/transaksi/hapus.php";
        }
        include "layout/footer.php";
        include "layout/bottom.php";
    } else {
        header("location: ?hal=home");
    }