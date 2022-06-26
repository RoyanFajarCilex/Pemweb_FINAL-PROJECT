<?php  
  session_start();
  include_once ("inc_koneksi.php");


?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Masuk sebagai Admin - Desanet.com</title>
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
          <form method="post" class="login-form">
             <p class="masuk_desanet">ADMINISTRATOR</p>
             <input type="Username" name="formuser" placeholder="Username"><br>
             <input type="Password" name="formpass" placeholder="Password"><br>
             <button type="submit" name="formmasuk">Masuk</button><br><br>
             <p class="click">Masuk sebagai penduduk <a href="0-masuk.php">Klik disini</a></p>
          </form>
      </div>
    </div>
  <center>
  <?php  
    if (isset($_POST['formmasuk'])) {
      $username = $_POST['formuser'];
      $password = $_POST['formpass'];
      $qry = mysqli_query(connection(), "SELECT * FROM loginadmin WHERE username = '$username' AND password = md5('$password')");
      $cek = mysqli_num_rows($qry);
        if ($cek==1) {
          $_SESSION["loginadmin"]=true;
          $_SESSION["adminuser"]=$username;
          header("location: halaman_admin.php");
          exit;
        }
        else{
          header("location: ../wrong.php");
        }
    }

  ?>



</body>
</html>