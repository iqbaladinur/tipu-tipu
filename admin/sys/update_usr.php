<?php
	require_once('../../lib/php/core.php');
	if ($_SESSION['login']!=true) {header("location:../");}
	if ($_SESSION['admin']!=true) {header("location:../");}
	$koneksi=conn($server,$username,$pass,$db);
	if ($_SERVER['REQUEST_METHOD']=='POST') {
		$id 		=$_POST['edit_id_usr'];
		$email 		=$_POST['edit_email'];
		$password 	=md5($_POST['edit_password']);
		$status 	=$_POST['edit_status'];
		$gokil=mysql_query("UPDATE user_id SET e_mail='$email', pass='$password', confirm='$status' WHERE id_usr='$id'") or die(mysql_error());
		if ($gokil) {
			header("location:../pages/?page=setuser&messages=Success Updating Data!");
		}else{
			header('location:../pages/?page=setuser&messages=Error Updating data!');
		}
	}else{
		header('location:../pages/?page=setuser&message=update error!');
	}
	mysql_close($koneksi);
?>