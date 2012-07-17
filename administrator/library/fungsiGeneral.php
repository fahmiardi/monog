<?php
	class General {		
		//Pesan Error
		function salah() {
			$error=mysql_error();
			return $error;
		}
		
		//buka koneksi ke db
		function opendb() {
			global $host;
			global $user;
			global $pass;
			global $db;
			$conn=mysql_connect($host, $user, $pass);
			mysql_select_db($db);
			return $conn;
		}
		
		//tutup koneksi db
		function closedb() {
			return mysql_close($this->opendb());
		}
		
		function emptyToken($token) {
			if(isset($token)&&$token!="") {
				$sql="UPDATE tbl_user SET userToken='' WHERE userToken='$token'";
				$query=mysql_query($sql,$this->opendb())or die($this->salah());
				session_destroy();
			}
			else {
				session_destroy();	
			}
		}
		
		//Otentikasi Login
		function otentikasi($token) {
			$auth=false;
			if(strpos($token, ';')) {
				die('Naughty...');
			}	
			$sqlAuth="	SELECT userToken 
						FROM tbl_user 
						WHERE userToken='$token'";
			$queryAuth=mysql_query($sqlAuth,$this->opendb())or die($this->salah());
			if($queryAuth != null) {
				if(mysql_num_rows($queryAuth)==1) {
					$auth=true;
				}
			}
			return $auth;
			$this->closedb();
		}
		
		//ID Hak
		function tokenID($tokenAh) {
			$sqlTokenID="SELECT idHak FROM tbl_user WHERE userToken='$tokenAh'";
			$queryTokenID=mysql_query($sqlTokenID,$this->opendb())or die($this->salah());
			if($queryTokenID != null) {
				if(mysql_num_rows($queryTokenID)==1) {
					$rowTokenID=mysql_fetch_array($queryTokenID);
					$tokenCaw=$rowTokenID['idHak'];
				}
				else {
					$tokenCaw="Kosong";	
				}
			}
			return $tokenCaw;
		}
		//Akhir ID Hak

		//funsi tanggal ex: minggu, 13 juni 2009
		function tanggal() {
			$hari = array("Minggu","Senin","Selasa","Rabu","Kamis","Jum'at","Sabtu");
			$bulan = array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","Nopember","Desember");
			$now_hari=date('w');
			$now_tgl=date('d');
			$now_bln=(int)date('m');
			$now_thn=date('Y');
			$hasil=$hari[$now_hari].", ".$now_tgl." ".$bulan[$now_bln]." ".$now_thn;
			return $hasil;
		}
		
		function formatTanggal($tgl) {//ex. 1/1/2009
			$split=explode("-",$tgl);
			$hasil=$split[2]."/".$split[1]."/".$split[0];
			return $hasil;
		}
		
		//ngebuat token
		function createRandomToken() { 
			$sumber = "abcdefghijkmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789"; 
			srand((double)microtime()*1000000);
			$i = 0; 
			while ($i <= 5)  { 
				$num = rand() % 33; 
				$char = substr($sumber, $num, 1); 
				if (!strstr($token, $char)) { 
					$token .= $char; 
					$i++; 
				} 
			} 
			return $token; 
		}
		
		function createRandomUname() { 
			$sumber = "abcdefghijkmnopqrstuvwxyz0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ"; 
			srand((double)microtime()*date("mdYHis"));
			$i = 0; 
			while ($i <= 5)  { 
				$num = rand() % 33; 
				$char = substr($sumber, $num, 1); 
				if (!strstr($token, $char)) { 
					$token .= $char; 
					$i++; 
				} 
			} 
			return $token; 
		}
		
		function createRandomPwd() { 
			$sumber = "0123456789abcdefghijkmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"; 
			srand((double)microtime()*date("mdYHis"));
			$i = 0; 
			while ($i <= 5)  { 
				$num = rand() % 33; 
				$char = substr($sumber, $num, 1); 
				if (!strstr($token, $char)) { 
					$token .= $char; 
					$i++; 
				} 
			} 
			return $token; 
		}
		
		function createRandomUser() { 
			$sumber = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijkmnopqrstuvwxyz"; 
			srand((double)microtime()*date("mdYHis"));
			$i = 0; 
			while ($i <= 5)  { 
				$num = rand() % 33; 
				$char = substr($sumber, $num, 1); 
				if (!strstr($token, $char)) { 
					$token .= $char; 
					$i++; 
				} 
			} 
			return $token; 
		}
		
		//fungsi untuk menangani karakter khusus
		//@return string yang sudah di-escape
		function myMagic($str){
			if(get_magic_quotes_gpc()){
				$str = stripslashes($str);
			}
			$str = strip_tags(trim($str));
			$this->opendb();
			return mysql_real_escape_string($str);
		}
		
		//filterisasi string dari inputan
		function filter($word) { 
			$word = (string)$this->myMagic(stripslashes(trim($word))); 
			$word = (string)nl2br($word); 
			$word = (string)htmlentities($word); 
			return $word ; 
		}
		
		//encrypt  string
		function Encrypt($str) {
			$cipher = crypt(md5($str),md5($str)) ;
			return $cipher; 
		} 
		
		function manipulasi($token,$idKel) {
			$hak=$this->tokenID($token);
			if($hak==1) {
				$edit=true;
			}
			elseif($hak==2) {
				$sqlUser="	SELECT L.idKel 
							FROM tbl_user U, tbl_kelurahan L, tbl_kecamatan K 
							WHERE U.userToken='$token' 
							AND U.idUser=K.idUser 
							AND K.idKec=L.idKec 
							AND L.idKel='$idKel'";
				$queryUser=mysql_query($sqlUser,$this->opendb())or die($this->salah());
				if($queryUser != null) {
					if(mysql_num_rows($queryUser)==1) {
						$edit=true;
					}
				}
			}
			else {
				$sqlUser="	SELECT L.idKel 
							FROM tbl_user U, tbl_kelurahan L 
							WHERE U.userToken='$token' 
							AND U.idUser=L.idUser 
							AND L.idKel='$idKel'";
				$queryUser=mysql_query($sqlUser,$this->opendb())or die($this->salah());
				if($queryUser != null) {
					if(mysql_num_rows($queryUser)==1) {
						$edit=true;
					}
				}
			}
			return $edit;
		}
		
		function generateFitur($idKel, $thn, $bln) {
			$kel=$this->getUser($idKel);
			$generate=true;
			$sqlUser="	SELECT idUser 
						FROM tbl_fitur 
						WHERE idUser='$kel' 
						AND bln='$bln' 
						AND thn='$thn'";
			$queryUser=mysql_query($sqlUser,$this->opendb())or die($this->salah());
			if($queryUser != null) {
				if(mysql_num_rows($queryUser)>0) {
					$generate=false;
				}				
			}
			return $generate;
		}
		
		function setLastUpdate($idUser) {
			$tglNow=date("Y-m-d");
			$sqlKel="UPDATE tbl_kelurahan SET lastUpdate='$tglNow' WHERE idUser='$idUser'";
			$queryKel=mysql_query($sqlKel,$this->opendb())or die($this->salah());
		}
		
		function getUser($idKel) {
			$sqlUser="	SELECT idUser 
						FROM tbl_kelurahan L 
						WHERE idKel='$idKel'";
			$queryUser=mysql_query($sqlUser,$this->opendb())or die($this->salah());
			if($queryUser != null) {
				if(mysql_num_rows($queryUser)==1) {
					$rowUser=mysql_fetch_array($queryUser);
					$idUser=$rowUser['idUser'];
				}
			}
			return $idUser;
		}
		
		function getUserKec($token) {			
			$sqlUser="	SELECT K.idKec 
						FROM tbl_user U, tbl_kecamatan K 
						WHERE U.userToken='$token' 
						AND U.idUser=K.idUser";
			$queryUser=mysql_query($sqlUser,$this->opendb())or die($this->salah());
			if($queryUser != null) {
				if(mysql_num_rows($queryUser)==1) {
					$rowUser=mysql_fetch_array($queryUser);
					$idUser=$rowUser['idKec'];
				}
			}				
			return $idUser;
		}
		
		function getUserKel($token) {			
			$sqlUser="	SELECT K.idKec 
						FROM tbl_user U, tbl_kecamatan K 
						WHERE U.userToken='$token' 
						AND U.idUser=K.idUser";
			$queryUser=mysql_query($sqlUser,$this->opendb())or die($this->salah());
			if($queryUser != null) {
				if(mysql_num_rows($queryUser)==1) {
					$rowUser=mysql_fetch_array($queryUser);
					$idUser=$rowUser['idKec'];
				}
			}				
			return $idUser;
		}
		
		function isEmptyKecamatan($idKec) {
			$sqlIs="SELECT idKec 
					FROM tbl_kelurahan 
					WHERE idKec='$idKec'";
			$queryIs=mysql_query($sqlIs,$this->opendb())or die($this->salah());
			if($queryIs != null) {
				if(mysql_num_rows($queryIs)>0) {
					$auth=false;
				}
				else {
					$auth=true;
				}
			}
			return $auth;
		}
		
		function isEmptyKelurahan($idKel) {
			$sqlIs="SELECT D.idKel 
					FROM tbl_kelurahan D, tbl_fitur F 
					WHERE idKel='$idKel' 
					AND D.idUser=F.idUser";
			$queryIs=mysql_query($sqlIs,$this->opendb())or die($this->salah());
			if($queryIs != null) {
				if(mysql_num_rows($queryIs)>0) {
					$auth=false;
				}
				else {
					$auth=true;
				}
			}
			return $auth;
		}
		
		function isEmptySatuan($idSat) {
			$sqlIs="SELECT C.idSatuan 
					FROM tbl_katchild C 
					WHERE C.idSatuan='$idSat'";
			$queryIs=mysql_query($sqlIs,$this->opendb())or die($this->salah());
			if($queryIs != null) {
				if(mysql_num_rows($queryIs)>0) {
					$auth=false;
				}
				else {
					$auth=true;
					$sqlIs2="	SELECT P.idSatuan 
								FROM tbl_katparent P 
								WHERE P.idSatuan='$idSat'";
					$queryIs2=mysql_query($sqlIs2,$this->opendb())or die($this->salah());
					if($queryIs2 != null) {
						if(mysql_num_rows($queryIs2)>0) {
							$auth=false;
						}
						else {
							$auth=true;
						}
					}
				}
			}
			return $auth;
		}
	}
?>