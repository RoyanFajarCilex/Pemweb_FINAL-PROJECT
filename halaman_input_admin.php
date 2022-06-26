<?php include("inc_header.php") ?>

<?php 
	$deskripsi	="";
	$visi		="";
	$misi		="";
	$eror		="";
	$sukses		="";
	
	// START CREATE LOGIC
	if (isset($_POST['simpan'])) {
		$deskripsi	= htmlspecialchars($_POST['deskripsi']);
		$visi		= htmlspecialchars($_POST['visi']);
		$misi		= htmlspecialchars($_POST['misi']);

		if ($deskripsi == '' or $misi == '' or $visi == '') {
			$eror		= "Silahkan masukan semua data yakni data isi dan deskripsi";
		}

		if (empty($eror)) {
			$query	 	= "INSERT INTO halaman (deskripsi, visi, misi) VALUES ('$deskripsi', '$visi', '$misi')";
			$result 	= mysqli_query(connection(),$query);

			if ($result) {
				$sukses = "Sukses memasukan data!!";
			} else {
				$eror	= "Gagal masukkan data!!";
			}
		}
	} // END CREATE LOGIC

	// START UPDATE LOGIC
	if (isset($_GET['id'])) {
		$id = $_GET['id'];
	} else {
		$id = "";
	}

	if ($id != "") {
		$query 	= "SELECT * FROM halaman WHERE id = '$id'";
		$result = mysqli_query(connection(), $query);
		$data 	= mysqli_fetch_array($result);

		$deskripsi = $data['deskripsi'];
		$visi = $data['visi'];
		$misi = $data['misi'];
	} // END UPDATE LOGIC

 ?>
<h1>Halaman Admin Input Data</h1>
<div class="mb-3 row">
	<a href="halaman_admin.php">< < Kembali ke halaman Admin</a>
</div>

<?php 
	
	if ($eror) {
		?>
		<div class="alert alert-danger" role="alert">
		  <?php echo $eror ?>
		</div>
<?php
	}

?>
<?php 
	
	if ($sukses) {
		?>
		<div class="alert alert-primary" role="alert">
		  <?php echo $sukses ?>
		</div>
<?php
	}

?>

<form action="" method="POST">

	  <div class="mb-3 row">
	    <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
	    <div class="col-sm-10">
	      <input type="text" class="form-control" id="deskripsi" value="<?php echo $deskripsi ?>" name="deskripsi">
	    </div>
	  </div>

	  <div class="mb-3 row">
	    <label for="visi" class="col-sm-2 col-form-label">Visi</label>
	    <div class="col-sm-10">
	      <input type="text" class="form-control" id="visi" value="<?php echo $visi ?>" name="visi">
	    </div>
	  </div>

	  <div class="mb-3 row">
	    <label for="misi" class="col-sm-2 col-form-label">Misi</label>
	    <div class="col-sm-10">
	      <textarea name="misi" class="form-control" id="summernote"><?php echo $misi ?></textarea>
	    </div>
	  </div>

	  <div class="mb-3 row">
	    <div class="col-sm-2"></div>
	    <div class="col-sm-10">
	      <input type="submit" name="simpan" value="Simpan Data" class="btn btn-primary">
	    </div>
	  </div>

</form>
<?php include("inc_footer.php") ?>