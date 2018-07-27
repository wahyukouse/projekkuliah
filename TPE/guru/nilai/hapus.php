<?php
    include "../../lib/koneksi.php";

    $id = $_GET['id'];
    $nisn	= $_GET['nisn'];
	$mapel 	= $_GET['ma'];
    $queryHapus = mysqli_query($koneksi, "DELETE FROM nilai WHERE id_nilai='$id'");
    if ($queryHapus) {
        echo "<script> alert('Data Nilai Berhasil Dihapus'); window.location = 'daftar_nilai.php?nisn=$nisn&&ma=$mapel';</script>";
    } else {
        echo "<script> alert('Data Nilai Gagal Dihapus'); window.location = 'daftar_nilai.php?nisn=$nisn&&ma=$mapel';</script>";

    }
?>