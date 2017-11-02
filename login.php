<?php  

session_start();

include 'koneksi/koneksi.php';

if (isset($_POST['submit'])) {
	
	foreach ($_POST as $key => $val) {
		${$key} = $val;
	}

	$query	=	"SELECT a.password,a.role_user as role,a.id as id_akun, b.id as id_daftar from akun a, pendaftaran b 
				WHERE email='$email' 
				AND b.id = a.id_user";

	$exec 	= mysqli_query($conn, $query);

	if ($exec) {

		if (mysqli_num_rows($exec) > 0) {
			while ($rows = mysqli_fetch_array($exec)) {
			    
			    if (password_verify($password,$rows['password'])) {
			    	$_SESSION['role_user'] 	= $rows['role'];
			    	$_SESSION['auth']		= $rows['id_daftar'];

			    	
			    	echo'<script> window.location="dashboard/index.php"; </script> ';

			    }else{
			    	echo 'Password Salah!';
			    }

			}
		}else{

			$query	=	"SELECT password,role_user,id from akun 
				WHERE email='$email'";

			$exec 	= mysqli_query($conn, $query);

			if ($exec) {
				if (mysqli_num_rows($exec) > 0) {
					while ($rows = mysqli_fetch_array($exec)) {
					    
					    if (password_verify($password,$rows['password'])) {
					    	$_SESSION['role_user'] 	= $rows['role_user'];
					    	$_SESSION['auth']		= $rows['id'];

					    	echo'<script> window.location="dashboard/index.php"; </script> ';

					    }else{
					    	echo 'Password Salah!';
					    }

					}
				}else{
					echo 'Tidak ada user terdaftar';
				}
			}else{
				
				$exec 	= mysqli_query($conn, $query);

				
			}
		}
	}else{

		echo mysqli_error($conn);

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
	        <div class="col-sm-6 col-md-4 col-md-offset-4">
	            <h1 class="text-center login-title">Penerimaan Siswa Baru</h1>
	            <div class="account-wall">
	                <img class="profile-img" src="https://lh5.googleusercontent.com/-b0-k99FZlyE/AAAAAAAAAAI/AAAAAAAAAAA/eu7opA4byxI/photo.jpg?sz=120"
	                    alt="">
	                <form class="form-signin" method="post" action="">
		                <input type="text" class="form-control" name="email" placeholder="Email" required autofocus>
		                <input type="password" class="form-control" name="password" placeholder="Password" required>
		                <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">
		                    Sign in</button>
		                <label class="checkbox pull-left">
		                    <input type="checkbox" value="remember-me">
		                    Remember me
		                </label>
		                <a href="#" class="pull-right need-help">Need help? </a><span class="clearfix"></span>
	                </form>
	            </div>
	            <a href="index.php" class="text-center new-account">Kembali </a>
	        </div>
	    </div>
	</div>
</body>
</html>