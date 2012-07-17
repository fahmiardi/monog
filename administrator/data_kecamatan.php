<?php
	$idHak=$general->tokenID($_SESSION['token']);
	$isi="
	<table cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" align=\"center\">
		<tr>
			<td bgcolor=\"\" height=\"20\" style=\"vertical-align: middle;\">
				<div style=\"padding: 2px 0 0 5px; height: 18px; background-color: #EBE3F4;\">ADMINISTRASI: <b>Data Kecamatan</b></div>
				<div>
					<div style=\"float: left; padding: 5px; background-color: #EBE3F4;\">Mode:</div>";
					$arrayMode=array('Input','View');
					if($_GET['mode']=="Edit"&&$_GET['idKec']!="") {
						$arrayMode[]="Edit";
					}
					if(count($arrayMode)!=0) {
						foreach($arrayMode as $arah) {
							$ref="page.php?ref=$_GET[ref]&mode=$arah&token=$_GET[token]";
							switch($arah) {									
								case 'Input':
									$ref="page.php?ref=$_GET[ref]&mode=$arah&act=do&token=$_GET[token]";
									$ico="input.ico";
									break;
								case 'View':																						
									$ico="view.ico";
									break;
								case 'Edit':
									$ref="page.php?ref=$_GET[ref]&mode=$arah&act=do&idKec=$_GET[idKec]&token=$_GET[token]";
									$ico="edit.ico";
									break;
							}
							if($_GET['mode']==$arah) {
								$bg="#EBE3F4";
								$text="bold";
							}
							else {
								$bg="#ffffff";
								$text="normal";
							}
						$isi.="
						<div style=\"float: left; background-color: $bg;\">
							<a href=\"$ref\" class=\"mode\">
								<div style=\"text-align: center;\"><img src=\"./images/$ico\" width=\"32\" height=\"32\" border=\"0\"></div>
								<div style=\"text-align: center; font-weight: $text\">$arah</div>
								</a>
							</div>";
						}
					}
					$isi.="
					</div>
				</td>
			</tr>
		<tr>
			<td bgcolor=\"#492B6B\" style=\"color: #492B6B;\">.</td>
			</tr>
		<tr>
			<td style=\"padding: 10px;\"><!-- Content User !-->";
				switch($_GET['mode']) {
					case 'Input':
						switch($_GET['act']) {
							case 'do':
								$isi.="
								<form action=\"./page.php?ref=$_GET[ref]&mode=$_GET[mode]&act=execute&token=$_GET[token]\" method=\"post\" style=\"margin: 0px;\">
									<table cellpadding=\"2\" cellspacing=\"2\" align=\"center\" width=\"100%\">
										<tr>
											<td width=\"20%\" bgcolor=\"#492B6B\" style=\"padding: 5px; color: #ffffff; font-weight: bold;\">Nama Kecamatan</td>
											<td bgcolor=\"#EBE3F4\" style=\"padding: 5px;\"><input class=\"value2\" type=\"text\" name=\"namaKec\"></td>
											</tr>
										<tr>
											<td bgcolor=\"#492B6B\"></td>
											<td bgcolor=\"#EBE3F4\" style=\"text-align: right; padding: 5px;\"><input type=\"submit\" name=\"save\" value=\"Save\"></td>
											</tr>
										</table>
									</form>";
								break;
							case 'execute':
								if($_POST['save']=="Save"&&$_POST['namaKec']!="") {
									$uniq=$general->createRandomUser();
									$uniq_uname=$general->createRandomUname();
									$uniq_pwd=$general->createRandomPwd();
									$uniq_pwd_enc=$general->Encrypt($uniq_pwd);
									$sqlInput="	INSERT INTO tbl_kecamatan 
												VALUES('','$_POST[namaKec]','$uniq')";
									$queryInput=mysql_query($sqlInput,$general->opendb())or die($general->salah());
									if($queryInput != null) {
										$sqlInput2="INSERT INTO tbl_user 
													VALUES('','$uniq','$uniq_uname','$uniq_pwd_enc','$uniq_pwd','','2')";
										$queryInput2=mysql_query($sqlInput2,$general->opendb())or die($general->salah());
										if($queryInput2 != null) {
											$isi.="Input Data Kecamatan <b>$_POST[namaKec]</b> berhasil.";
											header("Refresh: 2; url= ./page.php?ref=$_GET[ref]&mode=View&act=$_GET[act]&token=$_GET[token]");
										}
									}
								}
								else {
									$isi.="Maaf, Nama Kecamatan Tidak Boleh Kosong.";
								}
								break;
						}
						break;
					case 'View':
						$sqlKec="	SELECT idKec, namaKec 
									FROM tbl_kecamatan 
									ORDER BY namaKec ASC";
						$queryKec=mysql_query($sqlKec,$general->opendb())or die($general->salah());
						if($queryKec != null) {
							if(mysql_num_rows($queryKec)>0) {
								$isi.="
								<table cellpadding=\"2\" cellspacing=\"2\" width=\"100%\" align=\"center\">
									<tr bgcolor=\"#492B6B\">
										<th width=\"5%\" align=\"left\" style=\"color: #ffffff;\">No.</th>
										<th width=\"25%\" align=\"left\" style=\"color: #ffffff;\">Nama Kecamatan</th>
										<th align=\"left\" style=\"color: #ffffff;\">Action</th>
										</tr>";
								$idx=1;
								$j=0;
								while($rowKec=mysql_fetch_array($queryKec)) {
									if($j==0) {
										$bg="#EBE3F4";
										$j++;
									}
									else {
										$bg="#CCCCCC";
										$j--;
									}
									$isi.="
									<tr bgcolor=\"$bg\">
										<td>$idx</td>
										<td>".strtoupper($rowKec['namaKec'])."</td>
										<td>
											<a class=\"menu\" href=\"./page.php?ref=$_GET[ref]&mode=Edit&act=do&idKec=$rowKec[idKec]&token=$_GET[token]\">Edit</a>";
											$sqlCek="	SELECT idKec 
														FROM tbl_kelurahan 
														WHERE idKec=$rowKec[idKec]";
											$queryCek=mysql_query($sqlCek,$general->opendb())or die($general->salah());
											if($queryCek!=null) {
												if(mysql_num_rows($queryCek)<=0) {
													$isi.="
													 | <a class=\"menu\" onclick=\"return confirm('Anda Yakin?');\" href=\"./page.php?ref=$_GET[ref]&mode=Edit&act=hapus&idKec=$rowKec[idKec]&token=$_GET[token]\">Hapus</a>";
												}
											}
											$isi.="
											</td>
										</tr>";
									$idx++;
								}
								$isi.="
									</table>";
							}
							else {
								$isi.="Data kecamatan masih kosong.";
							}
						}
						break;
					case 'Edit':
						switch($_GET['act']) {
							case 'do':
								$idKec=(int)$_GET['idKec'];
								$sqlUp="SELECT idKec, namaKec 
										FROM tbl_kecamatan 
										WHERE idKec='$idKec'";
								$queryUp=mysql_query($sqlUp,$general->opendb())or die($general->salah());
								if($queryUp != null) {
									if(mysql_num_rows($queryUp)==1) {
										$rowUp=mysql_fetch_array($queryUp);
									}
								}
								$isi.="
								<form action=\"./page.php?ref=$_GET[ref]&mode=$_GET[mode]&act=update&idKec=$rowUp[idKec]&token=$_GET[token]\" method=\"post\" style=\"margin: 0px;\">
									<table cellpadding=\"2\" cellspacing=\"2\" align=\"center\" width=\"100%\">
										<tr>
											<td width=\"20%\" bgcolor=\"#492B6B\" style=\"padding: 5px; color: #ffffff; font-weight: bold;\">Nama Kecamatan</td>
											<td bgcolor=\"#EBE3F4\" style=\"padding: 5px;\"><input class=\"value2\" type=\"text\" name=\"namaKec\" value=\"$rowUp[namaKec]\"></td>
											</tr>
										<tr>
											<td bgcolor=\"#492B6B\"></td>
											<td bgcolor=\"#EBE3F4\" style=\"text-align: right; padding: 5px;\"><input type=\"submit\" name=\"save\" value=\"Save\"></td>
											</tr>
										</table>
									</form>";
								break;
							case 'update':
								$idKec=(int)$_GET['idKec'];
								if($_POST['save']=="Save"&&$_POST['namaKec']!="") {
									$sqlUp="	UPDATE tbl_kecamatan 
												SET namaKec='$_POST[namaKec]' 
												WHERE idKec='$idKec'";
									$queryInput=mysql_query($sqlUp,$general->opendb())or die($general->salah());
									if($queryInput != null) {
										$isi.="Update Data Kecamatan <b>$_POST[namaKec]</b> berhasil.";
										header("Refresh: 2; url= ./page.php?ref=$_GET[ref]&mode=View&act=$_GET[act]&token=$_GET[token]");
									}
								}
								else {
									$isi.="Maaf, Nama Kecamatan Tidak Boleh Kosong.";
								}
								break;
							case 'hapus':
								$idKec=(int)$_GET['idKec'];
								if($general->isEmptyKecamatan($idKec)) {
									$sqlDel="DELETE FROM tbl_kecamatan WHERE idKec='$idKec'";
									$queryDel=mysql_query($sqlDel,$general->opendb())or die($general->salah());
									if($queryDel != null) {
										$isi.="Hapus Data Kecamatan Berhasil.";
										header("Refresh: 2; url= ./page.php?ref=$_GET[ref]&mode=View&token=$_GET[token]");
									}									
								}
								else {
									$general->emptyToken($token);
									header("Location: ./page.php?ref=login&alert=session_error");
								}
								break;
						}
						break;
				}
				$isi.="
				</td>
			</tr>
		</table>
	";	
	
	$layout->setKonten($isi);	
	$layout->getTampilkan();
?>