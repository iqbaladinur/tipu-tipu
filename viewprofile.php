<?php
	require_once('lib/php/core.php');
	$koneksi=conn($server,$username,$pass,$db);
	if (!isset($_GET['id'])) {
		header("location:index.php");
	}
	$id=$_GET['id'];
	$sql="SELECT foto, nama_pelapor, gender, tgl_lhr,alamat_pelapor, no_identitas, sosmed FROM data_pelapor WHERE id_usr='$id'";
	$result=mysql_query($sql) or die(mysql_error());
	if (mysql_num_rows($result)!=1) {
		header("location:index.php");//if id is not exist
	}else{
		$data=mysql_fetch_array($result);
		if (empty($data['nama_pelapor']) or empty($data['alamat_pelapor'] or empty($data['no_identitas']))) {
			header("location:updateprofile.php?id=".$id);
		}
		$rating=mysql_query("SELECT AVG(rating) AS rated FROM rate_pelapor WHERE id_usr='$id'") or die(mysql_error());
		$ratenum=mysql_fetch_array($rating);
	}
	mysql_close($koneksi);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php include 'res/meta.html';?>
	<title>Tukagtipu: Lihat Profile</title>
	<link rel="stylesheet" type="text/css" href="lib/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="lib/css/myapp.css">
</head>
<body>
	<?php include 'res/header.php';?>
<div style="margin-bottom:70px">
  <div style="padding:0px 20px">
	<div class="top-navbar container with-border">
		<div class="card card-content cover">
			<center>
				<?php 
					$cek=cekpic($data['foto'],$defaultpics);
					if ($cek==true) {?>				
						<a data-toggle='modal' href="#tampil-foto"><img class="img-responsive negative" src="media/upload/<?php echo "default_profile/".$data['foto'];?>"></a>
				<?php } else {?>
						<a data-toggle='modal' href="#tampil-foto"><img class="img-responsive profile" src="media/upload/<?php echo "pelapor_img/".$data['foto'];?>"></a>
				<?php } ?>
			</center>
			<h4 class="text-center text-capitalize white"><?php echo $data['nama_pelapor'];?></h4>
		</div>
		<div class="row">
			<div class="col-md-2">
				<div class="card">
					<div style="background-color:#FEC530" class="card-header text-center">
						<h5 class="white">Rating</h5>
					</div>
					<div id="rating" class="card-content text-center tinggi">
						<center><img src="media/img-source/<?php rating($ratenum['rated']);?>"></center>
					</div>
				</div>
			</div>
			<div class="col-md-2">
				<div class="card">
					<div style="background-color:<?php if($data['gender']=='perempuan')echo '#E58EDC';else echo '#A4ABF9';?>" class="card-header text-center">
						<h5 class="white">Gender</h5>
					</div>
					<div id="gender" class="card-content text-center white tinggi">
						<?php echo $data['gender'];?>
					</div>
				</div>
			</div>
			<div class="col-md-2">
				<div class="card">
					<div style="background-color:#38A88F" class="card-header text-center">
						<h5 class="white">Tanggal lahir</h5>
					</div>
					<div id="date" class="card-content text-center tinggi">
						<?php echo $data['tgl_lhr'];?>
					</div>
				</div>
			</div>
			<div class="col-md-2">
				<div class="card">
					<div style="background-color:#EF8026" class="card-header text-center">
						<h5 class="white">Alamat</h5>
					</div>
					<div id="location" class="card-content text-center white tinggi">
						<?php echo $data['alamat_pelapor'];?>
					</div>
				</div>
			</div>
			<div class="col-md-2">
				<div class="card">
					<div style="background-color:#32C3A4" class="card-header text-center">
						<h5 class="white">Nomor identitas</h5>
					</div>
					<div id="identity" class="card-content text-center tinggi">
						<?php echo $data['no_identitas'];?>
					</div>
				</div>
			</div>
			<div class="col-md-2">
				<div class="card">
					<div style="background-color:#799FDD" class="card-header text-center">
						<h5 class="white">Sosial link</h5>
					</div>
					<div id="sosmed" class="card-content text-center tinggi">
						<?php echo $data['sosmed'];?>
					</div>
				</div>
			</div>
		</div>
		<div style='margin-bottom:15px' class='text-right'>
			<?php if ($_SESSION['id_usr']==$_GET['id']) {?>
						<a class='btn btn-sm btn-primary theme-btn' href='updateprofile.php?id=<?php echo $id;?>'><span class='glyphicon glyphicon-edit'></span> Edit Profil</a>
			<?php }else{?>
				<a style="border:none;border-radius:2px" class='btn btn-sm btn-warning' href='lib/php/rate.php?id=<?php echo $_GET['id'];?>&rating=1'><span class='glyphicon glyphicon-star'></span></a>
				<a style="border:none;border-radius:2px" class='btn btn-sm btn-warning' href='lib/php/rate.php?id=<?php echo $_GET['id'];?>&rating=2'><span class='glyphicon glyphicon-star'></span><span class='glyphicon glyphicon-star'></span></a>
				<a style="border:none;border-radius:2px" class='btn btn-sm btn-warning' href='lib/php/rate.php?id=<?php echo $_GET['id'];?>&rating=3'><span class='glyphicon glyphicon-star'></span><span class='glyphicon glyphicon-star'></span><span class='glyphicon glyphicon-star'></span></a>
			<?php } ?>
		</div>
	</div>
  </div>
</div>
	<!--modal-->
	<div class="modal fade" id="tampil-foto" role="dialog">
	  	<div style="padding-top:10px;padding-right:20px">
	    	<button type="button" class="close white" data-dismiss="modal">&times;</button>
	  	</div>
	    <div class="modal-dialog modal-md">
	      <!-- Modal content-->
	      <center style="padding-top:100px">
	        <?php 
	          $cek=cekpic($data['foto'],$defaultpics);
	          if ($cek==true) {?>       
	            <img class="img-responsive negative" src="media/upload/<?php echo "default_profile/".$data['foto'];?>">
	        <?php } else {?>
	            <img class="img-responsive" src="media/upload/<?php echo "pelapor_img/".$data['foto'];?>">
	        <?php } ?>
	      </center>
	    </div>
	</div>
<?php include 'res/footer-fixed.html';?>
</body>
<script type="text/javascript" src="lib/js/jquery.js"></script>
<script type="text/javascript" src="lib/js/bootstrap.js"></script>
<script type="text/javascript" src="lib/js/myapp.js"></script>
</html>