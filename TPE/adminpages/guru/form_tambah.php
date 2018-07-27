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
              <br />
              <form method="post" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="aksi_tambah.php" enctype="multipart/form-data">
                <div class="form-group">
                  <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">NIP<span class="required">*</span>
                  </label>
                  <div class="col-md-10 col-sm-10 col-xs-12">
                    <input type="text" name="nip" required="required" class="form-control col-md-7 col-xs-12">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-2 col-sm-2 col-xs-12">Mata Pelajaran<span class="required">*</span>
                  </label>
                  <div class="col-md-10 col-sm-10 col-xs-12">
                    <select class="form-control col-md-7 col-xs-12" name="mapel">
                      <?php
                      $query = mysqli_query($koneksi, "SELECT * FROM mepel GROUP BY nama_mapel ASC");
                      while ($data = mysqli_fetch_array($query)){
                        ?>
                        <option value="<?php echo $data['id_mapel'];?>"><?php echo $data['nama_mapel'];?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                <div class="form-group">
                  <label class="control-label col-md-2 col-sm-2 col-xs-12">Nama Lengkap <span class="required">*</span>
                  </label>
                  <div class="col-md-10 col-sm-10 col-xs-12">
                    <input type="text" name="nama" class="form-control col-md-7 col-xs-12">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Alamat <span class="required">*</span>
                  </label>
                  <div class="col-md-10 col-sm-10 col-xs-12">
                    <textarea class="form-control" name="alamat"></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Tempat Lahir <span class="required">*</span>
                  </label>
                  <div class="col-md-10 col-sm-10 col-xs-12">
                    <input type="text" name="tempat" required="required" class="form-control col-md-7 col-xs-12">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Tanggal Lahir<span class="required">*</span>
                  </label>
                  <div class="col-md-10 col-sm-10 col-xs-12">
                    <input type="date" name="tgl_lahir" required="required" class="form-control col-md-7 col-xs-12">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Gol Darah <span class="required">*</span>
                  </label>
                  <div class="col-md-10 col-sm-10 col-xs-12">
                    <input type="text" name="darah" required="required" class="form-control col-md-7 col-xs-12">
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