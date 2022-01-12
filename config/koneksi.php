<?php

$koneksi = mysqli_connect("localhost", "root", "", "db_dindadwi0635");
if(mysqli_errno($koneksi)) {
    echo mysqli_errno($koneksi);
    die();
}