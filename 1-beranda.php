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

  <div class="allcontent">
        
    <div class="section-image" style=" width:700px ; float:left">
      <img class="mySlides" src="images/1.png" style="width:100%">
      <img class="mySlides" src="images/2.jpg" style="width:100%">
      <img class="mySlides" src="images/3.jpg" style="width:100%">
      <img class="mySlides" src="images/4.jpg" style="width:100%">
      <img class="mySlides" src="images/5.jpg" style="width:100%">
    </div>
          
          <script>
          var myIndex = 0;
          carousel();
          
          function carousel() {
            var i;
            var x = document.getElementsByClassName("mySlides");
            for (i = 0; i < x.length; i++) {
              x[i].style.display = "none";  
            }
            myIndex++;
            if (myIndex > x.length) {myIndex = 1}    
            x[myIndex-1].style.display = "block";  
            setTimeout(carousel, 2000); 
          }
          </script> 

    <div class="welcome" style="width:500px ; float :right ; padding-left:60px">
        <h1>SELAMAT DATANG DI <b>DESANET!</b></h1>
        <h2>Website Resmi Desa Sumber Brantas</h2>
        <h3>Kec. Bumiaji, Kota Batu, Jawa Timur</h3>
  
        <div class="isi">
        <?= ambil_deskripsi('12'); ?>
        </div>
    </div>

<div class="middle">
  
  <div class="visimisi" style="width: 800px ; float: left ; margin-left: 0%">
    <h1>VISI DAN MISI</h1>
    <br><b>VISI</b>
    <?= ambil_visi('12'); ?>
    <b><br>MISI</b>
    <?= ambil_misi('12'); ?>
  </div>

  

  <div class="border" style="width: 300px ; float:left ; margin-left:4%">
    <h1>Profil Sumber Brantas</h1>
    <div class="card" style="width: 18rem;">
      <ul class="list-group list-group-flush">
      <li class="list-group-item"> <a href="1-1-sejarah.php">Sejarah Desa Sumber Brantas</a></li>
      <li class="list-group-item"> <a href="1-2-geo.php">Kondisi Geografis Desa</a></li>
      <li class="list-group-item"> <a href="1-3-potensi.php">Potensi Desa</a></li>
      <li class="list-group-item"> <a href="1-4-snp.php">Sarana dan Prasarana</a></li>
      </ul>
    </div>
    <h1>Pos Terbaru</h1>
    <div class="card" style="width: 18rem;">
      <ul class="list-group list-group-flush">    
      <li class="list-group-item"> <a href="#">Mantan Kades 2000-2012 Wafat</a></li>
      <li class="list-group-item"> <a href="#">Vaksinasi Dosis Pertama di Pendopo Balai Desa</a></li>
      <li class="list-group-item"> <a href="#">Bantuan Sembako dari Kecamatan</a></li>
      <li class="list-group-item"> <a href="#">BLT DD Tahap 8 disalurkan hari ini</a></li>
      </ul>
    </div>
  </div>
</div>

</div>
<div style="margin-top:70%">
<?php include("template/footer.php")?>