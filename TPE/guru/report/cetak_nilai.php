<?php
session_start();
if (empty($_SESSION['nip'])) {
	echo "<center>Untuk mengakses halaman, Anda harus login <br>";
	echo "<a href=../../index.php><b>LOGIN</b></a></center>";
} else { 
	include '../../lib/koneksi.php';
	$id = $_GET['id'];
	$ma = $_GET['ma'];
	$query = $koneksi->query("SELECT n.*,m.*,s.*,k.* FROM nilai n JOIN siswa s ON  n.nisn = s.nisn JOIN mepel m ON n.id_mapel = m.id_mapel JOIN kelas k ON k.id_kelas = s.id_kelas WHERE k.id_kelas = '$id' AND m.id_mapel = '$ma' ");
	$kelas = $koneksi->query("SELECT * FROM kelas WHERE id_kelas = '$id'");
	$kls   = mysqli_fetch_array($kelas);
	$ambil = $koneksi->query("SELECT * FROM thn_ajaran WHERE status = 'aktif'");
	$pecah = mysqli_fetch_array($ambil);
	?>
	<!DOCTYPE>
	<html>
	<head>
		<title></title>
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body>
		<page size="A4">
			<table width="100%" border="0">
				<tr>
					<td valign="bottom" width="20%"><img src="../../img/logokop.png" width="50%"></td>
					<td align="center" width="60%">
						<font size="3">LAPORAN NILAI KELAS <?php echo $kls['nama_kelas']; ?><br>
								<font size="2"><b>SEKOLAH MENENGAH ATAS MUHAMMDIYAH 2 KARANG TENGAH</b><br>
									<font size="2"><b>TAHUN AJRAN <?php echo $pecah['thn_ajaran']; ?></b><br>
										<font size="1"><i>jl. Raya Belitang Bk 5 Desa Karang Tengah tlp. 0232-xxxxx</i></font>
									</td>
									<td></td>
								</tr>
							</table>
							<hr size="5" color="black"><br>
							<table class="tabel">
								<thead>
									<tr>
										<th>NO</th>
										<th>NISN</th>
										<th>NAMA LENGKAP</th>
										<th>MATA PELAJARAN</th>
										<th>UTS</th>
										<th>UAS</th>
										<th>RATA-RATA</th>
									</tr>
								</thead>
								<tbody>
									<?php 
									$no =1;
									while (	$data = mysqli_fetch_array($query)) {
										$rata = ($data['uts']+$data['uas'])/2;
										?>
										<tr>
											<td><?php echo $no; ?></td>
											<td><?php echo $data['nisn']; ?></td>
											<td><?php echo $data['nama_lengkap']; ?></td>
											<td><?php echo $data['nama_mapel']; ?></td>
											<td><?php echo $data['uts']; ?></td>
											<td><?php echo $data['uas']; ?></td>
											<td><?php echo $rata; ?></td>
										</tr>
										<?php $no++;} ?>
										<tr>
											<td colspan="7" align="center"><input type="button" onClick="window.print()" value="Print"></td>
										</tr>
									</tbody>
								</table>
							</page>
						</body>
						</html>
						<?php } ?>