<?php
	// untuk memasukkan file config_web.php dan file koneksi.php
	include "../../lib/config_web.php";
	include "../../lib/koneksi.php";
	$id 	= $_POST['id_jadwal'];
	$thn	= $_POST['tahun'];
	$kls 	= $_POST['kelas'];
	$mapel  = $_POST['mapel'];
	$guru 	= $_POST['guru'];
	$hari 	= $_POST['hari'];
	$jam 	= $_POST['jam'];
	$smst	= $_POST['semester'];
	
	$querySimpan = mysqli_query($koneksi, "UPDATE jadwal SET 
		 id_tahun = '$thn', id_kelas='$kls', id_mapel = '$mapel', nip = '$guru', hari = '$hari', jam ='$jam', semester='$smst'  WHERE id_jadwal='$id'");

	if ($querySimpan) {
		echo "<script> alert('Data Jadwal Berhasil Diubah'); window.location = '$admin_url'+'jadwal/main.php';</script>";
	} else {
		echo "<script> alert('Data Jadwal Gagal Diubah');</script>";
	}
?>