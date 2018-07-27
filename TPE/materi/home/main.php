<?php 
include '../template/header.php';
include '../../lib/koneksi.php';
$nip 	= $_GET['nip'];
$query 	= $koneksi->query("SELECT * FROM guru WHERE nip = '$nip'");
$data 	= mysqli_fetch_array($query);
?>
<section id="courseArchive">
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

	<div class="nav-side-menu">
		<div class="kepala">
			<h3>Menu</h3>
		</div>
		<ul>
			<li><a href="main.php?nip=<?php echo $nip; ?>">Profil Guru</a></li>
			<li><a href="materi.php?nip=<?php echo $nip; ?>">Materi Pelajaran</a></li>
			<li><a href="jadwal.php?nip=<?php echo $nip; ?>">Jadwal Mengajar</a></li>
		</ul>
	</div>
</div>
</div>
<div class="konten">
	<table class="table table-bordered">
		<tr>
			<td>Nama</td>
			<td><?php echo $data['nama_lengkap']; ?></td>
		</tr>
		<tr>
			<td>Alamat</td>
			<td><?php echo $data['alamat']; ?></td>
		</tr>
		<tr>
			<td>Tempat Tanggal Lahir</td>
			<td><?php echo $data['tempat_lahir']; ?>, <?php echo $data['tgl_lahir']; ?></td>
		</tr>
		<tr>
			<td>Golongan Darah</td>
			<td><?php echo $data['gol_darah']; ?></td>
		</tr>
	</table>
</div>
</section>
<?php include '../template/footer.php'; ?>