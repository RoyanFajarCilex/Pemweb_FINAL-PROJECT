<?php include("../inc/inc_header.php") ?>

<?php
$judul			= "";
$kutipan		= "";
$program		= "";
$poster			= "";
$poster_name	= "";

$eror		= "";
$sukses		= "";

// START UPDATE LOGIC
if (isset($_GET['id'])) {
	$id = $_GET['id'];
} else {
	$id = "";
}

if ($id != "") {
	$query 	= "SELECT * FROM sinergi WHERE id = '$id'";
	$result = mysqli_query(connection(), $query);
	$data 	= mysqli_fetch_array($result);

	$program = $data['program'];
	$poster = $data['poster'];
	$judul = $data['judul'];
	$kutipan = $data['kutipan'];

	if ($program == '' or $judul == '' or $kutipan == '') {
		$eror		= "Data tidak ditemukan";
	}
} // END UPDATE LOGIC

// START CREATE LOGIC
if (isset($_POST['simpan'])) {
	$program		= ($_POST['program']);
	$judul 			= ($_POST['judul']);
	$kutipan 		= ($_POST['kutipan']);

	if ($program == '' or $judul == '' or $kutipan == '') {
		$eror		= "Silahkan masukan data yang belum diisi";
	}

	// START UPLOAD GAMBAR STRUKTUR
	if ($_FILES['poster']['name']) {
		$poster_name	= $_FILES['poster']['name'];
		$poster_size	= $_FILES['poster']['size'];
		$poster_file	= $_FILES['poster']['tmp_name'];	//menyimpan temporary data yang di upload

		// $detail_file	= pathinfo($image_name);
		// $image_format	= $detail_file['extension'];

		$format			= ['jpg', 'jpeg', 'png'];
		$ekstensi		= explode('.', $poster_name);
		$ekstensi		= strtolower(end($ekstensi));

		if(!in_array($ekstensi, $format))
		{
			$eror	= "Format file yang diperbolehkan hanya JPG, JPEG, PNG, GIF";
		}

		if ($poster_size > 1000000) {
			$eror	= "Ukuran file terlalu besar!";
		}
	}

	if (empty($eror)) {
		if("$poster_name")
		{
			$direktori	= "../../images";

			// DELETE DATA IMAGE
			@unlink($direktori."/$poster");

			$poster_name	= "struktur_".time()."_".$poster_name;
			move_uploaded_file($poster_file, $direktori."/".$poster_name);

			$poster = $poster_name;
		} else{
			// MEMASUKKAN DARI DATA YANG SEBELUMNYA ADA
			$poster_name	= $poster;	
		}
		// END UPLOAD GAMBAR STRUKTUR

		if ($id != "") {
			$query	 	= "UPDATE sinergi SET poster = '$poster_name', judul = '$judul', kutipan = '$kutipan', program = '$program', tgl = now() WHERE id = '$id'";
		} else {
			$query	 	= "INSERT INTO sinergi (poster, judul, kutipan, program) VALUES ('$poster_name', '$judul', '$kutipan', '$program')";
		}
		$result 	= mysqli_query(connection(), $query);

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
	<a href="sinergi.php">
		< < Kembal i ke halaman Admin</a>
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

<form action="" method="POST" enctype="multipart/form-data">

	<div class="mb-3 row">
		<label for="poster" class="col-sm-2 col-form-label">Poster</label>
		<div class="col-sm-10">
			<?php
				if($poster)
				{
					echo "<img src='../../images/$poster' style='max-width: 100px; max-height: 100px;'>";
				}
			?>
			<input type="file" class="form-control" id="poster" name="poster">
		</div>
	</div>

	<div class="mb-3 row">
		<label for="judul" class="col-sm-2 col-form-label">Judul Program</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="judul" value="<?php echo $judul ?>" name="judul">
		</div>
	</div>

	<div class="mb-3 row">
		<label for="kutipan" class="col-sm-2 col-form-label">Kutipan Judul Program</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="kutipan" value="<?php echo $kutipan ?>" name="kutipan">
		</div>
	</div>

	<div class="mb-3 row">
		<label for="program" class="col-sm-2 col-form-label">Program</label>
		<div class="col-sm-10">
			<textarea type="text" class="form-control summernote" id="program" value="" name="program"><?php echo $program ?></textarea>
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