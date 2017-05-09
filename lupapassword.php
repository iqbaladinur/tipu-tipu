<?php session_start();error_reporting(0);?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php include 'res/meta.html';?>
	<title>Tukangtipu: Lupa Password</title>
	<link rel="stylesheet" type="text/css" href="lib/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="lib/css/myapp.css">
</head>
<body>
<?php include 'res/header.php';?>
<?php if (isset($_GET['err']) and $_GET['err']==0) {?>
	<div style="margin-top:50px" class="alert alert-success alert-dismissible text-center" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		 Cek email untuk mereset password, masukan kode <a href="reset_password.php">disini!</a>
    </div>
<?php } ?>
<?php if (isset($_GET['err']) and $_GET['err']==1) {?>
	<div style="margin-top:50px" class="alert alert-danger alert-dismissible text-center" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		 Email atau chapta yang anda masukan salah!
    </div>
<?php } ?>
<div class="top-navbar container" style="margin-bottom:80px">
	<div class="col-sm-3"></div>
	<div class="col-sm-6 with-border" style="padding:10px 40px">
		<div class="text-center">
			<h3 class="text-success">Masukan email anda!</h3>
		</div>
		<form role="form" method="post" action="lib/php/resetpassword.php">
			<div class="form-group">
				  <label class="control-label text-success" for="email">E-mail</label>
				  <input name="email" type="email" class="form-control" required placeholder="your email">
			</div>
			<div class="form-group">
				  <label class="control-label text-success" for="chapt">Captcha</label><br>
				  <div id="gender" class="with-border">
				  	<center><img class="img-responsive" src="lib/php/captcha.php"></center>
				  	<input name="chapt" placeholder="Verifikasi captcha disini" type="text" class="form-control" required>
				  </div>
			</div>
			<div class="text-right">
				<button class="btn btn-primary theme-btn"><span class="glyphicon glyphicon-send"></span> Kirim</button>
			</div>
		</form>
	</div>
	<div class="col-sm-3"></div>
</div>
<?php include 'res/footer-fixed.html';?>
</body>
<script type="text/javascript" src="lib/js/jquery.js"></script>
<script type="text/javascript" src="lib/js/bootstrap.js"></script>
<script type="text/javascript" src="lib/js/myapp.js"></script>
</html>