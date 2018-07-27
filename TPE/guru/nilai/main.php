<?php
session_start();
if (empty($_SESSION['nip'])) {
	echo "<center>Untuk mengakses halaman, Anda harus login <br>";
	echo "<a href=../../index.php><b>LOGIN</b></a></center>";
} else { 
	include '../../lib/koneksi.php';
	include '../template/header.php';
	?>
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
						 <table class="table table-striped" style="margin-top: 30px;">
							<thead>
								<tr>
									<th>NO</th>
									<th>KELAS</th>
									<th>NAMA MATA PELAJARAN</th>
									<th>AKSI</th>
								</tr>
							</thead>
							<tbody>
								<?php 
								$no =1;

								$ambil = $koneksi->query("SELECT * FROM kelas");
								while ($pecah = mysqli_fetch_array($ambil)) {
									$query = $koneksi->query("SELECT j.*,k.*,g.*,m.*,t.* FROM jadwal j JOIN kelas k ON j.id_kelas = k.id_kelas JOIN mepel m ON j.id_mapel = m.id_mapel JOIN guru g ON j.nip = g.nip JOIN thn_ajaran t ON j.id_tahun = t.id_tahun WHERE k.id_kelas = '$pecah[id_kelas]' AND g.nip = '$_SESSION[nip]' AND t.id_tahun = '$_POST[tahun]' AND j.semester = '$_POST[semester]'");
									$data = mysqli_fetch_array($query);
									?>
									<tr>
										<td><?php echo $no; ?></td>
										<td><?php echo $data['nama_kelas']; ?></td>
										<td><?php echo $data['nama_mapel']; ?></td>
										<td><a class="btn btn-warning" href="form_siswa.php?id=<?php echo$data['id_kelas']; ?>&&ma=<?php echo$data['id_mapel']; ?>"> <i class="fa fa-edit"></i></a>
										</td>
									</tr>
									<?php $no++;
								}?>
								</tbody>
							</table>
							<?php }else{ ?>
							<table class="table table-striped" style="margin-top: 30px;">
							<thead>
								<tr>
									<th>NO</th>
									<th>KELAS</th>
									<th>NAMA MATA PELAJARAN</th>
									<th>AKSI</th>
								</tr>
							</thead>
							<tbody>
								<tr><td colspan="4">Silahkan Pilih Tahun dan Semester</td></tr>
								</tbody>
							</table>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
		</section>
		<?php 
		include '../template/footer.php';
	} ?>