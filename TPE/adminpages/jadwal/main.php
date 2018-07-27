<?php
session_start();
if (empty($_SESSION['username'])) {
	echo "<center>Untuk mengakses halaman, Anda harus login <br>";
	echo "<a href=../index.php><b>LOGIN</b></a></center>";
} else { 
	include "../../lib/config_web.php";
	include "../../lib/koneksi.php";
	include "../../lib/pagination.php";
//
// untuk mengetahui halaman keberapa yang sedang dibuka
// juga untuk men-set nilai default ke halaman 1 jika tidak ada
// data $_GET['page'] yang dikirimkan
	$page = 1;
	if (isset($_GET['page']) && !empty($_GET['page']))
		$page = (int)$_GET['page'];

// untuk mengetahui berapa banyak data yang akan ditampilkan
// juga untuk men-set nilai default menjadi 5 jika tidak ada
// data $_GET['perPage'] yang dikirimkan
	$dataPerPage = 5;
	if (isset($_GET['perPage']) && !empty($_GET['perPage']))
		$dataPerPage = (int)$_GET['perPage'];
// tabel yang akan diambil datanya

	include "../templates/header.php";
	?>

	<!-- page content -->
	<div class="right_col" role="main">
		<div class="">
			<div class="page-title">
				<div class="title_left">
					<h3>Manajemen <small>Data Jadwal</small></h3>
				</div>

				<div class="title_right">
					<div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
						<div class="input-group">
							<input type="text" class="form-control" placeholder="Search for...">
							<span class="input-group-btn">
								<button class="btn btn-default" type="button">
									Go!
								</button> </span>
							</div>
						</div>
					</div>
				</div>

				<div class="clearfix"></div>

				<div class="row">

					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="x_panel">
							<div class="x_title">
								<h2><small>Data jadwal</small></h2>

								<div class="clearfix"></div>
							</div>
							<div class="x_content">

								<table class="table table-striped">
									<thead>
										<tr>
											<th width="5%">No</th>
											<th width="15%">Hari</th>
											<th width="15%">Mata Pelajaran</th>
											<th width="30%">Jam Belajar</th>
											<th width="15%">Guru Pengajar</th>
											<th width="8%">Kelas</th>
											<th width="12%">Aksi</th>

										</tr>
									</thead>
									<tbody>
										<?php
										$no = 1;
										$table = 'jadwal';
										$dataTable = array();
										$startRow = ($page - 1) * $dataPerPage;
										$query = $koneksi->query("SELECT j.*,m.*,g.*,k.* FROM jadwal j JOIN mepel m ON j.id_mapel = m.id_mapel JOIN guru g ON j.nip = g.nip JOIN kelas k ON j.id_kelas = k.id_kelas LIMIT $startRow , $dataPerPage");
										while($data= mysqli_fetch_array($query)){
											?>
											<tr>
												<th scope="row"><?php echo $no; ?></th>
												<td><?php echo $data['hari']; ?></td>
												<td><?php echo $data['nama_mapel'];?></td>
												<td><?php echo $data['jam']; ?></td>
												<td><?php echo $data['nama_lengkap'];?></td>
												<td><?php echo $data['nama_kelas']; ?></td>
												<td><a href="<?php echo $admin_url; ?>jadwal/form_edit.php?id_jadwal=<?php echo $data['id_jadwal'];?>">
													<button class="btn btn-warning">
														<i class="fa fa-edit"></i>
													</button></a>

													<a href="<?php echo $admin_url; ?>jadwal/hapus.php?id_jadwal=<?php echo $data['id_jadwal'];?>" onClick="return confirm('Anda yakin ingin menghapus data ini?')">

														<button class="btn btn-danger">
															<i class="fa fa-remove"></i>
														</button></a></td>

													</tr>

													<?php $no++;} ?>
												</tbody>
											</table>

										</div>
									</div>
								</div>
								<div class="col-xs-12">
									<a href="<?php echo $admin_url; ?>jadwal/form_tambah.php">
										<button class="btn btn-primary">
											<i class="fa fa-plus"></i> Tambah
										</button></a>
										<ul class="pagination pull-right">

											<?php showPagination($koneksi, $table, $dataPerPage); ?>
										</ul>

									</div>
									<div class="clearfix"></div>

								</div>
							</div>
						</div>
						<!-- /page content -->
						<?php
						include "../templates/footer.php";
					}
					?>