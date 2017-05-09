<?php
	session_start();
	if ($_POST['chapt']==$_SESSION['captcha']) {
		$header  = "Content-Type: text/html; charset=iso-8859-1\r\n";
		$header .= "From: [Pengaduan Tukangtipu.id]: ".$_POST['nama']." [".$_POST['email']."]\r\n";
		$header .= "Reply-To: suporter <".$_POST['email'].">\r\n";
		$to="support@ostryan.id";
		$subjek="[Pengaduan Tukangtipu.id] subjek: ".$_POST['subject'];
		$message=wordwrap($_POST['pesan'],1000);
		mail($to, $subjek, $message, $header);
		header("Location:../../connect.php?succes=1");	
	}else{
		header("Location:../../connect.php?err=1");
	}	
?>