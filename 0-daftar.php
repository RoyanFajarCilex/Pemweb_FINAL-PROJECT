<?php  
  session_start();
  require_once("admin/inc/inc_koneksi.php");
  $status = '';

    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nama = $_POST['formnama'];
        $tanggal = $_POST['formtanggal'];
        $tempat = $_POST['formtempat'];
        $username = $_POST['formuser'];
        $password = $_POST['formpass'];
        $query = "INSERT INTO signupform (nama_user, tanggal_lahir, tempat_lahir) VALUES('$nama', '$tanggal', '$tempat')";
        $query2 = "INSERT INTO loginform (username, password) VALUES('$username', md5('$password'))";
        $result = mysqli_query(connection_2(), $query);
        $result2 = mysqli_query(connection_2(), $query2);
        if($result&&$result2) {
            $status = 'ok';
        }
        else {
            $status = 'error';
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Daftar Akun - Desanet.com</title>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="css-desanet/owl.carousel.min.css">
    <link rel="stylesheet" href="css-desanet/bootstrap.min.css">
    <link rel="stylesheet" href="css-desanet/0-akun.css">
</head>
<body>
  <center>
    <div class="login-page">
      <div class="form">
          <form method="post">
             <img class="logo" src="images/LOGO.png">
             <p class="masuk_desanet">DAFTAR KE DESANET</p>
             <input type="text" name="formnama" placeholder="Nama"><br>
             <input type="date" name="formtanggal"><br>
             <input type="text" name="formtempat" placeholder="Tempat Lahir"><br>
             <input type="Username" name="formuser" placeholder="Username"><br>
             <input type="Password" name="formpass" placeholder="Password"><br>
             <button type="submit" name="formmasuk">Daftar</button><br><br>
             <p class="click">Sudah punya akun?<a href="0-masuk.php"> Klik disini</a></p></p>
          </form>
      </div>
    </div>
  <center>
  <?php
        if($status=='ok') {
            echo '<br><br><div class="popup">Data berhasil disimpan</div>';
        }
        elseif($status=='error') {
            echo '<br><br><div class="popup">Data gagal disimpan</div>';
        }
  ?>
</body>
</html>