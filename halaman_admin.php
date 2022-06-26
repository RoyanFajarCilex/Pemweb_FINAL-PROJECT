<?php 
include("inc_header.php"); 

?>

		<!-- LIVE SEARCH -->
		<?php 
			$katakunci = (isset($_GET['katakunci']))?$_GET['katakunci']:"";
		 ?>
		<!-- END LIVE SEARCH -->

		<!-- START DELETE LOGIC -->
		<?php 
			if (isset($_GET['op'])) {
				$op = $_GET['op'];
			} else{
				$op = '';
			}
			if($op == 'delete'){
				$id = $_GET['id'];
				$query = "DELETE FROM halaman WHERE id = '$id'";
				$result = mysqli_query(connection(), $query);
				
				if ($result) {
		            echo "
		            		<script>
		            			alert('data berhasil dihapus!');
		            			document.location.href = 'halaman_admin.php';
							</script>
						";
		        } else{
		            echo "
		        			<script>
		        				alert('data gagal dihapus!');
		        				document.location.href = 'halaman_admin.php';
							</script>
						";
		        }
			}
		 ?>
		 <!-- END DELETE LOGIC -->

		<h1>Halaman Admin</h1>
		<p>
			<a href="halaman_input_admin.php">
				<input type="button" class="btn-primary" value="Buat Halaman Baru"/>
			</a>
		</p>

		<form class="row g-3" method="get">
			<div class="col-auto">
				<input type="text" class="form-control" placeholder="Masukkan Kata Kunci" name="katakunci" value="<?php echo $katakunci ?>"/>
			</div>
			<div class="col-auto">
				<input type="submit" name="cari" value="Cari tulisan" class="btn btn-secondary"/>
			</div>
		</form>

		<table class="table table-striped">
			<thead>
				<tr>
					<th class="col-1">#</th>
					<th>Deskripsi</th>
					<th>Visi</th>
					<th>Misi</th>
					<th class="col-1">Aksi</th>
				</tr>
			</thead>
			<tbody>

				<?php

					// LIVE SEARCH
					$querytambahan = "";
					if ($katakunci != '') {		
						$array_katakunci = explode(" ", $katakunci);	//dapat memasukan 2 kata atau lebih
						for ($i=0; $i < count($array_katakunci) ; $i++) { 
							$querycari[] = "(judul LIKE '%".$array_katakunci[$i]."%' or kutipan LIKE '%".$array_katakunci[$i]."%' or isi LIKE '%".$array_katakunci[$i]."%')";
						}

						$querytambahan = "where".implode((" or "), $querycari);
					} // END LIVE SEARCH

					// QUERY DATA KE TABEL
					$query = "SELECT * FROM halaman $querytambahan ORDER BY id DESC";
					$result = mysqli_query(connection(), $query);
					$number = 1;

					while ($data = mysqli_fetch_array($result)) {
					?>
						<tr>
							<td><?php echo $number++ ?></td>
							<td><?php echo $data['deskripsi'] ?></td>
							<td><?php echo $data['visi'] ?></td>
							<td><?php echo preg_replace('/[^a-zA-Z0-9\s]/', ' ', strip_tags(html_entity_decode($data['misi']))); ?></td>
							<td>
								<a href="halaman_admin.php?op=delete&id=<?php echo $data['id']; ?>" onclick="return confirm('Apakah anda yakin ?')"> 
									<span class="badge bg-danger">Hapus</span>
								</a>
								<a href="halaman_input_admin.php?id=<?php echo $data['id']; ?>">
									<span class="badge bg-warning text-dark">Ubah</span>
								</a>
							</td>
						</tr>
					<?php 
					}	// END QUERY DATA KE TABEL

				 ?>
			</tbody>
		</table>
		<?php include("inc_footer.php") ?>