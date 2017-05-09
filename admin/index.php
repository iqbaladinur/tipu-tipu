<?php
	error_reporting(0);
	require_once('../lib/php/core.php');
	if ($_SESSION['login']==true && $_SESSION['admin']==true) {
		header('Location:adminview.php');
	}elseif ($_SESSION['login']==true) {
		header('Location:../');
	}
	$koneksi=conn('localhost','root','','kenatipudb');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php include '../res/meta.html';?>
	<title>Admin: Login!</title>
	<link rel="icon" href="">
	<link rel="stylesheet" type="text/css" href="../lib/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../lib/css/myapp.css">
</head>
<body class="color-theme white">
	<nav class="navbar navbarku"></nav>
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-4"></div>
			<div class="col-sm-4 login-panel">
				<center><a href="../index.php"><img class="img-responsive" src="../media/img-source/logo2.png"></a></center><br>
				<form action="sys/login.php" role="form" method="post">
				  <small class="text-danger"><?php echo $_GET['usr'];?></small>	
			      <input type="text" class="form-control" id="usrname" name="adm" placeholder="Username" required autofocus><small class="text-danger"><?php echo $_GET['pas'];?></small><br>
			      <input type="password" class="form-control" id="psw" name="admpass" placeholder="Password" required><br>
			      <button type="submit" class="btn btn-info btn-block">Login Now!</button>
				</form>
			</div>
			<div class="col-sm-4"></div>
		</div>
	</div>
<nav class="navbar navbar-fixed-bottom text-center">
	<p>tukangtipu.id</p>
</nav>
</body>
</html>