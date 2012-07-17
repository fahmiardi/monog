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
var tcloseExpanded=0;
var tcloseExpandedXP=0;
var ttoggleMode=1;
var tnoWrap=1;
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
    ["tfontStyle=bold 8pt Tahoma","tfontColor=#FFFFFF,#FFFF00"],
];
var tXPStyles = [
];

var tmenuItems = [

    ["ADMINISTRASI","", "", "", "", "ADMINISTRASI", "_self", "0", "", "", ],
		<?php
		$tok=new General;
		$idHak=$tok->tokenID($_SESSION['token']);
		if($idHak==1) {
			?>
			["|Data Kecamatan","page.php?ref=kecamatan&mode=View&token=<?php echo $_GET['token']; ?>", "", "", "", "Data Kecamatan", "_self", "", "", "", ],
			["|Data Desa","page.php?ref=desa&mode=View&token=<?php echo $_GET['token']; ?>", "", "", "", "Data Desa", "_self", "", "", "", ],
			["|Data Account","page.php?ref=account&mode=View&act=do&level=kecamatan&token=<?php echo $_GET['token']; ?>", "", "", "", "Data Account", "_self", "", "", "", ],
			["|Data Kategori","page.php?ref=kategori&mode=View&act=do&kat=root&token=<?php echo $_GET['token']; ?>", "", "", "", "Data Kategori", "_self", "", "", "", ],			
			["|Data Satuan","page.php?ref=satuan&mode=View&token=<?php echo $_GET['token']; ?>", "", "", "", "Data Satuan", "_self", "", "", "", ],
			["|Data Monografi","page.php?ref=monografi&mode=View&token=<?php echo $_GET['token']; ?>", "", "", "", "Data Monografi", "_self", "", "", "", ],
			<?php
		}
		else {
			if($idHak==2) {
				?>
				["|Data Account","page.php?ref=account&mode=View&act=do&level=kecamatan&token=<?php echo $_GET['token']; ?>", "", "", "", "Data Account", "_self", "", "", "", ],
				["|Data Monografi","page.php?ref=monografi&mode=View&token=<?php echo $_GET['token']; ?>", "", "", "", "Data Monografi", "_self", "", "", "", ],
				<?php
			}
			else {
				?>
				["|Data Account","page.php?ref=account&mode=View&act=do&level=desa&token=<?php echo $_GET['token']; ?>", "", "", "", "Data Account", "_self", "", "", "", ],
				["|Data Monografi","page.php?ref=monografi&mode=View&token=<?php echo $_GET['token']; ?>", "", "", "", "Data Monografi", "_self", "", "", "", ],
				<?php
			}
		}
		?>
        
];

dtree_init();
</script>