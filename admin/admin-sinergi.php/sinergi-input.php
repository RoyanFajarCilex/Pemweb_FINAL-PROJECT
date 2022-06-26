<?php include("../inc/inc_header.php") ?>

<?php
$program_1		= "";
$program_2		= "";
$program_3		= "";

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

	$deskripsi = $data['deskripsi'];
	$struktur_img = $data['struktur_img'];

	if ($deskripsi == '') {
		$eror		= "Data tidak ditemukan";
	}
} // END UPDATE LOGIC

// START CREATE LOGIC
if (isset($_POST['simpan'])) {
	$deskripsi	= ($_POST['deskripsi']);

	if ($deskripsi == '') {
		$eror		= "Silahkan masukan data yakni deskripsi";
	}

	// START UPLOAD GAMBAR STRUKTUR
	if ($_FILES['struktur_img']['name']) {
		$image_name	= $_FILES['struktur_img']['name'];
		$image_size	= $_FILES['struktur_img']['size'];
		$image_file	= $_FILES['struktur_img']['tmp_name'];	//menyimpan temporary data yang di upload

		// $detail_file	= pathinfo($image_name);
		// $image_format	= $detail_file['extension'];

		$format			= ['jpg', 'jpeg', 'png'];
		$ekstensi		= explode('.', $image_name);
		$ekstensi		= strtolower(end($ekstensi));

		if(!in_array($ekstensi, $format))
		{
			$eror	= "Format file yang diperbolehkan hanya JPG, JPEG, PNG, GIF";
		}

		if ($image_size > 1000000) {
			$eror	= "Ukuran file terlalu besar!";
		}
	}

	if (empty($eror)) {
		if("$image_name")
		{
			$direktori	= "../../images";

			// DELETE DATA IMAGE
			@unlink($direktori."/$struktur_img");

			$image_name	= "struktur_".time()."_".$image_name;
			move_uploaded_file($image_file, $direktori."/".$image_name);

			$struktur_img = $image_name;
		} else{
			// MEMASUKKAN DARI DATA YANG SEBELUMNYA ADA
			$image_name	= $struktur_img;	
		}
		// END UPLOAD GAMBAR STRUKTUR

		if ($id != "") {
			$query	 	= "UPDATE sinergi SET deskripsi = '$deskripsi', struktur_img = '$image_name', tgl = now() WHERE id = '$id'";
		} else {
			$query	 	= "INSERT INTO sinergi (deskripsi, struktur_img) VALUES ('$deskripsi', '$image_name')";
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
		< < Kembali ke halaman Admin</a>
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
		<label for="struktur_img" class="col-sm-2 col-form-label">Gambar Struktur</label>
		<div class="col-sm-10">
			<?php
				if($struktur_img)
				{
					echo "<img src='../../images/$struktur_img' style='max-width: 100px; max-height: 100px;'>";
				}
			?>
			<input type="file" class="form-control" id="struktur_img" name="struktur_img">
		</div>
	</div>

	<div class="mb-3 row">
		<label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
		<div class="col-sm-10">
			<textarea type="text" class="form-control summernote" id="deskripsi" value="" name="deskripsi"><?php echo $deskripsi ?></textarea>
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