<?php
session_start();
if (empty($_SESSION['nisn'])) {
	echo "<center>Untuk mengakses halaman, Anda harus login <br>";
	echo "<a href=../index.php><b>LOGIN</b></a></center>";
} else { 
	include '../../lib/koneksi.php';
	include '../template/header.php';
	$queri = $koneksi->query("SELECT * FROM pembayaran");
	?>
	<section id="courseArchive">
		<div class="container">
			<div class="row">
				<!-- start course content -->
				<div class="col-lg-12 col-md-12 col-sm-12">
					<div class="col-md-3"></div>
					<div class="col-md-6">

						<form method="post" action="aksi_tambah.php">
							<input type="hidden" name="nisn" value="<?php echo $_SESSION['nisn']; ?>">
							<div class="form-group">
								<label>No Pembayaran</label>
								<?php 
                              $today  = gmdate("YmdHis", time()+60*60*7);
                              $query1 = $koneksi->query("SELECT max(no_pembayaran) as maxID FROM detail_pembayaran WHERE no_pembayaran LIKE '$today%'");
                              $data = mysqli_fetch_array($query1);
                              $idMax = $data['maxID'];
                              $NoUrut = (int) substr($idMax, 8, 4);
                              $NoUrut++;
                              $NewID = $today .sprintf('%04s', $NoUrut);
                              ?>
                              <input type="text" name="no" class="form-control" value="<?php echo $NewID; ?>" readonly>
							</div>
							<div class="form-group">
								<label>Jenis Pembayaran</label>
								<select name="jenis" class="form-control" onchange="changeValue(this.value)" >
									<option value=0>-Pilih Jenis Pembayaran-</option>
									<?php 
									$result = mysqli_query($koneksi, "select * from pembayaran");    
									$jsArray = "var dtMhs = new Array();\n";        
									while ($row = mysqli_fetch_array($result)) {    
										echo '<option value="' . $row['id_pembayaran'] . '">' . $row['jenis'] . '</option>';    
										$jsArray .= "dtMhs['" . $row['id_pembayaran'] . "'] = {biaya:'" . addslashes($row['biaya']) . "'};";    
									}       
									?>
								</select>
							</div>
							<div class="form-group">
								<label>Jumlah Bayar</label>
								<input type="text" name="biaya" id="biaya"/>
							</div>
							<div class="form-group">
								<label>Waktu Pembayaran</label>
								<?php
								$tgl = gmdate("Y-m-d H:i:s", time()+60*60*7);?>
								<input type="text" name="tgl" class="form-control" value="<?php echo $tgl; ?>" readonly>
							</div>
							<div class="form-group">
								<button class="btn btn-success" type="submit">Simpan</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<script type="text/javascript">    
	<?php echo $jsArray; ?>  
	function changeValue(jenis){  
		document.getElementById('biaya').value = dtMhs[jenis].biaya;
	};  
</script> 
<?php
include '../template/footer.php';
} ?>