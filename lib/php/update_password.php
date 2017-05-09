<?php
	require_once('core.php');
	$koneksi=conn($server,$username,$pass,$db);
	if ($_SERVER['REQUEST_METHOD']=='POST') {
		$email		=$_POST['email'];
		$kode 		=$_POST['kode'];
		$password 	=$_POST['password'];
		$repass 	=$_POST['repass'];
		if ($password==$repass) {
			$password=md5($password);
		    $RESULT=mysql_query("UPDATE user_id SET pass='$password' WHERE e_mail='$email' and reset_pass='$kode'") 
		    		or die(header("location:../../reset_password.php?err=1"));
		    $cek=mysql_affected_rows();
		    if ($cek==0) {
		    	header("location:../../reset_password.php?err=1");
		    }else{
		    	header("location:../../reset_password.php?err=0");
		    }
		}else{
			header("location:../../reset_password.php?err=1");
		}	
	}else{
		header("location:../../reset_password.php?err=1");
	}
	mysql_close($koneksi);
?>