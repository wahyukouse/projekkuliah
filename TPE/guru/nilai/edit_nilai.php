<?php
session_start();
if (empty($_SESSION['nip'])) {
	echo "<center>Untuk mengakses halaman, Anda harus login <br>";
	echo "<a href=../../index.php><b>LOGIN</b></a></center>";
} else { 
	include '../../lib/koneksi.php';
	include '../template/header.php';
	$tahun = $koneksi->query("SELECT * FROM thn_ajaran WHERE status = 'aktif'");
	$dt    = mysqli_fetch_array($tahun);
	$query = $koneksi->query("SELECT n.*,s.*,m.* FROM nilai n JOIN siswa s ON n.nisn = s.nisn JOIN mepel m ON n.id_mapel = m.id_mapel WHERE n.id_nilai = '$_GET[id]'");
	$data  = mysqli_fetch_array($query);
	?>
	<section id="courseArchive">
		<div class="container">
			<div class="row">
				<!-- start course content -->
				<div class="col-lg-12 col-md-12 col-sm-12">
					<div class="col-lg-3 col-md-3 col-sm-3"></div>
					<div class="col-lg-6 col-md-6 col-sm-6" style="background-color: #f2f2f2;">
						<form style="margin-top: 50px;" method="post" action="aksi_edit.php" >
							<input type="hidden" name="id_nilai" value="<?php echo $data['id_nilai']; ?>">
							<input type="hidden" name="mapel" value="<?php echo $data['id_mapel']; ?>">
							<input type="hidden" name="nisn" value="<?php echo $data['nisn']; ?>">
							<div class="form-group">
								<label>UTS</label>
								<input type="number" name="uts" class="form-control" value="<?php echo$data['uts']; ?>">
							</div>
							<div class="form-group">
								<label>UAS</label>
								<input type="number" name="uas" class="form-control" value="<?php echo$data['uas']; ?>">
							</div>
							<div class="form-group">
								<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i></button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<?php 
include '../template/footer.php';
} ?>