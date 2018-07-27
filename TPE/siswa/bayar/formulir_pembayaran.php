<?php
include '../../lib/koneksi.php';
$no  = $_GET['no'];
$query = $koneksi->query("SELECT s.*,p.*,d.* FROM detail_pembayaran d JOIN siswa s ON d.nisn = s.nisn JOIN pembayaran p ON d.id_pembayaran = p.id_pembayaran WHERE d.no_pembayaran='$no'");
?>
<!DOCTYPE>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="../../guru/report/style.css">
</head>
<body>
	<page size="A4">
		<table width="100%" border="0">
			<tr>
				<td valign="bottom" width="20%"><img src="../../img/logokop.png" width="50%"></td>
				<td align="center" width="60%">
					<font size="3">FORMULIR PEMBAYARAN<br>
						<font size="2"><b>SEKOLAH MENENGAH ATAS MUHAMMDIYAH 2 KARANG TENGAH</b><br>
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
							<th>NO PEMBAYARAN</th>
							<th>WAKTU</th>
							<th>JENIS PEMBAYARAN</th>
							<th>JUMLAH BAYAR</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						$no =1;
						while (	$data = mysqli_fetch_array($query)) {
							?>
							<tr>
								<td><?php echo $no; ?></td>
								<td><?php echo $data['no_pembayaran']; ?></td>
								<td><?php echo $data['waktu']; ?></td>
								<td><?php echo $data['jenis']; ?></td>
								<td><?php echo $data['jumlah']; ?></td>
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