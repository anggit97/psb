<?php  


session_start();
include '../../koneksi/koneksi.php';


if (isset($_GET['id'])) {
	//ID Cicilan pendaftaran
	$id 		=	$_GET['id'];
	//ID detail pendaftaran
	$idd 		=	$_GET['idd'];

	$date 		=	date('Y-m-d');

	$queryUpdateStatusSPP	=	"UPDATE pembayaran_spp SET status_spp=1 WHERE Id=$id";
	$execUpdateStatusSPP 	=	mysqli_query($conn, $queryUpdateStatusSPP);

	if ($execUpdateStatusSPP) {
		$_SESSION['message']	= "1";
		echo '<script>window.location="../index.php?page=25"</script>';
	}else{
		echo mysqli_error($conn);
	}
	
}else{
	echo 'tidak ada';
}


?>