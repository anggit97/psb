<?php  


session_start();
include '../../koneksi/koneksi.php';


if (isset($_GET['id'])) {
	//ID Cicilan pendaftaran
	$id 		=	$_GET['id'];
	//ID detail pendaftaran
	$idd 		=	$_GET['idd'];

	$date 		=	substr(date('Y'), 2,4);

	//Query untuk mendapatkan nis terakhir siswa
	$query="select * from siswa order by nis desc limit 1";
    $baris=mysqli_query($conn,$query);
    if($baris){
      if(mysqli_num_rows($baris)>0){
        $auto=mysqli_fetch_array($baris);
        $kode=$auto['nis'];
        $baru=substr($kode,2,6);
          //$nilai=$baru+1;
          $nol=(int)$baru;
      } 
      else{
        $nol=0;
        }
      $nol=$nol+1;
      $nol2="";
      $nilai=4-strlen($nol);
      for ($i=1;$i<=$nilai;$i++){
        $nol2= $nol2."0";
        }

        $kode2 =$date.$nol2.$nol;
        
    }
    else{
    echo mysqli_error();
    }


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

	$queryGetName	=	"SELECT nama FROM pendaftaran a, detail_pendaftaran b WHERE b.id_user = a.Id AND b.Id = $idd";
	$exacGetName	=	mysqli_query($conn, $queryGetName);
	if ($exacGetName) {
		$user 		=	mysqli_fetch_array($exacGetName);
		$nama 		=	$user['nama'];
	}

	//simpan hasil query mendapatkan metode pembayaran dan kelas kedalam variable
	$metode_pembayaran 	=	$payment['metode_pembayaran_pendaftaran'];
	$kelas 				= 	$payment['kelas'];

	//Cek apakah metode pembayaran Lunas (L) Atau Cicilan (C)
	if ($metode_pembayaran == "L") {
		//Update status pendaftaran menjadi 4 (LUNAS)
		$queryDetailPendaftaran	=	"UPDATE detail_pendaftaran SET status_pendaftaran=4 WHERE Id=$idd";
		$execStatusPendaftaran	=	mysqli_query($conn, $queryDetailPendaftaran);

		//Query untuk insert data ke dalam table siswa setelah melakukan pembayaran pertama
		$queryNis	=	"INSERT INTO siswa VALUES('$kode2','$kelas' , $idd,'$nama')";
		$exacNis 	=	mysqli_query($conn, $queryNis);


		if (!$exacNis) {
			echo mysqli_error($conn);
		}
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

		$queryTotalRowCicilan	=	"SELECT * FROM cicilan_pendaftaran WHERE id_detail_pendaftaran=$idd";
		$execTotalRowCicilan	=	mysqli_query($conn,$queryTotalRowCicilan);

		if ($execTotalRowCicilan) {
			$totalRowCicilan 	=	mysqli_num_rows($execTotalRowCicilan);
		}else{
			echo mysqli_error($conn);
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

			echo $totalRowCicilan;

			if ($totalRowCicilan <= 1) {
				//Query untuk insert data ke dalam table siswa setelah melakukan pembayaran pertama
				$queryNis	=	"INSERT INTO siswa VALUES('$kode2','$kelas' , $idd,'$nama')";
				$exacNis 	=	mysqli_query($conn, $queryNis);
				if (!$exacNis) {
					echo mysqli_error($conn);
				}
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

			echo 'kelas B';

			if ($totalRowCicilan <= 1) {
				//Query untuk insert data ke dalam table siswa setelah melakukan pembayaran pertama
				$queryNis	=	"INSERT INTO siswa VALUES('$kode2','$kelas' , $idd,'$nama')";
				$exacNis 	=	mysqli_query($conn, $queryNis);
				if (!$exacNis) {
					echo mysqli_error($conn);
				}
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