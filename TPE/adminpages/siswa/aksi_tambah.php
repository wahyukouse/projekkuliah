<?php
	// untuk memasukkan file config_web.php dan file koneksi.php
	include "../../lib/config_web.php";
	include "../../lib/koneksi.php";

	// untuk menangkap variabel 'nama_kategori' yang dikirim oleh form_tambah.php
	$nisn	= $_POST['nisn'];
	$nama 	= $_POST['nama'];
	$tempat = $_POST['tempat'];
	$tgl 	= $_POST['tgl_lahir'];
	$darah 	= $_POST['darah'];
	$ayah 	= $_POST['ayah'];
	$ibu	= $_POST['ibu'];
	$pkayah	= $_POST['pkayah'];
	$pkibu	= $_POST['pkibu'];
	$alamat = $_POST['alamat'];
	$smp 	= $_POST['smp'];
	// query untuk menyimpan ke tabel tbl_kategori
	
	$querySimpan = mysqli_query($koneksi, "INSERT INTO siswa 
		(nisn,nama_lengkap,tempat_lahir,tgl_lahir,gol_darah,nama_ayah,nama_ibu,pekerjaan_ayah,pekerjaan_ibu,alamat,asal_smp)
		VALUES ('$nisn', '$nama', '$tempat', '$tgl', '$darah','$ayah','$ibu','$pkayah','$pkibu', '$alamat','$smp')");

	// jika query berhasil maka akan tampil alert dan halaman akan kembali ke daftar kategori
	if ($querySimpan) {
		echo "<script> alert('Data Siswa Berhasil Masuk');window.location = '$admin_url'+'siswa/main.php';</script> ";
		// jika query gagal, akan tampil alert dan halaman akan diarahkan ke form tambah kategori
	} else {
		echo "<script> alert('Data Siswa Gagal Dimasukkan');window.location = '$admin_url'+'siswa/main.php';</script>";
	}
?>