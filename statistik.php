<?php
	include_once "./library/FusionCharts/FusionCharts.php";
	$isi="
	<table cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" align=\"center\">
		<tr>
			<td bgcolor=\"EBE3F4\" height=\"20\" style=\"vertical-align: middle;\">
				<div style=\"padding-left: 5px; \">STATISTIK</div>
				</td>
			</tr>
		<tr>
			<td style=\"text-align: center;\">
				<div style=\"\">
					<div style=\"float: left; padding: 10px;\">
						<form action=\"./page.php?ref=$_GET[ref]\" method=\"post\">
							<select name=\"aksi\" onchange=\"this.form.submit()\">";
								$isi.="<option value=\"\">-Mode-</option>";
								$arr=array('2'=>'Tahunan','1'=>'Bulanan');
								foreach($arr as $key=>$val) {
									if(isset($_POST['aksi'])||isset($_SESSION['pub_aksi'])) {
										if($_POST['aksi']==$key||$_SESSION['pub_aksi']==$key) {
											$isi.="
											<option value=\"$key\" SELECTED>$val</option>";
											$_SESSION['pub_aksi']=$key;
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
							</form>
						</div>";
				if($_SESSION['pub_aksi']==1) {
					$isi.="
					<div style=\"float: left; padding-top: 10px;\">	
						<form action=\"./page.php?ref=$_GET[ref]\" method=\"post\">
							<select name=\"tah\" onchange=\"this.form.submit()\">";
								$isi.="<option value=\"\">-Tahun-</option>";
								$sqlTah="	SELECT thn 
											FROM tbl_fitur 
											WHERE kdKatParent='1.a' 
											GROUP BY thn";
								$queryTah=mysql_query($sqlTah,$general->opendb())or die($general->salah());
								if($queryTah != null) {
									if(mysql_num_rows($queryTah)>0) {
										while($rowTah=mysql_fetch_array($queryTah)) {
											if(isset($_POST['tah'])||isset($_SESSION['pub_tah'])) {
												if($_POST['tah']==$rowTah['thn']||$_SESSION['pub_tah']==$rowTah['thn']) {
													$isi.="
													<option value=\"$rowTah[thn]\" SELECTED>$rowTah[thn]</option>";
													$_SESSION['pub_tah']=$rowTah['thn'];
												}
												else {
													$isi.="
													<option value=\"$rowTah[thn]\">$rowTah[thn]</option>";
												}
											}
											else {
												$isi.="
												<option value=\"$rowTah[thn]\">$rowTah[thn]</option>";
											}
										}
									}
								}									
								$isi.="
								</select>
							</form>
						</div>
					</div>";				
					if($_SESSION['pub_aksi']==1) {
						$sqlCart="	SELECT value, bln 
									FROM tbl_fitur 
									WHERE thn='$_SESSION[pub_tah]' 
									AND kdKatParent='1.a' 
									GROUP BY bln";
						$xAxisName="Bulan";
						$caption="Statistik Perkembangan Penduduk Per Bulanan Tahun $_SESSION[pub_tah]";
					}
				}
				else {				
					if($_SESSION['pub_aksi']==2) {	
						$isi.="</div>";
						$sqlCart="	SELECT value, thn 
									FROM tbl_fitur 
									WHERE kdKatParent='1.a' 
									GROUP BY thn";
						$xAxisName="Tahun";
						$caption="Statistik Perkembangan Penduduk Per Tahunan";					
					}
				}				
			if($_SESSION['pub_aksi']!=""||$_SESSION['pub_tah']!="") {				
				$isi.="
				<div style=\"padding-top: 33px; text-align: center;\">";					
					$queryCart=mysql_query($sqlCart,$general->opendb()) or die($general->salah());
					if($queryCart != null) {
						if(mysql_num_rows($queryCart)>0) {
							$cart="<chart caption='$caption' xAxisName='$xAxisName' yAxisName='Total' showValues='0' formatNumberScale='0' showBorder='1'>";
							while($rowCart=mysql_fetch_array($queryCart)){
								if($_SESSION['pub_aksi']==2) {
									$sqlCek="	SELECT value, thn 
												FROM tbl_fitur 
												WHERE thn='$rowCart[thn]'";
									$queryCek=mysql_query($sqlCek,$general->opendb())or die($general->opendb());
									if($queryCek != null) {
										if(mysql_num_rows($queryCek)>0) {
											while($rowCek=mysql_fetch_array($queryCek)) {
												$total[$rowCart['thn']]+=(int)$rowCek['value'];
											}
										}
									}
									$cart.="<set label='$rowCart[thn]' value='".$total[$rowCart['thn']]."' />";
									
								}
								else {
									if($_SESSION['pub_aksi']==1&&$_SESSION['pub_tah']!="") {
										$value[$rowCart['bln']]=$rowCart['value'];
									}
								}
							}
							if(count($value)>0) {
								$arrayBulan=array('1'=>'Jan','2'=>'Peb','3'=>'Mar','4'=>'Apr','5'=>'Mei'
													,'6'=>'Jun','7'=>'Jul','8'=>'Agus','9'=>'Sept','10'=>'Okt'
													,'11'=>'Nop','12'=>'Des');
								foreach($arrayBulan as $key=>$val) {
									foreach($value as $jing) {
										if($jing!="") {
											$auth=true;
										}
										else {
											$auth=false;
										}
									}
									if($auth) {
										$cart.="<set label='$val' value='".(int)$value[$key]."' />";
									}
									else {
										$is=0;
										$cart.="<set label='$val' value='".$is."' />";
									}
								}
							}
							$cart.="</chart>";
							$isi.=renderChartHTML("./library/FusionCharts/Column3D.swf","",$cart,"PerkembanganPenduduk",700,400,false,false);	
						}
					}
			}
					$isi.="
					</div>
				</td>
			</tr>
		</table>";	
	
	$layout->setKonten($isi);	
	$layout->getTampilkan();
?>