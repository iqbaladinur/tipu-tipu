<?php
	error_reporting(0); 
	require_once('lib/php/core.php');
	$koneksi=conn($server,$username,$pass,$db);
	if (!isset($_GET['id']) or $_GET['id']=='') {
		header("location:index.php");
	}
	$id=$_GET['id'];
	$sql="SELECT * FROM data_penipu WHERE id_pnp='$id'";
	$result=mysql_query($sql) or die(mysql_error());// prevent erorr
	$row=mysql_fetch_array($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php include 'res/meta.html';?>
	<title>Tukangtipu: Lihat</title>
	<link rel="stylesheet" type="text/css" href="lib/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="lib/css/myapp.css">
</head>
<body>
	<?php include 'res/header.php';?>
	<div class="top-navbar container">
		<div class="row margin-sesuai">
			<div class="col-md-2"></div>
			<div class="col-md-8 with-border">
				<div class="text-right"><button id="label" class="btn btn-sm btn-primary btn-danger"><h3>Profil Penipu</h3></button></div>
				<div class="row">
					<div class="col-sm-4"></div>
					<div class="col-sm-4">
						<div class="card">
							<div class="card-img-header text-center">
								<img width="100%" src="<?php if($row['foto']==""){echo "media/img-source/default.png";}else{echo "media/upload/penipu_img/".$row['foto'];}?>">
							</div>
							<div class="card-content text-center">
								<b>Profil</b>
							</div>
						</div>
					</div>
					<div class="col-sm-4"></div>
				</div>
				<div class="table-responsive">
					<table class="table table-striped table-bordered">
						<tr>
							<td>Nama Terang</td>
							<td><?php
									if (!empty($row['nama_penipu'])) {
										echo $row['nama_penipu'];
									}else{
										echo "No Data.";
									}
								?>
							</td>
						</tr>
						<tr>
							<td>Alias</td>
							<td>
								<?php
									if (!empty($row['nama_alias1'])) {
										echo $row['nama_alias1'];
										if (!empty($row['nama_alias2']) ) {
											echo ',<br>'.$row['nama_alias2'];
										};
										if (!empty($row['nama_alias3']) ) {
											echo ',<br>'.$row['nama_alias3'];
										}
									}else{
										echo "No Data.";
									}
								?>
							</td>
						</tr>
						<tr>
							<td>No. Telp</td>
							<td>
								<?php
									if (!empty($row['notelp_pnp'])) {
										echo $row['notelp_pnp'];
										if (!empty($row['notelp_pnp2']) ) {
											echo '<br>'.$row['notelp_pnp2'];
										};
									}else{
										echo "No Data.";
									}
								?>
							</td>
						</tr>
						<tr>
							<td>No. Rekening</td>
							<td>
								<?php
									if (!empty($row['rek_pnp'])) {
										echo $row['rek_pnp'];
										if (!empty($row['rek_pnp2'])) {
											echo '<br>'.$row['rek_pnp2'];
										};
									}else{
										echo "No Data.";
									}
								?>
							</td>
						</tr>
						<tr>
							<td>Alamat</td>
							<td><?php if(!empty($row['alamat_pnp'])){echo $row['alamat_pnp'];}else{echo "No Data.";};?></td>
						</tr>
						<tr>
							<td>Jenis Penipuan</td>
							<td><?php if(!empty($row['jenis_tipu'])){echo $row['jenis_tipu'];}else{echo "No Data.";};?></td>
						</tr>
						<tr>
							<td>Bukti Penipuan</td>
							<td><?php
									if (!empty($row['bukti_tipu'])) {
										echo "<a href='".$row['bukti_tipu']."' target='_blank'>".$row['bukti_tipu']."</a>";
										if (!empty($row['bukti_foto'])) {
											echo "<br><a href='media/bukti_foto/".$row['bukti_foto']."' target='_blank'>Link Foto</a>";
										};
									}elseif(!empty($row['bukti_foto'])){
										echo "<a href='media/bukti_foto/".$row['bukti_foto']."' target='_blank'>Link</a>";
									}
								?>
							</td>
						</tr>
						<tr>
							<td>Pin BBM</td>
							<td><?php if(!empty($row['pin_bbm'])){echo $row['pin_bbm'];}else{echo "No Data.";};?></td>
						</tr>
						<tr>
							<td>Facebook Link</td>
							<td><?php if(!empty($row['fb_link'])){echo $row['fb_link'];}else{echo "No Data.";};?></td>
						</tr>
						<tr>
							<td>Twitter Link</td>
							<td><?php if(!empty($row['tw_link'])){echo $row['tw_link'];}else{echo "No Data.";};?></td>
						</tr>
						<tr>
							<td>Instagram Link</td>
							<td><?php if(!empty($row['ig_link'])){echo $row['ig_link'];}else{echo "No Data.";};?></td>
						</tr>
					</table>
				</div>
				<div style="margin-bottom:18px" class="container-fluid">
						<a class="btn btn-sm btn-primary theme-btn" href="viewprofile.php?id=<?php echo $row['id_usr'];?>">Lihat Pelapor</a> 
						<a class="btn btn-sm btn-primary theme-btn" href ="print.php?id=<?php echo $id;?>" target="_blank"><span class="glyphicon glyphicon-print"></span></a>
				</div>
			</div>
			<div class="col-md-2"></div>
		</div>
	</div>
	<?php include 'res/footer.html';?>
</body>
<script type="text/javascript" src="lib/js/jquery.js"></script>
<script type="text/javascript" src="lib/js/bootstrap.js"></script>
<script type="text/javascript" src="lib/js/myapp.js"></script>
</html>
<?php mysql_close($koneksi);?>