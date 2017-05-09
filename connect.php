<?php session_start();error_reporting(0);?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php include 'res/meta.html';?>
	<title>Tukangtipu: Pengaduan</title>
	<link rel="stylesheet" type="text/css" href="lib/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="lib/css/myapp.css">
</head>
<body>
<?php include 'res/header.php';?>
<div class="top-navbar container" style="margin-bottom:80px">
	<?php
		if ($_GET['err']=="1") {?>
			<div class="alert alert-danger alert-dismissible text-center" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				Pesan Gagal dikirim, captcha yang anda masukan salah!			
			</div>
		<?php } elseif($_GET['succes']=="1"){?>
			<div class="alert alert-success alert-dismissible text-center" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				Pesan Terkirim, terimakasih atas saran dan masukannya. :)
			</div>
		<?php }?>
	
	<div class="col-sm-3"></div>
	<div class="col-sm-6 with-border" style="padding:10px 40px">
		<div class="text-center">
			<h3>Form Pengaduan</h3>
		</div>
		<form role="form" method="post" action="lib/php/hubungi.php">
			<div class="form-group">
				  <label class="control-label" for="nama">Nama</label>
				  <input name="nama" type="text" class="form-control" required>
			</div>
			<div class="form-group">
				  <label class="control-label" for="subject">Subject</label>
				  <input name="subject" type="text" class="form-control" required>
			</div>
			<div class="form-group">
				  <label class="control-label" for="email">E-mail</label>
				  <input name="email" type="email" class="form-control" required>
			</div>
			<div class="form-group">
				  <label class="control-label" for="pesan">Pesan</label>
				 <textarea name="pesan" class="form-control input-lg"></textarea>
			</div>
			<div class="form-group">
				  <label class="control-label" for="chapt">Captcha</label><br>
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
<?php include 'res/footer.html';?>
</body>
<script type="text/javascript" src="lib/js/jquery.js"></script>
<script type="text/javascript" src="lib/js/bootstrap.js"></script>
<script type="text/javascript" src="lib/js/myapp.js"></script>
</html>