<?php include("../inc/inc_header.php") ?>

<?php
$deskripsi	= "";
$visi		= "";
$misi		= "";
$gambar		= "";
$gambar_name = "";

$eror		= "";
$sukses		= "";

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
	$gambar		= $data['gambar'];

	if ($deskripsi == '' or $misi == '' or $visi == '') {
		$eror		= "Data tidak ditemukan";
	}
} // END UPDATE LOGIC

// START CREATE LOGIC
if (isset($_POST['simpan'])) {
	$deskripsi	= ($_POST['deskripsi']);
	$visi		= ($_POST['visi']);
	$misi		= ($_POST['misi']);

	if ($deskripsi == '' or $misi == '' or $visi == '') {
		$eror		= "Silahkan masukan semua data yakni data isi dan deskripsi";
	}

	// START UPLOAD GAMBAR STRUKTUR
	if ($_FILES['gambar']['name']) {
		$gambar_name	= $_FILES['gambar']['name'];
		$gambar_size	= $_FILES['gambar']['size'];
		$gambar_file	= $_FILES['gambar']['tmp_name'];	//menyimpan temporary data yang di upload

		// $detail_file	= pathinfo($gambar_name);
		// $gambar_format	= $detail_file['extension'];

		$format			= ['jpg', 'jpeg', 'png'];
		$ekstensi		= explode('.', $gambar_name);
		$ekstensi		= strtolower(end($ekstensi));

		if (!in_array($ekstensi, $format)) {
			$eror	= "Format file yang diperbolehkan hanya JPG, JPEG, PNG, GIF";
		}

		if ($gambar_size > 1000000) {
			$eror	= "Ukuran file terlalu besar!";
		}
	}

	if (empty($eror)) {
		if("$gambar_name")
		{
			$direktori	= "../../images";

			// DELETE DATA IMAGE
			@unlink($direktori."/$gambar");

			$gambar_name	= "gambar_".time()."_".$gambar_name;
			move_uploaded_file($gambar_file, $direktori."/".$gambar_name);

			$gambar = $gambar_name;
		} else{
			// MEMASUKKAN DARI DATA YANG SEBELUMNYA ADA
			$gambar_name	= $gambar;	
		}
		// END UPLOAD GAMBAR STRUKTUR
		if ($id != "") {
			$query	 	= "UPDATE halaman SET deskripsi = '$deskripsi', visi = '$visi', misi = '$misi', gambar = '$gambar_name', tgl_isi = now() WHERE id = '$id'";
		} else {
			$query	 	= "INSERT INTO halaman (gambar, deskripsi, visi, misi) VALUES ('$gambar_name', '$deskripsi', '$visi', '$misi')";
		}
		$result 		= mysqli_query(connection(), $query);

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
	<a href="halaman.php">
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
		<label for="gambar" class="col-sm-2 col-form-label">Gambar Beranda</label>
		<div class="col-sm-10">
			<?php
			if ($gambar) {
				echo "<img src='../../images/$gambar' style='max-width: 100px; max-height: 100px;'>";
			}
			?>
			<input type="file" class="form-control" id="gambar" name="gambar" multiple>
		</div>
	</div>

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
		<div class="col-sm-2"></div>
		<div class="col-sm-10">
			<input type="submit" name="simpan" value="Simpan Data" class="btn btn-primary">
		</div>
	</div>

</form>
<?php include("../inc/inc_footer.php") ?>