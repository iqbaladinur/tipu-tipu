<?php 
	require_once('../../lib/php/core.php');
	if ($_SESSION['login']==true) {header("location:../");}
	if ($_SESSION['admin']==true) {header("location:../pages");}
	$koneksi=conn($server,$username,$pass,$db);
	if ($_SERVER['REQUEST_METHOD']=='POST') { // Ngecek Apakah Sudah Klik Login
			$admin=$_POST['adm'];
			$pass=md5($_POST['admpass']);
			$sql="SELECT * FROM admin WHERE username='$admin'";
			$result=mysql_query($sql);
			if (mysql_num_rows($result) == 1) {
				$admin_data=mysql_fetch_array($result);
				if ($pass==$admin_data['password']) {
					$_SESSION['login']=true;
					$_SESSION['admin']=true;
					$_SESSION['id_usr']=$admin_data['username'];
					$_SESSION['id']=$admin_data['id'];
					header('Location:../pages/');
				}else{
					//galat3
					header('Location:../index.php?pas=Wrong Password!');
				}
			}else{
				//galat2
				header('Location:../index.php?usr=Wrong Username!');
			}
	}else{
		header('Location:../index.php?usr=Wrong Username!&pas=Wrong Password!');
	}
	mysql_close($koneksi);
?>