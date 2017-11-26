<h1>Tambah Jadwal</h1>

<?php  ;
if (isset($_POST['submit'])) {
	
	$_SESSION['message'] = "";

	$valid = true;
	$err   = array();

	foreach ($_POST as $key=>$val) {
		${$key} = $val;
		$_SESSION[''.$key.''] = $val;
	}

	if ($mapel == "") {
		array_push($err, "Mapel harus dipilih");
		$valid = false;
	}

	if ($hari == "") {
		array_push($err, "hari harus dipilih");
		$valid = false;
	}

	
	if ($valid == false) {
		echo '<script>alert("tidak boleh ada field yang kosong")</script>';
	}else{
		$query		=	"INSERT INTO jadwal VALUES(null,$hari, '$mapel','$kelas')";
		$exec 		=	mysqli_query($conn, $query);

		if ($exec) {
			$_SESSION['message'] = "Berhasil tambah Jadwal";
			echo '<script>window.location = "index.php?page=22"</script>';
		}else{
			echo mysqli_error($conn);
		}
	}
}else{
	unset($_SESSION['hari']);
	unset($_SESSION['mapel']);
}
?>

<div class="row">
    <div class="col-sm-12 col-md-8 col-lg-10 col-lg-offset-1">
        <div class="card" style="margin-top: 50px">
            <div class="card-header" data-background-color="blue">
                <h4 class="title">Tambah Jadwal Kelas <?php echo $kelas; ?></h4>
                <p class="category">Masukan data Jadwal dengan benar</p>
            </div>
            <div class="card-content">
                <a href="index.php?page=22" class="btn btn-primary btn-md pull-right"><i class="fa fa-arrow-left"></i> Kembali</a>
                <h3 style="overflow: hidden;"><b>Data Jadwal</b></h3>
				
				<form action="" method="post">
					
					<div class="form-group floating-label">
						<label for="mapel">Mata Pelajaran</label>
						<select name="mapel" id="mapel" class="form-control">
							<option value="" selected disabled>-- Pilih Mata Pelajaran --</option>
							<?php  
							$queryMapel	=	"SELECT * FROM mapel";
							$execMapel	=	mysqli_query($conn, $queryMapel);
							if ($execMapel) {
								while ($mapel = mysqli_fetch_array($execMapel)) {
							?>
								<option value="<?php echo $mapel['kode_mapel_kegiatan'] ?>"><?php echo $mapel['kode_mapel_kegiatan'] ?> - <?php echo $mapel['nama_mapel_kegiatan'] ?></option>
							<?php
								}
							}
							?>
						</select>
					</div>

					<div class="form-group floating-label">
						<label for="hari">Hari</label>
						<select name="hari" id="mapel" class="form-control">
							<option value="" selected disabled>-- Pilih Hari --</option>
							<?php  
							$queryMapel	=	"SELECT * FROM hari";
							$execMapel	=	mysqli_query($conn, $queryMapel);
							if ($execMapel) {
								while ($mapel = mysqli_fetch_array($execMapel)) {
							?>
								<option value="<?php echo $mapel['Id'] ?>"><?php echo $mapel['nama_hari'] ?></option>
							<?php
								}
							}
							?>
						</select>
					</div>
					
	
					<button type="submit" name="submit" class="btn btn-primary pull-right"><i class="fa fa-save"></i> &nbsp;Simpan</button>
					<button type="reset" class="btn btn-warning pull-right"><i class="fa fa-eraser"></i> Bersihkan</button>
				</form>

            </div>
        </div>
    </div>
</div>
