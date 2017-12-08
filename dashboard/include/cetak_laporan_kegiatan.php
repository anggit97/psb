<?php  
ob_start();
include '../../assets/libs/fpdf/fpdf.php';
include '../../koneksi/koneksi.php';
include '../../assets/libs/fpdf/mc_table/mc_table_kegiatan.php';

$id_maintenance = $_GET['id_mnt'];


// Instanciation of inherited class
$pdf = new PDF_MC_Table();
$pdf->AliasNbPages();
$pdf->AddPage();



$pdf->Ln(15);
$pdf->Cell(40,10,'',0,0,'L');
$pdf->SetFont('TIMES','B',12);
$pdf->Cell(100,10,'List Pembayaran Kegiatan',1,1,'C');
$pdf->Ln();
$pdf->SetFont('TIMES','',10);
$pdf->Cell(20,10,'No.',1,0,'C');
$pdf->Cell(20,10,'Nama',1,0,'C');
$pdf->Cell(30,10,'Email',1,0,'C');
$pdf->Cell(50,10,'Status Pembayaran',1,0,'C');
$pdf->Cell(10,10,'Kelas',1,0,'C');
$pdf->Cell(30,10,'Tanggal Bayar',1,0,'C');
$pdf->Cell(30,10,'Jumlah',1,1,'C');

$query	=	"SELECT a.nama nama, c.email email, 
					b.status_kegiatan status, b.status_kegiatan, 
					b.kelas,b.tanggal_kegiatan,b.biaya_kegiatan,
                    b.Id idd  
            FROM pendaftaran a, detail_pendaftaran b, akun c 
            WHERE a.Id=b.id_user AND c.id_user=a.Id";
$exec 	=	mysqli_query($conn, $query);

$no = 0;

$pdf->SetWidths(array(20,20,30,50,10,30,30));

$status = '';

$total	=	0;

while ($rows = mysqli_fetch_array($exec)) {

	if ($rows['status'] == 0) {
		$status = 'Belum Bayar';
	}else{
		$status = 'Sudah Bayar';
	}

	$total	+=	$rows['biaya_kegiatan'];

  $pdf->Row(array(++$no,$rows['nama'],$rows['email'],$status,$rows['kelas'],$rows['tanggal_kegiatan'],'Rp. '.thousandSparator($rows['biaya_kegiatan'])));
}


$pdf->Ln(0);
$pdf->Cell(160,10,'Total',1,0,'C');
$pdf->Cell(30,10,'Rp.'.thousandSparator($total),1,1,'L');


$pdf->Output();


function thousandSparator($number){
	$example = $number;
	$subtotal =  number_format($number, 2, ',', '.');
	return $subtotal;
}

?>