<?php
include_once "./library/cetak.php";

//Instantiance
$pdf=new PDF();
$pdf->SetFont('Arial','',14);
$pdf->AddPage();
$pdf->AliasNbPages();

//LoadData
$idKel=(int)$_GET['id'];
$periode=explode("/",$_GET['periode']);
$bulan=(int)$periode[0];
$tahun=(int)$periode[1];
$_SESSION['pub_kodeRoot']=0;
$_SESSION['pub_kodeParent']=0;										
$sqlFitur="	SELECT F.idFitur, F.value, F.kdKatParent, F.kdKatChild 
			FROM tbl_fitur F, tbl_kelurahan L, tbl_user U 
			WHERE L.idKel='$idKel' 
			AND L.idUser=U.idUser 
			AND F.idUser=U.idUser 
			AND F.bln='$bulan' 
			AND F.thn='$tahun'";
$queryFitur=mysql_query($sqlFitur,$general->opendb())or die($general->salah());
if($queryFitur != null) {									
	if(mysql_num_rows($queryFitur)>0) {
		while($rowFitur=mysql_fetch_array($queryFitur)) {
			if($rowFitur['kdKatParent']=="") {
				$kod=$rowFitur['kdKatChild'];
			}
			else {
				$kod=$rowFitur['kdKatParent'];
			}
			$sqlValueParent="	SELECT S.namaSatuan 
								FROM tbl_katparent P, tbl_satuan S 
								WHERE P.kdKatParent='$kod' 
								AND S.idSatuan=P.idSatuan";
			$queryValueParent=mysql_query($sqlValueParent,$general->opendb())or die($general->salah());
			if($queryValueParent != null) {
				if(mysql_num_rows($queryValueParent)==1) {
					$rowValue=mysql_fetch_array($queryValueParent);
				}
				else {
					$sqlValueChild="SELECT S.namaSatuan 
									FROM tbl_katchild P, tbl_satuan S 
									WHERE P.kdKatChild='$kod' 
									AND S.idSatuan=P.idSatuan";
					$queryValueChild=mysql_query($sqlValueChild,$general->opendb())or die($general->salah());
					if($queryValueChild != null) {
						if(mysql_num_rows($queryValueChild)==1) {
							$rowValue=mysql_fetch_array($queryValueChild);
						}
						else {
							$rowValue['namaSatuan']="";
						}
					}
				}
			}
			$kdKat=explode(".", $kod);
			$jmlh=count($kdKat);
			$kdKatRoot=$kdKat[0];
			$kdKatParent=$kdKat[0].".".$kdKat[1];
			if($jmlh==3) {
				$kdKatChild=$rowFitur['kdKatChild'];
			}
			if($_SESSION['pub_kodeRoot']!=$kdKatRoot) {
				$_SESSION['pub_j']=0;
				$_SESSION['pub_kodeRoot']=$kdKatRoot;
				$sqlRoot="	SELECT namaKatRoot 
							FROM tbl_katroot 
							WHERE kdKatRoot='$_SESSION[pub_kodeRoot]'";
				$queryRoot=mysql_query($sqlRoot,$general->opendb())or die($general->salah());
				if($queryRoot != null) {
					if(mysql_num_rows($queryRoot)==1) {
						$rowRoot=mysql_fetch_array($queryRoot);
						$dat=strtoupper($rowRoot['namaKatRoot']);
						$dataRoot=array("$kdKatRoot.","$dat",'','');
						$pdf->colorRoot();
						$w=$pdf->kategoriRoot($dataRoot);						
					}
				}
			}
			if($jmlh==2) {		
				$sqlParent="SELECT namaKatParent 
							FROM tbl_katparent 
							WHERE kdKatParent='$kdKatParent'";
				$queryParent=mysql_query($sqlParent,$general->opendb())or die($general->salah());
				if($queryParent != null) {
					if(mysql_num_rows($queryParent)==1) {
						$rowParent=mysql_fetch_array($queryParent);
					}
				}
				$dataParentNoChild=array('',"$kod.","$rowParent[namaKatParent]","$rowFitur[value]","$rowValue[namaSatuan]");
				$pdf->colorNonRoot();
				$w=$pdf->kategoriParentNoChild($dataParentNoChild);				
			}
			else {
				if($_SESSION['pub_kodeParent']!=$kdKatParent) {
					$_SESSION['pub_kodeParent']=$kdKatParent;
					$sqlParent="SELECT namaKatParent 
								FROM tbl_katparent 
								WHERE kdKatParent='$_SESSION[pub_kodeParent]'";
					$queryParent=mysql_query($sqlParent,$general->opendb())or die($general->salah());
					if($queryParent != null) {
						if(mysql_num_rows($queryParent)==1) {
							$rowParent=mysql_fetch_array($queryParent);
						}
					}
					$dataParentWithChild=array('',"$kdKatParent.","$rowParent[namaKatParent]",'','');
					$pdf->colorNonRoot();
					$w=$pdf->kategoriParentWithChild($dataParentWithChild);																			
				}
				$sqlChild="	SELECT namaKatChild 
							FROM tbl_katchild 
							WHERE kdKatChild='$kdKatChild'";
				$queryChild=mysql_query($sqlChild,$general->opendb())or die($general->salah());
				if($queryChild != null) {
					if(mysql_num_rows($queryChild)==1) {
						$rowChild=mysql_fetch_array($queryChild);
						if($kod=="21.b.3") {
							if($rowFitur['value']==1) {
								$val="Baik";
							}
							elseif($rowFitur['value']==2) {
								$val="Sedang";
							}
							elseif($rowFitur['value']==3) {
								$val="Kurang";
							}
							else {
								$val="";
							}																										
						}
						elseif($kod=="21.b.4") {
							$isi.="
							<td width=\"100\" style=\"text-align: right; padding-right: 5px;\">";
							if($rowFitur['value']==1) {
								$val="Milik Desa";
							}
							elseif($rowFitur['value']==2) {
								$val="Milik Pemda";
							}
							else {
								$val="";
							}
						}
						else {
							$val=$rowFitur['value'];
						}
						$dataChild=array('','',"$kod.","$rowChild[namaKatChild]","$val","$rowValue[namaSatuan]");
						$pdf->colorNonRoot();
						$w=$pdf->kategoriChild($dataChild);						
					}
				}
			}									
		}
	}
}
//Akhir LoadData

$pdf->renderCell($w);
$pdf->Output();

?>