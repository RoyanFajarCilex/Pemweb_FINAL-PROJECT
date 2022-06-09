<?php  
  session_start();
  include_once ("koneksi.php");
  $status = '';

    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nama = $_POST['formnama'];
        $tanggal = $_POST['formtanggal'];
        $tempat = $_POST['formtempat'];
        $username = $_POST['formuser'];
        $password = $_POST['formpass'];
        $query = "INSERT INTO signupform (nama_user, tanggal_lahir, tempat_lahir) VALUES('$nama', '$tanggal', '$tempat')";
        $query2 = "INSERT INTO loginform (username, password) VALUES('$username', md5('$password'))";
        $result = mysqli_query(koneksi(), $query);
        $result2 = mysqli_query(koneksi(), $query2);
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
  <title>login</title>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="css-desanet/owl.carousel.min.css">
    <link rel="stylesheet" href="css-desanet/bootstrap.min.css">
    <link rel="stylesheet" href="css-desanet/style.css">
    <link rel="stylesheet" href="css-desanet/style1.css">
</head>
<body>
  <center>
    <div class="login-page">
      <div class="form">
          <form method="post">
             <p class="masuk_desanet">DAFTAR KE DESANET</p>
             <input type="text" name="formnama" placeholder="nama"><br>
             <input type="date" name="formtanggal"><br>
             <input type="text" name="formtempat" placeholder="tempat lahir"><br>
             <input type="Username" name="formuser" placeholder="username"><br>
             <input type="Password" name="formpass" placeholder="password"><br>
             <button type="submit" name="formmasuk">Log In</button><br><br>
             <p class="click">sudah mendaftar? klik<p class="click"><a href="login.php">disini</a></p></p>
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