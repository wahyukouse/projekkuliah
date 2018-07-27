<?php 
include "../../lib/koneksi.php";

$no 	= $_POST['no'];
$tgl 	= $_POST['tgl'];
$jenis	= $_POST['jenis'];
$biaya 	= $_POST['biaya'];
$nisn	= $_POST['nisn'];
$status = 'Belum katif';

$querySimpan = mysqli_query($koneksi, "INSERT INTO detail_pembayaran (no_pembayaran,nisn,id_pembayaran,waktu,jumlah,status) VALUES ('$no', '$nisn', '$jenis', '$tgl', '$biaya','$status')");
if ($querySimpan) {
	echo "<script> alert('Simpan Berhasil'); window.location = 'formulir_pembayaran.php?no=$no';</script>";
}else{
	echo "<script> alert('Simpan Gagal'); window.location = 'main.php';</script>";
}

?>