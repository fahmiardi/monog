<?php
$isi.="
<script type=\"text/javascript\">
/*
   Deluxe Menu Data File
   Created by Deluxe Tuner v3.5
   http://deluxe-menu.com
*/


// -- Deluxe Tuner Style Names
var tstylesNames=[\"Font\",];
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
var titemTarget=\"_self\";
var titemCursor=\"pointer\";
var statusString=\"link\";
var tblankImage=\"data.files/blank.gif\";
var tpathPrefix_img=\"\";
var tpathPrefix_link=\"\";

//--- Dimensions
var tmenuWidth=\"170px\";
var tmenuHeight=\"auto\";

//--- Positioning
var tabsolute=0;
var tleft=\"0px\";
var ttop=\"0px\";

//--- Font
var tfontStyle=\"normal 8pt Tahoma\";
var tfontColor=[\"#000000\",\"#000000\"];
var tfontDecoration=[\"none\",\"underline\"];
var tfontColorDisabled=\"#AAAAAA\";
var tpressedFontColor=\"#AA0000\";

//--- Appearance
var tmenuBackColor=\"#ffffff\";
var tmenuBackImage=\"\";
var tmenuBorderColor=\"#000\";
var tmenuBorderWidth=0;
var tmenuBorderStyle=\"none\";

//--- Item Appearance
var titemAlign=\"left\";
var titemHeight=20;
var titemBackColor=[\"#ffffff\",\"#EBE3F4\"];
var titemBackImage=[\"\",\"\"];

//--- Icons & Buttons
var ticonWidth=16;
var ticonHeight=16;
var ticonAlign=\"left\";
var texpandBtn=[\"data.files/expand.gif\",\"data.files/expand.gif\",\"data.files/collapse.gif\"];
var texpandBtnW=8;
var texpandBtnH=8;
var texpandBtnAlign=\"left\";

//--- Lines
var tpoints=1;
var tpointsImage=\"\";
var tpointsVImage=\"\";
var tpointsCImage=\"\";
var tpointsBImage=\"\";

//--- Floatable Menu
var tfloatable=0;
var tfloatIterations=6;
var tfloatableX=1;
var tfloatableY=1;

//--- Movable Menu
var tmoveable=0;
var tmoveHeight=12;
var tmoveColor=\"#AA0000\";
var tmoveImage=\"\";

//--- XP-Style
var tXPStyle=1;
var tXPIterations=5;
var tXPBorderWidth=1;
var tXPBorderColor=\"#456FA1\";
var tXPAlign=\"left\";
var tXPTitleBackColor=\"\";
var tXPTitleBackImg=\"data.files/back.gif\";
var tXPTitleLeft=\"data.files/left.gif\";
var tXPTitleLeftWidth=25;
var tXPIconWidth=25;
var tXPIconHeight=25;
var tXPMenuSpace=10;
var tXPExpandBtn=[\"data.files/xp_expand.gif\",\"data.files/xp_expand.gif\",\"data.files/xp_collapse.gif\",\"data.files/xp_collapse.gif\"];
var tXPBtnWidth=25;
var tXPBtnHeight=25;
var tXPFilter=1;

//--- Advanced
var tdynamic=1;
var tajax=1;

//--- State Saving
var tsaveState=0;
var tsavePrefix=\"menu1\";

var tstyles = [
    [\"tfontStyle=bold 8pt Tahoma\",\"tfontColor=#ffffff,#FFFF80\"],
];
var tXPStyles = [
];

var tmenuItems = [
	
	[\"+NAVIGASI\",\"\", \"\", \"\", \"#\", \"NAVIGASI\", \"\", \"0\", \"\", \"\", ],";
	$sqlRoot="SELECT * FROM tbl_katroot";
	$queryRoot=mysql_query($sqlRoot,$general->opendb())or die($general->salah());
	if($queryRoot != null) {
		if(mysql_num_rows($queryRoot)>0) {
			while($rowRoot=mysql_fetch_array($queryRoot)) { 
				$isi.="[\"|$rowRoot[namaKatRoot]\",\"#$rowRoot[kdKatRoot]\", \"\", \"\", \"\", \"$rowRoot[namaKatRoot]\", \"_self\", \"\", \"\", \"\", ],";
				$sqlParent="SELECT kdKatParent, namaKatParent FROM tbl_katparent WHERE kdKatRoot='$rowRoot[kdKatRoot]'";
				$queryParent=mysql_query($sqlParent,$general->opendb())or die($general->salah());
				if($queryParent != null) {
					if(mysql_num_rows($queryParent)>0) {
						while($rowParent=mysql_fetch_array($queryParent)) { 
							$isi.="[\"||$rowParent[namaKatParent]\",\"#$rowParent[kdKatParent]\", \"\", \"\", \"\", \"$rowParent[namaKatParent]\", \"_self\", \"\", \"\", \"\", ],";
							$sqlChild="SELECT kdKatChild, namaKatChild FROM tbl_katchild WHERE kdKatParent='$rowParent[kdKatParent]'";
							$queryChild=mysql_query($sqlChild,$general->opendb())or die($general->salah());
							if($queryChild != null) {
								if(mysql_num_rows($queryChild)>0) {
									while($rowChild=mysql_fetch_array($queryChild)) { 
										$isi.="[\"|||$rowChild[namaKatChild]\",\"#$rowChild[kdKatChild]\", \"\", \"\", \"\", \"$rowChild[namaKatChild]\", \"_self\", \"\", \"\", \"\", ],";
									}
								}
							}
						}
					}
				}
			}
		}
	}
	$isi.="
    ];
dtree_init();
</script>";
?>