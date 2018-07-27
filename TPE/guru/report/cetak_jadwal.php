<?php
session_start();
if (empty($_SESSION['nip'])) {
	echo "<center>Untuk mengakses halaman, Anda harus login <br>";
	echo "<a href=../../index.php><b>LOGIN</b></a></center>";
} else { 
	include '../../lib/koneksi.php';
	$id = $_GET['id'];
	$nip = $_GET['nip'];
	$sms = $_GET['sms'];
	$query = $koneksi->query("SELECT m.*,g.*,j.*,k.*,t.* FROM jadwal j JOIN mepel m ON j.id_mapel = m.id_mapel JOIN guru g ON j.nip = g.nip JOIN thn_ajaran t ON j.id_tahun = t.id_tahun JOIN kelas k ON j.id_kelas = k.id_kelas WHERE g.nip = '$nip' AND t.id_tahun = '$id' AND j.semester = '$sms'   ORDER BY FIELD(hari, 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'), FIELD(jam, '07.15-08.00', '08.00-08.45', '08.45-09.30')");
	$kelas = $koneksi->query("SELECT * FROM guru WHERE nip = '$nip'");
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
						<font size="3">LAPORAN NILAI JADWAL GURU <?php echo $kls['nama_lengkap']; ?><br>
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
										<th width="5%">NO</th>
										<th width="10%">HARI</th>
										<th width="25%">JAM</th>
										<th width="30%">KELAS</th>
										<th width="30%">MATA PELAJARAN</th>
									</tr>
								</thead>
								<tbody>
									<?php 
									$no =1;
									while (	$data = mysqli_fetch_array($query)) {
										?>
										<tr>
											<td><?php echo $no; ?></td>
											<td><?php echo $data['hari']; ?></td>
											<td><?php echo $data['jam']; ?></td>
											<td><?php echo $data['nama_kelas']; ?></td>
											<td><?php echo $data['nama_mapel']; ?></td>
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