<?php

include("inc_koneksi.php");

$result = '';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['id'])) {
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
        } else {
            echo "
		        <script>
		            alert('data gagal dihapus!');
		            document.location.href = 'buka-puasa.php';
				</script>
				";
        }
    }
}
