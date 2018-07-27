<?php
    include "../../lib/config_web.php";
    include "../../lib/koneksi.php";

    $nip = $_GET['nip'];
    $queryHapus = mysqli_query($koneksi, "DELETE FROM guru WHERE nip='$nip'");
    if ($queryHapus) {
        echo "<script> alert('Data Guru Berhasil Dihapus'); window.location = '$admin_url'+'guru/main.php';</script>";
    } else {
        echo "<script> alert('Data Guru Gagal Dihapus'); window.location = '$admin_url'+'guru/main.php';</script>";

    }
?>