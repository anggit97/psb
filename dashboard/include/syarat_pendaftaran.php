<div class="row">
    <div class="col-sm-12 col-md-8 col-lg-10 col-lg-offset-1">
        <div class="card" style="margin-top: 50px">
            <div class="card-header" data-background-color="blue">
                <h4 class="title">Syarat Pendaftaran</h4>
                <p class="category">Isi Form pendaftaran dengan benar</p>
            </div>
            <div class="card-content">
                <?php  
                if ($upload_akte != "" && $upload_kartu_keluarga != "" && $foto_anak != "" && $foto_keluarga != "") {
                    echo "<div class='alert alert-success alert-dismissable'>
                      <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                      <strong>Persyaratan sudah lengkap.</strong> Tunggu konfirmasi admin untuk tahap selanjutnya.
                    </div>";
                }
                ?>
                <h3>Berikut adalah syarat pendaftaran siswa baru yang harus dipenuhi :</h3>
                <ol>
                    <li><font color="#2ecc71">Mengisi Formulir Pendaftaran <i class="fa fa-check"></font></i></li>
                    <li> 
                        <?php 

                            if ($upload_akte != "" && $upload_kartu_keluarga != "") {
                                echo '<font color="#2ecc71">Fotocopy Akte kelahiran dan kartu keluarga 2 lembar<i class="fa fa-check"></i></font> <a href="index.php?page=5" class="btn btn-primary btn-sm" title="Upload Akte Kelahiran dan Kartu Keluarga"><i class="fa fa-pencil"></i></a>';
                            }else{
                                echo 'Fotocopy Akte kelahiran dan kartu keluarga 2 lembar <a href="index.php?page=5" class="btn btn-primary btn-sm" title="Upload Akte Kelahiran dan Kartu Keluarga"><i class="fa fa-upload"></i></a>';
                            }
                        
                        ?>
                    </li>
                    <li>
                        <?php 

                            if ($foto_anak != "" && $foto_keluarga != "") {
                                echo '<font color="#2ecc71">Foto anak dan foto keluarga ukuran 2R<i class="fa fa-check"></i></font> <a href="index.php?page=6" class="btn btn-primary btn-sm" title="Upload Akte Kelahiran dan Kartu Keluarga"><i class="fa fa-pencil"></i></a>';
                            }else{
                                echo 'Foto anak dan foto keluarga ukuran 2R <a href="index.php?page=6" class="btn btn-primary btn-sm" title="Upload Akte Kelahiran dan Kartu Keluarga"><i class="fa fa-upload"></i></a>';
                            }
                        
                        ?>
                    </li>
                </ol>

                <h6><i><b>*Catatan : Pengembalian Formulir berikut persyaratannya paling lambar 2 minggu setelah pengisian formulir secara online</b></i></h6>
            </div>
        </div>
    </div>
</div>