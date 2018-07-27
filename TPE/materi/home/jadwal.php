<?php 
include '../template/header.php';
include '../../lib/koneksi.php';
$nip 	= $_GET['nip'];
$query 	= $koneksi->query("SELECT m.*,g.*,j.*,k.*,t.* FROM jadwal j JOIN mepel m ON j.id_mapel = m.id_mapel JOIN guru g ON j.nip = g.nip JOIN thn_ajaran t ON j.id_tahun = t.id_tahun JOIN kelas k ON j.id_kelas = k.id_kelas WHERE g.nip = '$nip' AND t.status = 'aktif'   ORDER BY FIELD(hari, 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'), FIELD(jam, '07.15-08.00', '08.00-08.45', '08.45-09.30')");
?>
<section id="courseArchive">
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

	<div class="nav-side-menu">
		<div class="kepala">
			<h3>Menu</h3>
		</div>
		<ul>
			<li><a href="main.php?nip=<?php echo $data['nip']; ?>">Profil Guru</a></li>
			<li><a href="materi.php?nip=<?php echo $data['nip']; ?>">Materi Pelajaran</a></li>
			<li><a href="jadwal.php?nip=<?php echo $data['nip']; ?>">Jadwal Mengajar</a></li>
		</ul>
	</div>
</div>
</div>
<div class="konten">
	<table class="table table-bordered">
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
</section>
<?php include '../template/footer.php'; ?>