<?php session_start();error_reporting(0);?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php include 'res/meta.html';?>
	<title>Tukangtipu: Reset Password</title>
	<link rel="stylesheet" type="text/css" href="lib/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="lib/css/myapp.css">
</head>
<body>
<?php include 'res/header.php';?>
<?php if (isset($_GET['err']) and $_GET['err']==0) {?>
	<div style="margin-top:50px" class="alert alert-success alert-dismissible text-center" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		Password berhasil diperbaharui, silahkan login <a data-toggle='modal' href='#login'>disini.</a>
    </div>
<?php } ?>
<?php if (isset($_GET['err']) and $_GET['err']==1) {?>
	<div style="margin-top:50px" class="alert alert-danger alert-dismissible text-center" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		Password gagal diperbaharui, silahkan cek kode verifikasi email anda!
    </div>
<?php } ?>
<div class="top-navbar container" style="margin-bottom:80px">
	<div class="col-sm-3"></div>
	<div class="col-sm-6 with-border" style="padding:20px 40px">
		<h3 class="text-success text-center">Reset Password</h3><br>
		<form role="form" id="resetform" method="post" action="lib/php/update_password.php">
		<div class="row">
			<div class="col-sm-6">
				<div class="form-group">
				<label class="control-label text-success" for="email">E-mail</label>
			    <input name="email" type="email" class="form-control" required placeholder="your email">
			    </div>
			</div>
			<div class="col-sm-6">
				<div class="form-group">
				<label class="control-label text-success" for="email">Kode verifikasi</label>
			    <input name="kode" type="text" class="form-control" required placeholder="5 digit kode">
			    </div>
			</div>
		</div>
		<div class="form-group">
				<label class="control-label text-success" for="email">New Password</label>
			    <small id="warn1" class="hide text-danger">minimal 8 character!</small>
 				<input type="password" class="form-control" id="reset1" name="password" placeholder="Password" maxlength="15" required>
		</div>
		<div class="form-group">
				<label class="control-label text-success" for="email">Repeat</label>
			    <small id="warn2" class="hide text-danger">wrong repeat!</small>
 				<input type="password" class="form-control" id="reset2" name="repass" placeholder="Repeat password" maxlength="15" required>
		</div>
		<div class="text-center">
			<button class="btn btn-primary theme-btn"><span class="glyphicon glyphicon-refresh"></span> Reset Password</button>
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
<script type="text/javascript">
	$(document).ready(function(){
		$('#reset1').keyup(function(){
	        var warn=$('#warn1');
	        if (this.value.length<8) {
	            warn.removeClass('hide');
	        }else{
	            warn.addClass('hide');
	        };
	    });
	    $('#reset2').keyup(function(){
	         var pass=document.getElementById('reset1');
	         var warn=$('#warn2');
	         if (this.value!=pass.value) {
	            warn.removeClass('hide');
	         }else{
	            warn.addClass('hide');
	         };
	    });
	    $('resetform').submit(function(){
	    	var pass  =document.getElementById('reset1').value;
	    	var repass=document.getElementById('reset2').value;
	    	if (pass!=repass) {
	    		return false;
	    	};
	    });
	});
</script>
</html>

 
 