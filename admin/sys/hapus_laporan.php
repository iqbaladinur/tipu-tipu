<?php
	require_once('../../lib/php/core.php');
	if ($_SESSION['login']!=true) {header("location:../");}
	if ($_SESSION['admin']!=true) {header("location:../");}
	$koneksi=conn($server,$username,$pass,$db);
	if (isset($_GET['id'])) {
		$id=$_GET['id'];
		$foto=mysql_fetch_assoc(mysql_query("SELECT foto, bukti_foto FROM data_penipu WHERE id_pnp='$id'"));
		mysql_query("DELETE FROM data_penipu WHERE id_pnp='$id'") OR die(mysql_error());	
		$cek=mysql_affected_rows();
		if ($cek==0) {
			if ($_GET['page']=='laporan'){
				header("location:../pages/?page=laporan&message=data gagal dihapus!");
			}elseif($_GET['page']=='dtlaporan'){
				header("location:../pages/?page=dtpenipu&message=data gagal dihapus!");
			}else{
				header("location:../pages/?message=data gagal dihapus!");
			}
		}else{
			if ($_GET['page']=='laporan'){
				unlink("../../media/upload/penipu_img/".$foto['foto']);
				unlink("../../media/bukti_foto/".$foto['bukti_foto']);
				header("location:../pages/?page=laporan&message=data dihapus!");
			}elseif($_GET['page']=='dtlaporan'){
				unlink("../../media/upload/penipu_img/".$foto['foto']);
				unlink("../../media/bukti_foto/".$foto['bukti_foto']);
				header("location:../pages/?page=dtpenipu&message=data dihapus!");
			}else{
				unlink("../../media/upload/penipu_img/".$foto['foto']);
				unlink("../../media/bukti_foto/".$foto['bukti_foto']);
				header("location:../pages/?message=data dihapus!");
			}
		}
	}
	mysql_close($koneksi);
?>