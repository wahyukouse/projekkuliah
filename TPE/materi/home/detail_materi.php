<?php
session_start();
if (empty($_SESSION['nisn'])) {
	echo "<center>Untuk mengakses halaman, Anda harus login <br>";
	echo "<a href=../../index.php><b>LOGIN</b></a></center>";
} else { 
include '../template/header.php';
include '../../lib/koneksi.php';
$id 	= $_GET['id'];
?>
<section id="courseArchive">
	<div class="col-md-3"></div>
	<div class="col-md-6">
		<?php 
           $query = $koneksi->query("SELECT m.*,g.*,mt.* FROM materi mt JOIN mepel m ON mt.id_mapel = m.id_mapel JOIN guru g ON mt.nip = g.nip WHERE mt.id_materi = '$id'");
           $data = mysqli_fetch_array($query);
		 ?>
		<table class="table table-bordered">
			<tr>
				<td>Tgl. Upload</td>
				<td><?php echo $data['tgl_upload']; ?></td>
			</tr>
			<tr>
				<td>Oleh</td>
				<td><?php echo $data['nama_lengkap']; ?></td>
			</tr>
			<tr>
				<td>Mata Pelajaran</td>
				<td><?php echo $data['nama_mapel']; ?></td>
			</tr>
			<tr>
				<td>Download Link</td>
				<td><a href="../../file/materi/download.php?nama=<?php echo $data['judul']; ?>"><?php echo $data['judul']; ?></a></td>
			</tr>
		</table>
	</div>
</section>
<?php include '../template/footer.php'; }?>