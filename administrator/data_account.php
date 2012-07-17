<?php
	$idHak=$general->tokenID($_SESSION['token']);
	$isi="
	<table cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" align=\"center\">
		<tr>
			<td bgcolor=\"\" height=\"20\" style=\"vertical-align: middle;\">
				<div style=\"padding: 2px 0 0 5px; height: 18px; background-color: #EBE3F4;\">ADMINISTRASI: <b>Data Account</b></div>
				<div>
					<div style=\"float: left; padding: 5px; background-color: #EBE3F4;\">Mode:</div>";
					$arrayMode=array('View');
					if($_GET['mode']=="Edit"&&$_GET['idUser']!="") {
						$arrayMode[]="Edit";
					}
					if(count($arrayMode)!=0) {
						foreach($arrayMode as $arah) {
							$ref="page.php?ref=$_GET[ref]&mode=$arah&act=$_GET[act]&level=$_GET[level]&token=$_GET[token]";
							switch($arah) {									
								case 'Input':									
									$ico="input.ico";
									break;
								case 'View':
									$ico="view.ico";
									break;
								case 'Edit':
									$ref="page.php?ref=$_GET[ref]&mode=$arah&act=$_GET[act]&level=$_GET[level]&idUser=$_GET[idUser]&token=$_GET[token]";
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
					if($_GET['mode']=="View"&&$_GET['level']=="desa"&&$idHak==1) {
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
			<td style=\"padding: 5px 0 0 44px;\">";
				if($idHak==1) {
					$arrLevel=array("kecamatan","desa");
					foreach($arrLevel as $level){
						$refLev="page.php?ref=$_GET[ref]&mode=$_GET[mode]&act=$_GET[act]&level=$level&token=$_GET[token]";
						if($_GET['level']==$level) {
							$bg2="#EBE3F4";
							$txt="bold";
						}
						else {
							$bg2="#ffffff";
							$txt="normal";
						}
						$isi.="
						<div style=\"float: left; background-color: $bg2;\">
							<a href=\"$refLev\" class=\"mode\">
								<div style=\"text-align: center; font-weight: $txt;\">".strtoupper($level)."</div>
								</a>
							</div>";
					}
				}				
				$isi.="
				</td>
			</tr>
		<tr>
			<td bgcolor=\"#492B6B\" style=\"color: #492B6B;\">&nbsp;</td>
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
									$sqlInput="	INSERT INTO tbl_kelurahan 
												VALUES('','$_POST[namaDes]','','$_POST[idKec]','')";
									$queryInput=mysql_query($sqlInput,$general->opendb())or die($general->salah());
									if($queryInput != null) {
										$isi.="Input Data Desa/Kelurahan <b>$_POST[namaDes]</b> berhasil.";
										header("Refresh: 2; url= ./page.php?ref=$_GET[ref]&mode=View&token=$_GET[token]");
									}
								}
								else {
									$isi.="Maaf, Nama Desa/Kelurahan atau Kecamatan Tidak Boleh Kosong.";
								}
								break;
						}
						break;
					case 'View':
						if($idHak==1) {
							if($_GET['level']=="kecamatan") {
								$sqlAcc="	SELECT U.idUser, U.userName, U.pwd, K.namaKec 
											FROM tbl_user U, tbl_kecamatan K 
											WHERE U.idUser=K.idUser 
											ORDER BY namaKec ASC";
								/**
								$sqlAcc="	SELECT idKec, namaKec, idUser 
											FROM tbl_kecamatan 
											ORDER BY namaKec ASC";
								**/
							}
							else {
								if($_SESSION['opt']==2&&$_SESSION['opt_kec']!="") {
									$sqlAcc="	SELECT U.idUser, U.userName, U.pwd, K.namaKel 
												FROM tbl_user U, tbl_kelurahan K 
												WHERE U.idUser=K.idUser 
												AND K.idKec='$_SESSION[opt_kec]' 
												ORDER BY namaKel ASC";
									/**
									$sqlAcc="	SELECT idKel, namaKel, idUser 
												FROM tbl_kelurahan 
												WHERE idKec='$_SESSION[opt_kec]' 
												ORDER BY namaKel ASC";
									**/
								}
								else {
									$sqlAcc="	SELECT U.idUser, U.userName, U.pwd, K.namaKel 
												FROM tbl_user U, tbl_kelurahan K 
												WHERE U.idUser=K.idUser 
												ORDER BY namaKel ASC";
									/**
									$sqlAcc="	SELECT idKel, namaKel, idUser 
												FROM tbl_kelurahan 
												ORDER BY namaKel ASC";
									**/
								}
							}
						}
						else {
							if($idHak==2) {
								$idKec=$general->getUserKec($_SESSION['token']);
								$sqlAcc="	SELECT K.idUser, U.userName, U.pwd, K.namaKel 
											FROM tbl_user U, tbl_kelurahan K 
											WHERE U.idUser=K.idUser 
											AND K.idKec='$idKec' 
											ORDER BY namaKel ASC";
								/**
								$sqlAcc="	SELECT idKel, namaKel 
											FROM tbl_kelurahan 
											WHERE idKec='$idKec' 
											ORDER BY namaKel ASC";
								**/
							}
							else {
								$sqlAcc="	SELECT U.idUser, U.userName, U.pwd, K.namaKel 
											FROM tbl_user U, tbl_kelurahan K 
											WHERE U.idUser='$idUsr' 
											ORDER BY namaKel ASC";
								/**
								$sqlAcc="	SELECT idKel, namaKel 
											FROM tbl_kelurahan 
											WHERE idUser='' 
											ORDER BY namaKel ASC";
								**/
							}
						}						
						$queryAcc=mysql_query($sqlAcc,$general->opendb())or die($general->salah());
						if($queryAcc != null) {
							if(mysql_num_rows($queryAcc)>0) {
								$isi.="
								<table cellpadding=\"2\" cellspacing=\"2\" width=\"100%\" align=\"center\">
									<tr bgcolor=\"#492B6B\">
										<th width=\"5%\" align=\"left\" style=\"color: #ffffff;\">No.</th>
										<th width=\"25%\" align=\"left\" style=\"color: #ffffff;\">Nama ";
											if($idHak==1) {
												$isi.=strtoupper($_GET['level']);
											}
											else {
												$isi.="DESA";
											}											
											$isi.="
											</th>
										<th width=\"15%\" align=\"left\" style=\"color: #ffffff;\">Username</th>
										<th width=\"15%\" align=\"left\" style=\"color: #ffffff;\">Password</th>
										<th align=\"left\" style=\"color: #ffffff;\">Action</th>
										</tr>";
								$idx=1;
								$j=0;
								while($rowAcc=mysql_fetch_array($queryAcc)) {
									$sqlAdd="	SELECT username, pwd 
												FROM tbl_user 
												WHERE idUser=''";
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
										<td>";
											if($idHak==1) {
												if($_GET['level']=="kecamatan") {
													$isi.=strtoupper($rowAcc['namaKec']);
												}
												else {
													$isi.=strtoupper($rowAcc['namaKel']);
												}
											}
											else {												
												$isi.=strtoupper($rowAcc['namaKel']);
											}
											$isi.="
											</td>
										<td>$rowAcc[userName]</td>
										<td>$rowAcc[pwd]</td>
										<td>
											<a class=\"menu\" href=\"./page.php?ref=$_GET[ref]&mode=Edit&act=$_GET[act]&level=$_GET[level]&idUser=$rowAcc[idUser]&token=$_GET[token]\">Edit</a>
											</td>
										</tr>";
									$idx++;
								}
								$isi.="
									</table>";
							}
							else {
								if($_GET['level']=="kecamatan") {
									$isi.="Data Desa masih kosong.";
								}
								else {
									$isi.="Data Desa masih kosong.";
								}
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