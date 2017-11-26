<h2>Konfirmasi pembayaran</h2>

<?php  

$queryx     =   "SELECT * FROM detail_pendaftaran WHERE id_user = $id";
$execx      =   mysqli_query($conn, $queryx);
if($execx){
    $daftar = mysqli_fetch_array($execx);

}else{
    echo 'gagal';
}	

$idetail 	=	$daftar['Id'];

$queryCicilan	=	"SELECT SUM(nominal) as  nom FROM cicilan_pendaftaran WHERE id_detail_pendaftaran=$idetail";
$execCicilan	=	mysqli_query($conn, $queryCicilan);

if ($execCicilan) {
	$nominal	=	mysqli_fetch_array($execCicilan);
}else{
	echo mysqli_error($conn);
}


$nom	=	$nominal['nom'];


$queryCicilanLast   =   "SELECT status_cicilan FROM cicilan_pendaftaran WHERE id_detail_pendaftaran=$idetail ORDER BY  Id DESC LIMIT 1";
$execCicilanLast    =   mysqli_query($conn, $queryCicilanLast);

if ($execCicilanLast) {
    $row    =   mysqli_fetch_array($execCicilanLast);
    $lastStatus =   $row['status_cicilan'];
}


$kelas              =   $daftar['kelas'];
$metode_pembayaran  =   $daftar['metode_pembayaran_pendaftaran'];

?>


<div class="row">
    <div class="col-sm-12 col-md-8 col-lg-10 col-lg-offset-1">
        <div class="card" style="margin-top: 50px">
            <div class="card-header" data-background-color="blue">
                <h4 class="title">Kofirmasi Pembayaran s</h4>
                <p class="category">Daftar konfirmasi pembayaran</p>
            </div>
            <div class="card-content">
            	
            	<ul>
            		
            		<?php  
        			if ($daftar['status_pendaftaran'] == 1) {
        			?>
					<li><a href="index.php?page=15" class="btn btn-primary btn-lg">Konfirmasi pembayaran pendaftaran</a></li>
				
        			<?php
        			}elseif ($daftar['status_pendaftaran'] == 2) {
        				
                        if ($kelas == "A") {

                            if ($nom >= 880000) {
                                if ($lastStatus == 0) {
                                    echo '<li><a href="" class="btn btn-warning btn-lg">Konfirmasi pembayaran pendaftaran</a>(Sedang dikonfirmasi Admin)</li> ';
                                }else{
                                    echo '<li><a href="" class="btn btn-warning btn-lg">Konfirmasi pembayaran pendaftaran (Lunas)</a><i class="fa fa-check"></i></li> ';
                                }
                            }else{
                                if ($laststatus == 0) {
                                    echo '<li><a href="" class="btn btn-warning btn-lg">Konfirmasi pembayaran pendaftaran</a>(sedang di konfirmasi admin)</li>';    
                                }else{
                                    echo '<li><a href="index.php?page=15" class="btn btn-primary btn-lg">Konfirmasi pembayaran pendaftaran</a></li>';
                                }
                                
                            }
                            

                        }else{
                            if ($nom >= 890000) {
                                if ($lastStatus == 0) {
                                    echo '<li><a href="" class="btn btn-warning btn-lg">Konfirmasi pembayaran pendaftaran</a>(Sedang dikonfirmasi Admin)</li> ';
                                }else{
                                    echo '<li><a href="" class="btn btn-warning btn-lg">Konfirmasi pembayaran pendaftaran (Lunas)</a><i class="fa fa-check"></i></li> ';
                                }
                            }else{
                                echo '<li><a href="index.php?page=15" class="btn btn-primary btn-lg">Konfirmasi pembayaran pendaftaran</a></li>';
                            }
                        }

        				
        			?>

        			
        			<?php	
        			}else if($daftar['status_pendaftaran'] == 3){
        			     
                         if ($kelas == 'A') {
                             if ($nom >= 880000) {
                                if ($lastStatus == 0) {
                                    echo '<li><a href="" class="btn btn-warning btn-lg">Konfirmasi pembayaran pendaftaran</a> (Sedang dikonfirmasi Admin)</li> ';
                                }else{
                                    echo '<li><a href="" class="btn btn-warning btn-lg">Konfirmasi pembayaran pendaftaran (Lunas)</a><i class="fa fa-check"></i></li> ';
                                }
                            }else{
                                if ($nom >= 890000) {
                                    if ($lastStatus == 0) {
                                        echo '<li><a href="" class="btn btn-warning btn-lg">Konfirmasi pembayaran pendaftaran</a>(Sedang dikonfirmasi Admin)</li> ';
                                    }else{
                                        echo '<li><a href="" class="btn btn-warning btn-lg">Konfirmasi pembayaran pendaftaran (Lunas)</a><i class="fa fa-check"></i></li> ';
                                    }
                                }else{
                                    echo '<li><a href="index.php?page=15" class="btn btn-primary btn-lg">Konfirmasi pembayaran pendaftaran</a></li>';
                                }
                            }
                         }else{
                            if ($nom >= 890000) {
                                if ($lastStatus == 0) {
                                    echo '<li><a href="" class="btn btn-warning btn-lg">Konfirmasi pembayaran pendaftaran</a> (Sedang dikonfirmasi Admin)</li> ';
                                }else{
                                    echo '<li><a href="" class="btn btn-warning btn-lg">Konfirmasi pembayaran pendaftaran (Lunas)</a><i class="fa fa-check"></i></li> ';
                                }
                            }else{
                                echo '<li><a href="" class="btn btn-primary btn-lg">Konfirmasi pembayaran pendaftaran</a></li>';
                            }
                         }
                         
                        

                    ?>
                        
                        <li><a href="index.php?page=16" class="btn btn-primary btn-lg" title="Lakukan pembayaran pendaftaran terlebih dahulu">Konfirmasi pembayaran SPP</a></li>
        			
                    <?php
        			}else if($daftar['status_pendaftaran'] == 4){

                        if ($kelas == 'A') {
                            if ($nom >= 880000) {
                                echo '<li><a href="" class="btn btn-warning btn-lg">Konfirmasi pembayaran pendaftaran (Lunas)</a><i class="fa fa-check"></i></li> ';
                            }else{
                                echo '<li><a href="index.php?page=15" class="btn btn-primary btn-lg">Konfirmasi pembayaran pendaftaran</a></li>';
                            }
                        }else{
                            if ($nom >= 890000) {
                                echo '<li><a href="" class="btn btn-warning btn-lg">Konfirmasi pembayaran pendaftaran (Lunas)</a><i class="fa fa-check"></i></li> ';
                            }else{
                                echo '<li><a href="index.php?page=15" class="btn btn-primary btn-lg">Konfirmasi pembayaran pendaftaran</a></li>';
                            }
                        }

                        

                    ?>
                        
                        <li><a href="index.php?page=16" class="btn btn-primary btn-lg" title="Lakukan pembayaran pendaftaran terlebih dahulu">Konfirmasi pembayaran SPP</a></li>

                    <?php
                    }else{
                    ?>

                    <h3>Anda belum melengkapi pendaftaran atau belom dikonfirmasi oleh admin, klik  <a href="index.php?page=4">disini</a> untuk melengkapi atau melihat status daftar</h3>
                    
                    <?php
                    }
            		?>
            		
            	</ul>
            
            </div>
        </div>
    </div>
</div>



