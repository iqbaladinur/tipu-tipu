<?php
	require_once('core.php');
	$koneksi=conn($server,$username,$pass,$db);
	if (isset($_GET['rating'])) {
		givearate($_GET['id'],$_GET['rating']);
	}
	mysql_close($koneksi);
	header("location:../../viewprofile.php?id=".$_GET['id']);
?>