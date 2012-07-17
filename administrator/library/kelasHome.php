<?php
	class Home {
		var $isi="";
		
		function setIsi($isi) {
			$this->isi=$isi;
		}
		
		function getTampilkan() {
			echo $this->isi;
		}
	}
?>