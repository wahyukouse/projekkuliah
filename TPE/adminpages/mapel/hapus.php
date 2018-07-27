<?php
    include "../../lib/config_web.php";
    include "../../lib/koneksi.php";

    $id = $_GET['id_mapel'];
    $queryHapus = mysqli_query($koneksi, "DELETE FROM mepel WHERE id_mapel='$id'");
    if ($queryHapus) {
        echo "<script> alert('Data Mapel Berhasil Dihapus'); window.location = '$admin_url'+'mapel/main.php';</script>";
    } else {
        echo "<script> alert('Data Mapel Gagal Dihapus'); window.location = '$admin_url'+'mapel/main.php';</script>";

    }
?>