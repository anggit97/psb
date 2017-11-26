<style>
	h5{
		margin-left: 30px;
	}
</style>

<h1>Jadwal</h1>

<?php  
if (isset($_SESSION['message'])) {
    echo "<div class='alert alert-success alert-dismissable'>
      <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
      <strong>Berhasil!</strong> ".$_SESSION['message']."
    </div>";
}
?>
<a href="index.php?page=23&kelas=A" class="btn btn-primary pull-right btn-md" style="margin-right: 80px"><i class="fa fa-plus"></i> Input jadwal Kelas A</a>
<div class="row">
    <div class="col-sm-12 col-md-8 col-lg-10 col-lg-offset-1">
        <div class="card" style="margin-top: 50px">
            <div class="card-header" data-background-color="blue">
                <h4 class="title">Jadwal Kelas A</h4>
                <p class="category">Daftar Mata Pelajaran Kelas A</p>


            </div>
            <div class="card-content">

            	<div class="row">
            		
            		<div class="col-sm-3">
            			<h5>Senin</h5>
            			<ul>
            			<?php  
            			$querySeninA	=	"SELECT * FROM jadwal a, mapel b WHERE id_hari=1 AND a.id_mapel=b.kode_mapel_kegiatan
            								AND a.kelas='A'";
            			$execSeninA		=	mysqli_query($conn, $querySeninA);

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
            			$querySeninA	=	"SELECT * FROM jadwal a, mapel b WHERE id_hari=2 AND a.id_mapel=b.kode_mapel_kegiatan
            								AND a.kelas='A'";
            			$execSeninA		=	mysqli_query($conn, $querySeninA);

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
            			$querySeninA	=	"SELECT * FROM jadwal a, mapel b WHERE id_hari=2 AND a.id_mapel=b.kode_mapel_kegiatan
            								AND a.kelas='A'";
            			$execSeninA		=	mysqli_query($conn, $querySeninA);

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
            			$querySeninA	=	"SELECT * FROM jadwal a, mapel b WHERE id_hari=2 AND a.id_mapel=b.kode_mapel_kegiatan
            								AND a.kelas='A'";
            			$execSeninA		=	mysqli_query($conn, $querySeninA);

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
            			$querySeninA	=	"SELECT * FROM jadwal a, mapel b WHERE id_hari=5 AND a.id_mapel=b.kode_mapel_kegiatan
            								AND a.kelas='A'";
            			$execSeninA		=	mysqli_query($conn, $querySeninA);

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
            			$querySeninA	=	"SELECT * FROM jadwal a, mapel b WHERE id_hari=6 AND a.id_mapel=b.kode_mapel_kegiatan
            								AND a.kelas='A'";
            			$execSeninA		=	mysqli_query($conn, $querySeninA);

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
        </div>
    </div>
</div>


<a href="index.php?page=23&kelas=B" class="btn btn-primary pull-right btn-md" style="margin-right: 80px"><i class="fa fa-plus"></i> Input jadwal Kelas B</a>

<div class="row">
    <div class="col-sm-12 col-md-8 col-lg-10 col-lg-offset-1">
        <div class="card" style="margin-top: 50px">
            <div class="card-header" data-background-color="blue">
                <h4 class="title">Jadwal Kelas B</h4>
                <p class="category">Daftar Mata Pelajaran Kelas B</p>
            </div>
            <div class="card-content">
                <div class="row">
            		
            		<div class="col-sm-3">
            			<h5>Senin</h5>
            			<ul>
            			<?php  
            			$querySeninA	=	"SELECT * FROM jadwal a, mapel b WHERE id_hari=1 AND a.id_mapel=b.kode_mapel_kegiatan
            								AND a.kelas='B'";
            			$execSeninA		=	mysqli_query($conn, $querySeninA);

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
            			$querySeninA	=	"SELECT * FROM jadwal a, mapel b WHERE id_hari=2 AND a.id_mapel=b.kode_mapel_kegiatan
            								AND a.kelas='B'";
            			$execSeninA		=	mysqli_query($conn, $querySeninA);

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
            			$querySeninA	=	"SELECT * FROM jadwal a, mapel b WHERE id_hari=3 AND a.id_mapel=b.kode_mapel_kegiatan
            								AND a.kelas='B'";
            			$execSeninA		=	mysqli_query($conn, $querySeninA);

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
            			$querySeninA	=	"SELECT * FROM jadwal a, mapel b WHERE id_hari=4 AND a.id_mapel=b.kode_mapel_kegiatan
            								AND a.kelas='B'";
            			$execSeninA		=	mysqli_query($conn, $querySeninA);

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
            			$querySeninA	=	"SELECT * FROM jadwal a, mapel b WHERE id_hari=5 AND a.id_mapel=b.kode_mapel_kegiatan
            								AND a.kelas='B'";
            			$execSeninA		=	mysqli_query($conn, $querySeninA);

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
            			$querySeninA	=	"SELECT * FROM jadwal a, mapel b WHERE id_hari=6 AND a.id_mapel=b.kode_mapel_kegiatan
            								AND a.kelas='B'";
            			$execSeninA		=	mysqli_query($conn, $querySeninA);

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


            	
            </div> 

            </div>
        </div>
    </div>
</div>

<?php  

unset($_SESSION['message']);

?>