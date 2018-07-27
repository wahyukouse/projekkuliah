<?php
	include "../../lib/config_web.php";
	include "../../lib/koneksi.php";

	$mapel 	= $_POST['mapel'];
	
	$querySimpan = mysqli_query($koneksi, "INSERT INTO mepel (nama_mapel)VALUES('$mapel')");

	if ($querySimpan) {
		echo "<script> alert('Data Mata Pelajaran Berhasil Masuk');window.location = '$admin_url'+'mapel/main.php';</script> ";
	} else {
		echo "<script> alert('Data Mata Pelajaran Gagal Dimasukkan')</script>";
	}
?>