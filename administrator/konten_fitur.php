<?php
	$isi="
	<table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" align=\"center\" border=\"0\">
		<tr>
			<td width=\"180\" height=\"500\">
				<div>
					<div style=\"padding-bottom: 10px;\">
						<div style=\"background-color: #EBE3F4; width: 180px; height: 20px;\">
							<div style=\"background-color: #EBE3F4;padding-left: 5px; padding-top: 2px;\">Desa/Kel. : <b>".strtoupper($_SESSION['desa'])."</b></div>
							</div>
						</div>";	
					$id=(int)$_GET['id'];
					if(isset($id)&&$id!="") {
					$isi.="
					<div style=\"padding-bottom: 5px;\">
						<div style=\"width: 180px; \">
							<div style=\"padding-left: 5px; padding-top: 2px;\">
								<table cellpadding=\"2\" cellspacing=\"0\" width=\"180\" align=\"center\">																			
									<form action=\"page.php?ref=$_GET[ref]&id=$id&token=$_GET[token]\" method=\"post\">																				
										<tr>
											<td>Tahun</td>
											<td>
												<select name=\"tahun\" onchange=\"this.form.submit();\">
													<option value=\"\">Pilih</option>";
														$sqlTahun="	SELECT thn 
																	FROM tbl_fitur 
																	GROUP BY thn";
														$queryTahun=mysql_query($sqlTahun,$general->opendb())or die($general->salah());
														if($queryTahun != null) {
															if(mysql_num_rows($queryTahun)>0) {
																while($rowTahun=mysql_fetch_array($queryTahun)) {
																	$th[]=$rowTahun['thn'];														
																}
																$th[]=MAX($th)+1;
																foreach($th as $year) {
																	if(isset($_POST['tahun'])||isset($_SESSION['tahun'])) {
																		if($_POST['tahun']==$year||$_SESSION['tahun']==$year) {
																			$isi.="
																			<option value=\"$year\" SELECTED>$year</option>";
																			$_SESSION['tahun']=$year;
																		}
																		else {
																			$isi.="
																			<option value=\"$year\">$year</option>";
																		}
																	}
																	else {
																		$isi.="
																		<option value=\"$year\">$year</option>";
																	}
																}
															}
															else {
																$th=2009;
																if(isset($_POST['tahun'])||isset($_SESSION['tahun'])) {
																	if($_POST['tahun']==$th||$_SESSION['tahun']==$th) {
																		$isi.="
																		<option value=\"$th\" SELECTED>$th</option>";
																		$_SESSION['tahun']=$th;
																	}
																	else {
																		$isi.="
																		<option value=\"$th\">$th</option>";
																	}
																}
																else {
																	$isi.="
																	<option value=\"$th\">$th</option>";
																}
															}
														}
													$isi.="
													</select>
												</td>
											</tr>";
										$arrayBulan=array(	'Januari'=>'1', 'Februari'=>'2', 'Maret'=>'3', 'April'=>'4', 'Mei'=>'5', 'Juni'=>'6', 'Juli'=>'7', 
															'Agustus'=>'8', 'September'=>'9', 'Oktober'=>'10', 'November'=>'11', 'Desember'=>'12');
										$isi.="
										<tr>
											<td>Bulan</td>
											<td>
												<select name=\"bulan\" onchange=\"this.form.submit();\">
													<option value=\"\">Pilih</option>";
													foreach($arrayBulan as $key=>$value) { 
														if(isset($_POST['bulan'])||isset($_SESSION['bulan'])) {
															if($_POST['bulan']==$value||$_SESSION['bulan']==$value) {
																$isi.="
																<option value=$value SELECTED>$key</option>";
																$_SESSION['bulan']=$value;
															}
															else {
																$isi.="
																<option value=$value>$key</option>";
															}
														}
														else {
															$isi.="
															<option value=$value>$key</option>";
														}
													}
													$isi.="
													</select>
												</td>
											</tr>																				
										</form>
								</table>
								</div>
							</div>
						</div>";
					}
					$isi.="
					<div style=\"padding-bottom: 5px;\">
						<div style=\"padding: 5px;\">";
							if(isset($_SESSION['tahun'])&&isset($_SESSION['bulan'])&&isset($_GET['view'])) {
								include_once "./js/js_navigasi.php";
							}
							$isi.="
							</div>
						</div>
					</div>
				</td>
			<td width=\"1\" bgcolor=\"#492B6B\"></td>
			<td><!-- Content User Root !-->														
				<table cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" align=\"center\" border=\"0\">
					<tr>
						<td bgcolor=\"#EBE3F4\" height=\"20\">
							<div style=\"padding: 2px 0 0 5px; font-size: 10px;\">Data Monografi : Desa/Kelurahan <b>".strtoupper($_SESSION['desa'])."</b> | Kecamatan : <b>".strtoupper($_SESSION['kecamatan'])."</b> | Periode : <b>";foreach($arrayBulan as $key=>$value) {if($value==$_SESSION['bulan']){$isi.=$key;break;}}$isi.=", ".$_SESSION['tahun']."</b> | Last Update : <b>".$_SESSION['lastUpdate']."</b></div>
							</td>
					</tr>
					<tr>
						<td height=\"20\">
							<div>																		
								<div style=\"float: left; padding: 5px; background-color: #EBE3F4;\">Mode:</div>";								
								if(isset($_SESSION['tahun'])&&isset($_SESSION['bulan'])) {
									if($general->manipulasi($_SESSION['token'],$_GET['id'])) {
										if($general->generateFitur($_GET['id'], $_SESSION['tahun'], $_SESSION['bulan'])) {
											$arrayMode=array('Input');
										}
										else {
											$arrayMode=array('View','Edit','Cetak');
										}
									}
									else {
										if(!$general->generateFitur($_GET['id'], $_SESSION['tahun'], $_SESSION['bulan'])) {
											$arrayMode=array('View','Cetak');
										}
									}
									if(count($arrayMode)!=0) {
										foreach($arrayMode as $arah) {
											$ref="page.php?ref=$_GET[ref]&id=$_GET[id]&mode=$arah&view=Full&token=$_GET[token]";
											switch($arah) {
												case 'Input':
													$ref="page.php?ref=$_GET[ref]&id=$_GET[id]&mode=$arah&act=generate&token=$_GET[token]";
													$ico="input.ico";
													$target="";
													break;
												case 'View':																						
													$ico="view.ico";
													$target="";
													break;
												case 'Edit':
													$ref="page.php?ref=$_GET[ref]&id=$_GET[id]&mode=$arah&view=Full&act=edit&token=$_GET[token]";
													$ico="edit.ico";
													$target="";
													break;
												case 'Cetak':
													$ref="page.php?ref=$_GET[ref]&id=$_GET[id]&mode=Cetak&periode=$_SESSION[bulan]/$_SESSION[tahun]&token=$_GET[token]";
													$ico="cetak.ico";
													$target="_blank";
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
										<div style=\"float: left; background-color: $bg\">
											<a href=\"$ref\" class=\"mode\" target=\"$target\">
												<div style=\"text-align: center;\"><img src=\"./images/$ico\" width=\"32\" height=\"32\" border=\"0\"></div>
												<div style=\"text-align: center; font-weight: $text\">$arah</div>
												</a>
											</div>";
										}
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
									case 'generate':
										foreach($arrayBulan as $key=>$value) {
											if($_SESSION['bulan']==$value) {
												$bul=$key;
												break;
											}
										}
										$isi.="
											<div style=\"padding-bottom: 5px;\">Silahkan klik tombol '<b>Generate</b>' untuk membuat draft data monografi periode <b>$bul</b>, <b>$_SESSION[tahun]</b></div>
											<form action=\"page.php?ref=$_GET[ref]&id=$_GET[id]&mode=$_GET[mode]&act=execute&token=$_GET[token]\" method=\"post\">												
												<input type=\"submit\" name=\"create\" value=\"Generate\">
												</form>
											";
										break;
									case 'execute':
										if($_POST['create']=="Generate") {
											$tahun=$_SESSION['tahun'];
											$bulan=$_SESSION['bulan'];
											$sqlDesa="SELECT idUser FROM tbl_kelurahan WHERE idKel='$_GET[id]'";
											$queryDesa=mysql_query($sqlDesa,$general->opendb())or die($general->salah());
											if($queryDesa != null) {
												if(mysql_num_rows($queryDesa)==1) {
													$rowDesa=mysql_fetch_array($queryDesa);
													$idUser=$rowDesa['idUser'];
													$sqlRoot="SELECT kdKatRoot FROM tbl_katroot";
													$queryRoot=mysql_query($sqlRoot,$general->opendb())or die($general->salah());
													if($queryRoot != null) {
														if(mysql_num_rows($queryRoot)>0) {
															while($rowRoot=mysql_fetch_array($queryRoot)) {
																$kdRoot=$rowRoot['kdKatRoot'];									
																$sqlParent="SELECT kdKatParent FROM tbl_katparent WHERE kdKatRoot='$kdRoot' AND idStatusKat='1'";
																$queryParent=mysql_query($sqlParent,$general->opendb())or die($general->salah());
																if($queryParent != null) {
																	if(mysql_num_rows($queryParent)>0) {
																		while($rowParent=mysql_fetch_array($queryParent)) {
																			$kdParent=$rowParent['kdKatParent'];
																			$sqlChild="SELECT kdKatChild FROM tbl_katchild WHERE kdKatParent='$kdParent' AND idStatusKat='1'";
																			$queryChild=mysql_query($sqlChild,$general->opendb())or die($general->salah());
																			if($queryChild != null) {
																				if(mysql_num_rows($queryChild)>0) {
																					while($rowChild=mysql_fetch_array($queryChild)) {
																						$kd=$rowChild['kdKatChild'];																
																						$sqlInsert="INSERT INTO tbl_fitur 
																									VALUES('','','$bulan','$tahun','$kd','','$idUser')";
																						$queryInsert=mysql_query($sqlInsert,$general->opendb())or die($general->salah());									
																						if($queryInsert) {
																							$general->setLastUpdate($idUser);
																							$auth=true;
																						}
																					}
																				}
																				else {
																					$kd=$kdParent;
																					$sqlInsert="INSERT INTO tbl_fitur 
																								VALUES('','','$bulan','$tahun','','$kd','$idUser')";
																					$queryInsert=mysql_query($sqlInsert,$general->opendb())or die($general->salah());									
																					if($queryInsert) {
																						$general->setLastUpdate($idUser);
																						$auth=true;
																					}
																				}
																			}													
																		}
																	}
																}
															}
														}
													}	
												}
											}	
											if($auth) {
												$isi.="Harap tunggu... Draft monografi sedang diproses.";
												header("Refresh: 5; URL= ./page.php?ref=$_GET[ref]&id=$_GET[id]&mode=Edit&view=Full&act=edit&token=$_GET[token]");
											}												
										}
										break;
								}
								break;
							case 'View':
								switch($_GET['view']) {
									case 'Full':
										$_SESSION['kodeRoot']=0;
										$_SESSION['kodeParent']=0;										
										$sqlFitur="	SELECT F.idFitur, F.value, F.kdKatParent, F.kdKatChild 
													FROM tbl_fitur F, tbl_kelurahan L, tbl_user U 
													WHERE L.idKel='$_GET[id]' 
													AND L.idUser=U.idUser 
													AND F.idUser=U.idUser 
													AND F.bln='$_SESSION[bulan]' 
													AND F.thn='$_SESSION[tahun]'";
										$queryFitur=mysql_query($sqlFitur,$general->opendb())or die($general->salah());
										if($queryFitur != null) {									
											if(mysql_num_rows($queryFitur)>0) {
												$isi.="			<table cellpadding=\"1\" cellspacing=\"1\" width=\"100%\" align=\"center\" border=\"0\">";
												$bg1="#EBE3F4";
												$bg2="#CCCCCC";
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
													if($_SESSION['kodeRoot']!=$kdKatRoot) {
														$_SESSION['j']=0;
														$_SESSION['kodeRoot']=$kdKatRoot;
														$sqlRoot="	SELECT namaKatRoot 
																	FROM tbl_katroot 
																	WHERE kdKatRoot='$_SESSION[kodeRoot]'";
														$queryRoot=mysql_query($sqlRoot,$general->opendb())or die($general->salah());
														if($queryRoot != null) {
															if(mysql_num_rows($queryRoot)==1) {
																$rowRoot=mysql_fetch_array($queryRoot);
																$isi.="	
																	<tr bgcolor=\"$bg2\">
																		<td width=\"25\" style=\"padding: 10px 0 5px 0;\"><b>$kdKatRoot.</b></td>
																		<td style=\"padding: 10px 0 5px 0;\"><b>$rowRoot[namaKatRoot]</b></td>
																		</tr>";
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
														$isi.="
																	<tr bgcolor=\"$bg1\">
																		<td width=\"25\"></td>
																		<td>
																			<table cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" align=\"center\" border=\"0\">
																				<tr>
																					<td width=\"35\">$kod.</td>
																					<td>$rowParent[namaKatParent]</td>
																					<td width=\"60\" style=\"text-align: right; padding-right: 5px;\">$rowFitur[value]</td>
																					<td width=\"70\">$rowValue[namaSatuan]</td>
																					</tr>
																				</table>
																			</td>
																		</tr>";
													}
													else {
														if($_SESSION['kodeParent']!=$kdKatParent) {
															$_SESSION['kodeParent']=$kdKatParent;
															$sqlParent="SELECT namaKatParent 
																		FROM tbl_katparent 
																		WHERE kdKatParent='$_SESSION[kodeParent]'";
															$queryParent=mysql_query($sqlParent,$general->opendb())or die($general->salah());
															if($queryParent != null) {
																if(mysql_num_rows($queryParent)==1) {
																	$rowParent=mysql_fetch_array($queryParent);
																}
															}
															$isi.="
																	<tr bgcolor=\"$bg1\">
																		<td width=\"25\"></td>
																		<td>
																			<table cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" align=\"center\" border=\"0\">
																				<tr>
																					<td width=\"35\">$kdKatParent.</td>
																					<td>$rowParent[namaKatParent]</td>																	
																					</tr>
																				</table>
																			</td>
																		</tr>";																
														}
														$sqlChild="	SELECT namaKatChild 
																	FROM tbl_katchild 
																	WHERE kdKatChild='$kdKatChild'";
														$queryChild=mysql_query($sqlChild,$general->opendb())or die($general->salah());
														if($queryChild != null) {
															if(mysql_num_rows($queryChild)==1) {
																$rowChild=mysql_fetch_array($queryChild);												
																$isi.="
																	<tr bgcolor=\"$bg1\">
																		<td width=\"25\"></td>
																		<td>
																			<table cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" align=\"center\" border=\"0\">
																				<tr>
																					<td width=\"35\"></td>
																					<td>
																						<table cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" align=\"center\" border=\"0\">
																							<tr>
																								<td width=\"45\">$kod.</td>
																								<td>$rowChild[namaKatChild]</td>";																								
																									if($kod=="21.b.3") {
																										$isi.="
																										<td width=\"60\" style=\"text-align: right; padding-right: 5px;\">";
																										if($rowFitur['value']==1) {
																											$isi.="Baik";
																										}
																										elseif($rowFitur['value']==2) {
																											$isi.="Sedang";
																										}
																										elseif($rowFitur['value']==3) {
																											$isi.="Kurang";
																										}
																										else {
																											$isi.="";
																										}																										
																									}
																									elseif($kod=="21.b.4") {
																										$isi.="
																										<td width=\"100\" style=\"text-align: right; padding-right: 5px;\">";
																										if($rowFitur['value']==1) {
																											$isi.="Milik Desa";
																										}
																										elseif($rowFitur['value']==2) {
																											$isi.="Milik Pemda";
																										}
																										else {
																											$isi.="";
																										}
																									}
																									else {
																										$isi.="
																										<td width=\"100\" style=\"text-align: right; padding-right: 5px;\">$rowFitur[value]";
																									}
																									$isi.="
																									</td>
																								<td width=\"70\">$rowValue[namaSatuan]</td>
																								</tr>
																							</table>
																						</td>
																					</tr>
																				</table>
																			</td>
																		</tr>";
															}
														}
													}									
												}
												$isi.="
																	</table>";
											}
										}
										break;
									case 'Part':
										break;
								}
								break;
							case 'Edit':
								switch($_GET['view']) {
									case 'Full':
										switch($_GET['act']) {
											case 'edit':
												$_SESSION['kodeRoot']=0;
												$_SESSION['kodeParent']=0;										
												$sqlFitur="	SELECT F.idFitur, F.value, F.kdKatParent, F.kdKatChild 
															FROM tbl_fitur F, tbl_kelurahan L, tbl_user U 
															WHERE L.idKel='$_GET[id]' 
															AND L.idUser=U.idUser 
															AND F.idUser=U.idUser 
															AND F.bln='$_SESSION[bulan]' 
															AND F.thn='$_SESSION[tahun]'";
												$queryFitur=mysql_query($sqlFitur,$general->opendb())or die($general->salah());
												if($queryFitur != null) {									
													if(mysql_num_rows($queryFitur)>0) {
														$isi.="		<form action=\"./page.php?ref=$_GET[ref]&id=$_GET[id]&mode=Edit&view=$_GET[view]&act=update&token=$_GET[token]\" method=\"post\" style=\"margin: 0px;\">	
																		<table cellpadding=\"1\" cellspacing=\"1\" width=\"100%\" align=\"center\" border=\"0\">";
														$bg1="#EBE3F4";
														$bg2="#CCCCCC";
														$darurat=0;
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
															if($_SESSION['kodeRoot']!=$kdKatRoot) {
																$_SESSION['j']=0;
																$_SESSION['kodeRoot']=$kdKatRoot;
																$sqlRoot="	SELECT namaKatRoot 
																			FROM tbl_katroot 
																			WHERE kdKatRoot='$_SESSION[kodeRoot]'";
																$queryRoot=mysql_query($sqlRoot,$general->opendb())or die($general->salah());
																if($queryRoot != null) {
																	if(mysql_num_rows($queryRoot)==1) {
																		$rowRoot=mysql_fetch_array($queryRoot);
																		$isi.="	
																			<tr bgcolor=\"$bg2\">
																				<td width=\"25\" style=\"padding: 10px 0 5px 0;\"><b>$kdKatRoot.</b></td>
																				<td style=\"padding: 10px 0 5px 0;\"><b>$rowRoot[namaKatRoot]</b></td>
																				</tr>";
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
																$isi.="
																			<tr bgcolor=\"$bg1\">
																				<td width=\"25\"></td>
																				<td>
																					<table cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" align=\"center\" border=\"0\">
																						<tr>
																							<td width=\"35\">$kod.</td>
																							<td>$rowParent[namaKatParent]</td>
																							<td width=\"60\" style=\"text-align: right; padding-right: 5px;\">";																								
																								if($kod!="1.c") {
																									if($kod=="1.a") {
																										$isi.="<input id=\"jmlh\" type=\"text\" name=\"value[$darurat]\" value=\"$rowFitur[value]\" class=\"value\">";
																									}
																									elseif($kod=="1.b") {
																										$isi.="<input id=\"luas\" type=\"text\" onBlur=\"hitung()\" name=\"value[$darurat]\" value=\"$rowFitur[value]\" class=\"value\">";
																									}
																									else {
																										$isi.="<input type=\"text\" name=\"value[$darurat]\" value=\"$rowFitur[value]\" class=\"value\">";
																									}
																								}
																								else {
																									$isi.="<input id=\"padat\" type=\"text\" name=\"value[$darurat]\" value='$rowFitur[value]' class=\"value\">";
																								}
																								$isi.="
																								<input type=\"hidden\" name=\"idFit[]\" value=\"$rowFitur[idFitur]\">
																								</td>
																							<td width=\"70\">$rowValue[namaSatuan]</td>
																							</tr>
																						</table>
																					</td>
																				</tr>";
															}
															else {
																if($_SESSION['kodeParent']!=$kdKatParent) {
																	$_SESSION['kodeParent']=$kdKatParent;
																	$sqlParent="SELECT namaKatParent 
																				FROM tbl_katparent 
																				WHERE kdKatParent='$_SESSION[kodeParent]'";
																	$queryParent=mysql_query($sqlParent,$general->opendb())or die($general->salah());
																	if($queryParent != null) {
																		if(mysql_num_rows($queryParent)==1) {
																			$rowParent=mysql_fetch_array($queryParent);
																		}
																	}
																	$isi.="
																			<tr bgcolor=\"$bg1\">
																				<td width=\"25\"></td>
																				<td>
																					<table cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" align=\"center\" border=\"0\">
																						<tr>
																							<td width=\"35\">$kdKatParent.</td>
																							<td>$rowParent[namaKatParent]</td>																	
																							</tr>
																						</table>
																					</td>
																				</tr>";																
																}
																$sqlChild="	SELECT namaKatChild 
																			FROM tbl_katchild 
																			WHERE kdKatChild='$kdKatChild'";
																$queryChild=mysql_query($sqlChild,$general->opendb())or die($general->salah());
																if($queryChild != null) {
																	if(mysql_num_rows($queryChild)==1) {
																		$rowChild=mysql_fetch_array($queryChild);												
																		$isi.="
																			<tr bgcolor=\"$bg1\">
																				<td width=\"25\"></td>
																				<td>
																					<table cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" align=\"center\" border=\"0\">
																						<tr>
																							<td width=\"35\"></td>
																							<td>
																								<table cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" align=\"center\" border=\"0\">
																									<tr>
																										<td width=\"45\">$kod.</td>
																										<td>$rowChild[namaKatChild]</td>
																										<td width=\"60\" style=\"text-align: right; padding-right: 5px;\">";
																											$array=array('2.a.1','2.a.2','2.a.3','14.a.1','14.a.2','14.a.3','14.a.4');
																											foreach($array as $key) {
																												if($kod==$key) {
																													$split=true;
																													break;
																												}
																												else {
																													$array=array('21.b.3','21.b.4');
																													foreach($array as $key) {
																														if($kod==$key) {
																															$condition=true;
																															break;
																														}
																														else {
																															$condition=false;
																															continue;
																														}
																													}
																													$split=false;
																													continue;
																												}
																											}
																											if($split) {
																												$isi.="
																												<input type=\"text\" name=\"value[$darurat]\" value=\"$rowFitur[value]\" class=\"value\">
																												</td>
																											<td width=\"70\"><b>$rowValue[namaSatuan]</b></td>
																												";
																											}
																											elseif($condition) {
																												if($kod=="21.b.3") {
																													$isi.="
																													<select name=\"value[]\">
																														<option value=\"\">Pilih</option>";
																														$array=array('1'=>'Baik','2'=>'Sedang','3'=>'Kurang');
																														foreach($array as $key=>$value) {
																															if($rowFitur['value']!="") {
																																if($rowFitur['value']==$key) {
																																	$isi.="
																																	<option value=\"$key\" SELECTED>$value</option>";
																																}
																																else {
																																	$isi.="
																																	<option value=\"$key\">$value</option>";
																																}
																															}
																															else {
																																$isi.="
																																<option value=\"$key\">$value</option>";
																															}
																														}
																													$isi.="
																													</select>
																													</td>
																												<td width=\"70\">$rowValue[namaSatuan]</td>
																													";
																												}
																												else {
																													$isi.="
																													<select name=\"value[]\">
																														<option value=\"\">Pilih</option>";
																														$array=array('1'=>'Milik Desa','2'=>'Milik Pemda');
																														foreach($array as $key=>$value) {
																															if($rowFitur['value']!="") {
																																if($rowFitur['value']==$key) {
																																	$isi.="
																																	<option value=\"$key\" SELECTED>$value</option>";
																																}
																																else {
																																	$isi.="
																																	<option value=\"$key\">$value</option>";
																																}
																															}
																															else {
																																$isi.="
																																<option value=\"$key\">$value</option>";
																															}
																														}
																													$isi.="	
																													</select>
																													</td>
																												<td width=\"70\">$rowValue[namaSatuan]</td>
																													";
																												}
																											}	
																											else {
																												$isi.="
																													<input type=\"text\" name=\"value[$darurat]\" value=\"$rowFitur[value]\" class=\"value\">																													
																													</td>
																												<td width=\"70\">$rowValue[namaSatuan]</td>
																													";
																											}
																											$isi.="	
																											<input type=\"hidden\" name=\"idFit[]\" value=\"$rowFitur[idFitur]\">
																										</tr>
																									</table>
																								</td>
																							</tr>
																						</table>
																					</td>
																				</tr>";
																	}
																}
															}
															$darurat++;															
														}
														$isi.="
																			<tr bgcolor=\"$bg2\">
																				<td></td>
																				<td style=\"text-align: right; padding: 5px;\">
																					<input type=\"submit\" name=\"update\" value=\"Save\">
																					</td>
																				</tr>
																			</table>
																		</form>";
													}
												}
												break;
											case 'update':
												if($_POST['update']=="Save") {
													$val=$_POST['value'];
													$idFit=$_POST['idFit'];
													if(count($idFit)>0) {
														for($idx=0; $idx<count($idFit); $idx++) {
															$sqlUp="UPDATE tbl_fitur 
																	SET value='$val[$idx]' 
																	WHERE idFitur='$idFit[$idx]'";
															$queryUp=mysql_query($sqlUp,$general->opendb())or die($general->salah());
															if($queryUp != null) {
																$auth=true;
															}
														}
														if($auth) {
															$isi.="Harap tunggu... Data monografi sedang diupdate.";
															header("Refresh: 5; URL= ./page.php?ref=$_GET[ref]&id=$_GET[id]&mode=View&view=Full&token=$_GET[token]");
														}
													}
												}
												break;
										}
										break;
									case 'Part':
										break;
								}
								break;
							case 'Cetak':
								include_once "./cetak_monografi.php";
								break;
						}
						$isi.="
						</td>
				</table>
				</td>
			</tr>
		</table>";
	
	$layout->setKonten($isi);	
	$layout->getTampilkan();
?>