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
            <div class="col-lg-12 col-md-12 col-sm-12">
              <div class="newsfeed_area wow fadeInRight">
                <ul class="nav nav-tabs feed_tabs" id="myTab2">
                  <li class="active"><a href="#cara" data-toggle="tab">Tata Cara</a></li>
                  <li><a href="#news" data-toggle="tab">Daftar</a></li>
                  <li><a href="#events" data-toggle="tab">Cetak Kartu</a></li>         
                </ul>
                <div class="tab-content">

                  <!-- Start news tab content -->
                  <div class="tab-pane fade in active" id="cara">
                    <ul class="news_tab">
                      <li>
                        <div class="col-md-12">
                          <center><h3>Tata Cara Pendaftaran SMA Muhammadiyah 2</h3>
                            <h4>Karang Tengah</h4></center>
                            <ul class="news_tab">
                              <li><li>
                                <div class="media">
                                  <div class="media-body">
                                  1) Daftar dan isi semua form</br></br>
                                2) Ingat nomor pendaftaran dan cetak kartu pendaftaran dari melalui menu di atas</br></br>
                              3) Bawa kartu pendaftaran sebagai kartu ujian saat ujian tertulis</br></br>
                            4) Kumpulkan kartu pendaftaran sesuai dengan lembar jawaban anda masing-masing untuk di stapler oleh petugas </br></br>
                          </div>
                        </div>
                      </li>
                    </ul>
                  </div>

                </div>
                <div class="tab-pane fade in" id="news">                
                  <ul class="news_tab">
                    <li>
                      <?php 
                      $tahun = $koneksi->query("SELECT * FROM thn_ajaran where status = 'aktif'");
                      while($thn = mysqli_fetch_array($tahun)){
                       ?>
                       <center><h3>Form Pendaftaran SMA Muhammadiyah 2</h3>
                        <h4>Karang Tengah <?php echo $thn['thn_ajaran']; ?></h4></center>
                        <div class="col-lg-2 col-md-2 col-sm-2"></div>
                        <div class="col-lg-8 col-md-8 col-sm-8">
                          <form  method="post" enctype="multipart/form-data" class="form">
                            <div class="form-group">
                              <label>No Pendaftaran</label>
                              <?php 
                              $today  = date("Ymd");
                              $query1 = $koneksi->query("SELECT max(no_pendaftaran) as maxID FROM pendaftar WHERE no_pendaftaran LIKE '$today%'");
                              $data = mysqli_fetch_array($query1);
                              $idMax = $data['maxID'];
                              $NoUrut = (int) substr($idMax, 8, 4);
                              $NoUrut++;
                              $NewID = $today .sprintf('%04s', $NoUrut);
                              ?>
                              <input type="text" class="form-control" name="no" value="<?php echo $NewID; ?>" readonly>
                            </div>
                            <div class="form-group">
                              <label>Tahun Ajaran</label>
                              <select class="form-control" name="tahun">
                                <?php 
                                echo "<option value=\"$thn[id_tahun]\">$thn[thn_ajaran]</option>\n";
                              }
                              ?>
                            </select>
                          </div>
                          <div class="form-group">
                            <label>NISN</label>
                            <input type="text" class="form-control" placeholder="NISN" name="nisn" onkeypress="return hanyaAngka(event)">
                          </div>
                          <div class="form-group">
                            <label>Nama Lengkap</label>
                            <input type="text" class="form-control" name="nama">
                          </div>
                          <div class="form-group">
                            <label>Alamat Lengkap</label>
                            <textarea class="form-control" rows="5" name="alamat"></textarea>
                          </div>
                          <div class="form-group">
                            <label>Tempat Lahir</label>
                            <input type="text" class="form-control" name="lahir">
                          </div>
                          <div class="form-group">
                            <label>Tanggal Lahir</label>
                            <input type="date" class="form-control" name="tgl">
                          </div>
                          <div class="form-group">
                            <label>Asal SMP</label>
                            <input type="text" class="form-control" name="smp">
                          </div>
                          <div class="form-group">
                           <input class="btn btn-success" name="daftar" type="submit" value="Daftar">
                           <button class="btn btn-warning">Batal</button>
                         </div>
                       </form>
                       <?php
                       if (isset($_POST['daftar'])) 
                       {
                        $no = $_POST['no'];
                        $query2 = $koneksi->query("INSERT INTO pendaftar(no_pendaftaran,id_tahun,nisn,nama_lengkap,alamat,tempat_lahir,tgl_lahir,asal_smp)
                          VALUES ('$no','$_POST[tahun]','$_POST[nisn]','$_POST[nama]','$_POST[alamat]','$_POST[lahir]','$_POST[tgl]','$_POST[smp]')");
                        if ($query2) {
                          echo "<script> alert('Data Produk Berhasil Dimasukkan'); window.location = 'pendaftaran.php';</script>";
                        }else{
                          echo "<script> alert('Data Produk Gagal Dimasukkan'); window.location = 'pendaftaran.php';</script>";
                        }
                      }
                      ?>
                    </div>
                  </li>
                </div>
                <!-- Start events tab content -->
                <div class="tab-pane fade " id="events">
                  <ul class="news_tab">
                    <li>
                      <div class="col-md-12">    
                        <?php 
                        $tahun = $koneksi->query("SELECT * FROM thn_ajaran where status = 'aktif'");
                        while($thn = mysqli_fetch_array($tahun)){
                         ?>
                         <center><h3>Form Cetak Kartu Pendaftaran SMA Muhammadiyah 2</h3>
                          <h4>Karang Tengah <?php echo $thn['thn_ajaran']; }?></h4></center>
                          <div class="col-lg-2 col-md-2 col-sm-2"></div>
                          <div class="col-lg-6 col-md-6 col-sm-6" style="margin-top: 30px;">
                            <form action="lihat.php" method="get">
                             <div class="col-lg-10 col-md-10 col-sm-10">
                               <input type="text" name="cetak" class="form-control"></input></div>
                               <div class="col-lg-2 col-md-2 col-sm-2">
                                 <input type="submit" name="submit" value="Cetak Kartu" class="btn btn-success"></input>
                               </div>
                             </form>
                           </div>
                         </div>
                       </div>
                     </div>
                   </div>
                   <div class="col-lg-2 col-md-2 col-sm-2"></div>
                 </div>
               </div>
             </div>
           </div>
         </section>
<?php include 'template/footer.php'; ?>