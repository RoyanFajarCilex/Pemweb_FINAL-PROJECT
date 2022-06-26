<?php  
  session_start();
  require_once("admin/inc/inc_koneksi.php");
  require_once("admin/inc/inc_function.php");
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta content="text/html; charset=iso-8859-2" http-equiv="Content-Type">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="css-desanet/fonts/style.css">
    <link rel="stylesheet" href="css-desanet/owl.carousel.min.css">
    <link rel="stylesheet" href="css-desanet/bootstrap.min.css">
    <link rel="stylesheet" href="css-desanet/1-beranda.css">
    <title>Website Resmi Desa Sumber Brantas - Desanet.com</title>
</head>

<body>
  <header class="site-navbar" role="banner">

      <div class="container">
        <div class="row align-items-center">
          
          <div class="col-11 col-xl-2">
            <a href="1-beranda.php"><img 
            class="site-logo" src="images/LOGO.png"></a>
          </div>
          <div class="acc">
                  <b><a style= "text-decoration: none" href="0-masuk.php"><span>Masuk</span></a></b>
                  <b><a style= "text-decoration: none" href="0-daftar.php"><span>Daftar</span></a></b>
                </div>

          <div class="col-12 col-md-10 d-none d-xl-block">
            <nav class="site-navigation position-relative text-right" role="navigation">

              <ul class="site-menu js-clone-nav mr-auto d-none d-lg-block">
                <li class="active"><a href="1-beranda.php"><span>Beranda</span></a></li>
                <li><a href="2-kegiatan.php"><span>Kegiatan Desa</span></a></li>
                <li class="has-children">
                  <a><span>Data Desa</span></a>
                  <ul class="dropdown arrow-top">
                    <li><a href="3-1-struktur.php">Pemerintahan Desa</a></li>
                    <li><a href="3-2-statistik.php">Statistik Penduduk</a></li>
                    <li><a href="3-3-program.php">Sinergi Program</a></li>
                  </ul>
                </li>
                <li><a href="4-berita.php"><span>Berita Terkini</span></a></li>
                <li><a href="5-surat.php"><span>Layanan Surat</span></a></li>
                
              </ul>
            </nav>
          </div>
  </header>