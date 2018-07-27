<?php
session_start();
if (empty($_SESSION['nisn'])) {
	echo "<center>Untuk mengakses halaman, Anda harus login <br>";
	echo "<a href=../index.php><b>LOGIN</b></a></center>";
} else { 
	include '../../lib/koneksi.php';
	include '../template/header.php';
	$kueri = $koneksi->query("SELECT k.*,s.* FROM siswa s JOIN kelas k ON s.id_kelas = k.id_kelas WHERE nisn = '$_SESSION[nisn]' ");
	$kelas = mysqli_fetch_array($kueri);
	$query = $koneksi->query("SELECT m.*,g.*,j.* FROM jadwal j JOIN mepel m ON j.id_mapel = m.id_mapel JOIN guru g ON j.nip = g.nip WHERE id_kelas = '$kelas[id_kelas]' ORDER BY FIELD(hari, 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'), FIELD(jam, '07.15-08.00', '08.00-08.45', '08.45-09.30')");
	?>
	<section id="courseArchive">
		<div class="container">
			<div class="row">
				<!-- start course content -->
				<div class="col-lg-12 col-md-12 col-sm-12">
					<table class="table table-striped">
						<thead>
							<tr>
								<th width="5%">NO</th>
								<th width="10%">HARI</th>
								<th width="25%">JAM</th>
								<th width="30%">MATA PELAJARAN</th>
								<th width="30%">GURU PENGAMPU</th>
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
									<td><?php echo $data['nama_mapel']; ?></td>
									<td><?php echo $data['nama_lengkap']; ?></td>
								</tr>
								<?php $no++;} ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</section>
	<?php
	include '../template/footer.php';
} ?>