<?php 
session_start();
if (empty($_SESSION['nisn'])) {
	echo "<center>Untuk mengakses halaman, Anda harus login <br>";
	echo "<a href=../index.php><b>LOGIN</b></a></center>";
} else { 
	include '../../lib/koneksi.php';
	include '../template/header.php';
	$nisn = $_SESSION['nisn'];
	?>
	<style type="text/css">
		.cetak{
			color: blue;
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
					<div class="col-md-12" style="background-color: #fff; height: 75px;">
						<form method="post" enctype="multipart/form-data">
							<div class="form-group">
								<div class="col-md-4" style="margin-top: 7px;">
									<select class="form-control" name="tahun">
										<option>-Pilih Tahun Ajaran-</option>
										<?php 
										$query = $koneksi->query("SELECT * FROM thn_ajaran ORDER BY id_tahun DESC LIMIT 8");
										while ($data = mysqli_fetch_array($query)) {
											?>
											<option value="<?php echo $data['id_tahun'] ?>"><?php echo $data['thn_ajaran']; ?></option>
											<?php } ?>
										</select>
									</div>
									<div class="col-md-4" style="margin-top: 7px;">
										<select class="form-control" name="semester">
											<option>-Pilih Semester-</option>
											<option value="Ganjil">Ganjil</option>
											<option value="Genap">Genap</option>
										</select>
									</div>
									<div class="col-md-2">
										<button type="submit" class="btn btn-warning" name="tampil" >Tampilkan Nilai</button>
									</div>
								</div>
							</form>
						</div>
						<?php 
						if (isset($_POST['tampil'])) {
							?>
							<table class="table table-striped">
								<thead>
									<tr>
										<th>NO</th>
										<th>MATA PELAJARAN</th>
										<th>UTS</th>
										<th>UAS</th>
										<th>RATA-RATA</th>
									</tr>
								</thead>
								<tbody>
									<?php 
									$no = 1;
									$query = $koneksi->query("SELECT n.*,m.* FROM nilai n JOIN mepel m ON n.id_mapel = m.id_mapel WHERE nisn = '$nisn' AND id_tahun = '$_POST[tahun]' AND semester = '$_POST[semester]'");
									while ($data = mysqli_fetch_array($query)) {
										$rata = ($data['uts']+$data['uas'])/2;
										?>
										<tr>
											<td><?php echo $no; ?></td>
											<td><?php echo $data['nama_mapel']; ?></td>
											<td><?php echo $data['uts']; ?></td>
											<td><?php echo $data['uas']; ?></td>
											<td><?php echo $rata; ?></td>
										</tr>
										<?php $no++;} ?>
										<tr align="center">
											<td colspan="5"><a href="../report/cetak_nilai.php?nisn=<?php echo $nisn ; ?>&&thn=<?php echo $_POST['tahun'] ; ?>&&sms=<?php echo $_POST['semester'] ; ?>" class="cetak">cetak</a></td>
										</tr>
									</tbody>
								</table>
								<?php }
								?>
							</div>
						</div>
					</div>
				</div>
			</section>
			<?php 
			include '../template/footer.php';
		}
		?>