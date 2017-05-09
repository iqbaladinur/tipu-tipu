<?php
	require_once('core.php');
	if ($_SESSION['login']==true) {
		header("Location:../../");
	}
	$foto=$defaultpics[array_rand($defaultpics)];
	$koneksi=conn($server,$username,$pass,$db);
	if ($_SERVER['REQUEST_METHOD']=='POST') {
		$user=$_POST['username'];
		$almail=$_POST['mail'];
		$password=md5($_POST['password']);
		$sql="SELECT * FROM user_id WHERE id_usr='$user' or e_mail='$almail'";
		$result=mysql_query($sql);
		if (mysql_num_rows($result)==0) {
			//username avaible and email avaible
			$siql="INSERT into user_id(id_usr,e_mail,pass,confirm) VALUES ('$user','$almail','$password','no')";
			mysql_query($siql) or die(mysql_error());
			$siql2="INSERT into data_pelapor(id_usr,foto) VALUES ('$user','$foto')";
			mysql_query($siql2) or die(mysql_error());
		//send email verif
			$to=$almail;
			$subjek="Hi, Tukangtipu.id [Account Verification]";
			$message="
				<!DOCTYPE html>
				<html lang'en'>
				<head></head>
				<body>
				<br>
					Abaikan jika anda tidak merasa mendaftar, <br>
					Untuk melakukan verifikasi silahkan klik tautan berikut <a href='http://ostryan.id/mailer/?id=".$user."'target='_blank'> verifikasi</a>
					<br>
					<br>
					<br>
					Jangan balas email ini!
				</body>
				</html>"; 
			// Always set content-type when sending HTML email
			$header  = "MIME-Version: 1.0" . "\r\n";
			$header .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			$header .= '[Register Tukangtipu.id]: Verifikasi' . "\r\n";
			$param	 = "-fVerifikasi@tukangtipu.id";
			mail($to, $subjek, $message, $header, $param);
		//mail end
			$_SESSION['failed_login']="";
			header('Location:../../?success=1');
		}else{
			//user or email alreadyexist
			$_SESSION['failed_login']="<div id='hide' class='alert alert-danger alert-dismissible text-center' role='alert'>
											<div>
											  	<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
											</div>
										  	<i>Register Failed, Username or e_mail already exist!</i>
									    </div>";
			header('Location:../../');
		}
	}else{
		//galat1
		header('Location:../../');
	} 
	mysql_close($koneksi);
?>
