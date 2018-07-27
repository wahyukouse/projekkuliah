<?php
	include "../../lib/config_web.php";
	include "../../lib/koneksi.php";
	$id 	= $_POST['id_kelas'];
	$nisn	= $_POST['nisn'];
	$mapel 	= $_POST['mapel'];
	$tahun	= $_POST['tahun'];
	$uts	= $_POST['uts'];
	$uas	= $_POST['uas'];
	$semester= $_POST['semester'];
	
	$querySimpan = mysqli_query($koneksi, "INSERT INTO nilai (nisn,id_mapel,id_tahun,uts,uas,semester)
		VALUES('$nisn','$mapel','$tahun','$uts','$uas','$semester')");

	if ($querySimpan) {
		echo "<script> alert('Data Nilai Berhasil Masuk');window.location = 'form_siswa.php?id=$id&&ma=$mapel';</script> ";
	} else {
		echo "<script> alert('Data Nilai Gagal Dimasukkan');</script>";
	}
?>