<?php
//require_once('tcpdf_include.php');
class MYPDF extends TCPDF {
	//Page header
	public function Header() {
		$this->Image('assets/img/Logo_PENS.png',13,10,23);
		$this->SetFont('helvetica', 'B', 10);
		$this->SetY(10);
		$this->Cell(25);
		
		// Judul
		 $this->Cell(0, 15, 'KEMENTERIAN RISET, TEKNOLOGI, DAN PENDIDIKAN TINGGI', 0, false, 'C', 0, '', 0, false, 'M', 'M');
		 $this->Cell(25);
		 $this->Cell(20,5,'POLITEKNIK ELEKTRONIKA NEGERI SURABAYA',0,1,'L');
		 $this->Cell(25);
		 
		// $this->Cell(10,5,'KEMENTERIAN RISET, TEKNOLOGI, DAN PENDIDIKAN TINGGI',0,1,'L');
		// $this->Cell(25);
		// $this->Cell(20,5,'POLITEKNIK ELEKTRONIKA NEGERI SURABAYA',0,1,'L');
		// $this->Cell(25);
		// $this->Cell(10,5,'KOTA SURABAYA',0,1,'L');
	}

	// Page footer
	/*public function Footer() {
		$this->SetY(-5);
		$this->SetFont('helvetica', 'I', 8);
		$this->Cell(0, 5, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
	}*/
}

$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

$pdf->AddPage();
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
$pdf->SetFillColor(255, 255, 255);
		$pdf->SetFont('helvetica', 'B', 10);
		$pdf->Ln(3);
		$pdf->Cell(190, 0, '', 1, 'C', 1, '', 0, false, 'T', 'C');
		$pdf->Ln(1);
		$pdf->Cell(190, 0, '', 1, 'C', 1, '', 0, false, 'T', 'C');
		$pdf->Ln(1);
		$pdf->Cell(190,5,'DAFTAR KEGIATAN MAHASISWA',0,1,'C');
		$pdf->Ln(1);
		$pdf->Cell(190, 0, '', 1, 'C', 1, '', 0, false, 'T', 'C');
		$pdf->Ln(1);
		//foreach($data as $result){
			$pdf->setFont('helvetica','',9);
			$pdf->setFillColor(255,255,255);
			$pdf->cell(190,12,'',1,0,'L',0);
			$pdf->Ln(1);
			$pdf->Cell(42,5,'  Tanggal Pengajuan*','','','L');
			$pdf->Cell(5,5,':','','','L');
			//$pdf->cell(30,5,$result->pengajuan,0,0,'C',0);
			$pdf->cell(35,5,'','',0,'C',0);
			$pdf->Cell(22,5,'  Bagian   :','','','L');
			//$pdf->cell(50,5,$result->nama_bagian,1,0,'C',0);
			$pdf->Ln(5);
			$pdf->Cell(42,5,'  Tanggal Diterima TSI','','','L');
			$pdf->Cell(5,5,':','','','L');
			//$pdf->cell(30,5,$result->tgl_diterima_TSI,0,0,'C',0);
		
			$pdf->Ln(6.5);
			$pdf->cell(190,31,'',1,'','L',0);
				//$pdf->Cell(10,1,'',0,1,'L');
				$pdf->Ln(1);
				$pdf->cell(1,5,'','',0,'C',0);
				$pdf->cell(50,5,'Manager (Terkait)',1,0,'C',0);
				$pdf->cell(1,5,'','',0,'C',0);
				$pdf->cell(50,5,'Diajukan Oleh',1,0,'C',0);
				$pdf->cell(1,5,'','',0,'C',0);
				$pdf->cell(86,5,'klasifikasi perbaikan',1,0,'C',0);
				$pdf->Ln(6);
				$pdf->cell(1,5,'','',0,'C',0);
				$pdf->cell(50,18,'',1,0,'C',0);
				$pdf->cell(1,5,'','',0,'C',0);
				$pdf->cell(50,18,'',1,0,'C',0);
				$pdf->cell(1,5,'','',0,'C',0);
				$pdf->cell(86,23,'',1,'','L',0);
					$pdf->Cell(10,3,'',0,1,'L');
					$pdf->Cell(106,5,'','','','L');
					$pdf->Cell(20,5,'Jenis','','','L');
					$pdf->Cell(5,5,':','','','L');
					//$pdf->cell(40,5,' '.$result->jenis,0,0,'L',0);
					$pdf->Cell(10,8,'',0,1,'L');
					$pdf->Cell(106,5,'','','','L');
					$pdf->Cell(20,5,'Spesifikasi','','','L');
					$pdf->Cell(5,5,':','','','L');
					//$pdf->cell(40,5,' '.$result->klasifikasi,0,0,'L',0);
				$pdf->Ln(6);
				$pdf->cell(1,5,'','',0,'C',0);
				//$pdf->cell(50,5,'NIP : '.$result->manajer_terkait,1,0,'L',0);
				$pdf->cell(1,5,'','',0,'C',0);
				//$pdf->cell(50,5,'NIP : '.$result->pemohon,1,0,'L',0);
			$pdf->Ln(6);
			
			//$uraian = '<b>Uraian Permohonan  :</b><br>'.$result->uraian.'<br>';
			//$pdf->writeHTMLCell(190, 20, '', '', $uraian, 1, 1, 1, true, 'J', true);
			
			$pdf->SetFont('helvetica', 'B', 10);
			$pdf->Cell(190, 0, '', 1, 'C', 1, '', 0, false, 'T', 'C');
			$pdf->Ln(1);
			$pdf->Cell(190, 0, '', 1, 'C', 1, '', 0, false, 'T', 'C');
			$pdf->Ln(1);
			$pdf->Cell(190,5,'TINDAK LANJUT PERMOHONAN',0,1,'C');
			$pdf->Ln(1);
			$pdf->Cell(190, 0, '', 1, 'C', 1, '', 0, false, 'T', 'C');
			$pdf->Ln(1);
			
			
			$pdf->cell(190,60,'',1,0,'L',0);
			$pdf->Ln(1);
			$pdf->setFont('helvetica','',10);
			$pdf->cell(1,5,'','',0,'C',0);
			$pdf->cell(91,25,'',1,0,'C',0);
			$pdf->cell(1,5,'','',0,'C',0);
			$pdf->cell(96,5,'Estimasi Penyelesaian',1,0,'C',0);
			// if($result->tgl_analisa=='0000-00-00'){
			// 	$result->tgl_analisa = '-' ;
			// }
			$pdf->Ln(6);
			$pdf->Cell(45,5,'  Tanggal Selesai Analisa','','','L');
			$pdf->Cell(6,5,':','','','L');
			//$pdf->cell(39,5,' '.$result->tgl_analisa,0,0,'L',0);
			$pdf->Cell(3,5,'','','','L');
			$pdf->cell(96,19,'',1,'','L',0);	
			$pdf->Ln(5);
			$pdf->Cell(2,2,'','','','L');
			$pdf->Cell(43,5,'Hasil Analisa','','','L');
			$pdf->Cell(6,5,':','','','L');
			// $nip_mng = $result->manager_TSI;
			// $nip_spv = $result->spv_infrastruktur_TSI;
			// if($result->hasil_analisa=='1'){
			// 	$result->hasil_analisa='dapat di perbaiki';
			// 	$result->hasil_analisa2='tanpa sparepart';
			// 	$result->sparepart = '';
			// 	$result->tgl_order = '';
			// 	$result->tgl_diterima_TSI = '';
			// 	$nip_mng = '';
			// 	$nip_spv = '';
			// }
			// else if($result->hasil_analisa=='2'){
			// 	$result->hasil_analisa='dapat di perbaiki';
			// 	$result->hasil_analisa2='perlu sparepart';
			// }
			// else if($result->hasil_analisa=='3'){
			// 	$result->hasil_analisa='tidak dapat di perbaiki';
			// 	$result->hasil_analisa2='';
			// }
			// else{
			// 	$result->hasil_analisa='belum di analisa';
			// 	$result->hasil_analisa2='';
			// 	$result->sparepart = '';
			// 	$result->tgl_order = '';
			// 	$result->tgl_diterima_TSI = '';
			// 	$nip_mng = '';
			// 	$nip_spv = '';
			// }
			// $pdf->cell(39,5,' '.$result->hasil_analisa,0,0,'L',0);
			$pdf->Cell(7,4.5,'','','','L');
			$pdf->Cell(20,5,'PIC','','','L');
			$pdf->Cell(5,5,':','','','L');
			//$pdf->cell(65,5,' '.$result->nama_pelaksana,0,0,'L',0);
			$pdf->Cell(2,4.5,'',0,1,'L');
			$pdf->Cell(51,5,'','','','L');
			//$pdf->cell(39,5,' '.$result->hasil_analisa2,0,0,'L',0);
			$pdf->Cell(7,4.5,'','','','L');
			$pdf->Cell(20,5,'Hari Kerja','','','L');
			$pdf->Cell(5,5,':','','','L');
			//$pdf->cell(40,5,' '.$result->estimasi_hari_kerja.' Hari',0,0,'L',0);
			$pdf->Cell(1,4,'',0,1,'L');
			$pdf->Cell(97,4.5,'','','','L');
			$pdf->Cell(20,5,'Jam','','','L');
			$pdf->Cell(5,5,':','','','L');
			//$pdf->cell(40,5,' '.$result->estimasi_jam.' Jam',0,0,'L',0);
			$pdf->Ln(5);
					
			$pdf->cell(1,5,'','',0,'C',0);
			$pdf->cell(91,33,'',1,0,'L',0);
			$pdf->cell(1,5,'','',0,'C',0);
			$pdf->cell(48,10,'',1,0,'C',0);
			$pdf->cell(48,10,'',1,0,'C',0);
			$pdf->Ln(0);
			$pdf->cell(91,'','',0,0,'L',0);
			$pdf->cell(1,5,'','',0,'C',0);
			$pdf->Cell(48,5,'  Menyetujui,','','','C');
			$pdf->Cell(48,5,'  Penanggung Jawab,','','','C');
			$pdf->Ln(5);
			$pdf->Cell(45,5,'  Nama Sparepart','','','L');
			$pdf->Cell(6,5,':','','','L');
			//$pdf->cell(39,5,' '.$result->sparepart,0,0,'L',0);
			$pdf->cell(1,'','','',0,'C',0);
			$pdf->Cell(48,5,'  Manager TSI','','','C');
			$pdf->Cell(48,5,'  Supervisor Infrastruktur','','','C');
			$pdf->Ln(5);
			$pdf->Cell(45,5,'  Tanggal Order Sparepart','','','L');
			$pdf->Cell(6,5,':','','','L');
			//$pdf->cell(39,5,' '.$result->tgl_order,0,0,'L',0);
			$pdf->cell(3,5,'','',0,'C',0);
			$pdf->cell(48,18,'',1,0,'C',0);
			$pdf->cell(48,18,'',1,0,'C',0);
			$pdf->Ln(5);
			$pdf->Cell(45,5,'  Tanggal terima Sparepart','','','L');
			$pdf->Cell(6,5,':','','','L');
			//$pdf->cell(39,5,' '.$result->tgl_diterima_TSI,0,0,'L',0);
			$pdf->Ln(13);
			$pdf->cell(91,'','',0,0,'L',0);
			$pdf->cell(2,4,'','',0,'C',0);
			//$pdf->cell(48,5,'NIP : '.$nip_mng,1,0,'L',0);
			//$pdf->cell(48,5,'NIP : '.$nip_spv,1,0,'L',0);
			
			$pdf->Ln(6);		
			//$TL = '<b>TINDAK LANJUT PERMOHONAN  :</b><br>'.$result->uraian_tindaklanjut_hw.'<br>';
			//$pdf->writeHTMLCell(190, 15, '', '', $TL, 1, 1, 1, true, 'J', true);
			
			$pdf->SetFont('helvetica', 'B', 10);
			$pdf->Cell(190, 0, '', 1, 'C', 1, '', 0, false, 'T', 'C');
			$pdf->Ln(1);
			$pdf->Cell(190, 0, '', 1, 'C', 1, '', 0, false, 'T', 'C');
			$pdf->Ln(1);
			$pdf->Cell(190,5,'USER ACCEPTANCE TESTING',0,1,'C');
			$pdf->Ln(1);
			$pdf->Cell(190, 0, '', 1, 'C', 1, '', 0, false, 'T', 'C');
			$pdf->Ln(1);
									
			$pdf->cell(190,38,'',1,0,'L',0);
			$pdf->Ln(1);
			$pdf->setFont('helvetica','',10);
			$pdf->cell(1,5,'','',0,'C',0);
			$pdf->cell(91,36,'',1,0,'C',0);
			$pdf->cell(1,5,'','',0,'C',0);
			$pdf->cell(96,5,'Tanda Tangan',1,0,'C',0);
			$pdf->Ln(5);
			$pdf->cell(2,5,'','',0,'C',0);
			$pdf->Cell(45,5,'Tanggal Selesai Pelaksanaan','','','L');
			$pdf->Cell(6,5,'','','','L');
			// if ($result->tgl_selesai_pelaksanaan=='0000-00-00'){
			// 	$result->tgl_selesai_pelaksanaan='-';
			// }
			//$pdf->cell(38,5,':    '.$result->tgl_selesai_pelaksanaan,0,0,'L',0);
			$pdf->Cell(2,5,'','','','L');
			$pdf->cell(48,5,' Atasan Langsung',1,0,'C',0);
			$pdf->cell(48,5,' User Pelaksana Test',1,0,'C',0);
			$pdf->Ln(5);
			$pdf->cell(2,2,'','',0,'C',0);
			$pdf->Cell(90,5,'','','','L');
			$pdf->Cell(1,5,'','','','L');
			$pdf->cell(48,21,'',1,0,'L',0);
			$pdf->cell(48,21,'',1,0,'L',0);
				
			// if ($result->tgl_confirm_uat=='0000-00-00'){
			// 	$result->tgl_confirm_uat='-';
			// }
			$pdf->Cell(1,1,'',0,1,'L');
			$pdf->cell(2,2,'','',0,'C',0);
			$pdf->Cell(43,5,'Tanggal Pelaksanaan UAT','','','L');
			$pdf->Cell(8,3,'','','','L');
			//$pdf->cell(38,5,':    '.$result->tgl_confirm_uat,0,0,'L',0);
			// if($result->status_uat=='0'&&$result->status_permohonan<8){
			// 	$result->status_uat='-';
			// }else if($result->status_uat=='1'){
			// 	$result->status_uat='OK';
			// }else{
			// 	$result->status_uat='NOT OK';
			// }
					
			$pdf->Ln(6);
			$pdf->cell(2,2,'','',0,'C',0);
			$pdf->Cell(43,5,'Status','','','L');
			$pdf->Cell(8,5,'','','','L');
			//$pdf->cell(38,5,':    '.$result->status_uat,0,0,'L',0);
			$pdf->Ln(10.5);
			$pdf->Cell(93,5,'','','','L');
			// if($result->manajer_terkait == 0){
			// 	$result->manajer_terkait ='';
			// }
			//$pdf->cell(48,5,' NIP : '.$result->manajer_terkait,1,0,'L',0);
				
			// if($result->pemohon == 0){
			// 	$result->pemohon ='';
			// }
			//$pdf->cell(48,5,' NIP : '.$result->pemohon,1,0,'L',0);
			$pdf->Ln(6);

			
			$pdf->SetFont('helvetica', 'B', 10);
			$pdf->Cell(190, 0, '', 1, 'C', 1, '', 0, false, 'T', 'C');
			$pdf->Ln(1);
			$pdf->Cell(190, 0, '', 1, 'C', 1, '', 0, false, 'T', 'C');
			$pdf->Ln(1);
			$pdf->Cell(190,5,'LEGALISASI PENYELESAIAN PERMOHONAN',0,1,'C');
			$pdf->Ln(1);
			$pdf->Cell(190, 0, '', 1, 'C', 1, '', 0, false, 'T', 'C');
			$pdf->Ln(1);
			$pdf->cell(1,5,'',0,0,'C',0);
			$pdf->cell(47,5,'Manager TSI',1,0,'C',0);
			$pdf->cell(47,5,'SPV Infrastruktur TSI',1,0,'C',0);
			$pdf->cell(47,5,'Pelaksana',1,0,'C',0);
			$pdf->cell(47,5,'User',1,0,'C',0);
		
			$pdf->Ln(5);
			$pdf->cell(1,'','','',0,'C',0);
			$pdf->cell(47,18,'',1,0,'C',0);
			$pdf->cell(47,18,'',1,0,'C',0);
			$pdf->cell(47,18,'',1,0,'C',0);
			$pdf->cell(47,18,'',1,0,'C',0);
			$pdf->Ln(18);
			$pdf->cell(1,'','','',0,'C',0);
			// $pdf->cell(47,5,'NIP : '.$result->manager_TSI,1,0,'L',0);
			// $pdf->cell(47,5,'NIP : '.$result->spv_infrastruktur_TSI,1,0,'L',0);
			// $pdf->cell(47,5,'NIP : '.$result->pelaksana,1,0,'L',0);
			// $pdf->cell(47,5,'NIP : '.$result->pemohon,1,0,'L',0);
		
		//}



// reset pointer to the last page
$pdf->lastPage();

//Close and output PDF document
$pdf->Output('pdf_hw.pdf', 'I');