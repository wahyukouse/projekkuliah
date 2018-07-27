<?php
session_start();
if (empty($_SESSION['nip'])) {
	echo "<center>Untuk mengakses halaman, Anda harus login <br>";
	echo "<a href=../../index.php><b>LOGIN</b></a></center>";
} else { 
	include '../../lib/koneksi.php';
	include '../template/header.php';
	$id = $_GET['id'];
	$ma = $_GET['ma'];
	$query = $koneksi->query("SELECT n.*,m.*,s.*,k.* FROM nilai n JOIN siswa s ON  n.nisn = s.nisn JOIN mepel m ON n.id_mapel = m.id_mapel JOIN kelas k ON k.id_kelas = s.id_kelas WHERE k.id_kelas = '$id' AND m.id_mapel = '$ma' ");
	?>
	<style type="text/css">
		.cetak{
			color: blue;
			font-family: calibri;
			font-size: 20px;
		}
		.cetak:hover{
			color: blue;
		}
	</style>
	<section id="courseArchive">
		<div class="container">
			<div class="row">
				<!-- start course content -->
				<div class="col-lg-12 col-md-12 col-sm-12">
					<?php 
					$tahun = $koneksi->query("SELECT * FROM kelas where id_kelas = '$id'");
					while($thn = mysqli_fetch_array($tahun)){
						?>
						<center><h3>Manajemen Nilai Kelas <?php echo $thn['nama_kelas']; }?></h3></center>
						<table class="table table-striped" style="margin-top: 50px;">
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
									<tr><td colspan="7" align="center"><a href="cetak_nilai.php?id=<?php echo$id; ?>&&ma=<?php echo$ma; ?>" class="cetak">cetak</a></td></tr>
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