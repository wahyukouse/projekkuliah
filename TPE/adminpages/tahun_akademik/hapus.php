<?php
    include "../../lib/config_web.php";
    include "../../lib/koneksi.php";

    $id = $_GET['id_tahun'];
    $queryHapus = mysqli_query($koneksi, "DELETE FROM thn_ajaran WHERE id_tahun='$id'");
    if ($queryHapus) {
        echo "<script> alert('Data tahun akademik Berhasil Dihapus'); window.location = 'main.php';</script>";
    } else {
        echo "<script> alert('Data tahun tahun Gagal Dihapus'); window.location = 'tahun/main.php';</script>";

    }
?>