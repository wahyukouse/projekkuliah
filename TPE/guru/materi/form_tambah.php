<?php
session_start();
if (empty($_SESSION['nip'])) {
	echo "<center>Untuk mengakses halaman, Anda harus login <br>";
	echo "<a href=../index.php><b>LOGIN</b></a></center>";
} else { 
	include '../../lib/koneksi.php';
	include '../template/header.php';
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
				<h3>Upload Materi</h3>
				<div class="col-md-3"></div>
				<div class="col-md-6">
					<form method="post" action="aksi_tambah.php" enctype="multipart/form-data">
						<div class="form-group">
							<label>File Materi</label>
							<input type="file" name="judul">
						</div>
						<div class="form-group">
							<label>Tanggal Upload</label>
							<?php
							$tgl = gmdate("Y-m-d H:i:s", time()+60*60*7);?>
							<input type="text" name="tgl" class="form-control" value="<?php echo $tgl; ?>" readonly>
						</div>
						<input type="hidden" name="guru" value="<?php echo $_SESSION['nip']; ?>">
						<?php 
						$tahun = $koneksi->query("SELECT * FROM thn_ajaran");
						 ?>
						 <div class="form-group">
						 	<label>Tahun Ajaran</label>
						 	<select class="form-control" name="tahun">
						 		<?php 
                                   while ($thn   = mysqli_fetch_array($tahun)) {
						 		 ?>
						 	    <option value="<?php echo $thn['id_tahun']; ?>"><?php echo $thn['thn_ajaran']; ?></option>
						 	    <?php } ?>
						 	</select>
						 </div>
						 <?php 
						$mapel = $koneksi->query("SELECT g.*,m.* FROM guru g JOIN mepel m ON g.id_mapel = m.id_mapel WHERE g.nip = '$_SESSION[nip]'");
						 ?>
						 <div class="form-group">
						 	<label>Mata Pelajaran</label>
						 	<select class="form-control" name="mapel">
						 		<?php 
                                   while ($mp   = mysqli_fetch_array($mapel)) {
						 		 ?>
						 	    <option value="<?php echo $mp['id_mapel']; ?>"><?php echo $mp['nama_mapel']; ?></option>
						 	    <?php } ?>
						 	</select>
						 </div>
						<div class="form-group">
							<button type="submit" class="btn btn-success">Upload</button>
						</div>
					</form>
				</div>
			</div>
			</div>
		</div>
	</div>
</section>
<footer id="footer">
	<!-- Start footer top area -->
	<div class="footer_top">
		<div class="container">
			<div class="row">
				<div class="col-ld-6  col-md-6 col-sm-6">
					<div class="single_footer_widget">
						<p>Copyright © 2017<br>
							SMA Muhammadiya 2 Karang Tengah<br>
						All Right Reserved</p>
					</div>
				</div>
				<div class="col-ld-3  col-md-3 col-sm-3">
					<div class="single_footer_widget">
						<h3>Link</h3>
						<ul class="footer_widget_nav">
							<li><a href="#">Link 1</a></li>
							<li><a href="#">Link 2</a></li>
						</ul>
					</div>
				</div>
				<div class="col-ld-3  col-md-3 col-sm-3">
					<div class="single_footer_widget">
						<h3>Social Links</h3>
						<ul class="footer_social">
							<li><a data-toggle="tooltip" data-placement="top" title="Facebook" class="soc_tooltip" href="#"><i class="fa fa-facebook"></i></a></li>
							<li><a data-toggle="tooltip" data-placement="top" title="Twitter" class="soc_tooltip"  href="#"><i class="fa fa-twitter"></i></a></li>
							<li><a data-toggle="tooltip" data-placement="top" title="Google+" class="soc_tooltip"  href="#"><i class="fa fa-google-plus"></i></a></li>
							<li><a data-toggle="tooltip" data-placement="top" title="Linkedin" class="soc_tooltip"  href="#"><i class="fa fa-linkedin"></i></a></li>
							<li><a data-toggle="tooltip" data-placement="top" title="Youtube" class="soc_tooltip"  href="#"><i class="fa fa-youtube"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</footer>
<!-- initialize jQuery Library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<!-- For smooth animatin  -->
<script src="../js/wow.min.js"></script>  
<!-- Bootstrap js -->
<script src="../js/bootstrap.min.js"></script>
<!-- slick slider -->
<script src="../js/slick.min.js"></script>
<script src="../js/js.js"></script>
<!-- superslides slider -->
<script src="../js/jquery.animate-enhanced.min.js"></script>
<script src="../js/jquery.superslides.min.js" type="text/javascript" charset="utf-8"></script>   
<!-- for circle counter -->
<!-- Gallery slider -->

<!-- Custom js-->
<script src="../../js/custom.js"></script>

</body>
</html>
<?php 
} ?>