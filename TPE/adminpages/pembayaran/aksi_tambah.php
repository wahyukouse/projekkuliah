<?php
	include "../../lib/config_web.php";
	include "../../lib/koneksi.php";

	$jenis 	= $_POST['jenis'];
	$biaya 	= $_POST['biaya'];
	$querySimpan = mysqli_query($koneksi, "INSERT INTO pembayaran (jenis,biaya)VALUES('$jenis','$biaya')");

	if ($querySimpan) {
		echo "<script> alert('Data Pembayaran Berhasil Masuk');window.location = '$admin_url'+'pembayaran/main.php';</script> ";
	} else {
		echo "<script> alert('Data Pembayaran Gagal Dimasukkan');window.location = '$admin_url'+'pembayaran/form_tambah.php';</script>";
	}
?>