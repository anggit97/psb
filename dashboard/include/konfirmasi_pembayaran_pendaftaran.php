<h2>Konfirmasi Pembayaran Pendaftaran</h2>

<?php  

$queryx     =   "SELECT * FROM detail_pendaftaran WHERE id_user = $id";
$execx      =   mysqli_query($conn, $queryx);
if($execx){
    $daftar = mysqli_fetch_array($execx);

}else{
    echo 'gagal';
}	

$idetail    =   $daftar['Id'];

if (isset($_POST['upload'])) {
    $targetfolderBase   = "../assets/uploads/";

    $fileNameBukti   = date("h-m-s").basename( $_FILES['bukti']['name']);
    
    $targetfolder   = $targetfolderBase . $fileNameBukti;
    
    $tanggal_pembayaran =   date("Y-m-d");

    $ok=1;

    $file_type=$_FILES['bukti']['type'];



    if ($file_type=="image/jpeg" || $file_type=="image/png") {
        if(move_uploaded_file($_FILES['bukti']['tmp_name'], $targetfolder))

         {

            $query  = "UPDATE detail_pendaftaran SET status_pendaftaran=2 WHERE id_user=$id";

            $exec   = mysqli_query($conn, $query);

            if ($exec) {

                if ($daftar['metode_pembayaran_pendaftaran'] == "L") {
                    $query2 =   "INSERT INTO cicilan_pendaftaran 
                            VALUES(null, '$fileNameBukti', $idetail, 875000, '$tanggal_pembayaran', 1)";
                    $exec2   =   mysqli_query($conn, $query2);

                    if ($exec2) {
                        echo "<div class='alert alert-success alert-dismissable'>
                          <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                          <strong>Berhasil!</strong> Upload Akte(PDF).
                        </div>";  
                    }else{
                        echo mysqli_error($conn);
                    }
                }else{
                    echo $nominal            =   $_POST['nominal'];
                    $queryCountCicilan  =   "SELECT * FROM cicilan_pendaftaran WHERE id_detail_pendaftaran=$idetail";
                    $execCountCicilan   =   mysqli_query($conn, $queryCountCicilan);

                    if ($execCountCicilan) {
                        $count          =   mysqli_num_rows($execCountCicilan);

                        ++$count;

                        $query2         =   "INSERT INTO cicilan_pendaftaran 
                                            (bukti_pembayaran, id_detail_pendaftaran, nominal, tanggal_pembayaran, cicilan_ke)
                                            VALUES('$fileNameBukti', $idetail, $nominal, '$tanggal_pembayaran',$count)";
                        $exec2          =   mysqli_query($conn, $query2);

                        if ($exec2) {
                            echo "<div class='alert alert-success alert-dismissable'>
                              <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                              <strong>Berhasil!</strong> Upload Akte(PDF).
                            </div>";  
                        }else{
                            echo mysqli_error($conn);
                        }

                    }else{
                        echo mysqli_erorr($conn);
                    }

                }
              
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
          <strong>Gagal!</strong> Format tidak sesuai. harus format PNG atau JPEG.
        </div>";
    }
}

?>


<div class="row">
    <div class="col-sm-12 col-md-8 col-lg-10 col-lg-offset-1">
        <div class="card" style="margin-top: 50px">
            <div class="card-header" data-background-color="blue">
                <h4 class="title">Kofirmasi Pembayaran Pendaftaran</h4>
                <p class="category">Upload bukti pembayaran dalam format yang ditentukan (PNG/JPEG)</p>
            </div>
            <div class="card-content">
            	
            	<form action="" method="post" enctype="multipart/form-data">
                    <div class="row">
                        

                        <div class="form-group floating-label" style="margin-left: 20px;">
                            <label class="col-sm-12">Bukti Pembayaran/Struk Transfer (PNG/JPEG) : </label>
                            <label class="btn btn-primary" for="my-file-selector">
                                <input id="my-file-selector" name="bukti" type="file" style="display:none" 
                                onchange="$('#upload-file-info').html(this.files[0].name)">
                                upload bukti pembayaran (.PDF)
                            </label>
                            <span class='label label-info' id="upload-file-info"></span>
                        </div>

                        
                    
                    </div>
                    
                    <div class="row">
                        <?php  
                        if ($daftar['metode_pembayaran_pendaftaran'] == "C") {
                        ?>
                        
                        <div class="form-group floating-label" style="margin-left: 30px;margin-right: 20px;">
                            <label for="" class="col-sm-12">Nominal Cicilan</label>
                            <input type="number" class="form-control" name="nominal" required="">
                        </div>
        
                        <?php
                        }else{
                        ?>


                        <?php
                        }   
                        ?>
                    </div>
                    
                    <button type="submit" name="upload" class="btn btn-primary blue pull-right"><i class="fa fa-upload"></i> Upload File</button>
                </form>
            
            </div>
        </div>
    </div>
</div>



