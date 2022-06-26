<?php  
  session_start();
  include_once ("koneksi.php");
  $status = '';

    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nama = $_POST['formnama'];
        $gender = $_POST['formgender'];
        $nik = $_POST['formnik'];
        $alamat = $_POST['formalamat'];
        $telp = $_POST['formtelp'];
        $email = $_POST['formemail'];
        $jenis = $_POST['formjenis'];
        $pesan = $_POST['formpesan'];
        $query = "INSERT INTO layanan_surat (nama, nik, alamat, no_telp, email, jenis, gender, pesan) VALUES('$nama', '$nik', '$alamat', '$telp', '$email', '$jenis', '$gender', '$pesan')";
        $result = mysqli_query(koneksi(), $query);
        if($result) {
            $status = 'ok';
        }
        else {
            $status = 'error';
        }
    }
?>

<html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="css-desanet/fonts/style.css">
    <link rel="stylesheet" href="css-desanet/owl.carousel.min.css">
    <link rel="stylesheet" href="css-desanet/bootstrap.min.css">
    <link rel="stylesheet" href="css-desanet/5-surat.css">
    <title>Layanan Surat - Desanet.com</title>
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
          <li><a href="1-beranda.php"><span>Beranda</span></a></li>
          <li><a href="2-kegiatan.php"><span>Kegiatan Desa</span></a></li>
          <li class="has-children">
            <a href="3-0-datadesa.php"><span>Data Desa</span></a>
            <ul class="dropdown arrow-top">
              <li><a href="3-1-struktur.php">Pemerintahan Desa</a></li>
              <li><a href="3-2-statistik.php">Statistik Penduduk</a></li>
              <li><a href="3-3-program.php">Sinergi Program</a></li>
            </ul>
          </li>
          <li><a href="4-berita.php"><span>Berita Terkini</span></a></li>
          <li  class="active"><a href="5-surat.php"><span>Layanan Surat</span></a></li>
          
        </ul>
      </nav>
    </div>
</header>

<form action="" method="post">
			<h1> Pelayanan Surat Online</h1>

			<p>*Semua wajib diisi</p>
			<table>
				<tr>
					<td>Nama</td>
					<td>:</td>
					<td><input type="text" name="formnama" size="40" placeholder=" Silahkan masukkan nama lengkap anda"></td>
				</tr>
				<tr>
					<td>Jenis Kelamin</td>
					<td>:</td>
					<td><input type="radio" name="formgender" value=" Laki-Laki"> Laki-Laki
						<input type="radio" name="formgender" value=" Perempuan"> Perempuan</td>
				</tr>
				<tr>
					<td>NIK</td>
					<td>:</td>
					<td><input type="text" name="formnik" size="40" placeholder=" Silahkan masukkan NIK anda"></td>
				</tr>
				<tr>
					<td>Alamat</td>
					<td>:</td>
					<td><input type="text" name="formalamat" size="40" placeholder=" Silahkan masukkan alamat anda"></td>
				</tr>
				<tr>
					<td>No. Telp</td>
					<td>:</td>
					<td><input type="text" name="formtelp" size="40" placeholder=" Silahkan masukkan no. telp anda"></td>
				</tr>
				<tr>
					<td>Email</td>
					<td>:</td>
					<td><input type="text" name="formemail" size="40" placeholder=" Silahkan masukkan email anda"></td>
				</tr>
				<tr>
					<td>Jenis Surat</td>
					<td>:</td>
					<td>
						<select name="formjenis">
						<option>Pilih Jenis Surat</option>
						<option value="Surat Keterangan Usaha">Surat Keterangan Usaha</option>
						<option value="Surat Keterangan Penghasilan">Surat Keterangan Penghasilan</option>
						<option value="Surat Keterangan Tidak Mampu">Surat Keterangan Tidak Mampu</option>
						<option value="Surat Keterangan Kematian">Surat Keterangan Kematian</option>
						<option value="Surat Keterangan Kelahiran">Surat Keterangan Kelahiran</option>
						<option value="Surat Keterangan Belum Kawin">Surat Keterangan Belum Kawin</option>
						<option value="Surat Pengantar Kepala Desa">Surat Pengantar Kepala Desa</option>
						<option value="Permohonan Izin Keramaian Pesta">Permohonan Izin Keramaian Pesta</option>
						<option value="Lainnya">Lainnya...</option>
					</td>
				</tr>
				<tr>
					<td>Pesan</td>
					<td>:</td>
					<td><textarea type="text" name="formpesan" cols="45" rows="5"placeholder="Silahkan isi keperluan atau keterangan lainnya disini"></textarea></td>
				</tr>
			</table>


				<button type="submit" name="kirimform"> Kirim </button>


  <?php
        if($status=='ok') {
            echo '<br><br><div class="status">Data berhasil disimpan</div>';
        }
        elseif($status=='error') {
            echo '<br><br><div class="status">Data gagal disimpan</div>';
        }
  ?>

	</form>

    <footer class="text-center text-lg-start bg-dark text-muted">

<section
  class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
</section>

<section class="">
  <div class="container text-left text-md-start mt-5">
    
    <div class="row mt-3">
      <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
        
        <h6 class="text-uppercase fw-bold mb-4">
          <i class="fas fa-gem me-3"></i>DESA SUMBER BRANTAS
        </h6>
        <p>
        Sumber Brantas, Kecamatan Bumiaji, Kota Batu, Provinsi Jawa Timur, Kode Pos 65336.
        </p>
      </div>

      <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">

        <h6 class="text-uppercase fw-bold mb-4">
          Menu Utama
        </h6>
        <p>
          <a href="1-beranda.php" class="text-reset">Beranda</a>
        </p>
        <p>
          <a href="2-kegiatan.php" class="text-reset">Kegiatan</a>
        </p>
        <p>
          <a href="3-0-datadesa.php" class="text-reset">Data Desa</a>
        </p>
        <p>
          <a href="4-berita.php" class="text-reset">Berita Terkini</a>
        </p>
        <p>
          <a href="5-surat.php" class="text-reset">Layanan Surat</a>
        </p>
      </div>
   

      <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">

        <h6 class="text-uppercase fw-bold mb-4">
          Info Terbaru
        </h6>
        <p>
          <a href="#!" class="text-reset">Pembagian RASKIN</a>
        </p>
        <p>
          <a href="#!" class="text-reset">Persiapan Idul Adha</a>
        </p>
        <p>
          <a href="#!" class="text-reset">Perbaruan Data Desa</a>
        </p>
        <p>
          <a href="#!" class="text-reset">Realisasi APB Desa Tahun 2022</a>
        </p>
        <p>
          <a href="#!" class="text-reset">Pelantikan Anggota BPD</a>
        </p>
      </div>

      <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">

        <h6 class="text-uppercase fw-bold mb-4">
          Hubungi Kami
        </h6>
        <p><i class="fas fa-home me-3"></i>Jl. Raya Sumber Brantas No.120-124</p>
        <p>
          <i class="fas fa-envelope me-3"></i>
          desanet@sumberbrantas.id
        <p><i class="fas fa-phone me-3"></i> WhatsApp +62 896 0337 8809</p>
      </div>

    </div>
  </div>
</section>


<div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
  © 2022 Copyright:
  <a class="text-reset fw-bold" href="1-beranda.php">Desanet.com</a>
</div>
</footer>   
</body>
</html>

