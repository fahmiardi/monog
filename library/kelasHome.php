<?php
	class Home {
		var $title="::Selamat Datang di Website E-Government Kabupaten Tangerang::";
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
										<td width="1" bgcolor="#EBE3F4"></td>										
										<td><!-- Content Admin !-->
											<table width="100%" cellpadding="0" cellspacing="0" align="center" border="0">
												<tr>
													<?php
													$arrayMenu=array('home'=>'Home','visimisi'=>'Visi & Misi','mottolambang'=>'Motto & Lambang','struktur'=>'Struktur','monografi'=>'Monografi');
													foreach($arrayMenu as $key=>$value) {
														$ref="./page.php?ref=$key";
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
												</table>
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