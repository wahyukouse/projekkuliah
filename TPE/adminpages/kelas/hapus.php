<?php
    include "../../lib/config_web.php";
    include "../../lib/koneksi.php";

    $id = $_GET['id_kelas'];
    $queryHapus = mysqli_query($koneksi, "DELETE FROM kelas WHERE id_kelas='$id'");
    if ($queryHapus) {
        echo "<script> alert('Data Kelas Berhasil Dihapus'); window.location = '$admin_url'+'kelas/main.php';</script>";
    } else {
        echo "<script> alert('Data Kelas Gagal Dihapus'); window.location = '$admin_url'+'kelas/main.php';</script>";

    }
?>