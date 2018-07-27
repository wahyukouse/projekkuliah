<?php 
	include '../../lib/koneksi.php';

	$no = $_POST['no'];

	$det = $koneksi->query("SELECT s.*,p.*,d.* FROM detail_pembayaran d JOIN siswa s ON d.nisn = s.nisn JOIN pembayaran p ON d.id_pembayaran = p.id_pembayaran WHERE d.no_pembayaran='$no'");
	$dt = mysqli_fetch_array($det);

	$updatedet = $koneksi->query("UPDATE detail_pembayaran SET status = 'Disetujui' WHERE no_pembayaran = '$no'");
	$updatesis = $koneksi->query("UPDATE siswa SET status = 'Aktif' WHERE nisn = '$dt[nisn]'");
	if ($updatedet) {
	echo "<script> alert('Simpan Berhasil'); window.location = 'main.php';</script>";
}else{
	echo "<script> alert('Simpan Gagal'); window.location = 'main.php';</script>";
}
 ?>