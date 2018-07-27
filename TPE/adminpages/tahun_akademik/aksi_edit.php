<?php
	// untuk memasukkan file config_web.php dan file koneksi.php
	include "../../lib/config_web.php";
	include "../../lib/koneksi.php";
	$id 	= $_POST['id'];
	$tahun	= $_POST['tahun'];
	
	$querySimpan = mysqli_query($koneksi, "UPDATE thn_ajaran SET 
		 thn_ajaran = '$tahun'WHERE id_tahun='$id'");

	if ($querySimpan) {
		echo "<script> alert('Data Tahun Akademik Berhasil Diubah'); window.location = 'main.php';</script>";
	} else {
		echo "<script> alert('Data Tahun Akademik Gagal Diubah'); window.location = 'form_edit.php?id_tahun=$id'; </script>";
	}
?>