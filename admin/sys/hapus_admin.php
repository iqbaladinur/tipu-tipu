<?php
	require_once('../../lib/php/core.php');
	if ($_SESSION['login']!=true) {header("location:../");}
	if ($_SESSION['admin']!=true) {header("location:../");}
	$koneksi=conn($server,$username,$pass,$db);
	if (isset($_GET['id'])) {
		$id=$_GET['id'];
		mysql_query("DELETE FROM admin WHERE id='$id'") OR die(mysql_error());	
		$cek=mysql_affected_rows();
		if ($cek==0) {
			if ($_GET['page']=='setadmin'){
				header("location:../pages/?page=setadmin&error=1");
			}else{
				header("location:../pages/?error=1");
			}
		}else{
			if ($_GET['page']=='setadmin'){
				header("location:../pages/?page=setadmin&error=0");
			}else{
				header("location:../pages/?error=0");
			}
		}
	}
	mysql_close($koneksi);
?>