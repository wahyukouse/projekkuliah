<?php
	// untuk memasukkan file config_web.php dan file koneksi.php
	include "../../lib/config_web.php";
	include "../../lib/koneksi.php";
	$id 	= $_POST['id_mapel'];
	$mapel	= $_POST['mapel'];
	
	$querySimpan = mysqli_query($koneksi, "UPDATE mepel SET 
		 nama_mapel = '$mapel'WHERE id_mapel='$id'");

	if ($querySimpan) {
		echo "<script> alert('Data Mapel Berhasil Diubah'); window.location = '$admin_url'+'mapel/main.php';</script>";
	} else {
		echo "<script> alert('Data Mapel Gagal Diubah');window.location = '$admin_url'+'kelas/form_edit.php?id_mapel=$id';</script>";
	}
?>