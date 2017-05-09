<?php
	$id=$_GET['id'];
	$resultan   =mysql_query("SELECT * FROM data_penipu WHERE id_pnp=$id") or die(mysql_error());
	$data_penipu=mysql_fetch_array($resultan);
?>
<h3 class="text-success">Edit Data Penipu</h3>
	<div class="col-md-2"></div>
	<div style="padding:20px" class="with-border col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading"><b>Update Data</b></div>
			<div class="panel-body">
			<form role="form" action="../sys/update_pnp.php" method="post" enctype="multipart/form-data">
				<input class="hidden" name="id_pnp" value="<?php echo $data_penipu['id_pnp'];?>">
				<input class="hidden" name="id_usr" value="<?php echo $data_penipu['id_usr'];?>">
		  		<div class="form-group">
				  <label class="control-label" for="profil">Profil Penipu (opsional, file type: png, jpg, jpeg)</label>
				  <input id="profil" type="file" name="profil"  accept="image/*">
				</div>
				<div id="aliasname" class="row">
					<div class="col-sm-3">
						<div class="form-group">
						  <label class="control-label" for="namapnp">Nama Penipu*</label>
						  <input value="<?php echo $data_penipu['nama_penipu']?>" id="namapnp" name="namapnp" type="text" class="form-control" placeholder="nama penipu" required>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="form-group">
						  <label class="control-label" for="alias1">Nama alias (opsional)</label>
						  <input value="<?php echo $data_penipu['nama_alias1']?>" id="alias1" name="alias1" type="text" class="form-control">
						</div>
					</div>
					<div class="col-sm-3">
						<div class="form-group">
						  <label class="control-label" for="alias2">Nama alias (opsional)</label>
						  <input value="<?php echo $data_penipu['nama_alias2']?>"id="alias2" name="alias2" type="text" class="form-control" >
						</div>
					</div>
					<div class="col-sm-3">
						<div class="form-group">
						  <label class="control-label" for="alias3">Nama alias (opsional)</label>
						  <input value="<?php echo $data_penipu['nama_alias3']?>" id="alias3" name="alias3" type="text" class="form-control" >
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-3">
						<div class="form-group">
						  <label class="control-label" for="norek">No. Rekening*</label>
						  <input value="<?php echo $data_penipu['rek_pnp']?>" id="norek" name="norek" type="number" class="form-control" placeholder="ex. 621...." required>
						</div>
					</div>
					<div class="col-sm-3">
						<div id="noreklain" class="form-group">
						  <label class="control-label" for="norek2">No. Rekening lain (opsional)</label>
						  <input value="<?php echo $data_penipu['rek_pnp2']?>" id="norek2" name="norek2" type="number" class="form-control">
						</div>
					</div>
					<div class="col-sm-3">
						<div class="form-group">
						  <label class="control-label" for="nohp">No. Hp*</label>
						  <input value="<?php echo $data_penipu['notelp_pnp']?>" id="nohp" name="nohp" type="number" class="form-control" placeholder="ex. +628...." required>
						</div>
					</div>
					<div class="col-sm-3">
						<div id="nohplain" class="form-group">
						  <label class="control-label" for="nohp2">No. Hp lain (opsional)</label>
						  <input value="<?php echo $data_penipu['notelp_pnp2']?>" id="nohp2" name="nohp2" type="number" class="form-control">
						</div>
					</div>
				</div>
				<div class="form-group">
				  <label class="control-label" for="alamat">Alamat (opsional)</label>
				  <input value="<?php echo $data_penipu['alamat_pnp']?>" id="alamat" name="alamat" type="text" class="form-control" placeholder="RT/RW/Desa/Kelurahan/Kabupaten/Kota/Provinsi">
				</div>
				<div class="form-group">
				  <label class="control-label" for="jenispenipuan">Jenis Penipuan*</label>
				  <select name="jenispenipuan" id="jenispenipuan"  class="form-control">
				  	<option <?php if($data_penipu['jenis_tipu']=="COD"){echo "selected";}?> value="COD">COD</option>
				  	<option <?php if($data_penipu['jenis_tipu']=="SMS Penipuan"){echo "selected";}?> value="SMS Penipuan">SMS Penipuan</option>
				  	<option <?php if($data_penipu['jenis_tipu']=="Online Shop"){echo "selected";}?> value="Olshop">Online Shop</option>
				  	<option <?php if($data_penipu['jenis_tipu']=="Lainnya"){echo "selected";}?> value="Lainnya">Lainnya</option>
			  	  </select>
				</div>
				<div class="form-group">
				  <label class="control-label" for="kronologi">Kronologi Penipuan*</label>
				  <textarea style="height:100px" id="kronologi" name="kronologi" class="form-control" placeholder="Ceritakan kronologi penipuan yang anda atau orang lain alami.." required><?php echo $data_penipu['kronologi_tipu']?></textarea>
				</div>
				<div class="form-group">
				  <label class="control-label" for="bukti1">Bukti Penipuan*</label>
				  <input value="<?php echo $data_penipu['bukti_tipu']?>" id="bukti1" name="bukti1" type="text" class="form-control" required placeholder="link bukti penipuan">
				</div>
				<div id="buktifoto" class="form-group">
				  <label class="control-label" for="bukti2">Bukti Foto Penipuan (opsional file type: png, jpg, jpeg)</label>
				  <input id="bukti2" name="bukti2" type="file"  accept="image/*">
				</div>
				<div class="row">
					<div class="col-sm-3">
						<div class="form-group">
						  <label class="control-label" for="BBM">Pin BBM (opsional)</label>
						  <input value="<?php echo $data_penipu['pin_bbm']?>" id="BBM" name="BBM" type="text" class="form-control" placeholder="ex. 7fyt...">
						</div>
					</div>
					<div class="col-sm-3">
						<div class="form-group">
						  <label class="control-label" for="fb">Facebook (opsional)</label>
						  <input value="<?php echo $data_penipu['fb_link']?>" id="fb" name="fb" type="text" class="form-control" placeholder="nama fb/link fb">
						</div>
					</div>
					<div class="col-sm-3">
						<div class="form-group">
						  <label class="control-label" for="ig">Instagram (opsional)</label>
						  <input value="<?php echo $data_penipu['ig_link']?>" id="ig" name="ig" type="text" class="form-control" placeholder="nama ig/link ig">
						</div>
					</div>
					<div class="col-sm-3">	
						<div class="form-group">
						  <label class="control-label" for="tw">Twitter (opsional)</label>
						  <input value="<?php echo $data_penipu['tw_link']?>" id="tw" name="tw" type="text" class="form-control" placeholder="nama tw/link tw">
						</div>
					</div>
				</div>
				<input type="submit" value="Update Data" class="btn theme-btn">
			</form>
			</div>
		</div>
	</div>