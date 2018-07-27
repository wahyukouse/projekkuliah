<?php 
include '../template/header.php';
include '../../lib/koneksi.php';
$nip 	= $_GET['nip'];
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
		<thead>
			<tr>
				<th>Mata Pelajaran</th>
				<th>Materi</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<?php 
				$ambil = $koneksi->query("SELECT g.*, m.* FROM guru g JOIN mepel m ON g.id_mapel = m.id_mapel WHERE g.nip = '$nip'");
				while ($pecah = mysqli_fetch_array($ambil)) {
					?>
					<?php 
					$query = $koneksi->query("SELECT * FROM materi WHERE nip = '$pecah[nip]' AND id_mapel = '$pecah[id_mapel]'");
					?>
					<td width="30%"><?php echo $pecah['nama_mapel']; ?></td>
					<td width="70%">
						<?php while ($data = mysqli_fetch_array($query)) { ?>
						<a href="detail_materi.php?id=<?php echo $data['id_materi']; ?>" target="_blank"><?php echo $data['judul']; ?></a><br>
						<?php } ?>
					</td>
				</tr>
									<?php } ?>
			</tbody>
		</table>
	</div>
</section>
<?php include '../template/footer.php'; ?>