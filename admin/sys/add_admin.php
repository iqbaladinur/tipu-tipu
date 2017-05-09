<?php
	require_once('../../lib/php/core.php');
	if ($_SESSION['login']!=true) {header("location:../");}
	if ($_SESSION['admin']!=true) {header("location:../");}
	$koneksi=conn($server,$username,$pass,$db);
	if ($_SERVER['REQUEST_METHOD']=='POST') {
		$username=$_POST['username'];
		$password=md5($_POST['password']);
		$cek=mysql_num_rows(mysql_query("SELECT * FROM admin WHERE username='$username'"));
		if ($cek==0) {
			mysql_query("INSERT into admin(username,password) VALUES ('$username','$password')") or die(mysql_error());
			header('location:../pages/?page=setadmin&error=0adm');
		}else{
			header('location:../pages/?page=setadmin&error=1adm');
		}
	}else{
		header('location:../pages/?page=setadmin&error=1adm');
	}
	mysql_close($koneksi);
?>