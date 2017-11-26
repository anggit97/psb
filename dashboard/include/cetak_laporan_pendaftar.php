<script type="text/javascript">
<!--
window.print();
//-->
</script>

<?php  

include '../../koneksi/koneksi.php';

// require_once '../../assets/libs/dompdf/autoload.inc.php';
// use Dompdf\Dompdf;
// $dompdf = new Dompdf();

// $html = '';
// $dompdf->loadHtml($html);
// $dompdf->setPaper('A4', 'landscape');
// $dompdf->render();
// $dompdf->stream("codexworld",array("Attachment"=>0));

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Test</title>
	<?php include "libs_print.php"; ?>
	
	<style>
		body{
			background-color: #fff;
		}
	</style>
</head>
<body>
	<center><h1>Laporan Pendaftaran</h1></center>
	<table class="table table-responsive table-hover">
		<tr>
			<th><b>No</b></th>
			<th><b>Nama</b></th>
			<th><b>Email</b></th>
			<th><b>Usia</b></th>
			<th><b>Gender</b></th>
			<th><b>Kelas</b></th>
			<th><b>Tanggal Daftar</b></th>
		</tr>
		<tr>
			<?php  
			$query	=	"SELECT * FROM pendaftaran a, akun b, detail_pendaftaran c WHERE a.Id = c.id_user AND b.id_user = a.Id";
			$exec 	=	mysqli_query($conn, $query);

			if ($exec) {
				if (mysqli_num_rows($exec) > 0) {
					$i = 0;
					while ($rows = mysqli_fetch_array($exec)) {
			?>
		
			
					<td><?php echo ++$i; ?></td>
					<td><?php echo $rows['nama'] ?></td>
					<td><?php echo $rows['email'] ?></td>
					<td><?php echo $rows['usia'] ?></td>
					<td><?php echo $rows['jenis_kelamin'] ?></td>
					<td><?php echo $rows['kelas'] ?></td>
					<td><?php echo $rows['tanggal_daftar'] ?></td>
			
				
			<?php
					}
				}else{
			?>
				<h1>Kosong</h1>
			<?php
				}
			}
			?>
			
		</tr>
	</table>
</body>
</html>