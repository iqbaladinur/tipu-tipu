<?php
	error_reporting(0); 
	require_once('lib/php/core.php');
	$koneksi=conn($server,$username,$pass,$db);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php include 'res/meta.html';?>
	<title>Tukangtipu: Result</title>
	<link rel="stylesheet" type="text/css" href="lib/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="lib/css/myapp.css">
</head>
<body class="page-background">
	<?php include 'res/header.php';?>
	<div class="container-fluid top-navbar">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-4 text-center"></div>
				<div class="col-md-4 text-center">
					<form id="form2" role="form" method="get">
						<div class="search-group">
			      			<input id="search" name="search" type="text" class="form-control search" value="<?php echo $_GET['search'];?>" minlength="3" required>
			      			<span class="search-group-btn">
			        			<button class="btn search-btn" type="submit"><span class="glyphicon glyphicon-search"></span></button>
			      			</span>
			    		</div><br>
					    <label for="pilihmethod">Search by: </label>
					    <select class="select-op" id="option" name="option">
					    	<option class="select-op"<?php if($_GET['option']=='a'){echo"selected ";}?>value="a">Nama Asli Penipu/Nama Alias</option>
						    <option class="select-op"<?php if($_GET['option']=='b'){echo"selected ";}?>value="b">Nomor HP/Pin BBM</option>
						    <option class="select-op"<?php if($_GET['option']=='c'){echo"selected ";}?>value="c">Nomor Rekening</option>
					  	</select>
					</form>
				</div>
				<div class="col-md-4 text-center"></div>
			</div>
		</div><br>
		<div class="container-fluid">
			<?php
			if ($_GET['search']!=null) {
				$keyword=$_GET['search'];
				$method=$_GET['option'];
				if ($method=='a') {$query=searchbyname($keyword);}
				elseif ($method=="b") {$query=searchbykontak($keyword);}
				elseif ($method=="c") {$query=searchbyrek($keyword);}
				$totaldata=mysql_num_rows($query);
				if ($totaldata>0) {?>
				<div class="col-sm-12">
				<div class="alert alert-danger alert-dismissible text-center" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<strong>Waspada!</strong> Nama/Kontak/Nomor Rekening ini terindikasi bermasalah!
				</div>
				</div>
					<?php while ($row=mysql_fetch_array($query)) {?>
				<div class="col-sm-2">
					<div class='card'>
						<div class="card-img-header text-center">
							<img class="img-view" src="<?php if($row['foto']==""){echo "media/img-source/default.png";}else{echo "media/upload/penipu_img/".$row['foto'];}?>">
						</div>
						<div class="card-content text-center">
							<?php if($method=='a'){
									 echo $row['nama_alias1']==""?$row['nama_penipu']:$row['nama_penipu']."/".$row['nama_alias1'];
								  }elseif($method=='b'){echo $row['notelp_pnp'];}
								  elseif($method=='c'){echo $row['rek_pnp'];}
							?>
						</div>
						<div class="card-footer text-center">
							<a href="view.php?id=<?php echo $row['id_pnp'];?>" class="btn btn-sm btn-primary theme-btn">Lihat Data Penipu</a>
						</div>
					</div>
				</div>
			<?php }}else{?>
				<div class="col-sm-12 text center">
					<div class="alert alert-success alert-dismissible text-center" role="alert">
  						<div>
  							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  						</div>
  						Selamat!, Nama/Kontak/Nomor Rekening ini tidak terindikasi bermasalah!
					</div>
						<center><a class="link" href="index.php"><span class="glyphicon glyphicon-home"><br>HomePage</a></center>
				</div>
			<?php }}else{?>
				<div class="container text-center">
					<center><img id="logo" class="img-responsive" src="media/img-source/tuti.png"></center>
					<b>Please Enter a Keyword!</b>
				</div>
			<?php } ?>
		</div>
		</div>
	</div>
	<?php include 'res/footer-fixed.html';?>
</body>
<script type="text/javascript" src="lib/js/jquery.js"></script>
<script type="text/javascript" src="lib/js/bootstrap.js"></script>
<script type="text/javascript" src="lib/js/myapp.js"></script>
</html>
<?php mysql_close($koneksi);?>