<?php
    include "../../lib/config_web.php";
    include "../../lib/koneksi.php";

    $nisn = $_GET['nisn'];
    $queryHapus = mysqli_query($koneksi, "DELETE FROM siswa WHERE nisn='$nisn'");
    if ($queryHapus) {
        echo "<script> alert('Data Siswa Berhasil Dihapus'); window.location = '$admin_url'+'siswa/main.php';</script>";
    } else {
        echo "<script> alert('Data Siswa Gagal Dihapus'); window.location = '$admin_url'+'siswa/main.php';</script>";

    }
?>