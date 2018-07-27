<?php
session_start();
if (empty($_SESSION['nip'])) {
	echo "<center>Untuk mengakses halaman, Anda harus login <br>";
	echo "<a href=../../index.php><b>LOGIN</b></a></center>";
} else { 
	include '../../lib/koneksi.php';
	include '../template/header.php';
	$nisn  = $_GET['nisn'];
	$mapel = $_GET['ma'];
	$tahun = $koneksi->query("SELECT * FROM thn_ajaran WHERE status = 'aktif'");
	$dt    = mysqli_fetch_array($tahun);
	$thn   = $koneksi->query("SELECT * FROM thn_ajaran");
	?>
	<section id="courseArchive">
		<div class="container">
			<div class="row">
				<!-- start course content -->
				<div class="col-lg-12 col-md-12 col-sm-12">
					<div class="col-lg-3 col-md-3 col-sm-3"></div>
					<div class="col-lg-6 col-md-6 col-sm-6" style="background-color: #f2f2f2;">
						<form style="margin-top: 50px;" method="post" action="aksi_tambah.php" >
							<input type="hidden" name="nisn" value="<?php echo $nisn; ?>">
							<input type="hidden" name="mapel" value="<?php echo $mapel; ?>">
							<input type="hidden" name="id_kelas" value="<?php echo $_GET['id']; ?>">
								<div class="form-group">
									<label>Tahun Ajaran</label>
									<select class="form-control" name="tahun">
										<option value="<?php echo $dt['id_tahun'] ?>"><?php echo $dt['thn_ajaran']; ?></option>
										<?php 
										while ($th = mysqli_fetch_array($thn)) {
											?>
											<option value="<?php echo $th['id_tahun']; ?>"><?php echo $th['thn_ajaran'];?></option>
											<?php } ?>
										</select>
									</div>
									<div class="form-group">
									<label>UTS</label>
										<input type="number" name="uts" class="form-control">
									</div>
									<div class="form-group">
									<label>UAS</label>
										<input type="number" name="uas" class="form-control">
									</div>
									<div class="form-group">
									<label>UAS</label>
										<select class="form-control" name="semester">
											<option value="Ganjil">Ganjil</option>
											<option value="Genap">Genap</option>
										</select>
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