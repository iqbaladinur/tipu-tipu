<?php
	if (isset($_GET['id']) or $_GET['id']!="") {
		header("Location:../lib/php/confirm.php?id=".$_GET['id']);
	}else{
		header("Location:../");
	}
?>
