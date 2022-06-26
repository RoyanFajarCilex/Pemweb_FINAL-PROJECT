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
<?php include("template/navbar.php") ?>

  <form>
    <h1> Pelayanan Surat Online</h1>

    <p>*Semua wajib diisi</p>
    <table>
      <tr>
        <td>Nama</td>
        <td>:</td>
        <td><input type="text" name="nama" size="40" placeholder=" Silahkan masukkan nama lengkap anda"></td>
      </tr>
      <tr>
        <td>Jenis Kelamin</td>
        <td>:</td>
        <td><input type="radio" name="gender" value=" Laki-Laki"> Laki-Laki
          <input type="radio" name="gender" value=" Perempuan"> Perempuan
        </td>
      </tr>
      <tr>
        <td>NIK</td>
        <td>:</td>
        <td><input type="text" name="nik" size="40" placeholder=" Silahkan masukkan NIK anda"></td>
      </tr>
      <tr>
        <td>Alamat</td>
        <td>:</td>
        <td><input type="text" name="alamat" size="40" placeholder=" Silahkan masukkan alamat anda"></td>
      </tr>
      <tr>
        <td>No. Telp</td>
        <td>:</td>
        <td><input type="text" name="telp" size="40" placeholder=" Silahkan masukkan no. telp anda"></td>
      </tr>
      <tr>
        <td>Email</td>
        <td>:</td>
        <td><input type="text" name="email" size="40" placeholder=" Silahkan masukkan email anda"></td>
      </tr>
      <tr>
        <td>Jenis Surat</td>
        <td>:</td>
        <td>
          <select name="jenis surat">
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
        <td><textarea name="pesan" cols="45" rows="5" placeholder="Silahkan isi keperluan atau keterangan lainnya disini"></textarea></td>
      </tr>
    </table>


    <button> Kirim </button>

  </form>

  <?php include("template/footer.php") ?>