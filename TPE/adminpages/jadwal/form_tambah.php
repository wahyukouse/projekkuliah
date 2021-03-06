<?php 
session_start();
if (empty($_SESSION['username'])) {
  echo "<center>Untuk mengakses halaman, Anda harus login <br>";
  echo "<a href=../index.php><b>LOGIN</b></a></center>";
} else { 
  include "../../lib/config_web.php";
  include "../../lib/koneksi.php";
  include "../templates/header.php"; ?>

  <script type="text/javascript" src="../../assets/jquery-2.1.0.js"></script>
  <script type="text/javascript" src="ajax.js"></script>

  <!-- page content -->
  <div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>Manajemen <small>Data Jadwal</small></h3>
        </div>

      </div>
      <div class="clearfix"></div>
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>Form Tambah <small>data jadwal</small></h2>

              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              <br />
              <form method="post" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="aksi_tambah.php" enctype="multipart/form-data">
                <div class="form-group">
                  <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Tahun Ajaran<span class="required">*</span>
                  </label>
                  <div class="col-md-10 col-sm-10 col-xs-12">
                    <select class="form-control col-md-7 col-xs-12" name="tahun">
                        <?php 
                        $kat = $koneksi->query("SELECT * FROM thn_ajaran WHERE status='aktif'");
                        while($kt = mysqli_fetch_array($kat)){
                          ?>
                          <option value="<?php echo $kt['id_tahun'] ?>"><?php echo $kt['thn_ajaran']; }?></option>
                        </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-2 col-sm-2 col-xs-12">Kelas <span class="required">*</span>
                  </label>
                  <div class="col-md-10 col-sm-10 col-xs-12">
                    <select class="form-control col-md-7 col-xs-12" name="kelas">
                        <?php 
                        $kat = $koneksi->query("SELECT * FROM kelas ORDER BY nama_kelas ASC");
                        while($kt = mysqli_fetch_array($kat)){
                          ?>
                          <option value="<?php echo $kt['id_kelas'] ?>"><?php echo $kt['nama_kelas']; }?></option>
                        </select>
                    </div>
                  </div>
                  <div class="form-group">
                  <label class="control-label col-md-2 col-sm-2 col-xs-12">Mata Pelajaran <span class="required">*</span>
                  </label>
                  <div class="col-md-10 col-sm-10 col-xs-12">
                    <select class="form-control col-md-7 col-xs-12" name="mapel" id="mapel">
                    	<option value="0">-Pilih Mata Pelajaran-</option>
                        <?php 
                        $kat = $koneksi->query("SELECT * FROM mepel ORDER BY nama_mapel ASC");
                        while($kt = mysqli_fetch_array($kat)){
                          ?>
                          <option value="<?php echo $kt['id_mapel'] ?>"><?php echo $kt['nama_mapel']; }?></option>
                        </select>
                    </div>
                  </div>
                <div class="form-group">
                  <label class="control-label col-md-2 col-sm-2 col-xs-12">Guru Pengajar <span class="required">*</span>
                  </label>
                  <div class="col-md-10 col-sm-10 col-xs-12">
                    <select class="form-control col-md-7 col-xs-12" name="guru" id="guru">
                    	<option value="0">-Pilih Guru Pengajar-</option>
                    </select>
                    </div>
                  </div>
                <div class="form-group">
                  <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Hari <span class="required">*</span>
                  </label>
                  <div class="col-md-10 col-sm-10 col-xs-12">
                   	<select class="form-control col-md-7 col-xs-12" name="hari" id="hari">
                        	<option value="Senin">Senin</option>
                        	<option value="Selasa">Selasa</option>
                        	<option value="Rabu">Rabu</option>
                        	<option value="Kamis">Kamis</option>
                        	<option value="Jumat">Jum'at</option>
                        	<option value="Sabtu">Sabtu</option>
                        </select> 
                   </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Jam <span class="required">*</span>
                  </label>
                  <div class="col-md-10 col-sm-10 col-xs-12">
                    <select class="form-control col-md-7 col-xs-12" name="jam" id="jam">
                        	<option value="07.15-08.00">07.15-08.00</option>
                        	<option value="08.00-08.45">08.00-08.45</option>
                        	<option value="08.45-09.30">08.45-09.30</option>
                        	<option value="09.30-10.15">09.30-10.15</option>
                        	<option value="10.35-11.20">10.35-11.20</option>
                        	<option value="11.20-12.05">11.20-12.05</option>
                        	<option value="12.05-13.50">12.05-13.50</option>
                        </select> 
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Semester <span class="required">*</span>
                  </label>
                  <div class="col-md-10 col-sm-10 col-xs-12">
                   	<select class="form-control col-md-7 col-xs-12" name="semester" id="mapel">
                        	<option value="Ganjil">Ganjil</option>
                        	<option value="Genap">Genap</option>
                        </select>  
                   </div>
                </div>
                <div class="ln_solid"></div>
                <div class="form-group">
                  <div class="col-md-3 col-sm-3 col-xs-12 col-md-offset-2">
                    <a href="main.php" class="btn btn-primary"><i class="fa fa-mail-forward"></i> Kembali</a>
                    <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
                  </div>
                </div>

              </form>
            </div>
          </div>
        </div>
      </div>







    </div>
  </div>
  <?php include "../templates/footer.php"; } ?>