<h1>Ubah Data Guru</h1>

<?php  

$query 		=	"SELECT * FROM guru where Id = $id";

$exec  		= 	mysqli_query($conn, $query);

if ($exec) {
	$data 	= mysqli_fetch_array($exec);
}else{
	echo mysqli_error($conn);
}


if (isset($_POST['submit'])) {
	
	$_SESSION['message'] = "";

	$valid = true;

	foreach ($_POST as $key=>$val) {
		${$key} = $val;
	}

	if ($nip == "") {
		$valid = false;
	}

	if ($nama == "") {
		$valid = false;
	}

	if ($alamat == "") {
		$valid = false;
	}

	if ($telp == "") {
		$valid = false;
	}

	if ($valid == false) {
		echo '<script>alert("tidak boleh ada field yang kosong")</script>';
	}else{
		$query		=	"UPDATE guru 
						SET nama_guru = '$nama', alamat = '$alamat', telp = '$telp' 
						WHERE Id=$id";
		$exec 		=	mysqli_query($conn, $query);

		if ($exec) {
			$_SESSION['message'] = "Berhasil ubah data guru";
			echo '<script>window.location = "index.php?page=10"</script>';
		}else{
			echo mysqli_error($conn);
		}
	}
}
?>

<div class="row">
    <div class="col-sm-12 col-md-8 col-lg-10 col-lg-offset-1">
        <div class="card" style="margin-top: 50px">
            <div class="card-header" data-background-color="blue">
                <h4 class="title">Ubah data Guru</h4>
                <p class="category">Masukan data guru dengan benar</p>
            </div>
            <div class="card-content">
                <a href="index.php?page=10" class="btn btn-primary btn-md pull-right"><i class="fa fa-arrow-left"></i> Kembali</a>
                <h3 style="overflow: hidden;"><b>Data Guru</b></h3>
				
				<form action="" method="post">
					<div class="form-group">
						<label for="nip">NIP</label>
						<input type="text" class="form-control" readonly="readonly" name="nip" value="<?php echo $data['nip']?>">
					</div>

					<div class="form-group floating-label">
						<label for="nama">Nama Guru</label>
						<input type="text" class="form-control" name="nama" value="<?php echo $data['nama_guru'] ?>">
					</div>

					<div class="form-group floating-label">
						<label for="nama">Alamat</label>
						<textarea name="alamat" cols="20" rows="4" class="form-control"><?php echo $data['alamat']?></textarea>
					</div>

					<div class="form-group floating-label">
						<label for="telp">No Telp/Hp</label>
						<input type="text" class="form-control" name="telp" value="<?php echo $data['telp'] ?>">>
					</div>
					

					<button type="submit" name="submit" class="btn btn-primary pull-right"><i class="fa fa-save"></i> &nbsp;Simpan</button>
					<button type="reset" class="btn btn-warning pull-right"><i class="fa fa-eraser"></i> Bersihkan</button>
				</form>

            </div>
        </div>
    </div>
</div>
