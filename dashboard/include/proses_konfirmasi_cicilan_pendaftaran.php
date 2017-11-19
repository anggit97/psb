<?php  


session_start();
include '../../koneksi/koneksi.php';


if (isset($_GET['id'])) {
	//ID Cicilan pendaftaran
	$id 		=	$_GET['id'];
	//ID detail pendaftaran
	$idd 		=	$_GET['idd'];


	//QUery ubah status cicilan menjadi 1(sudah dikonfirmasi oleh admin)
	$query		=	"UPDATE cicilan_pendaftaran 
					SET status_cicilan=1
					WHERE Id=$id";
	$exec 		= 	mysqli_query($conn, $query);


	//Query mendapatkan metode pembayaran dan kelas yang didapat oleh siswa
	$queryMetodePembayaran		=	"SELECT metode_pembayaran_pendaftaran, kelas FROM detail_pendaftaran WHERE Id=$idd";
	$execGetMetodePembayaran 	=	mysqli_query($conn, $queryMetodePembayaran);

	//Cek apakah eksekusi program berhasil
	if ($execGetMetodePembayaran) {
		//menampung hasil query kedalam array $payment
		$payment	=	mysqli_fetch_array($execGetMetodePembayaran);
	}

	//simpan hasil query mendapatkan metode pembayaran dan kelas kedalam variable
	$metode_pembayaran 	=	$payment['metode_pembayaran_pendaftaran'];
	$kelas 				= 	$payment['kelas'];

	//Cek apakah metode pembayaran Lunas (L) Atau Cicilan (C)
	if ($motode_pembayaran == "L") {
		//Update status pendaftaran menjadi 4 (LUNAS)
		$queryDetailPendaftaran	=	"UPDATE detail_pendaftaran SET status_pendaftaran=4 WHERE Id=$idd";
		$execStatusPendaftaran	=	mysqli_query($conn, $queryDetailPendaftaran);
	}else{

		//Query mendapatkan jumlah cicilan pembayaran pendaftaran oleh user
		$queryCountCicilan		=	"SELECT SUM(nominal) as nom FROM cicilan_pendaftaran WHERE id_detail_pendaftaran=$idd";
		$execCountCicilan		=	mysqli_query($conn, $queryCountCicilan);

		//Cek apakah query berhasil
		if ($execCountCicilan) {
			//tampung hasil kedalam array $row
			$row			=	mysqli_fetch_array($execCountCicilan);
			$countNominal	=	$row['nom'];	
		}


		//Cek apakah kelas A atau B
		if ($kelas == "A") {
			//Cek apakah jumlah cicilan sudah melebihi 880000 atau tidak, jika iya, maka ubah status jadi 4, jika tidak maka ubah 
			//status jadi 3
			if ($countNominal >= 880000) {
				$queryDetailPendaftaran	=	"UPDATE detail_pendaftaran SET status_pendaftaran=4 WHERE Id=$idd";
				$execStatusPendaftaran	=	mysqli_query($conn, $queryDetailPendaftaran);
			}else{
				$queryDetailPendaftaran	=	"UPDATE detail_pendaftaran SET status_pendaftaran=3 WHERE Id=$idd";
				$execStatusPendaftaran	=	mysqli_query($conn, $queryDetailPendaftaran);
			}
		}else{
			//Cek apakah jumlah cicilan sudah melebihi 895000 atau tidak, jika iya, maka ubah status jadi 4, jika tidak maka ubah 
			//status jadi 3
			if ($countNominal >= 895000) {
				$queryDetailPendaftaran	=	"UPDATE detail_pendaftaran SET status_pendaftaran=4 WHERE Id=$idd";
				$execStatusPendaftaran	=	mysqli_query($conn, $queryDetailPendaftaran);
			}else{
				$queryDetailPendaftaran	=	"UPDATE detail_pendaftaran SET status_pendaftaran=3 WHERE Id=$idd";
				$execStatusPendaftaran	=	mysqli_query($conn, $queryDetailPendaftaran);
			}
		}

		
	}

	

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