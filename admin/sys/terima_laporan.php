<?php
	require_once('../../lib/php/core.php');
	if ($_SESSION['login']!=true) {header("location:../");}
	if ($_SESSION['admin']!=true) {header("location:../");}
	$koneksi=conn($server,$username,$pass,$db);
	if (isset($_GET['id'])) {
		$id=$_GET['id'];
		mysql_query("UPDATE data_penipu SET status=1 where id_pnp=$id") or die(mysql_error());
		$cek=mysql_affected_rows();
		if ($cek==0) {
			if ($_GET['data-page']=='quickaccess') {
				header("location:../pages/?error=1");
			}else{
				header("location:../pages/?page=laporan&error=1");
			}
		}else{
			if ($_GET['data-page']=='quickaccess') {
				header("location:../pages/?error=0");
			}else{
				header("location:../pages/?page=laporan&error=0");
			}
		}
	}
	mysql_close($koneksi);
?>