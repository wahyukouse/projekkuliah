<?php
	// untuk memasukkan file config_web.php dan file koneksi.php
	include "../../lib/config_web.php";
	include "../../lib/koneksi.php";

	// untuk menangkap variabel 'nama_kategori' yang dikirim oleh form_tambah.php
	$nip = $_POST['nip'];
	$mapel = $_POST['mapel'];
	$nama = $_POST['nama'];
	$alamat = $_POST['alamat'];
	$tempat = $_POST['tempat'];
	$tgl = $_POST['tgl_lahir'];
	$darah = $_POST['darah'];
	// query untuk menyimpan ke tabel tbl_kategori
	
	$querySimpan = mysqli_query($koneksi, "INSERT INTO guru 
		(nip,id_mapel,nama_lengkap,alamat,tempat_lahir,tgl_lahir,gol_darah)
		VALUES ('$nip', '$mapel', '$nama', '$alamat', '$tempat', '$tgl', '$darah')");

	// jika query berhasil maka akan tampil alert dan halaman akan kembali ke daftar kategori
	if ($querySimpan) {
		echo "<script> alert('Data Produk Berhasil Masuk'); window.location = '$admin_url'+'guru/main.php';</script>";
		// jika query gagal, akan tampil alert dan halaman akan diarahkan ke form tambah kategori
	} else {
		echo "<script> alert('Data Produk Gagal Dimasukkan'); window.location = '$admin_url'+'guru/form_tambah.php';</script>";
	}
?>