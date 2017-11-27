<h2>Konfirmasi Pembayaran Pendaftaran</h2>

<?php  
if (isset($_SESSION['message'])) {
    echo "<div class='alert alert-success alert-dismissable'>
      <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
      <strong>Berhasil!</strong> Konfirmasi Pembayaran pendaftaran.
    </div>";
}
?>

<div class="row">
    <div class="col-sm-12 col-md-8 col-lg-10 col-lg-offset-1">
        <div class="card" style="margin-top: 50px">
            <div class="card-header" data-background-color="blue">
                <h4 class="title">Konfirmasi Pendaftaran</h4>
                <p class="category">Lakukan konfirmasi pendaftaran</p>
            </div>
            <div class="card-content">
                
                <h3 style="overflow: hidden;"><b>Data Konfirmasi Pembayaran</b></h3>
				<table class="table table-hover">
					<thead>
						<tr>
							<td><b>No</b></td>
							<td><b>Nama Pendaftar</b></td>
							<td><b>Email</b></td>
							<td><b>Cicilan Ke</b></td>
							<td><b>Status Pembayaran</b></td>
							<td><b>Aksi</b></td>
						</tr>
					</thead>
				    <tbody>
				    	<?php  
				    		$query 	= "SELECT a.Id,a.cicilan_ke, a.status_cicilan, c.email, d.nama,b.Id idd FROM cicilan_pendaftaran a , detail_pendaftaran b, akun c, pendaftaran d WHERE a.id_detail_pendaftaran = b.Id AND a.status_cicilan = 0 AND c.id_user = d.Id AND b.id_user = d.Id ";

				    		$exec 	=	mysqli_query($conn, $query);

				    		if ($exec) {
				    			$total	= mysqli_num_rows($exec);
				    			if ($total > 0) {
				    				while ($rows = mysqli_fetch_array($exec)) {
				    				    
				    				    $status = $rows['status_cicilan'];

				    			
				    	?>
		
								
									<tr>
										<td><?php echo ++$no; ?></td>
										<td><?php echo $rows['nama']; ?></td>
										<td><?php echo $rows['email']; ?></td>
										<td><b><?php echo $rows['cicilan_ke']; ?></b></td>
										<td><?php 
										$status == 0 ? 
										print("<font color='#e74c3c'>Belum dikonfirmasi</font>") : 
										print("<font color='##2ecc71'>Sudah dikonfirmasi</font>"); 
										?></td>
										<td>
											<!-- <a href="" class="btn btn-primary btn-sm">Konfirmasi</a> -->
											<a href="include/proses_konfirmasi_cicilan_pendaftaran.php?id=<?php echo $rows['Id'] ?>&&idd=<?php echo $rows['idd'] ?>" class="btn btn-warning btn-sm">Konfirmasi</a>
										</td>
									</tr>

				    	<?php
				    				}
				    			}else{
				    				echo "<td colspan='5' align='center'><h3><b>Belum ada yang melakukan konfirmasi Pembayaran</b></h3></td>";
				    			}
				    		}else{
				    			echo mysqli_error($conn);
				    		}
				    	?>
				        
				    </tbody>
				</table>

            </div>
        </div>
    </div>
</div>

<?php  

unset($_SESSION['message']);

?>