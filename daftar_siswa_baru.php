<?php  
	//start the session
	session_start();

	$redirect = "";

	if (isset($_SESSION['is_data_student_exist'])) {
		$redirect = "<script> window.location='daftar_syarat.php'; </script>";
	}else{
		$redirect = "<script> window.location='daftar_data_orangtua.php'; </script>";
	}

	//check if button next is clicked
	if(isset($_POST['submit'])){

		//set all name attr and value to created variable
		foreach ($_POST as $key => $val) {
			${$key} = $val;
			$_SESSION[''.$key.''] = $val;
		}

		//check if session is not empty, then redirect to daftar_data_orangtua.php
		if (!empty($_SESSION)) {
			echo $redirect;
			print_r($_SESSION);
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="../assets/img/favicon.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Penerimaan Siswa Baru</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <!--  Material Dashboard CSS    -->
    <link href="assets/css/material-dashboard.css?v=1.2.0" rel="stylesheet" />
    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/demo.css" rel="stylesheet" />
    <!--     Fonts and icons     -->
    <link href="assets/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="assets/css/main.css">

</head>
<body>
	<div class="container">
	    <div class="row">
	        <div class="col-sm-12 col-md-8 col-lg-10 col-lg-offset-1">

				<div class="card" style="margin-top: 50px">
                    <div class="card-header" data-background-color="blue">
                        <h4 class="title">Data Calon Siswa</h4>
                        <p class="category">Isi Form pendaftaran dengan benar</p>
                    </div>
                    <div class="card-content">
                        <form method="post" action="">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Nama Lengkap</label>
                                        <input type="text" class="form-control" name="full_name" required autofocus
                                        value="<?php isset($_SESSION['full_name'])  ?  print($_SESSION['full_name']) : ""; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Nama Panggilan</label>
                                        <input type="text" class="form-control" name="nick_name" required
                                        value="<?php isset($_SESSION['nick_name'])  ?  print($_SESSION['nick_name']) : ""; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Tempat lahir</label>
                                        <input type="text" class="form-control" name="birth_place" required
                                        value="<?php isset($_SESSION['birth_place'])  ?  print($_SESSION['birth_place']) : ""; ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Tanggal lahir</label>
                                        <input type="date" class="form-control" name="birth_date" value="<?php isset($_SESSION['birth_date'])  ?  print($_SESSION['birth_date']) : print("2009-01-01"); ?>" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                            	<div class="col-md-12">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Jenis Kelamin</label>
                                        <select name="gender" class="form-control">
                                        	<option value="" disabled selected>-- Pilih Jenis Kelamin --</option>
										
                                        	<option value="L" <?php isset($_SESSION['gender']) && $_SESSION['gender'] == "L" ? print("selected") : "" ?>>Laki-laki</option>
                                        	<option value="P" <?php isset($_SESSION['gender']) && $_SESSION['gender'] == "P" ? print("selected") : "" ?>>Perempuan</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                            	<div class="col-md-6">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Anak Ke-</label>
                                        <input type="number" class="form-control" name="child_number" 
										value="<?php isset($_SESSION['child_number'])  ?  print($_SESSION['child_number']) : ""; ?>" 
                                        required>
                                    </div>
                    
                                </div>

                              	<div class="col-md-6">
                              		<div class="form-group label-floating">
                                        <label class="control-label">Jumlah Saudara Kandung</label>
                                        <input type="number" class="form-control" name="child_total" 
										value="<?php isset($_SESSION['child_total'])  ?  print($_SESSION['child_total']) : ""; ?>"
                                        required>
                                    </div>
                              	</div>	
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Di Jakarta ikut</label>
                                        <input type="text" class="form-control" name="in_jakarta_follow" 
										value="<?php isset($_SESSION['in_jakarta_follow'])  ?  print($_SESSION['in_jakarta_follow']) : ""; ?>"
                                        required>
                                    </div>
                                </div>
                            </div>
                            
                            
                            <?php  
                            if (isset($_SESSION['is_data_student_exist'])) {
                            ?>
                            <button type="submit" name="submit" class="btn btn-primary pull-right">Kembali <i class="fa fa-arrow-right"></i></button>
                            <?php
                            }else{
                            ?>
								<button type="submit" name="submit" class="btn btn-primary pull-right">Lanjut <i class="fa fa-arrow-right"></i></button>
                            <?php
                            }
                            ?>

                            
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
	    </div>
	</div>
</body>
</html>