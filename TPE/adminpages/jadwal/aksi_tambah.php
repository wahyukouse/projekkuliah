<?php
	include "../../lib/config_web.php";
	include "../../lib/koneksi.php";

	$thn	= $_POST['tahun'];
	$kls 	= $_POST['kelas'];
	$mapel  = $_POST['mapel'];
	$guru 	= $_POST['guru'];
	$hari 	= $_POST['hari'];
	$jam 	= $_POST['jam'];
	$smst	= $_POST['semester'];
	
	$querySimpan = mysqli_query($koneksi, "INSERT INTO jadwal 
		(id_tahun,id_kelas,id_mapel,nip,hari,jam,semester)VALUES
		('$thn', '$kls', '$mapel', '$guru', '$hari','$jam','$smst')");

	if ($querySimpan) {
		echo "<script> alert('Data Jadwal Berhasil Masuk');window.location = '$admin_url'+'jadwal/main.php';</script> ";
	} else {
		echo "<script> alert('Data Jadwal Gagal Dimasukkan');window.location = '$admin_url'+'jadwal/main.php';</script>";
	}
?>