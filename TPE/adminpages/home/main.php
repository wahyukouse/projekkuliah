<?php 
session_start();
include "../../lib/config_web.php";
include "../../lib/koneksi.php";
include "../templates/header.php"; ?>

        <!-- page content -->
        <div class="right_col" role="main">
          <!-- top tiles -->
          <div class="row tile_count">
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-graduation-cap"></i> Jumlah Siswa</span>
              <div class="count">2500</div>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Jumlah Guru</span>
              <div class="count">123.50</div>
            </div>
          </div>
        </div>
        <!-- /page content -->
<?php include "../templates/footer.php"; ?>