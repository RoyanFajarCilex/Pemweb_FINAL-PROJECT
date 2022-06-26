<?php
include("inc_header.php"); 
include_once ("koneksi.php");

?>


<table class="table table-striped">
			<thead>
				<tr>
					<th class="col-1">No.1</th>
					<th>Nama</th>
					<th>NIK</th>
					<th>Alamat</th>
                    <th>No.Telp</th>
					<th>Email</th>
                    <th>Jenis Surat</th>
                    <th>Gender</th>
					<th>Pesan</th>
				</tr>
			</thead>
			<tbody>

				<?php
					// QUERY DATA KE TABEL
					$query = "SELECT * FROM layanan_surat ORDER BY id_lasur ASC";
					$result = mysqli_query(koneksi(), $query);

					while ($data = mysqli_fetch_array($result)) {
					?>
						<tr>
							<td><?php echo $data['id_lasur'] ?></td>
							<td><?php echo $data['nama'] ?></td>
							<td><?php echo $data['nik'] ?></td>
                            <td><?php echo $data['alamat'] ?></td>
							<td><?php echo $data['no_telp'] ?></td>
                            <td><?php echo $data['email'] ?></td>
                            <td><?php echo $data['jenis'] ?></td>
							<td><?php echo $data['gender'] ?></td>
                            <td><?php echo $data['pesan'] ?></td>
						</tr>
					<?php 
					}	// END QUERY DATA KE TABEL

				 ?>
			</tbody>
		</table>

<?php include("inc_footer.php") ?>