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
        } else if($halaman == "newhome"){
        include "pages/newhome.php";
        }

        include "layout/footer.php";
        include "layout/bottom.php";
    } else {
        echo "Halaman tidak ditemukan";
    }