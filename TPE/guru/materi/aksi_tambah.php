<?php 
	include "../../lib/koneksi.php";

	$mapel 	= $_POST['mapel'];
	$tgl 	= $_POST['tgl'];
	$thn	= $_POST['tahun'];
	$nip 	= $_POST['guru'];
	$fileName = $_FILES['judul']['name'];

	$querySimpan = mysqli_query($koneksi, "INSERT INTO materi (judul, tgl_upload, nip, id_tahun, id_mapel) VALUES ('$fileName', '$tgl', '$nip', '$thn', '$mapel')");
	
	move_uploaded_file($_FILES['judul']['tmp_name'], "../../file/materi/".$_FILES['judul']['name']);
	if ($querySimpan) {
		echo "<script> alert('Upload Berhasil'); window.location = 'main.php';</script>";
	}else{
		echo "<script> alert('Upload Gagal'); window.location = 'form_tambah.php';</script>";
	}
	
 ?>