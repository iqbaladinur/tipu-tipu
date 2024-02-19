<?php 
	require_once('core.php');
	if ($_SESSION['login']==true) {
		header("Location:../../");
	}
	$koneksi=conn($server,$username,$pass,$db);
	if ($_SERVER['REQUEST_METHOD']=='POST') { // Ngecek Apakah Sudah Klik Login
		$user=$_POST['usr'];
		$password=md5($_POST['psw']);
		//set cookie
		/*
		if ($_POST['rememberme']==1) {
			setcookie("username", $username, time() + (86400 * 30), "/");
			setcookie("pass", $password, time() + (86400 * 30), "/");
		}
		*/
		$sql="SELECT * FROM user_id WHERE id_usr='$user' OR e_mail='$user'";
		$result=mysql_query($sql);
		var_dump($sql);
		var_dump(mysql_num_rows($result));
		// if (mysql_num_rows($result) == 1) { //cek sql result
		// 	$data_user=mysql_fetch_array($result);
		// 	if ($password==$data_user['pass']) { //cek password
		// 		if ($data_user['confirm']=='yes') {//cek confirmation
		// 			$_SESSION['login']=true;
		// 			$_SESSION['id_usr']=$data_user['id_usr'];
		// 			$_SESSION['e_mail']=$data_user['e_mail'];
		// 			$_SESSION['failed_login']="";
		// 		header('Location:../../');	
		// 		}else{
		// 			$_SESSION['failed_login']="<div id='hide' class='alert alert-danger alert-dismissible text-center' role='alert'>
		// 										<div>
		// 										  	<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
		// 										</div>
		// 									  	<i>Login Failed, please confirm the registation!</i>
		// 								   		</div>";
		// 			header('Location:../../');
		// 		}
		// 	}else{
		// 		$_SESSION['failed_login']="<div id='hide' class='alert alert-danger alert-dismissible text-center' role='alert'>
		// 										<div>
		// 										  	<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
		// 										</div>
		// 									  	<i>Login Failed, Wrong Username or Password!</i>
		// 								   </div>";
		// 		header('Location:../../');
		// 	}
		// }else{
		// 	$_SESSION['failed_login']="<div id='hide' class='alert alert-danger alert-dismissible text-center' role='alert'>
		// 									<div>
		// 									  	<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
		// 									</div>
		// 								  	<i>Login Failed, Wrong Username or Password!</i>
		// 							    </div>";
		// 	header('Location:../../');
		// }
	}else{
		header('Location:../../');
	}
	mysql_close($koneksi);
?>
