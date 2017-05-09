<?php
	require_once('lib/php/core.php');
	$koneksi=conn($server,$username,$pass,$db);
	$id=$_SESSION['id_usr'];
	$result=mysql_query("SELECT nama_pelapor,alamat_pelapor,no_identitas from data_pelapor where id_usr='$id'") or die(mysql_error());
	$data=mysql_fetch_array($result);
	if ($_SESSION['login']!=true) {
		header('Location:index.php');
	}
	if (empty($data['nama_pelapor']) or empty($data['alamat_pelapor'] or empty($data['no_identitas']))) {
			header("location:updateprofile.php?id=".$id);
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php include 'res/meta.html';?>
	<title>Tukangtipu: Lapor!</title>
	<link rel="stylesheet" type="text/css" href="lib/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="lib/css/myapp.css">
</head>
<body>
	<?php include 'res/header.php';?>
	<div class="top-navbar container">
		<?php
			if ($_GET['succes']==1) {?>
				<div class="alert alert-success alert-dismissible text-center" role="alert">
					<div>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					</div>
					Laporan anda berhasil dikirim.
				</div>
		<?php } elseif ($_GET['err']==1) {?>
				<div class="alert alert-danger alert-dismissible text-center" role="alert">
					<div>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					</div>
					Laporan anda gagal dikirim, silahkan ulangi lagi.
				</div>
		<?php } ?>
		<div class="col-sm-4">
			<div class="panel panel-default">
			  <div class="panel-heading"><b>Instruksi !</b></div>
			  <div class="panel-body">
			  	<p>Anda bertanggung jawab penuh atas data penipu yang akan dilaporkan.</p>
			  	<p>Alur pelaporan adalah sebagai berikut:</p>
			  	<ol type="number">
			  		<li>Pelapor harus login dan melengkapi data diri terlebih dahulu.</li>
			  		<li>Pelapor mengisi form informasi mengenai penipu yang akan dilaporkan.</li>
			  		<li>Sebelum terindex dalam database tukangtipu, data yang dilaporkan akan terlebih dahulu direview oleh admin untuk memastikan keabsahannya.</li>
			  	</ol>
			  	<p>
			  		Kami berhak mengubah atau menghapus data yang anda laporkan apabila tidak sesuai dengan kenyataan.<br>
			  	</p>
			  	<p>
			  		Ket: * wajib diisi
			  	</p>
			  </div>
			</div>
		</div>
		<div class="col-sm-8">
			<div class="panel panel-default">
			  <div class="panel-heading"><b>Laporkan Penipu</b></div>
			  <div class="panel-body">
			  	<form role="form" action="lib/php/lapor.php" method="post" enctype="multipart/form-data">
			  		<div class="form-group">
					  <label class="control-label" for="profil">Profil Penipu (opsional, file type: png, jpg, jpeg)</label>
					  <input id="profil" type="file" name="profil"  accept="image/.jpg,.png,.jpeg,.JPG,.PNG,.JPEG">
					</div>
				  	<div class="form-group">
					  <label class="control-label" for="namapnp">Nama Penipu*</label>
					  <input id="namapnp" name="namapnp" type="text" class="form-control" placeholder="nama penipu" required>
					</div>
					<div id="aliasname" class="row hidden">
						<div class="col-sm-4">
							<div class="form-group">
							  <label class="control-label" for="alias1">Nama alias (opsional)</label>
							  <input id="alias1" name="alias1" type="text" class="form-control">
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
							  <label class="control-label" for="alias2">Nama alias (opsional)</label>
							  <input id="alias2" name="alias2" type="text" class="form-control" >
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
							  <label class="control-label" for="alias3">Nama alias (opsional)</label>
							  <input id="alias3" name="alias3" type="text" class="form-control" >
							</div>
						</div>
					</div>
					<div class="form-group">
					  <label class="control-label" for="norek">No. Rekening*</label>
					  <input id="norek" name="norek" type="number" class="form-control" placeholder="ex. 621...." required>
					</div>
					<div id="noreklain" class="form-group hidden">
					  <label class="control-label" for="norek2">No. Rekening lain (opsional)</label>
					  <input id="norek2" name="norek2" type="number" class="form-control">
					</div>
					<div class="form-group">
					  <label class="control-label" for="nohp">No. Hp*</label>
					  <input id="nohp" name="nohp" type="number" class="form-control" placeholder="ex. +628...." required>
					</div>
					<div id="nohplain" class="form-group hidden">
					  <label class="control-label" for="nohp2">No. Hp lain (opsional)</label>
					  <input id="nohp2" name="nohp2" type="number" class="form-control">
					</div>
					<div class="form-group">
					  <label class="control-label" for="BBM">Pin BBM (opsional)</label>
					  <input id="BBM" name="BBM" type="text" class="form-control" placeholder="ex. 7fyt...">
					</div>
					<div class="form-group">
					  <label class="control-label" for="alamat">Alamat (opsional)</label>
					  <input id="alamat" name="alamat" type="text" class="form-control" placeholder="RT/RW/Desa/Kelurahan/Kabupaten/Kota/Provinsi">
					</div>
					<div class="form-group">
					  <label class="control-label" for="jenispenipuan">Jenis Penipuan*</label>
					  <select name="jenispenipuan" id="jenispenipuan"  class="form-control">
					  	<option value="COD">COD</option>
					  	<option value="SMS Penipuan">SMS Penipuan</option>
					  	<option value="Olshop">Online Shop</option>
					  	<option value="Lainnya">Lainnya</option>
				  	  </select>
					</div>
					<div class="form-group">
					  <label class="control-label" for="kronologi">Kronologi Penipuan*</label>
					  <textarea style="height:100px" id="kronologi" name="kronologi" class="form-control" placeholder="Ceritakan kronologi penipuan yang anda atau orang lain alami.." required></textarea>
					</div>
					<div class="form-group">
					  <label class="control-label" for="bukti1">Bukti Penipuan*</label>
					  <input id="bukti1" name="bukti1" type="text" class="form-control" required placeholder="link bukti penipuan">
					</div>
					<div id="buktifoto" class="form-group hidden">
					  <label class="control-label" for="bukti2">Bukti Foto Penipuan (opsional file type: png, jpg, jpeg)</label>
					  <input id="bukti2" name="bukti2" type="file"  accept="image/.jpg,.png,.jpeg,.JPG,.PNG,.JPEG">
					</div>
					<div class="form-group">
					  <label class="control-label" for="fb">Facebook (opsional)</label>
					  <input id="fb" name="fb" type="text" class="form-control" placeholder="nama fb/link fb">
					</div>
					<div class="form-group">
					  <label class="control-label" for="ig">Instagram (opsional)</label>
					  <input id="ig" name="ig" type="text" class="form-control" placeholder="nama ig/link ig">
					</div>	
					<div class="form-group">
					  <label class="control-label" for="tw">Twitter (opsional)</label>
					  <input id="tw" name="tw" type="text" class="form-control" placeholder="nama tw/link tw">
					</div>
					<input type="submit" value="Laporkan!" class="btn theme-btn">
				</form>
			  </div>
			</div>
		</div>
	</div>
	<?php include 'res/footer.html';?>
</body>
<script type="text/javascript" src="lib/js/jquery.js"></script>
<script type="text/javascript" src="lib/js/bootstrap.js"></script>
<script type="text/javascript" src="lib/js/myapp.js"></script>
</html>
<?php mysql_close($koneksi);?>