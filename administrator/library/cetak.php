<?php
include_once "./library/fpdf/fpdf.php";

class PDF extends FPDF {
	function kategoriRoot($data) {
		//Kategori Root
	    $w=array(7,138,20,25);
	    for($i=0;$i<count($data);$i++){
	        $this->Cell($w[$i],7,$data[$i],1,0,'L',1);
		}
	    $this->Ln();
		//Akhir Kategori Root
		return $w;
	}
	
	function kategoriParentWithChild($data) {
		//Kategori Parent With Child
	    $w=array(7,10,128,20,25);
	    for($i=0;$i<count($data);$i++){
	        $this->Cell($w[$i],7,$data[$i],1,0,'L',1);
		}
	    $this->Ln();
		//Akhir Kategori Child
		return $w;
	}
	
	function kategoriParentNoChild($data) {
		//Kategori Parent No Child
	    $w=array(7,10,128,20,25);
	    for($i=0;$i<count($data);$i++){
			if($i==3) {
				$letak="R";
			}
			else {
				$letak="L";
			}
			$this->Cell($w[$i],7,$data[$i],1,0,$letak,1);
		}
	    $this->Ln();
		//Akhir Kategori Child
		return $w;
	}
	
	function kategoriChild($data) {
		//Kategori Child
	    $w=array(7,10,13,115,20,25);		
	    for($i=0;$i<count($data);$i++){
	        if($i==4) {
				$letak="R";
			}
			else {
				$letak="L";
			}
			$this->Cell($w[$i],7,$data[$i],1,0,$letak,1);
		}
	    $this->Ln();		
		//Akhir Kategori Child
		return $w;
	}
	
	function colorRoot() {
		//Colors, line width and bold font
	    $this->SetFillColor(0,0,0);
	    $this->SetTextColor(255,255,255);
	    $this->SetDrawColor(150,150,150);
	    $this->SetLineWidth(0.4);
	    $this->SetFont('','B',10);
	}
	
	function colorNonRoot() {
		//Color and font restoration
	    $this->SetFillColor(224,235,255);
	    $this->SetTextColor(0);
		$this->SetDrawColor(150,150,150);
	    $this->SetLineWidth(0.4);
	    $this->SetFont('','',10);
	}
	
	function renderCell($w) {
		$this->Cell(array_sum($w),0,'','T');
	}
	
	//Page header
	function Header() {
		
	}

	//Page footer
	function Footer() {
	    //Position at 1.5 cm from bottom
	    $this->SetY(-15);
	    //Arial italic 8
	    $this->SetFont('Arial','I',8);
	    //Page number
	    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
	}
}
?>