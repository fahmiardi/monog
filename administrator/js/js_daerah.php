<script type="text/javascript">
/*
   Deluxe Menu Data File
   Created by Deluxe Tuner v3.5
   http://deluxe-menu.com
*/


// -- Deluxe Tuner Style Names
var tstylesNames=["Font",];
var tXPStylesNames=[];
// -- End of Deluxe Tuner Style Names

//--- Common
var tlevelDX=15;
var texpanded=0;
var texpandItemClick=1;
var tcloseExpanded=1;
var tcloseExpandedXP=0;
var ttoggleMode=1;
var tnoWrap=0;
var titemTarget="_self";
var titemCursor="pointer";
var statusString="link";
var tblankImage="data.files/blank.gif";
var tpathPrefix_img="";
var tpathPrefix_link="";

//--- Dimensions
var tmenuWidth="170px";
var tmenuHeight="auto";

//--- Positioning
var tabsolute=0;
var tleft="0px";
var ttop="0px";

//--- Font
var tfontStyle="normal 8pt Tahoma";
var tfontColor=["#000000","#ffffff"];
var tfontDecoration=["none","underline"];
var tfontColorDisabled="#AAAAAA";
var tpressedFontColor="#AA0000";

//--- Appearance
var tmenuBackColor="#FFFFFF";
var tmenuBackImage="";
var tmenuBorderColor="#000";
var tmenuBorderWidth=0;
var tmenuBorderStyle="none";

//--- Item Appearance
var titemAlign="left";
var titemHeight=20;
var titemBackColor=["#ffffff","#492B6B"];
var titemBackImage=["",""];

//--- Icons & Buttons
var ticonWidth=16;
var ticonHeight=16;
var ticonAlign="left";
var texpandBtn=["data.files/expand.gif","data.files/expand.gif","data.files/collapse.gif"];
var texpandBtnW=8;
var texpandBtnH=8;
var texpandBtnAlign="left";

//--- Lines
var tpoints=1;
var tpointsImage="";
var tpointsVImage="";
var tpointsCImage="";
var tpointsBImage="";

//--- Floatable Menu
var tfloatable=0;
var tfloatIterations=6;
var tfloatableX=1;
var tfloatableY=1;

//--- Movable Menu
var tmoveable=0;
var tmoveHeight=12;
var tmoveColor="#AA0000";
var tmoveImage="";

//--- XP-Style
var tXPStyle=1;
var tXPIterations=5;
var tXPBorderWidth=1;
var tXPBorderColor="#456FA1";
var tXPAlign="left";
var tXPTitleBackColor="";
var tXPTitleBackImg="data.files/back.gif";
var tXPTitleLeft="data.files/left.gif";
var tXPTitleLeftWidth=25;
var tXPIconWidth=25;
var tXPIconHeight=25;
var tXPMenuSpace=10;
var tXPExpandBtn=["data.files/xp_expand.gif","data.files/xp_expand.gif","data.files/xp_collapse.gif","data.files/xp_collapse.gif"];
var tXPBtnWidth=25;
var tXPBtnHeight=25;
var tXPFilter=1;

//--- Advanced
var tdynamic=0;
var tajax=0;

//--- State Saving
var tsaveState=0;
var tsavePrefix="menu1";

var tstyles = [
    ["tfontStyle=bold 8pt Tahoma","tfontColor=#ffffff,#FFFF00"],
];
var tXPStyles = [
];

var tmenuItems = [

    ["DAERAH","", "", "", "", "DAERAH", "_self", "0", "", "", ],
		<?php
		$tok=new General;			
		$tokenID=$tok->tokenID($_SESSION['token']);//tokenID mengembalikan nilai idHak, 1=> superadmin, 2=> admin kecamatan, 3=> admin desa
		
		if($tokenID==1) {
			$sqlKec = "	SELECT idKec, namaKec 
						FROM tbl_kecamatan 
						ORDER BY namaKec ASC";
		}
		else {		
			if($tokenID==2) {
				$sqlKec = "	SELECT K.idKec, K.namaKec, U.userToken 
							FROM tbl_kecamatan K, tbl_user U 
							WHERE K.idUser=U.idUser 
							GROUP BY idKec 
							ORDER BY namaKec ASC";
			}
			else {
				$sqlKec = "	SELECT K.idKec, K.namaKec, U.userToken 
							FROM tbl_kecamatan K, tbl_user U, tbl_kelurahan L 
							WHERE K.idKec=L.idKec 
							AND L.idUser=U.idUser 
							GROUP BY idKec 
							ORDER BY namaKec ASC";
			}
		}
		$queryKec=mysql_query($sqlKec,General::opendb())or die(General::salah());
		if($queryKec != null) {
			if(mysql_num_rows($queryKec)>0) {
				while($rowKec=mysql_fetch_array($queryKec)) { 
					if($tokenID==1) { ?>
						["|<?php echo "<b>".strtoupper($rowKec['namaKec'])."</b>"; ?>","", "", "", "", "Kecamatan <?php echo strtoupper($rowKec['namaKec']); ?>", "", "", "", "", ],
						<?php
						$sqlDes="	SELECT idKel, namaKel 
									FROM tbl_kelurahan 
									WHERE idKec='$rowKec[idKec]' 
									ORDER BY namaKel ASC";
					}
					else {							
						if($tokenID==2) {
							if($rowKec['userToken']==$_SESSION['token']) { ?>
								["|<?php echo "<b>".strtoupper($rowKec['namaKec'])."</b>"; ?>","", "", "", "", "Kecamatan <?php echo strtoupper($rowKec['namaKec']); ?>", "", "", "", "", ],
								<?php
							}
							else { ?>
								["|<?php echo strtoupper($rowKec['namaKec']); ?>","", "", "", "", "Kecamatan <?php echo strtoupper($rowKec['namaKec']); ?>", "", "", "", "", ],
								<?php
							}
							$sqlDes="	SELECT L.idKel, L.namaKel, U.userToken 
										FROM tbl_kelurahan L, tbl_kecamatan K, tbl_user U 
										WHERE K.idKec='$rowKec[idKec]' 
										AND K.idKec=L.idKec 
										AND K.idUser=U.idUser 
										GROUP BY idKel 
										ORDER BY namaKel ASC";
						}
						else {
							$sqlCek="	SELECT K.idKec 
										FROM tbl_kecamatan K, tbl_kelurahan L, tbl_user U 
										WHERE U.userToken='$_SESSION[token]' 
										AND U.idUser=L.idUser 
										AND L.idKec=K.idKec";
							$queryCek=mysql_query($sqlCek,General::opendb())or die(General::salah());
							if($queryCek != null) {
								if(mysql_num_rows($queryCek)==1) {
									$rowCek=mysql_fetch_array($queryCek);
									if($rowCek['idKec']==$rowKec['idKec']) { ?>
										["|<?php echo "<b>".strtoupper($rowKec['namaKec'])."</b>"; ?>","", "", "", "", "Kecamatan <?php echo strtoupper($rowKec['namaKec']); ?>", "", "", "", "", ],
										<?php
									}
									else { ?>
										["|<?php echo strtoupper($rowKec['namaKec']); ?>","", "", "", "", "Kecamatan <?php echo strtoupper($rowKec['namaKec']); ?>", "", "", "", "", ],
										<?php
									}
								}
							}
							$sqlDes="	SELECT L.idKel, L.namaKel, U.userToken 
										FROM tbl_kelurahan L, tbl_kecamatan K, tbl_user U 
										WHERE K.idKec='$rowKec[idKec]' 
										AND L.idUser=U.idUser 
										AND K.idKec=L.idKec 
										GROUP BY idKel 
										ORDER BY namaKel ASC";
						}
					}
					$queryDes=mysql_query($sqlDes,General::opendb())or die(General::salah());
					if($queryDes != null) {
						if(mysql_num_rows($queryDes)>0) { 
							while($rowDes=mysql_fetch_array($queryDes)) { 
								if($tokenID==1) { ?>
									["||<?php echo "<b>".strtoupper($rowDes['namaKel'])."</b>"; ?>","page.php?ref=fitur&id=<?php echo $rowDes['idKel']; ?>&token=<?php echo $_SESSION['token']; ?>", "", "", "", "Desa/Kelurahan <?php echo strtoupper($rowDes['namaKel']); ?>", "_self", "", "", "", ],																
									<?php
								}
								else {
									if($rowDes['userToken']==$_SESSION['token']) { ?>
										["||<?php echo "<b>".strtoupper($rowDes['namaKel'])."</b>"; ?>","page.php?ref=fitur&id=<?php echo $rowDes['idKel']; ?>&token=<?php echo $_SESSION['token']; ?>", "", "", "", "Desa/Kelurahan <?php echo strtoupper($rowDes['namaKel']); ?>", "_self", "", "", "", ],																
									<?php
									}
									else { ?>
										["||<?php echo strtoupper($rowDes['namaKel']); ?>","page.php?ref=fitur&id=<?php echo $rowDes['idKel']; ?>&token=<?php echo $_SESSION['token']; ?>", "", "", "", "Desa/Kelurahan <?php echo strtoupper($rowDes['namaKel']); ?>", "_self", "", "", "", ],	
										<?php
									}
								}
							}
						}
					}
				} ?>
				<?php
			}
		}
		?>
	];
dtree_init();
</script>