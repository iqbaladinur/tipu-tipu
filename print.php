<?php
	error_reporting(0); 
	require_once('lib/php/core.php');
	$koneksi=conn($server,$username,$pass,$db);
	if (!isset($_GET['id']) or $_GET['id']=='') {
		header("location:index.php");
	}
	$id=$_GET['id'];
	$sql="SELECT * FROM data_penipu WHERE id_pnp=$id";
	$result=mysql_query($sql) or die(mysql_error());// prevent erorr
	$row=mysql_fetch_array($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php include 'res/meta.html';?>
	<title>Tukangtipu: Lihat</title>
	<link rel="stylesheet" type="text/css" href="lib/css/myapp.css">
	<style type="text/css">
		table{
			width:100%;
			border-collapse: collapse;
		}
		tr{
			border: 1px solid #DDDDDD;
		}
		td{
			padding:7px;
			border: 1px solid #DDDDDD;
			background-color: rgba(246, 246, 246, 0.5);
		}
		th{
			background-color:rgba(82, 175, 131, 0.5);
			color: white; 
			text-align: left;
			padding:7px;
			width:190px;
			border: 1px solid #DDDDDD;
			font-weight: normal;
		}
		#background{
			background-image: url(media/img-source/text.png);
			background-size: repeat;
		}
		#header{
			text-align:center;
		}
	</style>
</head>
<body>
<div id="background" style="padding:25px;width:100%;" class="with-border">
				<div id="header">
						<img style="border: 2px solid #DDDDDD;" width="150x" src="<?php if($row['foto']==""){echo "media/img-source/default.png";}else{echo "media/upload/penipu_img/".$row['foto'];}?>">
				</div>
				<br><h4>PROFIL PELAKU</h4>
				<table border="1">
					<tr>
						<th>Nama Terang</th>
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
						<th>Alias</th>
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
						<th>No. Telp</th>
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
						<th>No. Rekening</th>
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
						<th>Alamat</th>
						<td><?php if(!empty($row['alamat_pnp'])){echo $row['alamat_pnp'];}else{echo "No Data.";};?></td>
					</tr>
					<tr>
						<th>Jenis Penipuan</th>
						<td><?php if(!empty($row['jenis_tipu'])){echo $row['jenis_tipu'];}else{echo "No Data.";};?></td>
					</tr>
					<tr>
						<th>Bukti Penipuan</th>
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
						<th>Pin BBM</th>
						<td><?php if(!empty($row['pin_bbm'])){echo $row['pin_bbm'];}else{echo "No Data.";};?></td>
					</tr>
					<tr>
						<th>Facebook Link</th>
						<td><?php if(!empty($row['fb_link'])){echo $row['fb_link'];}else{echo "No Data.";};?></td>
					</tr>
					<tr>
						<th>Twitter Link</th>
						<td><?php if(!empty($row['tw_link'])){echo $row['tw_link'];}else{echo "No Data.";};?></td>
					</tr>
					<tr>
						<th>Instagram Link</th>
						<td><?php if(!empty($row['ig_link'])){echo $row['ig_link'];}else{echo "No Data.";};?></td>
					</tr>
					</table>
					<div style="text-align:center;padding-top:30px;color:rgb(204, 204, 204);">
						tukangtipu.id
					</div>
</div>
</body>
</html>
<?php 
	mysql_close($koneksi);
	$cetak = ob_get_contents();
	ob_end_clean();
	include('lib/php/MPDF57/mpdf.php');
	$mpdf=new mPDF('utf-8', 'A4');
	$mpdf->WriteHTML(utf8_encode($cetak));
	$mpdf->Output("printout_pnp_0".$row['id_pnp'].".pdf" ,'I');
	exit;		
?>