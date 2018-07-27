<?php
session_start();
if (empty($_SESSION['username'])) {
    echo "<center>Untuk mengakses halaman, Anda harus login <br>";
    echo "<a href=../index.php><b>LOGIN</b></a></center>";
} else { 
include "../../lib/config_web.php";
include "../../lib/koneksi.php";
include "../../lib/pagination.php";

$page = 1;
if (isset($_GET['page']) && !empty($_GET['page']))
	$page = (int)$_GET['page'];


$dataPerPage = 5;
if (isset($_GET['perPage']) && !empty($_GET['perPage']))
	$dataPerPage = (int)$_GET['perPage'];


$table = 'siswa';


$dataTable = getTableData($koneksi, $table, $page, $dataPerPage);

include "../templates/header.php";
?>

<!-- page content -->
<div class="right_col" role="main">
	<div class="">
		<div class="page-title">
			<div class="title_left">
				<h3>Manajemen <small>Data Siswa</small></h3>
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
						<h2><small>Data Siswa</small></h2>

						<div class="clearfix"></div>
					</div>
					<div class="x_content">

						<table class="table table-striped">
							<thead>
								<tr>
									<th width="5%">No</th>
									<th width="15%">NISN</th>
									<th width="15%">Nama</th>
									<th width="30%">Asal SMP</th>
									<th width="15%">Tempat Tanggal Lahir</th>
									<th width="10%">Gol Darah</th>
									<th width="5%">Aksi</th>

								</tr>
							</thead>
							<tbody>
								<?php
								foreach ($dataTable as $i => $data)
								{
								$no = ($i + 1) + (($page - 1) * $dataPerPage);
								?>
								<tr>
								<th scope="row"><?php echo $no; ?></th>
								<td><?php echo $data['nisn']; ?></td>
								<td><?php echo $data['nama_lengkap'];?></td>
								<td><?php echo $data['asal_smp']; ?></td>
								<td><?php echo $data['tempat_lahir'].", ".$data['tgl_lahir'] ?></td>
								<td><?php echo $data['gol_darah']; ?></td>
								<td><a href="<?php echo $admin_url; ?>siswa/hapus.php?nisn=<?php echo $data['nisn'];?>" onClick="return confirm('Anda yakin ingin menghapus data ini?')">
								
								<button class="btn btn-danger">
									<i class="fa fa-remove"></i>
								</button></a></td>

								</tr>

								<?php } ?>
							</tbody>
						</table>

					</div>
				</div>
			</div>
			<div class="col-xs-12">
				<a href="<?php echo $admin_url; ?>siswa/form_tambah.php">
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