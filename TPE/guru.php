<?php 
include "lib/koneksi.php";
include 'template/header.php';
?>
<section id="courseArchive">
	<div class="container">
		<div class="row">
			<!-- start course content -->
			<div class="col-lg-12 col-md-12 col-sm-12">
				<div class="courseArchive_content">
					<div class="row">
						<div class="col-md-2"></div>
						<div class="col-md-8">
							<h3>Daftar Guru SMA Muhammadiyah 2 Karang Tengah</h3>
							<table class="table table-bordered">
								<thead>
									<tr>
										<th>No</th>
										<th>Nama Lengkap</th>
									</tr>
								</thead>
								<tbody>
									<?php 
									$no = 1;
									$query = $koneksi->query("SELECT * FROM guru");
									while ($data  = mysqli_fetch_array($query)) {
										?>
										<tr>
											<td><?php echo $no; ?></td>
											<td><a href="materi/home/main.php?nip=<?php echo $data['nip']; ?>"><?php echo $data['nama_lengkap']; ?></a></td>
										</tr>
										<?php $no++;} ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<?php include 'template/footer.php'; ?>