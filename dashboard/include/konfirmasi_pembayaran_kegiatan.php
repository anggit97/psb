<h2>Konfirmasi Pembayaran Kegiatan</h2>

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

			$queryUpload	=	 "UPDATE detail_pendaftaran 
								SET biaya_kegiatan=500000, bukti_konfirmasi_pembayaran_kegiatan='$fileNameBukti', 
								tanggal_kegiatan='$tanggal_pembayaran' 
								WHERE id_user=$id";

			$execUpload		=	mysqli_query($conn,$queryUpload);

			if ($execUpload) {
				echo "<div class='alert alert-success alert-dismissable'>
                  <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                  <strong>Berhasil!</strong> Upload bukti pembayaran pendaftaran.
                </div>";	
			}else{
				echo "<div class='alert alert-danger alert-dismissable'>
                  <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                  <strong>Gagal!</strong> Upload bukti pembayaran pendaftaran.
                </div>";
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
                <h4 class="title">Kofirmasi Pembayaran Kegiatan</h4>
                <p class="category">Upload bukti pembayaran Kegiatan dalam format yang ditentukan (PNG/JPEG/PDF)</p>
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


