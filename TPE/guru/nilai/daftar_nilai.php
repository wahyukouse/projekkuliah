<?php
session_start();
if (empty($_SESSION['nip'])) {
	echo "<center>Untuk mengakses halaman, Anda harus login <br>";
	echo "<a href=../../index.php><b>LOGIN</b></a></center>";
} else { 
	include '../../lib/koneksi.php';
	include '../template/header.php';
	$nisn = $_GET['nisn'];
	$mapel= $_GET['ma'];
	$query = $koneksi->query("SELECT n.*,s.*,m.* FROM nilai n JOIN siswa s ON n.nisn = s.nisn JOIN mepel m ON n.id_mapel = m.id_mapel WHERE s.nisn = '$nisn' AND m.id_mapel = '$mapel'");
	$dt = mysqli_fetch_array($query)
	?>
	<section id="courseArchive">
		<div class="container">
			<div class="row">
				<!-- start course content -->
				<div class="col-lg-12 col-md-12 col-sm-12">
					<center><h3>Manajemen Nilai Siswa <?php echo $dt['nama_lengkap']?></h3>
						<h4>Mata Pelajaran <?php echo $dt['nama_mapel']; ?></h4></center>
						<table class="table table-striped" style="margin-top: 50px;">
							<thead>
								<tr>
									<th width="5%">NO</th>
									<th width="20%">NISN</th>
									<th width="25%">NAMA LENGKAP</th>
									<th width="10%">UAS</th>
									<th width="10%">UTS</th>
									<th width="15%">RATA-RATA</th>
									<th width="25%">AKSI</th>
								</tr>
							</thead>
							<tbody>
								<?php 
								$no =1;
								$kuery = $koneksi->query("SELECT n.*,s.*,m.* FROM nilai n JOIN siswa s ON n.nisn = s.nisn JOIN mepel m ON n.id_mapel = m.id_mapel WHERE s.nisn = '$nisn' AND m.id_mapel = '$mapel'");
								while (	$data = mysqli_fetch_array($kuery)) {
									$rata = ($data['uts']+$data['uas'])/2;
									?>
									<tr>
										<td><?php echo $no; ?></td>
										<td><?php echo $data['nisn']; ?></td>
										<td><?php echo $data['nama_lengkap']; ?></td>
										<td><?php echo $data['uas']; ?></td>
										<td><?php echo $data['uts']; ?></td>
										<td><?php echo $rata; ?></td>
										<td><a class="btn btn-success" href="edit_nilai.php?id=<?php echo$data['id_nilai']; ?>"> <i class="fa fa-edit"></i></a>
											<a class="btn btn-danger" href="hapus.php?id=<?php echo$data['id_nilai']; ?>&&nisn=<?php echo $data['nisn'] ?>&&ma=<?php echo $data['id_mapel'] ?>"> <i class="fa fa-trash-o"></i></a>
										</td>
									</tr>
									<?php $no++;}
									if ($no>2) {
										?>
										<tr><td colspan="7">Nilai Lebih Dari 1 Silahkan Hapus Yang Tidak Perlu</td></tr>
										<?php } ?>
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