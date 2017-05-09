<?php
	require_once('../../lib/php/core.php');
	if ($_SESSION['login']!=true) {header("location:../");}
	if ($_SESSION['admin']!=true) {header("location:../");}
	$koneksi=conn($server,$username,$pass,$db);
	if ($_SERVER['REQUEST_METHOD']=='POST') {
		$foto=$defaultpics[array_rand($defaultpics)];
		$id_user=$_POST['id_usr'];
		$email=$_POST['email'];
		$password=md5($_POST['password']);
		$cek=mysql_num_rows(mysql_query("SELECT * FROM user_id WHERE id_usr='$id_user' or e_mail='$email'"));
		if ($cek==0) {
			mysql_query("INSERT into user_id(id_usr,e_mail,pass,confirm) VALUES ('$id_user','$email','$password','yes')") or die(mysql_error());
			$cek=mysql_num_rows(mysql_query("SELECT id_usr WHERE id_usr='$id_user'"));
			if ($cek==0) {
				mysql_query("INSERT into data_pelapor(id_usr,foto) VALUES ('$id_user','$foto')") or die(mysql_error());
			}
			header('location:../pages/?page=setuser&error=0usr');
		}else{
			header('location:../pages/?page=setuser&error=1usr');
		}
	}else{
		header('location:../pages/?page=setuser&error=1usr');
	}
	mysql_close($koneksi);
?>