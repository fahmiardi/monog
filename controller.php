<?php
	session_start();
	include_once "./config/config.php";
	include_once "./library/fungsiGeneral.php";
	include_once "./library/kelasHome.php";
	include_once "./library/kelasMonografi.php";
	include_once "./library/fpdf/fpdf.php";
	include_once "./library/cetak.php";
	
	$home=new Home();
	$layout=new Layout();
	$general=new General();
	
	$id=(int)$_GET['id'];
	$ref=$_GET['ref'];
	
	if(isset($id) && $id!="") {
		$sqlId="SELECT D.namaKel, K.namaKec, D.lastUpdate 
				FROM tbl_kelurahan D, tbl_kecamatan K 
				WHERE D.idKel='$id' 
				AND D.idKec=K.idKec";
		$queryId=mysql_query($sqlId,$general->opendb())or die($general->salah());
		if($queryId != null) {
			if(mysql_num_rows($queryId)==1) {
				$rowId=mysql_fetch_array($queryId);
				$_SESSION['pub_desa']=$rowId['namaKel'];
				$_SESSION['pub_kecamatan']=$rowId['namaKec'];
				$_SESSION['pub_lastUpdate']=$general->formatTanggal($rowId['lastUpdate']);
			}
		}
	}
	
	if(isset($ref)&&$ref!="") {
		switch($ref) {
			case 'home':				
				include_once "./home.php";
				break;
			case 'visimisi':				
				include_once "./visimisi.php";
				break;
			case 'mottolambang':				
				include_once "./mottolambang.php";
				break;
			case 'struktur':				
				include_once "./struktur.php";
				break;
			case 'monografi':				
				include_once "./front.php";
				break;
			case 'fitur':				
				if(isset($_GET['mode'])) {
					switch($_GET['mode']) {
						case 'View':
							switch($_GET['view']) {
								case 'Full':
									break;
								default:
							}
							break;
						case 'Cetak':								
							break;
						default:							
					}
				}
				include_once "./monografi.php";
				break;
			case 'statistik':
				include_once "./statistik.php";				
				break;
		}
	}
?>