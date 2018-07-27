<?php
session_start();
if (empty($_SESSION['nisn'])) {
	echo "<center>Untuk mengakses halaman, Anda harus login <br>";
	echo "<a href=../index.php><b>LOGIN</b></a></center>";
} else { 
	include '../lib/koneksi.php';
	$kueri = $koneksi->query("SELECT k.*,s.* FROM siswa s JOIN kelas k ON s.id_kelas = k.id_kelas WHERE nisn = '$_SESSION[nisn]' ");
	$kelas = mysqli_fetch_array($kueri);
	$query = $koneksi->query("SELECT m.*,g.*,j.* FROM jadwal j JOIN mepel m ON j.id_mapel = m.id_mapel JOIN guru g ON j.nip = g.nip WHERE id_kelas = '$kelas[id_kelas]' ORDER BY FIELD(hari, 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'), FIELD(jam, '07.15-08.00', '08.00-08.45', '08.45-09.30')");
	?>
	<!DOCTYPE>
	<html lang="en">
	<head>
    <!--=============================================== 
    Template Design By WpFreeware Team.
    Author URI : http://www.wpfreeware.com/
    ====================================================-->

    <!-- Basic Page Needs
    	================================================== -->
    	<meta charset="utf-8">
    	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<title>Siswa Muhammadiyah 2 Karang Tengah</title>

    <!-- Mobile Specific Metas
    	================================================== -->
    	<meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favic
    	on -->
    	<link rel="shortcut icon" type="../image/icon" href=""/>

    <!-- CSS
    	================================================== -->       
    	<!-- Bootstrap css file-->
    	<link href="../css/bootstrap.min.css" rel="stylesheet">
    	<!-- Font awesome css file-->
    	<link href="../css/font-awesome.min.css" rel="stylesheet">
    	<!-- Superslide css file-->
    	<!-- Slick slider css file -->
    	<!-- Circle counter cdn css file -->
    	<style type="text/css">
    	.circliful .outer {
    		fill: transparent;
    		stroke: #333;
    		stroke-width: 19.8;
    		stroke-dasharray: 534;
    		transition: stroke-dashoffset 1s;
    		-webkit-animation-play-state: running;
    		/* firefox bug fix - won't rotate at 90deg angles */
    		-moz-transform: rotate(-89deg) translateX(-190px);
    	}

    	/* full circle 25 empty 534 */
    	.circliful .inner {
    		fill: transparent;
    		stroke: orange;
    		stroke-width: 20;
    		stroke-dasharray: 534;
    		transition: stroke-dashoffset 1s;
    		-webkit-animation-play-state: running;
    		/* firefox bug fix - won't rotate at 90deg angles */
    		-moz-transform: rotate(-89deg) translateX(-190px);
    		stroke-dashoffset: 0;
    	}

    	.circliful {
    		overflow: visible !important;

    	}

    	.svg-container {
    		width: 100%;
    		margin: 0 auto;
    		overflow: visible;
    		position: relative;
    	}

    	svg .icon {
    		font-family: FontAwesome;
    	}

    	.legend-line {
    		white-space: nowrap;
    	}

    	.color-box {
    		width: 15px;
    		height: 15px;
    		border-radius: 2px;
    		display: inline-block;
    		float: left;
    		padding-top: 3px;
    		margin: 2px 5px 0 0;
    	}
    </style>
    <!-- Superslide css file-->
    <link rel="stylesheet" href="../css/superslides.css">
    <!-- smooth animate css file -->
    <link rel="stylesheet" href="../css/animate.css">
    <!-- gallery slider css -->
    <link type="text/css" media="all" rel="stylesheet" href="../css/jquery.tosrus.all.css" />    
    <!-- Default Theme css file -->
    <link id="switcher" href="../css/themes/green-theme.css" rel="stylesheet">
    <!-- Main structure css file -->
    <link href="../style.css" rel="stylesheet">

    <!-- Google fonts -->
    <link href='http://fonts.googleapis.com/css?family=Merriweather' rel='stylesheet' type='text/css'>   
    <link href='http://fonts.googleapis.com/css?family=Varela' rel='stylesheet' type='text/css'>    

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

</head>
<body>
	<header id="header">
		<!-- BEGIN MENU -->
		<div class="menu_area">
			<nav class="navbar navbar-default navbar-fixed-top" role="navigation">  <div class="container">
				<div class="navbar-header">
					<!-- FOR MOBILE VIEW COLLAPSED BUTTON -->
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<!-- LOGO -->
					<!-- TEXT BASED LOGO -->

					<!-- IMG BASED LOGO  -->
					<!-- <a class="navbar-brand" href="index.html"><img src="img/logo.png" alt="logo"></a>  -->            

				</div>
				<div id="navbar" class="navbar-collapse collapse">
					<ul id="top-menu" class="nav navbar-nav navbar-right main-nav">
						<li class="active"><a href="main.php">Home</a></li>
						<li><a href="">Jadwal</a></li>
						<li><a href="">Profil</a></li>
						<li><a href="nilai/main.php">Nilai</a></li>
						<li><a href="logout.php">Logout</a></li>
					</ul>           
				</div><!--/.nav-collapse -->
			</div>     
		</nav>  
	</div>
	<!-- END MENU -->    
</header>
<section id="courseArchive">
	<div class="container">
		<div class="row">
			<!-- start course content -->
			<div class="col-lg-12 col-md-12 col-sm-12">
				<table class="table table-striped">
					<thead>
						<tr>
							<th width="5%">NO</th>
							<th width="10%">HARI</th>
							<th width="25%">JAM</th>
							<th width="30%">MATA PELAJARAN</th>
							<th width="30%">GURU PENGAMPU</th>
						</tr>
					</thead>
					<tbody>
						<?php 
							$no =1;
							while (	$data = mysqli_fetch_array($query)) {
						 ?>
						 <tr>
						 <td><?php echo $no; ?></td>
						 <td><?php echo $data['hari']; ?></td>
						 <td><?php echo $data['jam']; ?></td>
						 <td><?php echo $data['nama_mapel']; ?></td>
						 <td><?php echo $data['nama_lengkap']; ?></td>
						</tr>
						 <?php $no++;} ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
</section>
<footer id="footer">
	<!-- Start footer top area -->
	<div class="footer_top">
		<div class="container">
			<div class="row">
				<div class="col-ld-6  col-md-6 col-sm-6">
					<div class="single_footer_widget">
						<p>Copyright © 2017<br>
							SMA Muhammadiya 2 Karang Tengah<br>
						All Right Reserved</p>
					</div>
				</div>
				<div class="col-ld-3  col-md-3 col-sm-3">
					<div class="single_footer_widget">
						<h3>Link</h3>
						<ul class="footer_widget_nav">
							<li><a href="#">Link 1</a></li>
							<li><a href="#">Link 2</a></li>
						</ul>
					</div>
				</div>
				<div class="col-ld-3  col-md-3 col-sm-3">
					<div class="single_footer_widget">
						<h3>Social Links</h3>
						<ul class="footer_social">
							<li><a data-toggle="tooltip" data-placement="top" title="Facebook" class="soc_tooltip" href="#"><i class="fa fa-facebook"></i></a></li>
							<li><a data-toggle="tooltip" data-placement="top" title="Twitter" class="soc_tooltip"  href="#"><i class="fa fa-twitter"></i></a></li>
							<li><a data-toggle="tooltip" data-placement="top" title="Google+" class="soc_tooltip"  href="#"><i class="fa fa-google-plus"></i></a></li>
							<li><a data-toggle="tooltip" data-placement="top" title="Linkedin" class="soc_tooltip"  href="#"><i class="fa fa-linkedin"></i></a></li>
							<li><a data-toggle="tooltip" data-placement="top" title="Youtube" class="soc_tooltip"  href="#"><i class="fa fa-youtube"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</footer>
<!-- initialize jQuery Library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<!-- For smooth animatin  -->
<script src="js/wow.min.js"></script>  
<!-- Bootstrap js -->
<script src="js/bootstrap.min.js"></script>
<!-- slick slider -->
<script src="js/slick.min.js"></script>
<script src="js/js.js"></script>
<!-- superslides slider -->
<script src="js/jquery.animate-enhanced.min.js"></script>
<script src="js/jquery.superslides.min.js" type="text/javascript" charset="utf-8"></script>   
<!-- for circle counter -->
<!-- Gallery slider -->

<!-- Custom js-->
<script src="js/custom.js"></script>

</body>
</html>
<?php } ?>