<?php
    include "../../lib/config_web.php";
    include "../../lib/koneksi.php";

    $id = $_GET['id_pembayaran'];
    $queryHapus = mysqli_query($koneksi, "DELETE FROM pembayaran WHERE id_pembayaran='$id'");
    if ($queryHapus) {
        echo "<script> alert('Data Pembayaran Berhasil Dihapus'); window.location = '$admin_url'+'pembayaran/main.php';</script>";
    } else {
        echo "<script> alert('Data Pembayaran Gagal Dihapus'); window.location = '$admin_url'+'pembayaran/main.php';</script>";

    }
?>