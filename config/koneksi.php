<?php

$koneksi = mysqli_connect("localhost", "root", "", "ujian_lab1");
if(mysqli_errno($koneksi)) {
    echo mysqli_errno($koneksi);
    die();
}