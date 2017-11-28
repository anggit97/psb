<h2>Konfirmasi Pembayaran SPP</h2>


<?php  

$queryx     =   "SELECT * FROM detail_pendaftaran WHERE id_user = $id";
$execx      =   mysqli_query($conn, $queryx);
if($execx){
    $daftar = mysqli_fetch_array($execx);

}else{
    echo 'gagal';
}   

$idetail    =   $daftar['Id'];
$kelas      =   $daftar['kelas'];
$id_user    =   $daftar['id_user'];

if (isset($_POST['upload'])) {
    $targetfolderBase   = "../assets/uploads/";

    $fileNameBukti   = date("h-m-s").basename( $_FILES['bukti']['name']);
    
    $targetfolder   = $targetfolderBase . $fileNameBukti;
    
    $tanggal_pembayaran =   date("Y-m-d");

    $ok=1;

    $file_type=$_FILES['bukti']['type'];



    if ($file_type=="image/jpeg" || $file_type=="image/png" || $file_type=="application/pdf") {
        if(move_uploaded_file($_FILES['bukti']['tmp_name'], $targetfolder)){

            
            $queryCicilanCount  =   "SELECT COUNT(cicilan_ke) as cicilanCount FROM pembayaran_spp WHERE user_id=$id";
            $execCicilanCount   =   mysqli_query($conn, $queryCicilanCount);

            if ($execCicilanCount) {
                $countCicilan   =   mysqli_fetch_array($execCicilanCount);
                $cicilanCount   =   $countCicilan['cicilanCount'];
            }else{
                echo mysqli_error($conn);
            }

                
        
            $cicilanCount++;

            $date   = date("Y-m-d");

            $queryInsertToSPP   =   "INSERT INTO pembayaran_spp VALUES(null, '$date', $cicilanCount, 0,$id)";
            $execInsertToSPP    =   mysqli_query($conn, $queryInsertToSPP);

            if ($execInsertToSPP) {
                echo "<div class='alert alert-success alert-dismissable'>
                  <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                  <strong>Berhasil!</strong> Upload bukti pembayaran pendaftaran.
                </div>";
            }else{
                echo mysqli_error($conn);
            }
              
        }else{
            echo "<div class='alert alert-danger alert-dismissable'>
              <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
              <strong>Gagal!</strong> Terjadi kesalahan upload.
            </div>";
        }
    }else{
         echo "<div class='alert alert-danger alert-dismissable'>
          <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
          <strong>Gagal!</strong> Format tidak sesuai. harus format PNG/JPEG/PDF.
        </div>";
    }
	
}
?>

<a href="index.php?page=14" class="btn btn-primary btn-md pull-right"><i class="fa fa-arrow-left"></i> Kembali</a>

<div class="row">
    <div class="col-sm-12 col-md-8 col-lg-10 col-lg-offset-1">
        <div class="card" style="margin-top: 50px">
            <div class="card-header" data-background-color="blue">
                <h4 class="title">Kofirmasi Pembayaran SPP</h4>
                <p class="category">Daftar konfirmasi pembayaran</p>
            </div>
            <div class="card-content">
            	
            	<form action="" method="post" enctype="multipart/form-data">
                    <div class="row">
                        

                        <div class="form-group floating-label" style="margin-left: 20px;">
                            <label class="col-sm-12">Bukti Pembayaran/Struk Transfer (PNG/JPEG/PDF) : </label>
                            <label class="btn btn-primary" for="my-file-selector">
                                <input id="my-file-selector" name="bukti" type="file" style="display:none" 
                                onchange="$('#upload-file-info').html(this.files[0].name)">
                                upload bukti pembayaran (PNG/JPEG/PDF)
                            </label>
                            <span class='label label-info' id="upload-file-info"></span>
                        </div>

                        
                    
                    </div>
                    
                    
                    
                    <button type="submit" name="upload" class="btn btn-primary blue pull-right"><i class="fa fa-upload"></i> Upload File</button>
                </form>
            
            
            </div>
        </div>
    </div>
</div>



