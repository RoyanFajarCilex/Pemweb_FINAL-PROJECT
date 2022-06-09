<?php  
  session_start();
  include_once ("koneksi.php");
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
             <p class="masuk_desanet">MASUK KE DESANET</p>
             <input type="Username" name="formuser" placeholder="username"><br>
             <input type="Password" name="formpass" placeholder="password"><br>
             <button type="submit" name="formmasuk">Log In</button><br><br>
             <p class="click">login untuk admin klik <p class="click"><a href="admin/admin-beranda/loginadmin.php">disini</a></p></p>
             <p class="click">belum mendaftar? klik<p class="click"><a href="signup.php">disini</a></p></p>
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
          $_SESSION['userweb']=$username;
          header("location: index.php");
          exit;
        }
        else{
          header("location: wrong.php");
        }
    }

  ?>



</body>
</html>