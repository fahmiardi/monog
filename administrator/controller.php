<?php
	session_start();
	include_once "../config/config.php";
	include_once "./library/fungsiGeneral.php";
	include_once "./library/kelasLayout.php";
	include_once "./library/cetak.php";
	
	$layout=new Layout();
	$general=new General();
	
	$ref=$_GET['ref'];
	$token=$_SESSION['token'];
	$userid=$general->filter($_POST['userid']);
	$password=$general->filter($general->Encrypt($_POST['password']));
	
	$id=(int)$_GET['id'];
	if(isset($id) && $id!="") {
		$sqlId="SELECT D.namaKel, K.namaKec, D.lastUpdate 
				FROM tbl_kelurahan D, tbl_kecamatan K 
				WHERE D.idKel='$id' 
				AND D.idKec=K.idKec";
		$queryId=mysql_query($sqlId,$general->opendb())or die($general->salah());
		if($queryId != null) {
			if(mysql_num_rows($queryId)==1) {
				$rowId=mysql_fetch_array($queryId);
				$_SESSION['desa']=$rowId['namaKel'];
				$_SESSION['kecamatan']=$rowId['namaKec'];
				$_SESSION['lastUpdate']=$general->formatTanggal($rowId['lastUpdate']);
			}
		}
	}
	
	if(isset($ref)&&$ref!="") {
		switch($ref) {
			case 'login': 
				if($general->otentikasi($token)) {
					header("Location: ./page.php?ref=home&token=$token");
				}
				else {
					include_once "./login.php";
				}
				break;
			case 'auth_login': 
				if(isset($userid) && $userid!="" && isset($password) && $password!="") {
					$sqlLogin="	SELECT idUser 
								FROM tbl_user 
								WHERE username='$userid' 
								AND password='$password'";
					$queryLogin=mysql_query($sqlLogin,$general->opendb())or die($general->salah());
					if($queryLogin != null) {
						if(mysql_num_rows($queryLogin)==1) {
							$rowLogin=mysql_fetch_array($queryLogin);
							$_SESSION['token']=$general->createRandomToken();
							$sqlToken="	UPDATE tbl_user 
										SET userToken='$_SESSION[token]' 
										WHERE idUser='$rowLogin[idUser]'";
							$queryToken=mysql_query($sqlToken,$general->opendb())or die($general->salah());
							if($queryToken != null) {
								header("Location: ./page.php?ref=home&token=$_SESSION[token]");
							}
						}
						else {							
							header("Location: ./page.php?ref=login&alert=wrong");
						}
					}
				}
				else {
					header("Location: ./page.php?ref=login&alert=empty");
				}
				break;
			case 'home':
				if($general->otentikasi($token) && $_GET['token']==$token) {					
					include_once "./front.php";
				}
				else {
					$general->emptyToken($token);
					header("Location: ./page.php?ref=login&alert=session_error");
				}
				break;
			case 'fitur':
				if($general->otentikasi($token) && $_GET['token']==$token) {
					if(isset($_GET['mode'])) {
						switch($_GET['mode']) {
							case 'Input':	
								if($general->manipulasi($_SESSION['token'],$_GET['id'])) {
									switch($_GET['act']) {
										case 'generate':
											break;
										case 'execute':
											break;
										default:
											$general->emptyToken($token);
											header("Location: ./page.php?ref=login&alert=session_error");
									}
								}
								else {
									$general->emptyToken($token);
									header("Location: ./page.php?ref=login&alert=session_error");
								}
								break;
							case 'View':
								switch($_GET['view']) {
									case 'Full':
										break;
									case 'Part':
										break;
									default:
										$general->emptyToken($token);
										header("Location: ./page.php?ref=login&alert=session_error");
								}
								break;
							case 'Edit':
								if($general->manipulasi($_SESSION['token'],$_GET['id'])) {
									switch($_GET['view']) {
										case 'Full':
											switch($_GET['act']) {
												case 'edit':
													break;
												case 'update':
													break;
												default:
													$general->emptyToken($token);
													header("Location: ./page.php?ref=login&alert=session_error");
											}
											break;
										case 'Part':
											break;
										default:
											$general->emptyToken($token);
											header("Location: ./page.php?ref=login&alert=session_error");
									}
								}
								else {
									$general->emptyToken($token);
									header("Location: ./page.php?ref=login&alert=session_error");
								}
								break;
							case 'Cetak':								
								break;
							default:
								$general->emptyToken($token);
								header("Location: ./page.php?ref=login&alert=session_error");
						}
					}
					include_once "./konten_fitur.php";
				}
				else {
					$general->emptyToken($token);
					header("Location: ./page.php?ref=login&alert=session_error");
				}
				break;
			
			//Menu Mastering Data
			case 'kecamatan':
				if($general->tokenID($_SESSION['token'])==1) {
					if($general->otentikasi($token) && $_GET['token']==$token) {		
						if(isset($_GET['mode'])) {
							switch($_GET['mode']) {
								case 'Input':	
									switch($_GET['act']) {
										case 'do':
											break;
										case 'execute':
											break;
										default:
											$general->emptyToken($token);
											header("Location: ./page.php?ref=login&alert=session_error");
									}
									break;
								case 'View':	
									break;
								case 'Edit':	
									switch($_GET['act']) {
										case 'do':
											break;
										case 'update':
											break;
										case 'hapus':											
											break;
										default:
											$general->emptyToken($token);
											header("Location: ./page.php?ref=login&alert=session_error");
									}
									break;
								default:
									$general->emptyToken($token);
									header("Location: ./page.php?ref=login&alert=session_error");
							}
						}
						include_once "./data_kecamatan.php";
					}
					else {
						$general->emptyToken($token);
						header("Location: ./page.php?ref=login&alert=session_error");
					}
				}
				else {
					header("Location: ./page.php?ref=home&token=$_SESSION[token]");
				}
				break;
			case 'desa':
				if($general->tokenID($_SESSION['token'])==1) {
					if($general->otentikasi($token) && $_GET['token']==$token) {					
						include_once "./data_desa.php";
					}
					else {
						$general->emptyToken($token);
						header("Location: ./page.php?ref=login&alert=session_error");
					}
				}
				else {
					header("Location: ./page.php?ref=home&token=$_SESSION[token]");
				}
				break;
			case 'account':
				if($general->otentikasi($token) && $_GET['token']==$token) {					
					include_once "./data_account.php";
				}
				else {
					$general->emptyToken($token);
					header("Location: ./page.php?ref=login&alert=session_error");
				}
				break;
			case 'kategori':
				if($general->tokenID($_SESSION['token'])==1) {
					if($general->otentikasi($token) && $_GET['token']==$token) {					
						include_once "./data_kategori.php";
					}
					else {
						$general->emptyToken($token);
						header("Location: ./page.php?ref=login&alert=session_error");
					}
				}
				else {
					header("Location: ./page.php?ref=home&token=$_SESSION[token]");
				}
				break;
			case 'satuan':
				if($general->tokenID($_SESSION['token'])==1) {
					if($general->otentikasi($token) && $_GET['token']==$token) {					
						include_once "./data_satuan.php";
					}
					else {
						$general->emptyToken($token);
						header("Location: ./page.php?ref=login&alert=session_error");
					}
				}
				else {
					header("Location: ./page.php?ref=home&token=$_SESSION[token]");
				}
				break;
			case 'monografi':
				if($general->otentikasi($token) && $_GET['token']==$token) {					
					include_once "./data_monografi.php";
				}
				else {
					$general->emptyToken($token);
					header("Location: ./page.php?ref=login&alert=session_error");
				}
				break;
			//Akhir Menu Mastering Data
			
			case 'statistik':
				if($general->otentikasi($token) && $_GET['token']==$token) {					
					include_once "./data_statistik.php";
				}
				else {
					$general->emptyToken($token);
					header("Location: ./page.php?ref=login&alert=session_error");
				}
				break;
			case 'logout':
				$general->emptyToken($token);
				header("Location: page.php?ref=login&alert=logout");
				break;
			default:
				$general->emptyToken($token);
				header("Location: ./page.php?ref=login&alert=session_error");
		}
	}
	else {
		$general->emptyToken($token);
		header("Location: ./page.php?ref=login");
	}
?>