<?php 
	include '../../lib/koneksi.php';

	$query = $koneksi->query("DELETE FROM materi WHERE id_materi = '$_GET[id]'");

	if ($query) {
		echo "<script> alert('Hapus Berhasil'); window.location = 'main.php';</script>";
	}else{
		echo "<script> alert('Hapus Gagal'); window.location = 'main.php';</script>";
	}
 ?>