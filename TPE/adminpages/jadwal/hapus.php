<?php
    include "../../lib/config_web.php";
    include "../../lib/koneksi.php";

    $id = $_GET['id_jadwal'];
    $queryHapus = mysqli_query($koneksi, "DELETE FROM jadwal WHERE id_jadwal='$id'");
    if ($queryHapus) {
        echo "<script> alert('Data Jadwal Berhasil Dihapus'); window.location = '$admin_url'+'jadwal/main.php';</script>";
    } else {
        echo "<script> alert('Data Jadwal Gagal Dihapus'); window.location = '$admin_url'+'jadwal/main.php';</script>";

    }
?>