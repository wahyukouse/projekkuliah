<?php
	include "../../lib/config_web.php";
	include "../../lib/koneksi.php";

	$kelas 	= $_POST['kelas'];
	
	$querySimpan = mysqli_query($koneksi, "INSERT INTO kelas (nama_kelas)VALUES('$kelas')");

	if ($querySimpan) {
		echo "<script> alert('Data Kelas Berhasil Masuk');window.location = '$admin_url'+'kelas/main.php';</script> ";
	} else {
		echo "<script> alert('Data Kelas Gagal Dimasukkan');</script>";
	}
?>