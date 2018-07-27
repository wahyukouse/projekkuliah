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
				<table class="table table-striped">
					<thead>
						<tr>
							<th>NO</th>
							<th>JUDUL</th>
							<th>TANGGAL UPLOAD</th>
							<th>MATA PELAJARAN</th>
							<th>AKSI</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						$no =1;
						$query = $koneksi->query("SELECT m.*,p.* FROM materi m JOIN mepel p ON m.id_mapel = p.id_mapel WHERE m.nip = '$_SESSION[nip]'");
						while (	$data = mysqli_fetch_array($query)) {
							?>
							<tr>
								<td><?php echo $no; ?></td>
								<td><?php echo $data['judul']; ?></td>
								<td><?php echo $data['tgl_upload']; ?></td>
								<td><?php echo $data['nama_mapel']; ?></td>
								<td><a href="hapus.php?id=<?php echo $data['id_materi']; ?>" class="btn btn-danger" onClick="return confirm('Anda yakin ingin menghapus data ini?')"><i class="fa fa-trash-o"></i></a></td>
							</tr>
							<?php $no++;} ?>
							<tr align="center"><td colspan="5"><a href="form_tambah.php" class="btn btn-success">Upload</a></td></tr>
						</tbody>
					</table>
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