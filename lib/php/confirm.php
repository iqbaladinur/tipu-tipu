<?php
	require_once('core.php');
	$koneksi=conn($server,$username,$pass,$db);
	if (isset($_GET['id'])) {
		$id=$_GET['id'];
		$sql="UPDATE user_id SET confirm='yes' WHERE id_usr='$id'";
		mysql_query($sql) or die(header("location:../../mailer/verification.php?success=0"));
		$cek=mysql_affected_rows();
		if ($cek==0) {
			header("Location:../../mailer/verification.php?success=0");
		}else{
			header("Location:../../mailer/verification.php?success=1");
		}
	}else{
		header("Location:../../mailer/verification.php?success=0");
	}
	mysql_close($koneksi);
?>