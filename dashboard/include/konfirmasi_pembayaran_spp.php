<h2>Konfirmasi Pembayaran SPP</h2>

<?php  

$queryx     =   "SELECT * FROM detail_pendaftaran WHERE id_user = $id";
$execx      =   mysqli_query($conn, $queryx);
if($execx){
    $daftar = mysqli_fetch_array($execx);

}else{
    echo 'gagal';
}	

?>


<div class="row">
    <div class="col-sm-12 col-md-8 col-lg-10 col-lg-offset-1">
        <div class="card" style="margin-top: 50px">
            <div class="card-header" data-background-color="blue">
                <h4 class="title">Kofirmasi Pembayaran</h4>
                <p class="category">Daftar konfirmasi pembayaran</p>
            </div>
            <div class="card-content">
            	
            	
            
            </div>
        </div>
    </div>
</div>



