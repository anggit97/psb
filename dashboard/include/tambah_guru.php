<h1>Tambah Guru</h1>

<?php  

    $query="select * from guru order by nip desc limit 1";
    $baris=mysqli_query($conn,$query);
    if($baris){
      if(mysqli_num_rows($baris)>0){
        $auto=mysqli_fetch_array($baris);
        $kode=$auto['nip'];
        $baru=substr($kode,3,7);
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

        $kode2 ="117".$nol2.$nol;
        
    }
    else{
    echo mysqli_error();
    }
 

if (isset($_POST['submit'])) {
	
	$_SESSION['message'] = "";

	$valid = true;
	$err   = array();

	foreach ($_POST as $key=>$val) {
		${$key} = $val;
		$_SESSION[''.$key.''] = $val;
	}

	if ($nip == "") {
		array_push($err, "nip tidak boleh kosong");
		$valid = false;
	}

	if ($nama == "") {
		array_push($err, "nama tidak boleh kosong");
		$valid = false;
	}

	if ($alamat == "") {
		array_push($err, "alamat tidak boleh kosong");
		$valid = false;
	}

	if ($telp == "") {
		array_push($err, "telp tidak boleh kosong");
		$valid = false;
	}

	if ($valid == false) {
		echo '<script>alert("tidak boleh ada field yang kosong")</script>';
	}else{
		$query		=	"INSERT INTO guru VALUES(null, '$nip', '$nama', '$alamat', '$telp')";
		$exec 		=	mysqli_query($conn, $query);

		if ($exec) {
			$_SESSION['message'] = "Berhasil tambah guru";
			echo '<script>window.location = "index.php?page=10"</script>';
		}else{
			echo mysqli_error($conn);
		}
	}
}else{
	unset($_SESSION['nip']);
	unset($_SESSION['nama']);
	unset($_SESSION['alamat']);
	unset($_SESSION['telp']);
}
?>

<div class="row">
    <div class="col-sm-12 col-md-8 col-lg-10 col-lg-offset-1">
        <div class="card" style="margin-top: 50px">
            <div class="card-header" data-background-color="blue">
                <h4 class="title">Tambah Guru</h4>
                <p class="category">Masukan data guru dengan benar</p>
            </div>
            <div class="card-content">
                <a href="index.php?page=10" class="btn btn-primary btn-md pull-right"><i class="fa fa-arrow-left"></i> Kembali</a>
                <h3 style="overflow: hidden;"><b>Data Guru</b></h3>
				
				<form action="" method="post">
					<div class="form-group">
						<label for="nip">NIP</label>
						<input type="text" class="form-control" readonly="readonly" name="nip" value="<?php echo $kode2 ?>">
					</div>

					<div class="form-group floating-label">
						<label for="nama">Nama Guru</label>
						<input type="text" class="form-control" name="nama" value="<?php isset($_SESSION['nama'])  ?  print($_SESSION['nama']) : ""; ?>">
					</div>

					<div class="form-group floating-label">
						<label for="nama">Alamat</label>
						<textarea name="alamat" cols="20" rows="4" class="form-control"><?php isset($_SESSION['alamat'])  ?  print($_SESSION['alamat']) : ""; ?></textarea>
					</div>

					<div class="form-group floating-label">
						<label for="telp">No Telp/Hp</label>
						<input type="text" class="form-control" name="telp" value="<?php isset($_SESSION['telp'])  ?  print($_SESSION['telp']) : ""; ?>">>
					</div>
					

					<button type="submit" name="submit" class="btn btn-primary pull-right"><i class="fa fa-save"></i> &nbsp;Simpan</button>
					<button type="reset" class="btn btn-warning pull-right"><i class="fa fa-eraser"></i> Bersihkan</button>
				</form>

            </div>
        </div>
    </div>
</div>
