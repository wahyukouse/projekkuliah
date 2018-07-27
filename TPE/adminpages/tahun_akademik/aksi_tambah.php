<?php
	include "../../lib/config_web.php";
	include "../../lib/koneksi.php";

	$tahun 	= $_POST['tahun'];
	$status	= 'Aktif';
	$update = $koneksi->query("UPDATE siswa SET status = 'Tidak Aktif'");
	$max 	= $koneksi->query("SELECT MAX(id_tahun) as thn,thn_ajaran FROM thn_ajaran");
	$mx 	= mysqli_fetch_array($max);
	$ter 	=  $mx['thn'];
	$updatethn = $koneksi->query("UPDATE thn_ajaran SET status = 'tidak aktif' WHERE id_tahun = '$ter'");
	$querySimpan = mysqli_query($koneksi, "INSERT INTO thn_ajaran (thn_ajaran,status)VALUES('$tahun','$status')");

	if ($querySimpan) {
		echo "<script> alert('Data Tahun Ajaran Berhasil Masuk');window.location = 'main.php';</script> ";
	} else {
		echo "<script> alert('Data Tahun Ajaran Gagal Dimasukkan');</script>";
	}
?>