<?php  

session_start();
include '../../koneksi/koneksi.php';

if (isset($_GET['id'])) {
	
	$id 		= 	$_GET['id'];

	$query		= 	"DELETE FROM mapel WHERE kode_mapel_kegiatan = '$id'";

	$exec 		= 	mysqli_query($conn, $query);

	if ($exec) {
		$_SESSION['message'] 	= 	"Hapus data guru";
		echo '<script>window.location="../index.php?page=19"</script>';
	}
}
?>