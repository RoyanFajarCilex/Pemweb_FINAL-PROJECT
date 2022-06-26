<?php  
  session_start();
  include_once ("koneksi.php");

  if(isset ($_SESSION["login"])){
    header("location: 1-beranda.php");
    exit;
  }

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Masuk - Desanet.com</title>
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
             <p class="masuk_desanet">MASUK KE DESANET</p>
             <input type="Username" name="formuser" placeholder="Username"><br>
             <input type="Password" name="formpass" placeholder="Password"><br>
             <button type="submit" name="formmasuk">Masuk</button><br><br>
             <p class="click">Masuk sebagai Admin <a href="0-masukadmin.php">Klik disini</a></p></p>
             <p class="click">Daftarkan Akun <a href="0-daftar.php">Klik disini</a></p></p>
          </form>
      </div>
    </div>
  <center>
  <?php  
    if (isset($_POST['formmasuk'])) {
      $username = $_POST['formuser'];
      $password = $_POST['formpass'];
      $qry = mysqli_query(koneksi(), "SELECT * FROM loginform WHERE username = '$username' AND password = md5('$password')");
      $cek = mysqli_num_rows($qry);
        if ($cek==1) {
          $_SESSION["login"] = true;
          $_SESSION['userweb']=$username;
          header("location: 1-beranda.php");
          exit;
        }
        else{
          header("location: wrong.php");
        }
    }

  ?>



</body>
</html>