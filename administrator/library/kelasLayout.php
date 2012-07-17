<?php
	class Layout {
		var $title="::Selamat Datang di Sistem Monografi Kependudukan::";
		var $konten="";
		
		//Fungsi SET
		private function setTitle($title) {
			$this->desa=$desa;
		}
		
		function setKonten($konten) {
			$this->konten=$konten;
		}
		
		//Fungsi GEToride
		function getTitle() {
			return $this->title;
		}
		
		function getKonten() {
			return $this->konten;
		}
		
		function getTampilkan() {
			?>
			<html>
				<head>
					<title><?php echo Layout::getTitle(); ?></title>
					<link href="./css/style.css" rel="stylesheet" type="text/css">
					<script type="text/javascript">var tWorkPath="data.files/";</script>
					<script type="text/javascript">
						function hitung() {
							var jmlh = document.getElementById("jmlh").value;
							var luas = document.getElementById("luas").value;
							var padat = parseInt(jmlh)*(parseInt(luas)/100);
							
							document.getElementById("padat").value=parseInt(padat);
						}
						var tWorkPath="data.files/";
						</script>
					<script type="text/javascript" src="data.files/dtree.js"></script>
					<link rel="icon" href="./images/favicon.ico" type="image/x-icon"> 
					<link rel="shortcut icon" href="./images/favicon.ico" type="image/x-icon">
				</head>
				<body bgcolor="#ffffff" style="margin: 5px;">
					<table cellpadding="0" cellspacing="0" align="center" width="100%" border="0">
						<tr>
							<td bgcolor="#492B6B" height="105">
								<table cellpadding="0" cellspacing="0" width="100%" align="center" border="0">
									<tr>
										<td width="102">
											<div style="width: 102px; height: 105px; background: url(./images/monog_02.jpg); padding-right: 10px;"></div>
											</td>
										<td>
											<div style="padding-top: 25px;">
												<div style="padding-left: 10px; color: #ffffff; font-size: 14px; font-weight: bold;">
													SISTEM MONOGRAFI KEPENDUDUKAN
													<br>KABUPATEN TANGERANG
													<br>PROPINSI BANTEN
													</div>
												</div>
											</td>
										</tr>
									</table>
								</td>
							</tr>
						<tr>
							<td>
								<table width="100%" cellpadding="0" cellspacing="0" align="center" border="0">
									<tr>
										<td width="1" bgcolor="#492B6B"></td>
										<td width="180" height="500">
											<div>
												<div style="padding-bottom: 5px;">
													<div style="background-color: #EBE3F4; width: 180px; height: 20px;">
														<div style="padding-left: 5px; padding-top: 2px; font-weight:bold;">KONTEN</div>
														</div>
													</div>
												<div style="padding-bottom: 5px;">
													<div style="padding: 5px;">
														<?php
														include_once "./js/js_daerah.php";
														?>
														</div>
													</div>
												<div style="padding-bottom: 5px;">
													<div style="background-color: #EBE3F4; width: 180px; height: 20px;">
														<div style="padding-left: 5px; padding-top: 2px; font-weight:bold;">
															ADMIN 
															<?php
															$tok=new General;
															$idHak=$tok->tokenID($_SESSION['token']);
															if($idHak==1) {
																echo "KABUPATEN";
															}
															else {
																if($idHak==2) {
																	echo "KECAMATAN";
																}
																else {
																	echo "DESA";
																}
															}
															?>
															</div>
														</div>
													</div>
												<div style="padding-bottom: 5px;">
													<div style="padding: 5px;">
														<?php
														include_once "./js/js_administrasi.php";
														?>
														</div>
													</div>
												<div style="padding-bottom: 5px;">
													<div style="background-color: #EBE3F4; width: 180px; height: 20px;">
														<a href="./index.php" class="logout"><div style="padding: 2px 0 0 5px;font-variant: small-caps;">Home</div></a>
														</div>
													</div>
												<div style="padding-bottom: 5px;">
													<div style="background-color: #EBE3F4; width: 180px; height: 20px;">
														<a target="_blank" href="./page.php?ref=statistik&token=<?php echo $_SESSION['token']; ?>" class="logout"><div style="padding: 2px 0 0 5px;font-variant: small-caps;">Statistik</div></a>
														</div>
													</div>
												<div style="padding-bottom: 5px;">
													<div style="background-color: #EBE3F4; width: 180px; height: 20px;">
														<a href="./page.php?ref=logout" class="logout"><div style="padding: 2px 0 0 5px;font-variant: small-caps;">Logout</div></a>
														</div>
													</div>
												</div>
											</td>
										<td width="1" bgcolor="#492B6B"></td>
										<td><!-- Content Admin !-->
											<?php
											echo $this->getKonten();
											?>
											</td>
										<td width="1" bgcolor="#492B6B"></td>
										</tr>
									</table>									
								</td>
							</tr>
						<tr>
							<td align="right" bgcolor="#492B6B" height="20">
								<div style="padding: 3px 5px 0 0;">
									<div style="text-align: right; color: #ffffff; font-size: 11px;">Copyright&copy;2010. Developed by. <b>FahmiArdi_105091002868</b></div>
									</div>
								</td>
							</tr>
						</table>
				</body>
			</html>
			<?php
		}
	}
?>