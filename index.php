<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">

    <link rel="stylesheet" href="css-desanet/fonts/style.css">

    <link rel="stylesheet" href="css-desanet/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css-desanet/bootstrap.min.css">
    
    <!-- Style -->
    <link rel="stylesheet" href="css-desanet/styleindex.css">

    <title>Website DESANET</title>
  </head>
  <body>

    <header class="site-navbar" role="banner">

      <div class="container">
        <div class="row align-items-center">
          
          <div class="col-11 col-xl-2">
            <h1 class="mb-0 site-logo"><a href="index.html" class="text-white mb-0">DESANET</a></h1>
          </div>
          <div class="col-12 col-md-10 d-none d-xl-block">
            <nav class="site-navigation position-relative text-right" role="navigation">

              <ul class="site-menu js-clone-nav mr-auto d-none d-lg-block">
                <li class="active"><a href="index.php"><span>Home</span></a></li>
                <li class="has-children">
                  <a href="event.html"><span>Program</span></a>
                  <ul class="dropdown arrow-top">
                    <li><a href="#">Mingguan</a></li>
                    <li><a href="#">Bulanan</a></li>
                    <li><a href="#">Tahunan</a></li>
                    <li class="has-children">
                      <a href="#">Dropdown</a>
                      <ul class="dropdown">
                        <li><a href="#">Menu One</a></li>
                        <li><a href="#">Menu Two</a></li>
                        <li><a href="#">Menu Three</a></li>
                        <li><a href="#">Menu Four</a></li>
                      </ul>
                    </li>
                  </ul>
                </li>
                <li><a href="Tentang.php"><span>Tentang</span></a></li>
                <li><a href="blog.html"><span>Blog</span></a></li>
                <li><a href="contact.html"><span>Kontak</span></a></li>
                <li><a href="login.php"><span>Log out</span></a></li>
                <li><a href="login.php"><span>Log In</span></a></li>
              </ul>
            </nav>
          </div>

          <div class="w3-content w3-section" style="max-width:500px" width="300px" length="90px">
            <img class="mySlides" src="images/desa1.jpg" style="width:100%">
            <img class="mySlides" src="images/desa2.jpg" style="width:100%">
            <img class="mySlides" src="images/desa3.jpg" style="width:100%">
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
            setTimeout(carousel, 2000); // Change image every 2 seconds
          }
          </script>
        </div>
      </div>
      
    </header>

    <div class="cover">
    <h1>Selamat Datang Di DESANET!</h1>
    <p>Desa yang mengikuti perkembangan teknologi agar tidak ketinggalan jaman :D</p>
    </div>

    <div class="hero" style="background-image: url('images/hero_3.jpg');"></div>

    <div class="jadwal">
    <img src="kalender.jpeg" alt="kalender">
    </div>

    <div class="visimisi">
        <h1>VISI & MISI DESA</h1>
        <div class="visi">
          <h3>VISI</h3>

            <p>Memajukan UMKM desa memperkenalkan keindahan alam yang masih terjaga dipelosok-pelosok indonesia serta membudidayakan adat istiadat desa.</p>
            <p>mengadakan aktivitas kebersamaan dengan seluruh warga guna menjaga silaturahmi</p>
            <p>lorem ipsum lorem ipsum</p>
            <p>lorem ipsum lorem ipsum</p>
        </div>
        
        <div class="misi">
          <h3>MISI</h3>

            <p>1. Memperkenalkan keindahan alam indonesia</p>
            <p>2. Menjaga kelestarian alam dan budaya</p>
            <p>3. Menunjukan sisi pelosok alam</p>
            <p>4. Menjaga kerukunan antara warga</p>
        </div>
    </div>


<div class="tombol">
  <div class="update">

    <button>Update Terkini</button>
    <a href="#">Link Button</a>
    <input type="submit" value="Submit Button">
    <input type="reset" value="Reset Button">

  </div>
</div>

<div class="artikel">
  <h3>ARTIKEL</h3>
  <div class="gubernur">
    <img src="kuda.jpeg" alt="kudaponi">
    <h1>Gubernur Menaiki Kuda Poni</h1>
    <p>Mencoba menaiki kuda poni merupakan suatu hal yang menyenangkan, pengalaman ini dilakukan oleh bapak Gubernur kita. Lorem ipsum lorem ipsum lorem ipsum lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum </p>
  </div>

  <div class="ktppalsu">
    <img src="ktp.jpeg" alt="ktppalsu">
    <h1>Hati-Hati Penipuan KTP!</h1>
    <p>Sedang maraknya penipuan KTP yang terjadi belakangan ini, oleh karena itu dihimpau kepada warga desa agar selalu hatihati dan selalu waspada dengan keadaan mencurigakan disekitar kita</p>
  </div>
</div>

  </body>
</html>
