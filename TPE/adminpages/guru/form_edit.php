<?php 
session_start();
if (empty($_SESSION['username'])) {
  echo "<center>Untuk mengakses halaman, Anda harus login <br>";
  echo "<a href=../index.php><b>LOGIN</b></a></center>";
} else { 
  include "../../lib/config_web.php";
  include "../../lib/koneksi.php";
  include "../templates/header.php";
  $nip = $_GET['nip'];
  $query = mysqli_query($koneksi, "SELECT m.*,g.* FROM guru g JOIN mepel m ON g.id_mapel = m.id_mapel WHERE g.nip='$nip'");
  $data = mysqli_fetch_array($query)
  ?>

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
              <form method="post" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="aksi_edit.php" enctype="multipart/form-data">
                <input type="hidden" class="form-control col-md-7 col-xs-12" name="nip"  value="<?php echo $data['nip']; ?>">
                <div class="box-body">
                  <div class="form-group">
                    <label for="inputEmail3" class="control-label col-md-2 col-sm-2 col-xs-12">Mata Pelajaran <span class="required">*</span></label>
                    <div class="col-md-10 col-sm-10 col-xs-12">
                      <select class="form-control col-md-7 col-xs-12" name="mapel">
                        <option value="<?php echo $data['id_mapel']; ?>"><?php echo $data['nama_mapel']; ?></option>
                        <?php 
                        $kat = $koneksi->query("SELECT * FROM mepel ORDER BY nama_mapel ASC");
                        while($kt = mysqli_fetch_array($kat)){
                          ?>
                          <option value="<?php echo $kt['id_mapel'] ?>"><?php echo $kt['nama_mapel']; }?></option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="box-body">
                    <div class="form-group">
                      <label for="inputEmail3" class="control-label col-md-2 col-sm-2 col-xs-12">Nama Lengkap <span class="required">*</span></label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control col-md-7 col-xs-12" name="nama" value="<?php echo $data['nama_lengkap']; ?>">
                      </div>
                    </div>
                  </div>
                  <div class="box-body">
                    <div class="form-group">
                      <label for="inputEmail3" class="control-label col-md-2 col-sm-2 col-xs-12">Alamat <span class="required">*</span></label>
                      <div class="col-sm-10">
                        <textarea class="form-control col-md-7 col-xs-12" name="alamat"><?php echo $data['alamat']; ?></textarea>
                      </div>
                    </div>
                  </div>
                  <div class="box-body">
                    <div class="form-group">
                      <label for="inputEmail3" class="control-label col-md-2 col-sm-2 col-xs-12">Tempat Lahir <span class="required">*</span></label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control col-md-7 col-xs-12" name="tempat" value="<?php echo $data['tempat_lahir']; ?>">
                      </div>
                    </div>
                  </div>
                  <div class="box-body">
                    <div class="form-group">
                      <label for="inputEmail3" class="control-label col-md-2 col-sm-2 col-xs-12">Tanggal lahir <span class="required">*</span></label>
                      <div class="col-sm-10">
                        <input type="date" class="form-control col-md-7 col-xs-12" name="tgl_lahir" value="<?php echo $data['tgl_lahir']; ?>">
                      </div>
                    </div>
                  </div>
                  <div class="box-body">
                    <div class="form-group">
                      <label for="inputEmail3" class="control-label col-md-2 col-sm-2 col-xs-12">Golongan Darah <span class="required">*</span></label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control col-md-7 col-xs-12" name="darah" value="<?php echo $data['gol_darah']; ?>">
                      </div>
                    </div>
                  </div>
                  <div class="ln_solid"></div>
                  <div class="form-group">
                    <div class="col-md-3 col-sm-3 col-xs-12 col-md-offset-2">
                      <a href="main.php" class="btn btn-primary"><i class="fa fa-mail-forward"></i> Kembali</a>
                      <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Ubah   </button>
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