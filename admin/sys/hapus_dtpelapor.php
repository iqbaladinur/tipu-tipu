<?php
	require_once('../../lib/php/core.php');
	if ($_SESSION['login']!=true) {header("location:../");}
	if ($_SESSION['admin']!=true) {header("location:../");}
	$koneksi=conn($server,$username,$pass,$db);
	if (isset($_GET['id'])) {
		$id=$_GET['id'];
		$foto=mysql_result(mysql_query("SELECT foto FROM data_pelapor WHERE id_usr='$id'"), 0);
		//hapus data
		mysql_query("DELETE FROM rate_pelapor WHERE id_usr='$id'") or die(mysql_error());
		mysql_query("DELETE FROM data_pelapor WHERE id_usr='$id'") OR die(mysql_error());	
		$cek=mysql_affected_rows();
		if ($cek==0) {
			header("location:../pages/?page=dtpelapor&message=Gagal menghapus data!");
		}else{
			//hapus foto
			unlink("../../media/upload/pelapor_img/".$foto);
			header("location:../pages/?page=dtpelapor&message=Data telah dihapus!");
		}
	}
	mysql_close($koneksi);
?>