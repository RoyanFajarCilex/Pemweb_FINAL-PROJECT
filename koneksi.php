<?php
	function koneksi() {
		$konek = mysqli_connect("localhost","RoyanCilek","cilekroyan1234");
		if(! $konek){
			die('Koneksinya gagal karena:'.mysqli_error());
		}
		mysqli_select_db($konek, "desanet");
		return $konek;
	} 
?>