<?php
	// untuk memasukkan file config_web.php dan file koneksi.php
	include "../../lib/config_web.php";
	include "../../lib/koneksi.php";

	$nip = $_POST['nip'];
	$mapel = $_POST['mapel'];
	$nama = $_POST['nama'];
	$alamat = $_POST['alamat'];
	$tempat = $_POST['tempat'];
	$tgl = $_POST['tgl_lahir'];
	$darah = $_POST['darah'];
	
	$querySimpan = mysqli_query($koneksi, "UPDATE guru SET 
		 id_mapel = '$mapel', nama_lengkap='$nama', alamat = '$alamat', tempat_lahir = '$tempat', tgl_lahir = '$tgl', gol_darah ='$darah'  WHERE nip='$nip'");

	if ($querySimpan) {
		echo "<script> alert('Data Guru Berhasil Diubah'); window.location = '$admin_url'+'guru/main.php';</script>";
	} else {
		echo "<script> alert('Data Guru Gagal Diubah'); window.location = '$admin_url'+'guru/form_edit.php?nip=$nip';</script>";
	}
?>