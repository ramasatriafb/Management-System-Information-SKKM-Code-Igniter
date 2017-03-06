<?php
require_once('tcpdf_include.php');
class MYPDF extends TCPDF {
/*	var $tgl_awal;
	function __construct($tgl_awal){
		parent::__construct('L','cm',array(21.59,35.56));
		$this->tgl_awal = $tgl_awal;
	}
*/	public function Header() {
/*		$array_bln = array(1=>"Januari","Februari","Maret", "April", "Mei","Juni","Juli","Agustus","September","Oktober", "November","Desember");
		$tgl = strtotime($this->tgl_awal);
		$month = date('n',$tgl);
		$bln = $array_bln[$month];
*/		
		$this->Ln(4);
		$this->SetFont('helvetica', 'B', 11);
		$this->Cell(0, 15, 'LAPORAN PENCAPAIAN KEY DAN PERFORMANCE INDICATOR', 0, 0, 'C');
        $this->Ln(4);
		$this->SetFont('helvetica', '', 11);
        $this->Cell(0, 15, 'Bagian Teknologi Sistem Informasi', 0, 0, 'C');
        $this->Ln(4);
		$this->SetFont('helvetica', 'B', 11);
        $this->Cell(0, 15, 'Seksi Sistem Informasi', 0, 0, 'C');
        $this->Ln(4);
		$this->SetFont('helvetica', '', 11);
        $this->Cell(0, 15, 'Periode : ', 0, 0, 'C');
        $this->Ln(8);
	}

	public function Footer() {
		$this->SetY(-15);
		$this->SetFont('helvetica', 'I', 8);
		$this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
	}
}


$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// create new PDF document
/*$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

$pdf->SetCreator(PDF_CREATOR);
$pdf->setPrintHeader(false);
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);


// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
*/


// ---------------------------------------------------------

$pdf->AddPage('P', 'F4');

/*
$txt = <<<EOD
	LAPORAN PENCAPAIAN KEY DAN PERFORMANCE INDICATOR
	BAGIAN TEKNOLOGI SISTEM INFORMASI
	SEKSI INFRASTRUKTUR
	Periode :
EOD;

$pdf->Write(0, $txt, '', 0, 'C', true, 0, false, false, 0);
*/$pdf->SetFont('dejavusans', '', 10);

$pdf->SetFillColor(255, 255, 255);
$pdf->Ln(10);
$pdf->Cell(30, 5, 'Indikator kinerja', 0, 'J', 1, 0, '', '', true, 0, false, true, 5, 'T');
$pdf->Cell(5, 5, ' : ', 0, 'J', 1, 0, '', '', true, 0, false, true, 5, 'M');
$pdf->Cell(55, 5, 'Penambahan-penambahan fitur aplikasi eksisting', 0, 'J', 1, 0, '', '', true, 0, false, true, 5, 'B');
$pdf->Ln(4);
$pdf->Cell(30, 5, 'Pengukuran', 0, 'J', 1, 0, '', '', true, 0, false, true, 5, 'T');
$pdf->Cell(5, 5, ' : ', 0, 'J', 1, 0, '', '', true, 0, false, true, 5, 'M');
$pdf->Cell(55, 5, 'Jumlah penyelesaian penambahan fitur yang tidak tepat waktu sampai', 0, 'J', 1, 0, '', '', true, 0, false, true, 5, 'B');
$pdf->Ln(4);
$pdf->Cell(35, 5, '', 0, 'J', 1, 0, '', '', true, 0, false, true, 5, 'M');
$pdf->Cell(55, 5, 'dengan unit kerja menerima informasi untuk melakukan UAT', 0, 'J', 1, 0, '', '', true, 0, false, true, 5, 'B');
$pdf->Ln(4);
$pdf->Cell(35, 5, '', 0, 'J', 1, 0, '', '', true, 0, false, true, 5, 'M');
$pdf->Cell(55, 5, '(User Acceptance Test)', 0, 'J', 1, 0, '', '', true, 0, false, true, 5, 'B');
$pdf->Ln(4);
$pdf->Cell(30, 5, 'Target', 0, 'J', 1, 0, '', '', true, 0, false, true, 5, 'T');
$pdf->Cell(5, 5, ' : ', 0, 'J', 1, 0, '', '', true, 0, false, true, 5, 'M');
$pdf->Cell(55, 5, 'Max 3 problem / bulan', 0, 'J', 1, 0, '', '', true, 0, false, true, 5, 'B');
$pdf->Ln(4);


$pdf->Ln(6);
$pdf->SetFont('dejavusans', '', 9);
$html = '
<table border="0.5" cellspacing="0" cellpadding="1">
	<tr>
		<th align="center" width="30"><b>No</b></th>
		<th align="center" width="170"><b>Tanggal SLA (Service Level Agreement) / Rencana Penyelesaian Penambahan Fitur</b><br/><br/>a</th>
		<th align="center" width="130"><b>Tanggal Realisasi Penambahan Fitur / Realisasi SLA</b><br/><br/><br/>b</th>
		<th align="center" width="180"><b>Pencapaian Terhadap Target(%)</b><br/><br/><br/>c-Jika b-a  0 , maka c=1; Jika tidak maka c=0</th>
	</tr>
	<tr>
		<td align="center" rowspan="19">No</td>
		<td rowspan="3">COL 1 - ROW 1<br />COLSPAN 3</td>
		<td rowspan="3">COL 1 - ROW 1<br />COLSPAN 3</td>
		<td align="center" rowspan="19">maka c=1; Jika tidak maka c=0</td>
	</tr>
</table> ';
// output the HTML content
$pdf->writeHTML($html, true, false, false, false, '');

$tbl = <<<EOD
<table border="1" cellpadding="2" cellspacing="2">
<thead>
 <tr style="background-color:#FFFF00;color:#0000FF;">
  <td width="30" align="center"><b>A</b></td>
  <td width="140" align="center"><b>XXXX</b></td>
  <td width="140" align="center"><b>XXXX</b></td>
  <td width="80" align="center"> <b>XXXX</b></td>
  <td width="80" align="center"><b>XXXX</b></td>
  <td width="45" align="center"><b>XXXX</b></td>
 </tr>
 <tr style="background-color:#FF0000;color:#FFFF00;">
  <td width="30" align="center"><b>B</b></td>
  <td width="140" align="center"><b>XXXX</b></td>
  <td width="140" align="center"><b>XXXX</b></td>
  <td width="80" align="center"> <b>XXXX</b></td>
  <td width="80" align="center"><b>XXXX</b></td>
  <td width="45" align="center"><b>XXXX</b></td>
 </tr>
</thead>
 <tr>
  <td width="30" align="center">1.</td>
  <td width="140" rowspan="6">XXXX<br />XXXX<br />XXXX<br />XXXX<br />XXXX<br />XXXX<br />XXXX<br />XXXX</td>
  <td width="140">XXXX<br />XXXX</td>
  <td width="80">XXXX<br />XXXX</td>
  <td width="80">XXXX</td>
  <td align="center" width="45">XXXX<br />XXXX</td>
 </tr>
 <tr>
  <td width="30" align="center" rowspan="3">2.</td>
  <td width="140" rowspan="3">XXXX<br />XXXX</td>
  <td width="80">XXXX<br />XXXX</td>
  <td width="80">XXXX<br />XXXX</td>
  <td align="center" width="45">XXXX<br />XXXX</td>
 </tr>
</table>
EOD;

$pdf->writeHTML($tbl, true, false, false, false, '');




$pdf->Ln(4);
$pdf->Cell(10, 5, '', 0, 0, 'C');
$pdf->Cell(40, 5, 'Penanggung Jawab', 0, 0, 'C');
$pdf->Cell(60, 5, '', 0, 0, 'C');
$pdf->Cell(55, 5, 'Dibuat Oleh', 0, 0, 'C');
$pdf->Ln(4);
$pdf->Cell(10, 5, '', 0, 0, 'C');
$pdf->Cell(40, 5, 'SUPERVISOR', 0, 0, 'C');
$pdf->Cell(60, 5, '', 0, 0, 'C');
$pdf->Cell(55, 5, '', 0, 0, 'C');
$pdf->Ln(4);
$pdf->Cell(10, 5, '', 0, 'C', 1, 0, '', '', true);
$pdf->Cell(40, 5, 'INFRASTRUKTUR', 0, 0, 'C');
$pdf->Cell(60, 5, '', 0, 0, 'C');
$pdf->Cell(55, 5, '', 0, 0, 'C');
$pdf->Ln(19);
$pdf->Cell(10, 5, '', 0, 'C', 1, 0, '', '', true);
$pdf->Cell(40, 5, 'WAHYU BUDI SANTOSO', 0, 0, 'C');
$pdf->Cell(60, 5, '', 0, 0, 'C');
$pdf->Cell(55, 5, 'ARI YUANTI', 0, 0, 'C');
$pdf->Ln(4);
$pdf->Cell(10, 5, '', 0, 'C', 1, 0, '', '', true);
$pdf->Cell(40, 5, 'NIP . 1.06.01445', 0, 0, 'C');
$pdf->Cell(60, 5, '', 0, 0, 'C');
$pdf->Cell(55, 5, 'NIP . 1.09.01523', 0, 0, 'C');


// reset pointer to the last page
$pdf->lastPage();

//Close and output PDF document
$pdf->Output('penyelesaian_hw.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
