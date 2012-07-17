<?php
	$isi="
	<table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" align=\"center\" border=\"0\">
		<tr>
			<td width=\"180\" height=\"500\">
				<div>
					<div style=\"padding-bottom: 10px;\">
						<div style=\"background-color: #EBE3F4; width: 180px; height: 20px;\">
							<div style=\"background-color: #EBE3F4;padding-left: 5px; padding-top: 2px;\">Desa/Kel. : <b>".strtoupper($_SESSION['pub_desa'])."</b></div>
							</div>
						</div>";	
					$arrayBulan=array(	'Januari'=>'1', 'Februari'=>'2', 'Maret'=>'3', 'April'=>'4', 'Mei'=>'5', 'Juni'=>'6', 'Juli'=>'7', 
										'Agustus'=>'8', 'September'=>'9', 'Oktober'=>'10', 'November'=>'11', 'Desember'=>'12');
					$id=(int)$_GET['id'];
					if(isset($id)&&$id!="") {
					$isi.="
					<div style=\"padding-bottom: 5px;\">
						<div style=\"width: 180px; \">
							<div style=\"padding-left: 5px; padding-top: 2px;\">
								<table cellpadding=\"2\" cellspacing=\"0\" width=\"180\" align=\"center\">																			
									<form action=\"page.php?ref=$_GET[ref]&id=$id\" method=\"post\">																				
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
																	if(isset($_POST['tahun'])||isset($_SESSION['pub_tahun'])) {
																		if($_POST['tahun']==$year||$_SESSION['pub_tahun']==$year) {
																			$isi.="
																			<option value=\"$year\" SELECTED>$year</option>";
																			$_SESSION['pub_tahun']=$year;
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
																if(isset($_POST['tahun'])||isset($_SESSION['pub_tahun'])) {
																	if($_POST['tahun']==$th||$_SESSION['pub_tahun']==$th) {
																		$isi.="
																		<option value=\"$th\" SELECTED>$th</option>";
																		$_SESSION['pub_tahun']=$th;
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
										$isi.="
										<tr>
											<td>Bulan</td>
											<td>
												<select name=\"bulan\" onchange=\"this.form.submit();\">
													<option value=\"\">Pilih</option>";
													foreach($arrayBulan as $key=>$value) { 
														if(isset($_POST['bulan'])||isset($_SESSION['pub_bulan'])) {
															if($_POST['bulan']==$value||$_SESSION['pub_bulan']==$value) {
																$isi.="
																<option value=$value SELECTED>$key</option>";
																$_SESSION['pub_bulan']=$value;
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
							if(isset($_SESSION['pub_tahun'])&&isset($_SESSION['pub_bulan'])&&isset($_GET['view'])) {
								include_once "./js/js_navigasi.php";
							}
							$isi.="
							</div>
						</div>
					</div>
				</td>
			<td width=\"1\" bgcolor=\"#EBE3F4\"></td>
			<td><!-- Content User Root !-->														
				<table cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" align=\"center\" border=\"0\">
					<tr>
						<td bgcolor=\"#EBE3F4\" height=\"20\">
							<div style=\"padding: 2px 0 0 5px; font-size: 10px;\">Data Monografi : Desa/Kelurahan <b>".strtoupper($_SESSION['pub_desa'])."</b> | Kecamatan : <b>".strtoupper($_SESSION['pub_kecamatan'])."</b> | Periode : <b>";foreach($arrayBulan as $key=>$value) {if($value==$_SESSION['pub_bulan']){$isi.=$key;break;}}$isi.=", ".$_SESSION['pub_tahun']."</b> | Last Update : <b>".$_SESSION['pub_lastUpdate']."</b></div>
							</td>
					</tr>
					<tr>
						<td height=\"20\">
							<div>																		
								<div style=\"float: left; padding: 5px; background-color: #EBE3F4;\">Mode:</div>";								
								if(isset($_SESSION['pub_tahun'])&&isset($_SESSION['pub_bulan'])) {
									if(!$general->generateFitur($_GET['id'], $_SESSION['pub_tahun'], $_SESSION['pub_bulan'])) {
										$arrayMode=array('View','Cetak');
									}
									if(count($arrayMode)!=0) {
										foreach($arrayMode as $arah) {
											$ref="page.php?ref=$_GET[ref]&id=$_GET[id]&mode=$arah&view=Full";
											switch($arah) {												
												case 'View':																						
													$ico="view.ico";
													$target="";
													break;
												case 'Cetak':
													$ref="page.php?ref=$_GET[ref]&id=$_GET[id]&mode=Cetak&periode=$_SESSION[pub_bulan]/$_SESSION[pub_tahun]";
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
							case 'View':
								switch($_GET['view']) {
									case 'Full':
										$_SESSION['pub_kodeRoot']=0;
										$_SESSION['pub_kodeParent']=0;										
										$sqlFitur="	SELECT F.idFitur, F.value, F.kdKatParent, F.kdKatChild 
													FROM tbl_fitur F, tbl_kelurahan L, tbl_user U 
													WHERE L.idKel='$_GET[id]' 
													AND L.idUser=U.idUser 
													AND F.idUser=U.idUser 
													AND F.bln='$_SESSION[pub_bulan]' 
													AND F.thn='$_SESSION[pub_tahun]'";
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