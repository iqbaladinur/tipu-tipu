<?php
	require_once('../../lib/php/core.php');
	if ($_SESSION['login']!=true) {header("location:../");}
	if ($_SESSION['admin']!=true) {header("location:../");}
	$koneksi=conn($server,$username,$pass,$db);
	if ($_SERVER['REQUEST_METHOD']=='POST') {
		$id 		=$_POST['id_admin'];
		$username 	=$_POST['edit_username'];
		$password 	=md5($_POST['edit_password_admin']);
		$mbrot = mysql_query("UPDATE admin SET username='$username', password='$password'") or die(mysql_error());
		if ($mbrot) {
			header('location:../pages/?page=setadmin&message=Update Successfully!');
		}else{
			header('location:../pages/?page=setadmin&message=update error!');
		}
	}else{
		header('location:../pages/?page=setadmin&message=update error!');
	}
	mysql_close($koneksi);
?>