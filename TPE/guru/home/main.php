<?php
session_start();
if (empty($_SESSION['nip'])) {
	echo "<center>Untuk mengakses halaman, Anda harus login <br>";
	echo "<a href=../index.php><b>LOGIN</b></a></center>";
} else { 
	include '../../lib/koneksi.php';
	include '../template/header.php';
	$query = $koneksi->query("SELECT m.*,g.*,j.*,k.*,t.* FROM jadwal j JOIN mepel m ON j.id_mapel = m.id_mapel JOIN guru g ON j.nip = g.nip JOIN thn_ajaran t ON j.id_tahun = t.id_tahun JOIN kelas k ON j.id_kelas = k.id_kelas WHERE g.nip = '$_SESSION[nip]' AND t.status = 'aktif'   ORDER BY FIELD(hari, 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'), FIELD(jam, '07.15-08.00', '08.00-08.45', '08.45-09.30')");
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
							<th width="30%">KELAS</th>
							<th width="30%">MATA PELAJARAN</th>
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
								<td><?php echo $data['nama_kelas']; ?></td>
								<td><?php echo $data['nama_mapel']; ?></td>
							</tr>
							<?php $no++;} ?>
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