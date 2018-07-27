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
	$query = $koneksi->query("SELECT * FROM siswa WHERE id_kelas = '$id'");
	?>
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
							<th width="5%">NO</th>
							<th width="40%">NISN</th>
							<th width="45%">NAMA LENGKAP</th>
							<th width="10%">ATUR NILAI</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						$no =1;
						while (	$data = mysqli_fetch_array($query)) {
							?>
							<tr>
								<td><?php echo $no; ?></td>
								<td><?php echo $data['nisn']; ?></td>
								<td><?php echo $data['nama_lengkap']; ?></td>
								<td><a class="btn btn-primary" href="form_tambah.php?nisn=<?php echo$data['nisn']; ?>&&ma=<?php echo$_GET['ma']; ?>&&id=<?php echo$id;?>"> <i class="fa fa-plus"></i></a>
								<a class="btn btn-success" href="daftar_nilai.php?nisn=<?php echo$data['nisn']; ?>&&ma=<?php echo$ma;?>"> <i class="fa fa-eye"></i></a>
								</td>
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