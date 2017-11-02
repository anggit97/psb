<?php  


session_start();
include '../../koneksi/koneksi.php';

if (isset($_GET['idd'])) {
	$id 		=	$_GET['idd'];
	$query		=	"UPDATE detail_pendaftaran SET status_pendaftaran=1 WHERE id_user=$id";
	$exec 		= 	mysqli_query($conn, $query);

	if ($exec) {
		$_SESSION['message']	= "1";
		echo '<script>window.location="../index.php?page=7"</script>';
	}else{
		echo mysqli_error($conn);
	}
}else{
	echo 'tidak ada';
}

?>