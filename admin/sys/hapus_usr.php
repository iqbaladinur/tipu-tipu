<?php
	require_once('../../lib/php/core.php');
	if ($_SESSION['login']!=true) {header("location:../");}
	if ($_SESSION['admin']!=true) {header("location:../");}
	$koneksi=conn($server,$username,$pass,$db);
	if (isset($_GET['id'])) {
		$id=$_GET['id'];
		mysql_query("DELETE FROM user_id WHERE id_usr='$id'") OR die(mysql_error());	
		$cek=mysql_affected_rows();
		$quer=mysql_query("SELECT count(id_pnp) as jmllap FROM data_penipu WHERE id_usr='$id'") or die(mysql_error());
		$ceklaporan=mysql_fetch_row($quer);
		if ($ceklaporan['jmllap']==0) {
			mysql_query("DELETE FROM data_pelapor WHERE id_usr='$id'") or die(mysql_error());
		}
		if ($cek==0) {
			if ($_GET['page']=='setuser') {
				header("location:../pages/?page=setuser&error=1");
			}else{
				header("location:../pages/?error=1");
			}
		}else{
			if ($_GET['page']=='setuser') {
				header("location:../pages/?page=setuser&error=0");
			}else{
				header("location:../pages/?error=0");
			}
		}
	}
	mysql_close($koneksi);
?>