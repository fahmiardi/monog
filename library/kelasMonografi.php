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
													WEBSITE E-GOVERNMENT
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
										<?php
										$arrayMenu=array('home'=>'Home','visimisi'=>'Visi & Misi','mottolambang'=>'Motto & Lambang','struktur'=>'Struktur','monografi'=>'Monografi');
										foreach($arrayMenu as $key=>$value) {
											$ref="./page.php?ref=$key";
											if($_GET['ref']=="fitur"||$_GET['ref']=="statistik") {
												$_GET['ref']="monografi";
											}
											if($_GET['ref']==$key) {
												$bg="#EBE3F4";
												$text="bold";
											}
											else {
												$bg="#ffffff";
												$text="normal";
											}
										?>
										<td width="20%" bgcolor="<?php echo $bg; ?>">
											<a href="<?php echo $ref; ?>" class="mode" style="text-align: center; font-weight: <?php echo $text; ?>;" target="<?php echo $target; ?>"><?php echo $value; ?></a>
											</td>
										<?php
										}
										?>
										</tr>
									<tr>
										<td colspan="5" height="1" bgcolor="#EBE3F4"></td>
										</tr>
									</table>
								<table width="100%" cellpadding="0" cellspacing="0" align="center" border="0">									
									<tr>
										<td width="1" bgcolor="#EBE3F4"></td>
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
														<a target="_blank" href="./page.php?ref=statistik" class="logout"><div style="padding: 2px 0 0 5px;font-variant: small-caps;">Statistik</div></a>
														</div>
													</div>
												</div>
											</td>
										<td width="1" bgcolor="#EBE3F4"></td>
										<td><!-- Content Admin !-->											
											<?php
											echo $this->getKonten();
											?>
											</td>
										<td width="1" bgcolor="#EBE3F4"></td>
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