<?php
	require_once('core.php');
	$koneksi=conn($server,$username,$pass,$db);
	if ($_SERVER['REQUEST_METHOD']=='POST') {
		if ($_POST['chapt']==$_SESSION['captcha']) {
			$kode=random(5);
			$to=$_POST['email'];
			$result=mysql_query("UPDATE user_id SET reset_pass='$kode' WHERE e_mail='$to'") or die(header("Location:../../lupapassword.php?err=1"));
			$cek=mysql_affected_rows();
			if ($cek==0) {
				header("Location:../../lupapassword.php?err=1");
			}else{
				$header  = "MIME-Version: 1.0" . "\r\n";
				$header .= "Content-type:text/html;charset=UTF-8" . "\r\n";
				$header .= "From: account@tukangtipu.id"."\r\n";
				$subjek  ="Reset Password";
				$message="
						<!DOCTYPE html>
						<html lang'en'>
						<head></head>
						<body>
							<p>
								Abaikan jika anda tidak seharusnya menerima ini, berikut kode reset anda:<br>
								<b>Kode : ".$kode."</b><br>
								Masukan kode tersebut pada halaman <a href='ostryan.id/reset_password.php' target='_blank'> berikut.</a> 
							</p>
							
						</body>
						</html>";
				$param = "-fAccount@tukangtipu.id";
				mail($to, $subjek, $message, $header, $param);
				header("Location:../../lupapassword.php?err=0");
			}
				
		}else{
			header("Location:../../lupapassword.php?err=1");
		}
	}else{
		header("Location:../../lupapassword.php");
	}
	mysql_close($koneksi);	
?>