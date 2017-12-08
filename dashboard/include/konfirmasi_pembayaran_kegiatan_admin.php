<h2>Konfirmasi Pembayaran Kegiatan</h2>

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
                <h4 class="title">Konfirmasi Pembayaran Kegiatan</h4>
                <p class="category">Lakukan konfirmasi Pembayaran Kegiatan</p>
            </div>
            <div class="card-content">
                
                <h3 style="overflow: hidden;"><b>Data Konfirmasi Pembayaran Kegiatan</b></h3>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <td><b>No</b></td>
                            <td><b>Nama Siswa</b></td>
                            <td><b>Email</b></td>
                            <td><b>Status Pembayaran Kegiatan</b></td>
                            <td><b>Aksi</b></td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php  
                            $query  = "SELECT a.nama nama, c.email email, b.status_kegiatan status, b.biaya_kegiatan,
                                        b.Id idd  
                                        FROM pendaftaran a, detail_pendaftaran b, akun c 
                                        WHERE a.Id=b.id_user AND c.id_user=a.Id AND (b.biaya_kegiatan > 0) AND  b.status_kegiatan = 0";

                            $exec   =   mysqli_query($conn, $query);

                            if ($exec) {
                                $total  = mysqli_num_rows($exec);
                                if ($total > 0) {
                                    while ($rows = mysqli_fetch_array($exec)) {
                                        
                                        $status = $rows['status'];
                                
                        ?>
        
                                
                                    <tr>
                                        <td><?php echo ++$no; ?></td>
                                        <td><?php echo $rows['nama']; ?></td>
                                        <td><?php echo $rows['email']; ?></td>
                                        <td><?php 
                                        $status == 0 ? 
                                        print("<font color='#e74c3c'>Belum dikonfirmasi</font>") : 
                                        print("<font color='##2ecc71'>Sudah dikonfirmasi</font>"); 
                                        ?></td>
                                        <td>
                                            <!-- <a href="" class="btn btn-primary btn-sm">Konfirmasi</a> -->
                                            <a href="include/proses_konfirmasi_pembayaran_kegiatan.php?idd=<?php echo $rows['idd'] ?>" class="btn btn-warning btn-sm">Konfirmasi</a>
                                        </td>
                                    </tr>

                        <?php
                                    }
                                }else{
                                    echo "<td colspan='5' align='center'><h3><b>Belum ada siswa yang melakukan konfirmasi Pembayaran</b></h3></td>";
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