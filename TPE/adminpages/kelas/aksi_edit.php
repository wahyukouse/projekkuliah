<?php
	// untuk memasukkan file config_web.php dan file koneksi.php
	include "../../lib/config_web.php";
	include "../../lib/koneksi.php";
	$id 	= $_POST['id'];
	$kelas	= $_POST['kelas'];
	
	$querySimpan = mysqli_query($koneksi, "UPDATE kelas SET 
		 nama_kelas = '$kelas'WHERE id_kelas='$id'");

	if ($querySimpan) {
		echo "<script> alert('Data Kelas Berhasil Diubah'); window.location = '$admin_url'+'kelas/main.php';</script>";
	} else {
		echo "<script> alert('Data Mapel Gagal Diubah'); window.location = '$admin_url'+'kelas/form_edit.php?id_kelas=$id'; </script>";
	}
?>