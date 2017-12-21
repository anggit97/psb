<?php  
ob_start();
include '../../assets/libs/fpdf/fpdf.php';
include '../../koneksi/koneksi.php';
include '../../assets/libs/fpdf/mc_table/mc_table_bukti_pembayaran_kegiatan.php';

$id = $_GET['id'];


// Instanciation of inherited class
$pdf = new PDF_MC_Table();
$pdf->AliasNbPages();
$pdf->AddPage();



$query	=	"SELECT a.*,b.* FROM detail_pendaftaran a, siswa b WHERE b.id_detail_pendaftaran = a.Id AND a.Id=$id";
$exec 	=	mysqli_query($conn, $query);

$nama = array();
$kelas =	array();
$nis 	=	array();
$tanggal_kegiatan	=	"";
$biaya_kegiatan	=	"";

if ($exec) {

	while ($rows = mysqli_fetch_array($exec)) {
	   	array_push($nama, $rows['nama']);
	   	array_push($kelas, $rows['kelas']);
	   	array_push($nis, $rows['nis']);
	   	$tanggal_kegiatan	=	$rows['tanggal_kegiatan'];
	   	$biaya_kegiatan 	=	$rows['biaya_kegiatan'];
	}


}else{
	echo 'gagal';
}


$date =	date("Y-m-d");

$pdf->Cell(40,10,'',0,0,'L');
$pdf->SetFont('TIMES','B',12);
$pdf->Ln();
$pdf->SetFont('TIMES','B',12);
$pdf->Cell(30,10,'NIS');
$pdf->SetFont('TIMES','',12);
$pdf->Cell(80,10,': '.$nis[0]);

$pdf->SetFont('TIMES','B',12);
$pdf->Cell(30,10,'Tanggal Bayar');
$pdf->SetFont('TIMES','',12);
$pdf->Cell(30,10,': '.$tanggal_kegiatan);

$pdf->Ln();
$pdf->SetFont('TIMES','B',12);
$pdf->Cell(30,10,'Nama');
$pdf->SetFont('TIMES','',12);
$pdf->Cell(80,10,': '.$nama[0]);

$pdf->SetFont('TIMES','B',12);
$pdf->Cell(30,10,'Tanggal Cetak');
$pdf->SetFont('TIMES','',12);
$pdf->Cell(30,10,': '.$date);

$pdf->Ln();
$pdf->SetFont('TIMES','B',12);
$pdf->Cell(30,10,'Kelas');
$pdf->SetFont('TIMES','',12);
$pdf->Cell(30,10,': '.$kelas[0]);



$pdf->Ln(20);
$pdf->Cell(10,10,'',0,0,'C');
$pdf->SetFont('TIMES','B',12);
$pdf->Cell(30,10,'Rincian Pembayaran',0,0,'C');
$pdf->SetFont('TIMES','',12);
$pdf->Ln(15);

$pdf->Cell(5,10,'',0,0,'C');
$pdf->SetFont('TIMES','B',12);
$pdf->Cell(30,10,'No',1,0,'C');
$pdf->SetFont('TIMES','B',12);
$pdf->Cell(50,10,'Nama Kegiatan',1,0,'C');
$pdf->SetFont('TIMES','B',12);
$pdf->Cell(40,10,'Biaya',1,0,'C');

$pdf->Ln();
$pdf->SetFont('TIMES','',12);
$pdf->Cell(5,10,'',0,0,'C');
$pdf->Cell(30,10,'1',1,0,'C');
$pdf->Cell(50,10,'Manasik Haji',1,0,'C');
$pdf->Cell(40,10,'Rp. 500.000',1,0,'C');


$pdf->Ln(40);
$pdf->SetFont('TIMES','B',20);
$pdf->Cell(75,10,'',0,0,'C');
$pdf->Cell(40,10,'LUNAS',1,0,'C');


$pdf->Output();


?>