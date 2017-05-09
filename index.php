<?php session_start();error_reporting(0);?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php include 'res/meta.html';?>
	<title>Tukangtipu: Transaksi Nyaman!</title>
	<link rel="stylesheet" type="text/css" href="lib/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="lib/css/myapp.css">
</head>
<body class="page-background">
	<?php include 'res/header.php';?>
	<?php echo $_SESSION['failed_login'];?>
	<?php if ($_GET['success']==1) {?>
			<div id='hide' class="alert alert-success alert-dismissible text-center" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				 Anda berhasil mendaftar, cek email untuk verifikasi!
			</div>
	<?php } ?>
	<div class="top container-fluid">
		<div class="row">
		<div class="col-md-4 text-center"></div>
		<div class="col-md-4 text-center">
			<center><img id="logo" class="img-responsive fixit" src="media/img-source/tuti.png"></center>
			<h4 class="mini">Transaksi Online?<br>Cek Dulu Orangnya!</h4><br>
			<form id="searchform" action="searchresult.php" role="form" method="get">
				<div class="search-group">
	      			<input id="search" name="search" minlength="3" type="text" class="form-control search" autocomplete="off" minlength="3" placeholder="Keyword" required>
	      			<span class="search-group-btn">
	        			<button class="btn search-btn" type="submit"><span class="glyphicon glyphicon-search"></span></button>
	      			</span>
	    		</div><br>
			    <label for="pilihmethod">Search by: </label>
			    <select class="select-op" id="option" name="option">
			    	<option class="select-op" value="a">Nama Asli Penipu/Nama Alias</option>
				    <option class="select-op" value="b">Nomor HP/Pin BBM</option>
				    <option class="select-op" value="c">Nomor Rekening</option>
			  	</select>
			</form><br>
			<center><small>Butuh bantuan?<br>Pelajari<a href="faq.php"> disini</a></small></center>
		</div>
		<div class="col-md-4 text-center"></div>
		</div>
	</div>
<?php include 'res/footer-fixed.html';?>
</body>
<script type="text/javascript" src="lib/js/jquery.js"></script>
<script type="text/javascript" src="lib/js/bootstrap.js"></script>
<script type="text/javascript" src="lib/js/myapp.js"></script>

</html>