<?php
	$isi="
	<table cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" align=\"center\">
		<tr>
			<td bgcolor=\"\" height=\"20\" style=\"vertical-align: middle;\">
				<div style=\"padding: 2px 0 0 5px; height: 18px; background-color: #EBE3F4;\">ADMINISTRASI: <b>Data Desa</b></div>
				<div>
					<div style=\"float: left; padding: 5px; background-color: #EBE3F4;\">Mode:</div>";
					$arrayMode=array('Input','View');
					if($_GET['mode']=="Edit"&&$_GET['idKel']!="") {
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
									$ref="page.php?ref=$_GET[ref]&mode=$arah&act=do&idDes=$_GET[idDes]&token=$_GET[token]";
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
								<div style=\"text-align: center; font-weight: $text;\">$arah</div>
								</a>
							</div>";
						}
					}
					if($_GET['mode']=="View") {
						$isi.="
						<div style=\"float: left; padding: 5px; background-color: #EBE3F4;\">Sort By :</div>
						<div style=\"float: left; padding: 5px;\">							
							<form action=\"$ref\" method=\"post\" style=\"margin: 0px; float: left; padding-right: 5px;\">
								<select name=\"opt\" onchange=\"this.form.submit();\">";
									$arr=array("1"=>"All","2"=>"Kecamatan");
									foreach($arr as $key=>$val) {
										if(isset($_POST['opt'])||isset($_SESSION['opt'])) {
											if($_POST['opt']==$key||$_SESSION['opt']==$key) {
												$isi.="
												<option value=\"$key\" SELECTED>$val</option>";
												$_SESSION['opt']=$key;
											}
											else {
												$isi.="
												<option value=\"$key\">$val</option>";
											}
										}
										else {
											$isi.="
											<option value=\"$key\">$val</option>";
										}
									}
									$isi.="
									</select>
								</form>";
								if($_SESSION['opt']=="2") {
									$isi.="
									<form action=\"$ref\" method=\"post\" style=\"margin: 0px; float: left;\">
										<select name=\"opt_kec\" onchange=\"this.form.submit();\">
											<option value=\"\">-Pilih-</option>";
											$sqlKec="	SELECT idKec, namaKec 
														FROM tbl_kecamatan 
														ORDER BY namaKec ASC";
											$queryKec=mysql_query($sqlKec,$general->opendb())or die($general->salah());
											if($queryKec!=null) {
												if(mysql_num_rows($queryKec)>0) {
													while($rowKec=mysql_fetch_array($queryKec)) {
														if(isset($_POST['opt_kec'])||isset($_SESSION['opt_kec'])) {
															if($_POST['opt_kec']==$rowKec['idKec']||$_SESSION['opt_kec']==$rowKec['idKec']) {
																$isi.="
																<option value=\"$rowKec[idKec]\" SELECTED>".strtoupper($rowKec[namaKec])."</option>";
																$_SESSION['opt_kec']=$rowKec['idKec'];
															}
															else {
																$isi.="
																<option value=\"$rowKec[idKec]\">".strtoupper($rowKec[namaKec])."</option>";
															}
														}
														else {
															$isi.="
															<option value=\"$rowKec[idKec]\">".strtoupper($rowKec[namaKec])."</option>";
														}
													}
												}
											}
											$isi.="
											</select>
										</form>";
								}
								$isi.="
							</div>";
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
											<td width=\"20%\" bgcolor=\"#492B6B\" style=\"padding: 5px; color: #ffffff; font-weight: bold;\">Nama Desa/Kelurahan</td>
											<td bgcolor=\"#EBE3F4\" style=\"padding: 5px;\"><input class=\"value2\" type=\"text\" name=\"namaDes\"></td>
											</tr>
										<tr>
											<td bgcolor=\"#492B6B\" style=\"padding: 5px; color: #ffffff; font-weight: bold;\">Kecamatan</td>
											<td bgcolor=\"#EBE3F4\" style=\"padding: 5px;\">
												<select name=\"idKec\">
													<option value=\"\">-Pilih-</option>";
												$sqlKec="	SELECT idKec, namaKec 
															FROM tbl_kecamatan 
															ORDER BY namaKec ASC";
												$queryKec=mysql_query($sqlKec,$general->opendb())or die($general->salah());
												if($queryKec!=null) {
													if(mysql_num_rows($queryKec)>0) {
														while($rowKec=mysql_fetch_array($queryKec)) {
															$isi.="<option value=\"$rowKec[idKec]\">".strtoupper($rowKec['namaKec'])."</option>";
														}
													}
												}
												$isi.="
													</select>
												</td>
											</tr>
										<tr>
											<td bgcolor=\"#492B6B\"></td>
											<td bgcolor=\"#EBE3F4\" style=\"text-align: right; padding: 5px;\"><input type=\"submit\" name=\"save\" value=\"Save\"></td>
											</tr>
										</table>
									</form>";
								break;
							case 'execute':
								if($_POST['save']=="Save"&&$_POST['namaDes']!=""&&$_POST['idKec']!="") {
									$uniq=$general->createRandomUser();
									$uniq_uname=$general->createRandomUname();
									$uniq_pwd=$general->createRandomPwd();
									$uniq_pwd_enc=$general->Encrypt($uniq_pwd);
									$sqlInput="	INSERT INTO tbl_kelurahan 
												VALUES('','$_POST[namaDes]','$uniq','$_POST[idKec]','')";
									$queryInput=mysql_query($sqlInput,$general->opendb())or die($general->salah());
									if($queryInput != null) {
										$sqlInput2="INSERT INTO tbl_user 
													VALUES('','$uniq','$uniq_uname','$uniq_pwd_enc','$uniq_pwd','','3')";
										$queryInput2=mysql_query($sqlInput2,$general->opendb())or die($general->salah());
										if($queryInput2 != null) {
											$isi.="Input Data Desa/Kelurahan <b>$_POST[namaDes]</b> berhasil.";
											header("Refresh: 2; url= ./page.php?ref=$_GET[ref]&mode=View&token=$_GET[token]");
										}
									}
								}
								else {
									$isi.="Maaf, Nama Desa/Kelurahan atau Kecamatan Tidak Boleh Kosong.";
								}
								break;
						}
						break;
					case 'View':
						if($_SESSION['opt']=="2"&&isset($_SESSION['opt_kec'])) {
							$sqlDes="	SELECT idKel, namaKel 
										FROM tbl_kelurahan 
										WHERE idKec='$_SESSION[opt_kec]' 
										ORDER BY namaKel ASC";
						}
						else {
							$sqlDes="	SELECT idKel, namaKel 
										FROM tbl_kelurahan 
										ORDER BY namaKel ASC";
						}						
						$queryDes=mysql_query($sqlDes,$general->opendb())or die($general->salah());
						if($queryDes != null) {
							if(mysql_num_rows($queryDes)>0) {
								$isi.="
								<table cellpadding=\"2\" cellspacing=\"2\" width=\"100%\" align=\"center\">
									<tr bgcolor=\"#492B6B\">
										<th width=\"5%\" align=\"left\" style=\"color: #ffffff;\">No.</th>
										<th width=\"25%\" align=\"left\" style=\"color: #ffffff;\">Nama Desa</th>
										<th align=\"left\" style=\"color: #ffffff;\">Action</th>
										</tr>";
								$idx=1;
								$j=0;
								while($rowDes=mysql_fetch_array($queryDes)) {
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
										<td>".strtoupper($rowDes['namaKel'])."</td>
										<td>
											<a class=\"menu\" href=\"./page.php?ref=$_GET[ref]&mode=Edit&act=do&idKel=$rowDes[idKel]&token=$_GET[token]\">Edit</a>";
											$sqlCek="	SELECT D.idKel 
														FROM tbl_kelurahan D, tbl_fitur F 
														WHERE D.idKel='$rowDes[idKel]' 
														AND D.idUser=F.idUser";
											$queryCek=mysql_query($sqlCek,$general->opendb())or die($general->salah());
											if($queryCek!=null) {
												if(mysql_num_rows($queryCek)<=0) {
													$rowCek=mysql_fetch_array($queryCek);
													$isi.="
													 | <a class=\"menu\" onclick=\"return confirm('Anda Yakin?');\" href=\"./page.php?ref=$_GET[ref]&mode=Edit&act=hapus&idKel=$rowDes[idKel]&token=$_GET[token]\">Hapus</a>";
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
								$isi.="Data desa/kelurahan masih kosong.";
							}
						}
						break;
					case 'Edit':
						switch($_GET['act']) {
							case 'do':
								$idKel=(int)$_GET['idKel'];
								$sqlUp="SELECT idKel, namaKel, idKec 
										FROM tbl_kelurahan 
										WHERE idKel='$idKel'";
								$queryUp=mysql_query($sqlUp,$general->opendb())or die($general->salah());
								if($queryUp != null) {
									if(mysql_num_rows($queryUp)==1) {
										$rowUp=mysql_fetch_array($queryUp);
									}
								}
								$isi.="
								<form action=\"./page.php?ref=$_GET[ref]&mode=Edit&act=update&idKel=$rowUp[idKel]&token=$_GET[token]\" method=\"post\" style=\"margin: 0px;\">
									<table cellpadding=\"2\" cellspacing=\"2\" align=\"center\" width=\"100%\">
										<tr>
											<td width=\"20%\" bgcolor=\"#492B6B\" style=\"padding: 5px; color: #ffffff; font-weight: bold;\">Nama Desa/Kelurahan</td>
											<td bgcolor=\"#EBE3F4\" style=\"padding: 5px;\"><input class=\"value2\" type=\"text\" name=\"namaDes\" value=\"$rowUp[namaKel]\"></td>
											</tr>
										<tr>
											<td bgcolor=\"#492B6B\" style=\"padding: 5px; color: #ffffff; font-weight: bold;\">Kecamatan</td>
											<td bgcolor=\"#EBE3F4\" style=\"padding: 5px;\">
												<select name=\"idKec\">
													<option value=\"\">-Pilih-</option>";
												$sqlKec="	SELECT idKec, namaKec 
															FROM tbl_kecamatan 
															ORDER BY namaKec ASC";
												$queryKec=mysql_query($sqlKec,$general->opendb())or die($general->salah());
												if($queryKec!=null) {
													if(mysql_num_rows($queryKec)>0) {
														while($rowKec=mysql_fetch_array($queryKec)) {
															if($rowUp['idKec']==$rowKec['idKec']) {
																$isi.="<option value=\"$rowKec[idKec]\" SELECTED>".strtoupper($rowKec['namaKec'])."</option>";
															}
															else {
																$isi.="<option value=\"$rowKec[idKec]\">".strtoupper($rowKec['namaKec'])."</option>";
															}
														}
													}
												}
												$isi.="
													</select>
												</td>
											</tr>
										<tr>
											<td bgcolor=\"#492B6B\"></td>
											<td bgcolor=\"#EBE3F4\" style=\"text-align: right; padding: 5px;\"><input type=\"submit\" name=\"save\" value=\"Save\"></td>
											</tr>
										</table>
									</form>";
								break;
							case 'update':
								$idKel=(int)$_GET['idKel'];
								if($_POST['save']=="Save"&&$_POST['namaDes']!=""&&$_POST['idKec']!="") {
									$sqlUp="	UPDATE tbl_kelurahan 
												SET namaKel='$_POST[namaDes]', idKec='$_POST[idKec]' 
												WHERE idKel='$idKel'";
									$queryInput=mysql_query($sqlUp,$general->opendb())or die($general->salah());
									if($queryInput != null) {
										$isi.="Update Data Desa/Kelurahan <b>$_POST[namaKel]</b> berhasil.";
										header("Refresh: 2; url= ./page.php?ref=$_GET[ref]&mode=View&token=$_GET[token]");
									}
								}
								else {
									$isi.="Maaf, Nama Desa/Kelurahan atau Kecamatan Tidak Boleh Kosong.";
								}
								break;
							case 'hapus':
								$idKel=(int)$_GET['idKel'];
								if($general->isEmptyKelurahan($idKel)) {
									$sqlDel="DELETE FROM tbl_kelurahan WHERE idKel='$idKel'";
									$queryDel=mysql_query($sqlDel,$general->opendb())or die($general->salah());
									if($queryDel != null) {
										$isi.="Hapus Data Desa/Kelurahan Berhasil.";
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