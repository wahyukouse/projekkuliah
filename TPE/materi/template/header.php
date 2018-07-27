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
        <title>Guru | Muhammadiyah 2 Karang Tengah</title>

    <!-- Mobile Specific Metas
        ================================================== -->
        <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favic
        on -->
        <link rel="shortcut icon" type="../../image/icon" href=""/>

    <!-- CSS
        ================================================== -->       
        <!-- Bootstrap css file-->
        <link href="../../css/bootstrap.min.css" rel="stylesheet">
        <!-- Font awesome css file-->
        <link href="../../css/font-awesome.min.css" rel="stylesheet">
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
    <link rel="stylesheet" href="../../css/superslides.css">
    <!-- smooth animate css file -->
    <link rel="stylesheet" href="../../css/animate.css">
    <!-- gallery slider css -->
    <link type="text/css" media="all" rel="stylesheet" href="../css/jquery.tosrus.all.css" />    
    <!-- Default Theme css file -->
    <link id="switcher" href="../../css/themes/green-theme.css" rel="stylesheet">
    <!-- Main structure css file -->
    <link href="../../style.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../css/style.css">

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
              <li><a href="../../index.php">Home</a></li>
              <li><a href="course-archive.html">Profil</a></li>
              <li><a href="../../guru.php">Guru</a></li>
              <li><a href="events-archive.html">Penghargaan</a></li>
              <li><a href="../../pendaftaran.php">Pendaftaran</a></li>            
              <li><a href="contact.html">Kontak</a></li>
              <li><button onclick="document.getElementById('id01').style.display='block'" class="btn btn-success">Login</button>
                <div id="id01" class="modal">
                  <div class="col-md-3"></div>
                  <div class="col-md-6">
                    <form class="modal-content animate" method="post" action="login.php">
                      <div class="imgcontainer">
                        <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
                        <img src="../../img/user.png" alt="Avatar" class="avatar">
                      </div>
                      <div class="col-md-12">
                        <div class="col-md-2"></div>
                        <div class="col-md-8">
                        <div class="form-group">
                          <label>NISN</label>
                          <input type="text" class="form-control" name="id">
                        </div>
                        <div class="form-group">
                          <label>Password</label>
                          <input type="password" class="form-control" name="password">
                        </div>
                        <div class="form-group">
                          <label>Status</label>
                          <select class="form-control" name="status">
                            <option value="siswa">Siswa</option>
                            <option value="guru">Guru</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-2"></div>
                      </div>
                      <button type="submit">Login</button>
                    </div>
                  </form>
                </div>
              </li>
            </ul>           
          </div><!--/.nav-collapse -->
        </div>     
      </nav>  
    </div>
    <!-- END MENU -->    
  </header>