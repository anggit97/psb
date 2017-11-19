<?php  


session_start();
include '../../koneksi/koneksi.php';


if (isset($_GET['id'])) {
	$id 		=	$_GET['id'];


	$query		=	"UPDATE cicilan_pendaftaran 
					SET status_cicilan=1
					WHERE Id=$id";
	$exec 		= 	mysqli_query($conn, $query);

	if ($exec) {
		$_SESSION['message']	= "1";
		echo '<script>window.location="../index.php?page=17"</script>';
	}else{
		echo mysqli_error($conn);
	}
}else{
	echo 'tidak ada';
}


?>