<?php
	// untuk memasukkan file config_web.php dan file koneksi.php
	include "../../lib/config_web.php";
	include "../../lib/koneksi.php";
	$id 	= $_POST['id'];
	$jenis 	= $_POST['jenis'];
	$biaya 	= $_POST['biaya'];
	
	$querySimpan = mysqli_query($koneksi, "UPDATE pembayaran SET 
		 jenis = '$jenis', biaya = '$biaya'WHERE id_pembayaran='$id'");

	if ($querySimpan) {
		echo "<script> alert('Data Pembayaran Berhasil Diubah'); window.location = '$admin_url'+'pembayaran/main.php';</script>";
	} else {
		echo "<script> alert('Data Pembayaran Gagal Diubah');window.location = '$admin_url'+'pembayaran/form_edit.php?id_pembayaran=$id';</script>";
	}
?>