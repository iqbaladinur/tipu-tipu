<?php
	require_once('../lib/php/core.php');
	if ($_SESSION['login']==true) {
		header("Location:../");
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php include("../res/meta.html"); ?>
	<meta charset="UTF-8">
	<title>Verification</title>
	<link rel="stylesheet" type="text/css" href="../lib/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../lib/css/myapp.css">
</head>
<body>
	<nav class="navbar navbarku">
			<table class="responsive">
				<tr>
					<td class="text-left">
						<a href="../"><img class="resize" src="../media/img-source/logo2.png"></a>
					</td>
				</tr>
			</table>
	</nav>
	<div class="container">
		<div class="row top-navbar">
			<div class="col-sm-4"></div>
			<div class="col-sm-4 text-center">
				<center><img class="img-responsive" src="../media/img-source/tuti.png"></center>
				<?php
					if (isset($_GET['success']) or $_GET['success']!="") {
						if ($_GET['success']==1) {?>
							<h4 class="text-success text-center">Verification succesfull!</h4>
							<small>you can login <a data-toggle='modal' href="#login">here</a></small>
				  <?php }elseif ($_GET['success']==0) {?>
							<h4 class="text-danger text-center">Verification Failed!</h4>
							<small>please check your email! or report <a href="../connect.php">here</a></small>
				  <?php }
					}else{
						header("Location:../");
					}
				?>	
			</div>
			<div class="col-sm-4"></div>
		</div>
	</div>
	<!--login page-->
	<div class="modal fade" id="login" role="dialog">
	    <div class="modal-dialog modal-md">
	      <!-- Modal content-->
	      <div class="modal-content">
	        <div class="modal-header theme-btn">
	          <button type="button" class="close" data-dismiss="modal">&times;</button>
	          <h4 class="modal-title"><img class="resize" src="../media/img-source/logo2.png"></h4>
	        </div>
	        <div class="modal-body bol">
	          <form role="form" action="../lib/php/login.php" method="post">
	            <div class="form-group">
	              <label for="usrname"><span class="glyphicon glyphicon-user"></span> Username</label>
	              <input type="text" class="form-control" id="usrname" name="usr" placeholder="Username or E-mail" required autofocus>
	            </div>
	            <div class="form-group">
	              <label for="psw"><span class="glyphicon glyphicon-eye-open"></span> Password</label>
	              <input type="password" class="form-control" id="psw" name="psw" placeholder="Enter password" required>
	            </div>
	            <div class="checkbox">
	              <label><input type="checkbox" value="1" name="rememberme" checked>Remember me</label>
	            </div>
	              <button type="submit" class="btn theme-btn btn-block"><span class="glyphicon glyphicon-off"></span> Login</button>
	          </form>
	          <br>
	          <a href="#">Forgot Password?</a>
	        </div>
	        <div class="modal-footer">
	          <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Cancel</button>
	          <span class="pull-left">Not register yet?<br><a data-dismiss="modal" data-toggle="modal" href="#register">Register here!</a></span>
	        </div>
	      </div>
	    </div>
	</div>
</body>
<script type="text/javascript" src="../lib/js/jquery.js"></script>
<script type="text/javascript" src="../lib/js/bootstrap.js"></script>
<script type="text/javascript" src="../lib/js/myapp.js"></script>
</html>