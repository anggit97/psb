<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <title>Cetak Jadwal User</title>
      <?php include 'libs_print.php'; ?>
      
      <style>
            @media print {
                  .col-sm-1, .col-sm-2, .col-sm-3, .col-sm-4, .col-sm-5, .col-sm-6,
                  .col-sm-7, .col-sm-8, .col-sm-9, .col-sm-10, .col-sm-11, .col-sm-12 {
                       float: left;               
                  }

                  .col-sm-12 {
                       width: 100%;
                  }

                  .col-sm-11 {
                       width: 91.66666666666666%;
                  }

                  .col-sm-10 {
                       width: 83.33333333333334%;
                  }

                  .col-sm-9 {
                        width: 75%;
                  }

                  .col-sm-8 {
                        width: 66.66666666666666%;
                  }

                   .col-sm-7 {
                        width: 58.333333333333336%;
                   }

                   .col-sm-6 {
                        width: 50%;
                   }

                   .col-sm-5 {
                        width: 41.66666666666667%;
                   }

                   .col-sm-4 {
                        width: 33.33333333333333%;
                   }

                   .col-sm-3 {
                        width: 25%;
                   }

                   .col-sm-2 {
                          width: 16.666666666666664%;
                   }

                   .col-sm-1 {
                          width: 8.333333333333332%;
                  }

                  h5{
                        margin-left: 20px;
                  }            
            }
      </style>

</head>
<body>


<script>
      window.print();
</script>

<center><h3><b>JADWAL PELAJARAN</b></h3></center>
<?php  
if (isset($_SESSION['message'])) {
    echo "<div class='alert alert-success alert-dismissable'>
      <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
      <strong>Berhasil!</strong> ".$_SESSION['message']."
    </div>";
}
?>

<?php  
include '../../koneksi/koneksi.php';

$id              =      $_GET['id'];

$queryKelas      =     "SELECT kelas FROM detail_pendaftaran WHERE id_user = $id";
$execQuery       =     mysqli_query($conn, $queryKelas);

if ($execQuery) {
      $kelas =    mysqli_fetch_array($execQuery);
}else{
      echo mysqli_error($conn);
}

?>

<div class="row">
    <div class="col-sm-12 col-md-8 col-lg-10 col-lg-offset-1">
        <div class="card" style="margin-top: 50px">
            
            <div class="card-content">
                  
                  <?php  

                  if ($kalas == "A") {
                  ?>
                  <div class="row">
                        
                        <div class="col-sm-3">
                              <h5>Senin</h5>
                              <ul>
                              <?php  
                              $querySeninA      =     "SELECT * FROM jadwal a, mapel b WHERE id_hari=1 AND a.id_mapel=b.kode_mapel_kegiatan
                                                            AND a.kelas='A'";
                              $execSeninA       =     mysqli_query($conn, $querySeninA);

                              if ($execSeninA) {
                                    while ($senin = mysqli_fetch_array($execSeninA)) {
                              ?>
                                          <li><?php echo $senin['nama_mapel_kegiatan']; ?></li>
                              <?php
                                    }
                              }
                              ?>
                              </ul>
                        </div>



                        
                        <div class="col-sm-3">
                              <h5>Selasa</h5>
                              <ul>
                              <?php  
                              $querySeninA      =     "SELECT * FROM jadwal a, mapel b WHERE id_hari=2 AND a.id_mapel=b.kode_mapel_kegiatan
                                                            AND a.kelas='A'";
                              $execSeninA       =     mysqli_query($conn, $querySeninA);

                              if ($execSeninA) {
                                    while ($senin = mysqli_fetch_array($execSeninA)) {
                              ?>
                                          <li><?php echo $senin['nama_mapel_kegiatan']; ?></li>
                              <?php
                                    }
                              }
                              ?>
                              </ul>
                        </div>


                        <div class="col-sm-3">
                              <h5>Rabu</h5>
                              <ul>
                              <?php  
                              $querySeninA      =     "SELECT * FROM jadwal a, mapel b WHERE id_hari=3 AND a.id_mapel=b.kode_mapel_kegiatan
                                                            AND a.kelas='A'";
                              $execSeninA       =     mysqli_query($conn, $querySeninA);

                              if ($execSeninA) {
                                    while ($senin = mysqli_fetch_array($execSeninA)) {
                              ?>
                                          <li><?php echo $senin['nama_mapel_kegiatan']; ?></li>
                              <?php
                                    }
                              }
                              ?>
                              </ul>
                        </div>


                        <div class="col-sm-3">
                              <h5>Kamis</h5>
                              <ul>
                              <?php  
                              $querySeninA      =     "SELECT * FROM jadwal a, mapel b WHERE id_hari=4 AND a.id_mapel=b.kode_mapel_kegiatan
                                                            AND a.kelas='A'";
                              $execSeninA       =     mysqli_query($conn, $querySeninA);

                              if ($execSeninA) {
                                    while ($senin = mysqli_fetch_array($execSeninA)) {
                              ?>
                                          <li><?php echo $senin['nama_mapel_kegiatan']; ?></li>
                              <?php
                                    }
                              }
                              ?>
                              </ul>
                        </div>
                  </div>
                  
                        
                  <div class="row">
                        
                        <div class="col-sm-3">
                              <h5>Jumat</h5>
                              <ul>
                              <?php  
                              $querySeninA      =     "SELECT * FROM jadwal a, mapel b WHERE id_hari=5 AND a.id_mapel=b.kode_mapel_kegiatan
                                                            AND a.kelas='A'";
                              $execSeninA       =     mysqli_query($conn, $querySeninA);

                              if ($execSeninA) {
                                    while ($senin = mysqli_fetch_array($execSeninA)) {
                              ?>
                                          <li><?php echo $senin['nama_mapel_kegiatan']; ?></li>
                              <?php
                                    }
                              }
                              ?>
                              </ul>
                        </div>

                        
                        <div class="col-sm-3">
                              <h5>PR</h5>
                              <ul>
                              <?php  
                              $querySeninA      =     "SELECT * FROM jadwal a, mapel b WHERE id_hari=6 AND a.id_mapel=b.kode_mapel_kegiatan
                                                            AND a.kelas='A'";
                              $execSeninA       =     mysqli_query($conn, $querySeninA);

                              if ($execSeninA) {
                                    while ($senin = mysqli_fetch_array($execSeninA)) {
                              ?>
                                          <li><?php echo $senin['nama_mapel_kegiatan']; ?></li>
                              <?php
                                    }
                              }
                              ?>
                              </ul>
                        </div>
                  </div>


                  
            </div>  
                  <?php
                  }else{
                  ?>
            <div class="row">
                        
                        <div class="col-sm-3">
                              <h5>Senin</h5>
                              <ul>
                              <?php  
                              $querySeninA      =     "SELECT * FROM jadwal a, mapel b WHERE id_hari=1 AND a.id_mapel=b.kode_mapel_kegiatan
                                                            AND a.kelas='B'";
                              $execSeninA       =     mysqli_query($conn, $querySeninA);

                              if ($execSeninA) {
                                    while ($senin = mysqli_fetch_array($execSeninA)) {
                              ?>
                                          <li><?php echo $senin['nama_mapel_kegiatan']; ?></li>
                              <?php
                                    }
                              }
                              ?>
                              </ul>
                        </div>



                        
                        <div class="col-sm-3">
                              <h5>Selasa</h5>
                              <ul>
                              <?php  
                              $querySeninA      =     "SELECT * FROM jadwal a, mapel b WHERE id_hari=2 AND a.id_mapel=b.kode_mapel_kegiatan
                                                            AND a.kelas='B'";
                              $execSeninA       =     mysqli_query($conn, $querySeninA);

                              if ($execSeninA) {
                                    while ($senin = mysqli_fetch_array($execSeninA)) {
                              ?>
                                          <li><?php echo $senin['nama_mapel_kegiatan']; ?></li>
                              <?php
                                    }
                              }
                              ?>
                              </ul>
                        </div>


                        <div class="col-sm-3">
                              <h5>Rabu</h5>
                              <ul>
                              <?php  
                              $querySeninA      =     "SELECT * FROM jadwal a, mapel b WHERE id_hari=3 AND a.id_mapel=b.kode_mapel_kegiatan
                                                            AND a.kelas='B'";
                              $execSeninA       =     mysqli_query($conn, $querySeninA);

                              if ($execSeninA) {
                                    while ($senin = mysqli_fetch_array($execSeninA)) {
                              ?>
                                          <li><?php echo $senin['nama_mapel_kegiatan']; ?></li>
                              <?php
                                    }
                              }
                              ?>
                              </ul>
                        </div>


                        <div class="col-sm-3">
                              <h5>Kamis</h5>
                              <ul>
                              <?php  
                              $querySeninA      =     "SELECT * FROM jadwal a, mapel b WHERE id_hari=4 AND a.id_mapel=b.kode_mapel_kegiatan
                                                            AND a.kelas='B'";
                              $execSeninA       =     mysqli_query($conn, $querySeninA);

                              if ($execSeninA) {
                                    while ($senin = mysqli_fetch_array($execSeninA)) {
                              ?>
                                          <li><?php echo $senin['nama_mapel_kegiatan']; ?></li>
                              <?php
                                    }
                              }
                              ?>
                              </ul>
                        </div>
                  </div>
                  
                        
                  <div class="row">
                        
                        <div class="col-sm-3">
                              <h5>Jumat</h5>
                              <ul>
                              <?php  
                              $querySeninA      =     "SELECT * FROM jadwal a, mapel b WHERE id_hari=5 AND a.id_mapel=b.kode_mapel_kegiatan
                                                            AND a.kelas='B'";
                              $execSeninA       =     mysqli_query($conn, $querySeninA);

                              if ($execSeninA) {
                                    while ($senin = mysqli_fetch_array($execSeninA)) {
                              ?>
                                          <li><?php echo $senin['nama_mapel_kegiatan']; ?></li>
                              <?php
                                    }
                              }
                              ?>
                              </ul>
                        </div>

                        
                        <div class="col-sm-3">
                              <?php  
                              $arrPRHari = array('Senin','Selesa','Rabu','Kamis','Jumat');
                              ?>
                              <h5>PR</h5>
                              <ul>
                              <?php  
                              $querySeninA      =     "SELECT * FROM jadwal a, mapel b WHERE id_hari=6 AND a.id_mapel=b.kode_mapel_kegiatan
                                                            AND a.kelas='B'";
                              $execSeninA       =     mysqli_query($conn, $querySeninA);

                              if ($execSeninA) {
                                    $i = 0;
                                    while ($senin = mysqli_fetch_array($execSeninA)) {
                              ?>
                                          <li><?php echo $arrPRHari[$i].' : '.$senin['nama_mapel_kegiatan']; ?></li>
                              <?php
                                    $i++;
                                    }
                              }
                              ?>
                              </ul>
                        </div>
                  </div>

                  <?php
                  }
                  ?>

                  
        </div>
    </div>
</div>



</div>
</body>
</html>


