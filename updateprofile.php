<?php
	error_reporting(0); 
	require_once('lib/php/core.php');
	$koneksi=conn($server,$username,$pass,$db);
	if (!isset($_GET['id']) or $_GET['id']==''){header('Location:index.php');}
	if ($_SESSION['login']!=true){header('Location:index.php');}
	if ($_SESSION['id_usr']!=$_GET['id']){header('Location:index.php');}
	$id=$_GET['id'];
	$sql="SELECT * FROM data_pelapor WHERE id_usr='$id'";
	$result=mysql_query($sql);
	$data=mysql_fetch_array($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php include 'res/meta.html';?>
	<title>Tukangtipu: Update Profil</title>
	<link rel="stylesheet" type="text/css" href="lib/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="lib/css/myapp.css">
</head>
<body>
	<?php include 'res/header.php';?>
	<div class="top-navbar container">
		<?php if (isset($_GET['err']) && $_GET['err']==1 ) {?>
			<div class="alert alert-danger alert-dismissible text-center" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<small>There is an error while updating your profile!</small>
			</div>
		<?php } ?>
		 <div class="col-sm-3"></div>
		 <div style="padding: 10px" class="col-sm-6 with-border">
		 	<div class="cover with-border" style="padding:10px">
		 		<center><img style="width:128px;height:128px;border-radius:100%" src="media/img-source/tuti.png" class="img-responsive" id="prev"></center>
		 	</div>
		 	<form role="form" method="post" action="lib/php/update.php" enctype="multipart/form-data">
			 	<div class="form-group">
				  <label class="control-label" for="pic">Select Picture</label>
				  <input name="picture" type="file" class="" id="pic" accept="image/.jpg,.png,.jpeg,.JPG,.PNG,.JPEG">
				</div>
				<div class="form-group">
				  <label class="control-label" for="nama">Nama Terang*</label>
				  <input name="nama" type="text" class="form-control" id="nama" value="<?php echo $data['nama_pelapor'];?>" required>
				</div>
				<div class="form-group">
				  <label class="control-label" for="no">No. Identitas (ktp/sim/kt.Pelajar)*</label>
				  <input name="no" type="number" class="form-control" id="no" value="<?php echo $data['no_identitas'];?>" required>
				</div>
				<div class="form-group">
				  <label class="control-label" for="pekerjaan">Pekerjaan*</label>
				  <input name="pekerjaan" type="text" class="form-control" id="pekerjaan" value="<?php echo $data['pekerjaan'];?>" required>
				</div>
				<div class="form-group">
				  <label class="control-label" for="alamat">Domisili*</label>
				  <input name="alamat" type="text" class="form-control" id="alamat" value="<?php echo $data['alamat_pelapor'];?>" required>
				</div>
				<div class="form-group">
				  <label class="control-label" for="alamat">Tanggal Lahir*</label>
				  <input name="ttl" type="date" class="form-control" id="tgl" value="<?php echo $data['tgl_lhr'];?>" required>
				</div>
				<div class="form-group">
				  <label class="control-label" for="jk">Gender</label>
				  <select name="gender" id="jk"  class="form-control">
					  <option <?php if($data['gender']=='laki-laki')echo "selected";?> value="laki-laki">Laki-laki</option>
					  <option <?php if($data['gender']=='perempuan')echo "selected";?> value="perempuan">Perempuan</option>
				  </select>
				</div>
				<div class="form-group">
				  <label class="control-label" for="sos">Akun Sosial Media</label>
				  <input name="sosmed" type="text" class="form-control" id="sos" value="<?php echo $data['sosmed'];?>" placeholder="fb/tw/ig/li">
				  <span class="hidden glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span>
				</div>
				<button type="submit" class="btn btn-primary theme-btn"><span class="glyphicon glyphicon-floppy-disk"></span> Update</button>
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
<?php
	mysql_close($koneksi);
?>