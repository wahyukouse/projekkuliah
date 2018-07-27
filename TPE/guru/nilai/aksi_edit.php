<?php
	include "../../lib/config_web.php";
	include "../../lib/koneksi.php";

	$nisn	= $_POST['nisn'];
	$mapel 	= $_POST['mapel'];
	$uts	= $_POST['uts'];
	$uas	= $_POST['uas'];
	$id     = $_POST['id_nilai'];
	
	$querySimpan = mysqli_query($koneksi, "UPDATE nilai SET 
		 uts = '$uts', uas='$uas'  WHERE id_nilai='$id'");

	if ($querySimpan) {
		echo "<script> alert('Data Nilai Berhasil Diubah'); window.location = 'daftar_nilai.php?nisn=$nisn&&ma=$mapel';</script>";
	} else {
		echo "<script> alert('Data Nilai Gagal Diubah'); window.location = 'daftar_nilai.php?nisn=$nisn&&ma=$mapel';</script>";
	}
?>