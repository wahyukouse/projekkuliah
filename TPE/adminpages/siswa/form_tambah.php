<?php 
session_start();
if (empty($_SESSION['username'])) {
  echo "<center>Untuk mengakses halaman, Anda harus login <br>";
  echo "<a href=../index.php><b>LOGIN</b></a></center>";
} else { 
  include "../../lib/config_web.php";
  include "../../lib/koneksi.php";
  include "../templates/header.php"; ?>

  <!-- page content -->
  <div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>Manajemen <small>Data Guru</small></h3>
        </div>

      </div>
      <div class="clearfix"></div>
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>Form Tambah <small>data guru</small></h2>

              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              <form method="post" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
                <div class="form-group">
                  <label class="control-label col-md-4 col-sm-4" for="first-name">Masukan No Pendaftaran<span class="required">*</span>
                  </label>
                  <div class="col-md-8 col-sm-8 col-xs-12">
                    <div class="col-md-10 col-sm-10 col-xs-12">
                      <input type="text" name="nopendaftaran" required="required" class="form-control col-md-7 col-xs-12">
                    </div>
                    <div class="col-md-2 col-sm-2 col-xs-12">
                      <button name="submit" class="btn btn-success"><i class="fa  fa-square-o fa-lg"></i> Submit</button>
                    </div>
                  </div>
                </div>
              </form>
              <?php 
              if (isset($_POST['submit'])) {
                $query = $koneksi->query("SELECT * FROM pendaftar WHERE no_pendaftaran = '$_POST[nopendaftaran]'");
                while ($data = mysqli_fetch_array($query)){
                 ?>
                 <div class="ln_solid"></div>
                 <form method="post" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="aksi_tambah.php" enctype="multipart/form-data">
                  <div class="form-group">
                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">NISN<span class="required">*</span>
                    </label>
                    <div class="col-md-10 col-sm-10 col-xs-12">
                      <input type="text" name="nisn" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $data['nisn']; ?>">
                    </div>
                  </div>
                    <div class="form-group">
                      <label class="control-label col-md-2 col-sm-2 col-xs-12">Nama Lengkap <span class="required">*</span>
                      </label>
                      <div class="col-md-10 col-sm-10 col-xs-12">
                        <input type="text" name="nama" class="form-control col-md-7 col-xs-12" value="<?php echo $data['nama_lengkap']; ?>">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-2 col-sm-2 col-xs-12">Tempat Lahir <span class="required">*</span>
                      </label>
                      <div class="col-md-10 col-sm-10 col-xs-12">
                        <input type="text" name="tempat" class="form-control col-md-7 col-xs-12" value="<?php echo $data['tempat_lahir']; ?>">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Tanggal Lahir<span class="required">*</span>
                      </label>
                      <div class="col-md-10 col-sm-10 col-xs-12">
                        <input type="date" name="tgl_lahir" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $data['tgl_lahir']; ?>">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Gol Darah <span class="required">*</span>
                      </label>
                      <div class="col-md-10 col-sm-10 col-xs-12">
                        <input type="text" name="darah" required="required" class="form-control col-md-7 col-xs-12" value="-">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Nama Ayah <span class="required">*</span>
                      </label>
                      <div class="col-md-10 col-sm-10 col-xs-12">
                        <input type="text" name="ayah" required="required" class="form-control col-md-7 col-xs-12" value="-">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Nama Ibu <span class="required">*</span>
                      </label>
                      <div class="col-md-10 col-sm-10 col-xs-12">
                        <input type="text" name="ibu" required="required" class="form-control col-md-7 col-xs-12" value="-">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Pekerjaan Ayah <span class="required">*</span>
                      </label>
                      <div class="col-md-10 col-sm-10 col-xs-12">
                        <input type="text" name="pkayah" required="required" class="form-control col-md-7 col-xs-12" value="-">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Pekerjaan Ibu <span class="required">*</span>
                      </label>
                      <div class="col-md-10 col-sm-10 col-xs-12">
                        <input type="text" name="pkibu" required="required" class="form-control col-md-7 col-xs-12" value="-">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Alamat <span class="required">*</span>
                      </label>
                      <div class="col-md-10 col-sm-10 col-xs-12">
                        <textarea class="form-control" name="alamat"><?php echo $data['alamat']; ?></textarea>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Asal SMP <span class="required">*</span>
                      </label>
                      <div class="col-md-10 col-sm-10 col-xs-12">
                        <input type="text" name="smp" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $data['asal_smp']; ?>">
                      </div>
                    </div>
                    <div class="ln_solid"></div>
                    <div class="form-group">
                      <div class="col-md-3 col-sm-3 col-xs-12 col-md-offset-2">
                        <a href="main.php" class="btn btn-primary"><i class="fa fa-mail-forward"></i> Kembali</a>
                        <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
                      </div>
                    </div>
                    <?php } ?>
                  </form>
                  <?php }?>
                </div>
              </div>
            </div>
          </div>







        </div>
      </div>
      <?php include "../templates/footer.php"; } ?>