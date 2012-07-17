<html>
	<head>
		<title>::LOGIN Sistem Monografi Kabupaten Tangerang::</title>
		<link href="./css/style.css" rel="stylesheet" type="text/css">
		<link rel="icon" href="./iamges/favicon.ico" type="image/x-icon"> 
		<link rel="shortcut icon" href="./images/favicon.ico" type="image/x-icon">
	</head>
	<body bgcolor="#492B6B" style="margin-top: 140px; margin-left: 100px;">
		<table cellpadding="0" cellspacing="0" align="center" width="656" border="0">
			<tr>
				<td width="256" valign="top" align="center">
					<form action="page.php?ref=auth_login" method="post">
						<table cellpadding="0" cellspacing="0" align="center" width="256" border="0">
							<tr>
								<td colspan="3" background="./images/ok_03.jpg" width="256" height="185"></td>
								</tr>
							<tr>
								<td background="./images/ok_05.jpg" width="106" height="72"></td>
								<td background="./images/ok_06.jpg" width="125" height="72">
									<div style="padding-bottom: 0px; padding-left: 5px;">
										<div style="padding-bottom: 2px;"><input type="text" name="userid" class="login"></div>
										<div style="padding-bottom: 7px;"><input type="password" name="password" class="login"></div>
										<div>
											<input type="reset" name="reset" value="Reset" class="tombol">
											<input type="submit" name="login" value="Login" class="tombol">							
											</div>
									</div>
									</td>
								<td background="./images/ok_07.jpg" width="25" height="72"></td>
								</tr>
							<tr>
								<td colspan="3" background="./images/ok_08.jpg" width="256" height="44">
									<div style="padding: 0 45px 0 0;"><div style="text-align: right; color: #515151; font-size: 10px; font-weight: bold;"></div></div>
									</td>
								</tr>
							</table>
						</form>
					</td>
				<td width="400" valign="top" style="padding-top: 80px;">
					<div style="color: yellow; font-weight: bold; font-size: 13px;">Selamat Datang di Sistem Monografi Kependudukan</div>
					<div style="background-color: yellow; border: 1px solid yellow; width: 410px; font-size: 0px;"></div>
					<div style="color: #ffffff; padding-top: 10px;">
						Merupakan Sistem Yang Mendukung Fitur E-Government, <br>
						Pada Kabupaten Tangerang, Propinsi Banten <br>
						Sistem Monografi Kependudukan Ini Akan Membantu Proses Pengolahan <br>
						Data Monografi Dari Desa/Kelurahan Ke Tiap Kecamatan Hingga Kabupaten.
						</div>
					<div style="color: yellow; padding-top: 10px;">
						<?php
						if(isset($_GET['alert']) && $_GET['alert']!="") {
							switch($_GET['alert']) {
								case 'wrong':
									echo "Maaf, Username atau Password salah.";
									break;
								case 'naughty':
									echo "Naughty. Silahkan Login terlebih dahulu.";
									break;
								case 'session_error':
									echo "Session Error. Silahkan Login kembali.";
									break;
								case 'empty':
									echo "Maaf, Username atau Password tidak boleh kosong.";
									break;
								case 'logout':
									echo "Terima Kasih.";
									break;
								default:
									echo "";
							}
						}
						else {
							
						}
						?>	
						</div>
					</td>
				</tr>
			</table>
	</body>
</html>