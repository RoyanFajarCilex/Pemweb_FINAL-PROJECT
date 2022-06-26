<?php include("../inc/inc_header.php") ?>

<?php 
	$deskripsi	="";
	$visi		="";
	$misi		="";
	$artikel_1	="";
	$artikel_2	="";
	$eror		="";
	$sukses		="";

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
		$visi 		= $data['visi'];
		$misi 		= $data['misi'];
		$artikel_1	=$data['artikel_1'];
		$artikel_2	=$data['artikel_2'];

		if ($deskripsi == '' or $misi == '' or $visi == '') {
			$eror		= "Data tidak ditemukan";
		}
		
	} // END UPDATE LOGIC

	// START CREATE LOGIC
	if (isset($_POST['simpan'])) {
		$deskripsi	= ($_POST['deskripsi']);
		$visi		= ($_POST['visi']);
		$misi		= ($_POST['misi']);
		$artikel_1	= ($_POST['artikel_1']);
		$artikel_2	= ($_POST['artikel_2']);

		if ($deskripsi == '' or $misi == '' or $visi == '') {
			$eror		= "Silahkan masukan semua data yakni data isi dan deskripsi";
		}

		if (empty($eror)) 
		{
			if($id != ""){
				$query	 	= "UPDATE halaman SET deskripsi = '$deskripsi', visi = '$visi', misi = '$misi', artikel_1 = '$artikel_1', artikel_2 = '$artikel_2', tgl_isi = now() WHERE id = '$id'";
			}else{
				$query	 	= "INSERT INTO halaman (deskripsi, visi, misi, artikel_1, artikel_2) VALUES ('$deskripsi', '$visi', '$misi', '$artikel_1', '$artikel_2')";
			}
			$result 	= mysqli_query(connection(),$query);

			if ($result) {
				$sukses = "Sukses memasukan data!!";
			} else {
				$eror	= "Gagal masukkan data!!";
			}
		}
	} // END CREATE LOGIC
 ?>
<h1>Halaman Admin Input Data</h1>
<div class="mb-3 row">
	<a href="halaman.php">< < Kembali ke halaman Admin</a>
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
	      <textarea type="text" class="form-control summernote" id="deskripsi" value="" name="deskripsi"><?php echo $deskripsi ?></textarea>
	    </div>
	  </div>

	  <div class="mb-3 row">
	    <label for="visi" class="col-sm-2 col-form-label">Visi</label>
	    <div class="col-sm-10">
	      <textarea type="text" class="form-control summernote" id="visi" value="" name="visi"><?php echo $visi ?></textarea>
	    </div>
	  </div>

	  <div class="mb-3 row">
	    <label for="misi" class="col-sm-2 col-form-label">Misi</label>
	    <div class="col-sm-10">
	      <textarea name="misi" class="form-control summernote" id="misi"><?php echo $misi ?></textarea>
	    </div>
	  </div>

	  <div class="mb-3 row">
	    <label for="misi" class="col-sm-2 col-form-label">Artikel Pertama</label>
	    <div class="col-sm-10">
	      <textarea name="artikel_1" class="form-control summernote" id="artikel_1"><?php echo $artikel_1 ?></textarea>
	    </div>
	  </div>

	  <div class="mb-3 row">
	    <label for="misi" class="col-sm-2 col-form-label">Artikel Kedua</label>
	    <div class="col-sm-10">
	      <textarea name="artikel_2" class="form-control summernote" id="artikel_2"><?php echo $artikel_2 ?></textarea>
	    </div>
	  </div>

	  <div class="mb-3 row">
	    <div class="col-sm-2"></div>
	    <div class="col-sm-10">
	      <input type="submit" name="simpan" value="Simpan Data" class="btn btn-primary">
	    </div>
	  </div>

</form>
<?php include("../inc/inc_footer.php") ?>