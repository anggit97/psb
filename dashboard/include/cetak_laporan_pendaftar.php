<?php  
ob_start();
include '../../assets/libs/fpdf/fpdf.php';
include '../../koneksi/koneksi.php';
include '../../assets/libs/fpdf/mc_table/mc_table.php';

$id_maintenance = $_GET['id_mnt'];


// Instanciation of inherited class
$pdf = new PDF_MC_Table();
$pdf->AliasNbPages();
$pdf->AddPage();



$pdf->Ln(15);
$pdf->Cell(40,10,'',0,0,'L');
$pdf->SetFont('TIMES','B',12);
$pdf->Cell(100,10,'List Pendaftaran',1,1,'C');
$pdf->Ln();
$pdf->SetFont('TIMES','',10);
$pdf->Cell(10,10,'No.',1,0,'C');
$pdf->Cell(40,10,'Nama',1,0,'C');
$pdf->Cell(50,10,'Email',1,0,'C');
$pdf->Cell(20,10,'Usia',1,0,'C');
$pdf->Cell(20,10,'Gender',1,0,'C');
$pdf->Cell(20,10,'Kelas',1,0,'C');
$pdf->Cell(30,10,'Tanggal Daftar',1,1,'C');

$query	=	"SELECT * FROM pendaftaran a, akun b, detail_pendaftaran c WHERE a.Id = c.id_user AND b.id_user = a.Id";
$exec 	=	mysqli_query($conn, $query);

$no = 0;

$pdf->SetWidths(array(10,40,50,20,20,20,30));

while ($rows = mysqli_fetch_array($exec)) {
  $pdf->Row(array(++$no,$rows['nama'],$rows['email'],$rows['usia'],$rows['jenis_kelamin'],$rows['kelas'],$rows['tanggal_daftar']));
}


$pdf->Output();

?>