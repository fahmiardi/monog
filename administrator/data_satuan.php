<?php
	$isi="
	<table cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" align=\"center\">
		<tr>
			<td bgcolor=\"\" height=\"20\" style=\"vertical-align: middle;\">
				<div style=\"padding: 2px 0 0 5px; height: 18px; background-color: #EBE3F4;\">ADMINISTRASI: <b>Data Satuan</b></div>
				<div>
					<div style=\"float: left; padding: 5px; background-color: #EBE3F4;\">Mode:</div>";
					$arrayMode=array('Input','View');
					if($_GET['mode']=="Edit"&&$_GET['idSat']!="") {
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
									$ref="page.php?ref=$_GET[ref]&mode=$arah&act=do&idSat=$_GET[idSat]&token=$_GET[token]";
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
											<td width=\"20%\" bgcolor=\"#492B6B\" style=\"padding: 5px; color: #ffffff; font-weight: bold;\">Nama Satuan</td>
											<td bgcolor=\"#EBE3F4\" style=\"padding: 5px;\"><input class=\"value2\" type=\"text\" name=\"namaSat\"></td>
											</tr>
										<tr>
											<td bgcolor=\"#492B6B\"></td>
											<td bgcolor=\"#EBE3F4\" style=\"text-align: right; padding: 5px;\"><input type=\"submit\" name=\"save\" value=\"Save\"></td>
											</tr>
										</table>
									</form>";
								break;
							case 'execute':
								if($_POST['save']=="Save"&&$_POST['namaSat']!="") {
									$sqlInput="	INSERT INTO tbl_satuan 
												VALUES('','$_POST[namaSat]')";
									$queryInput=mysql_query($sqlInput,$general->opendb())or die($general->salah());
									if($queryInput != null) {
										$isi.="Input Data Satuan <b>$_POST[namaSat]</b> berhasil.";
										header("Refresh: 2; url= ./page.php?ref=$_GET[ref]&mode=View&act=$_GET[act]&token=$_GET[token]");
									}
								}
								else {
									$isi.="Maaf, Nama Satuan Tidak Boleh Kosong.";
								}
								break;
						}
						break;
					case 'View':
						$sqlSat="	SELECT idSatuan, namaSatuan 
									FROM tbl_satuan 
									ORDER BY namaSatuan ASC";
						$querySat=mysql_query($sqlSat,$general->opendb())or die($general->salah());
						if($querySat != null) {
							if(mysql_num_rows($querySat)>0) {
								$isi.="
								<table cellpadding=\"2\" cellspacing=\"2\" width=\"100%\" align=\"center\">
									<tr bgcolor=\"#492B6B\">
										<th width=\"5%\" align=\"left\" style=\"color: #ffffff;\">No.</th>
										<th width=\"25%\" align=\"left\" style=\"color: #ffffff;\">Nama Satuan</th>
										<th align=\"left\" style=\"color: #ffffff;\">Action</th>
										</tr>";
								$idx=1;
								$j=0;
								while($rowSat=mysql_fetch_array($querySat)) {
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
										<td>".strtoupper($rowSat['namaSatuan'])."</td>
										<td>
											<a class=\"menu\" href=\"./page.php?ref=$_GET[ref]&mode=Edit&act=do&idSat=$rowSat[idSatuan]&token=$_GET[token]\">Edit</a>";
											$sqlCek="	SELECT idSatuan 
														FROM tbl_katchild 
														WHERE idSatuan='$rowSat[idSatuan]'";
											$queryCek=mysql_query($sqlCek,$general->opendb())or die($general->salah());
											if($queryCek!=null) {
												if(mysql_num_rows($queryCek)<=0) {
													$cek=true;
													$sqlCek2="	SELECT idSatuan 
																FROM tbl_katparent 
																WHERE idSatuan='$rowSat[idSatuan]'";
													$queryCek2=mysql_query($sqlCek2,$general->opendb())or die($general->salah());
													if($queryCek2!=null) {
														if(mysql_num_rows($queryCek2)<=0) {
															$cek=true;
														}
														else {
															$cek=false;
														}
													}
												}
												else {
													$cek=false;
												}
											}
											if($cek) {
												$isi.="
															 | <a class=\"menu\" onclick=\"return confirm('Anda Yakin?');\" href=\"./page.php?ref=$_GET[ref]&mode=Edit&act=hapus&idSat=$rowSat[idSatuan]&token=$_GET[token]\">Hapus</a>";
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
								$isi.="Data Satuan masih kosong.";
							}
						}
						break;
					case 'Edit':
						switch($_GET['act']) {
							case 'do':
								$idSat=(int)$_GET['idSat'];
								$sqlUp="SELECT idSatuan, namaSatuan 
										FROM tbl_satuan 
										WHERE idSatuan='$idSat'";
								$queryUp=mysql_query($sqlUp,$general->opendb())or die($general->salah());
								if($queryUp != null) {
									if(mysql_num_rows($queryUp)==1) {
										$rowUp=mysql_fetch_array($queryUp);
									}
								}
								$isi.="
								<form action=\"./page.php?ref=$_GET[ref]&mode=$_GET[mode]&act=update&idSat=$rowUp[idSatuan]&token=$_GET[token]\" method=\"post\" style=\"margin: 0px;\">
									<table cellpadding=\"2\" cellspacing=\"2\" align=\"center\" width=\"100%\">
										<tr>
											<td width=\"20%\" bgcolor=\"#492B6B\" style=\"padding: 5px; color: #ffffff; font-weight: bold;\">Nama Satuan</td>
											<td bgcolor=\"#EBE3F4\" style=\"padding: 5px;\"><input class=\"value2\" type=\"text\" name=\"namaSat\" value=\"$rowUp[namaSatuan]\"></td>
											</tr>
										<tr>
											<td bgcolor=\"#492B6B\"></td>
											<td bgcolor=\"#EBE3F4\" style=\"text-align: right; padding: 5px;\"><input type=\"submit\" name=\"save\" value=\"Save\"></td>
											</tr>
										</table>
									</form>";
								break;
							case 'update':
								$idSat=(int)$_GET['idSat'];
								if($_POST['save']=="Save"&&$_POST['namaSat']!="") {
									$sqlUp="	UPDATE tbl_satuan 
												SET namaSatuan='$_POST[namaSat]' 
												WHERE idSatuan='$idSat'";
									$queryInput=mysql_query($sqlUp,$general->opendb())or die($general->salah());
									if($queryInput != null) {
										$isi.="Update Data Satuan <b>$_POST[namaSat]</b> berhasil.";
										header("Refresh: 2; url= ./page.php?ref=$_GET[ref]&mode=View&act=$_GET[act]&token=$_GET[token]");
									}
								}
								else {
									$isi.="Maaf, Nama Satuan Tidak Boleh Kosong.";
								}
								break;
							case 'hapus':
								$idSat=(int)$_GET['idSat'];
								if($general->isEmptySatuan($idSat)) {
									$sqlDel="DELETE FROM tbl_satuan WHERE idSatuan='$idSat'";
									$queryDel=mysql_query($sqlDel,$general->opendb())or die($general->salah());
									if($queryDel != null) {
										$isi.="Hapus Data Satuan Berhasil.";
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