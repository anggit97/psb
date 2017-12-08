<?php  


session_start();
include '../../koneksi/koneksi.php';


if (isset($_GET['idd'])) {
	//ID detail pendaftaran
	$idd 		=	$_GET['idd'];

	$date 		=	substr(date('Y'), 2,4);

	$queryUpdateStatus	=	"UPDATE detail_pendaftaran SET status_kegiatan=1 WHERE Id=$idd";
	$execUpdateStatus	=	mysqli_query($conn, $queryUpdateStatus);

	if ($execUpdateStatus) {
		$_SESSION['message']	= "1";
		echo '<script>window.location="../index.php?page=26"</script>';
	}else{
		echo mysqli_error($conn);
	}
	
}else{
	echo 'tidak ada';
}


?>