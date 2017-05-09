<?php
	$data_laporan=mysql_query("SELECT data_penipu.id_pnp,
									  data_penipu.nama_penipu, data_penipu.notelp_pnp, 
									  data_penipu.rek_pnp, data_penipu.jenis_tipu, 
									  data_penipu.bukti_tipu, 
									  data_pelapor.nama_pelapor 
							   FROM data_penipu 
							   INNER JOIN data_pelapor
							   ON data_penipu.id_usr=data_pelapor.id_usr
							   WHERE data_penipu.status=0 ORDER BY data_penipu.log DESC limit 5") or die(mysql_error());
	$data_usr=mysql_query("SELECT * FROM user_id ORDER BY log DESC limit 5") or die(mysql_error());
	$data_admin=mysql_query("SELECT * FROM admin ORDER BY id DESC limit 5 ") or die(mysql_error());
?>
	<h3 class="text-success">QUICK ACCESS</h3>
	<div style="padding:15px" class="with-border">
		<div class="panel panel-default">
			<div class="panel-heading">
				<b>Laporan Masuk</b>
			</div>
			<div class="table-responsive">
				<table class="table table-bordered table-striped table-hover">
				<tr class="white">
					<th class="text-center color-theme">No</th>
					<th class="color-theme">Nama Pelapor</th>
					<th class="color-theme">Nama Penipu</th>
					<th class="color-theme">Nomor Telpon</th>
					<th class="color-theme">Nomor Rekening</th>
					<th class="color-theme">Jenis Penipuan</th>
					<th class="color-theme">Bukti Penipuan</th>
					<th class="text-center color-theme">Tindakan</th>
				</tr>
				<?php
					  if (mysql_num_rows($data_laporan)==0) {?>
					  	<tr>
					  		<td class="text-center" colspan="8">
					  			No Data
					  		</td>
					  	</tr>
				 <?php }else{
					  while ($laporanin=mysql_fetch_array($data_laporan)) {?>
					  	<tr>
					  		<td class="text-center"><?php echo $laporanin['id_pnp'];?></td>
					  		<td><?php echo $laporanin['nama_pelapor'];?></td>
					  		<td><?php echo $laporanin['nama_penipu'];?></td>
					  		<td>
					  			<?php 
					  			if (empty($laporanin['notelp_pnp'])) {
					  				echo "Null";
					  			}else{
					  				echo $laporanin['notelp_pnp'];
					  			}?>
					  		</td>
					  		<td><?php echo $laporanin['rek_pnp'];?></td>
					  		<td><?php echo $laporanin['jenis_tipu'];?></td>
					  		<td>
					  			<?php 
					  				if(empty($laporanin['bukti_tipu'])){
					  					echo "Null";
					  				}else{
					  					echo "<a href=".$laporanin['bukti_tipu']." target='_blank'>link</a>";
					  				}
					  			?>
					  		</td>
					  		<td class="text-right">
					  			<a style="margin:5px" class="btn-success btn-sm" href="../sys/terima_laporan.php?data-page=quickaccess&id=<?php echo $laporanin['id_pnp'];?>">
					  				<span class="glyphicon glyphicon-ok"></span></a>
					  			<a style="margin:5px" class="btn-info btn-sm" target="_blank" href="index.php?page=edit_data_penipu&id=<?php echo $laporanin['id_pnp'];?>">
					  				<span class="glyphicon glyphicon-pencil"></span></a>
					  			<a style="margin:5px" class="btn-warning btn-sm" target="_blank" href="index.php?page=lihat_data&id=<?php echo $laporanin['id_pnp'];?>">
					  				<span class="glyphicon glyphicon-eye-open"></span></a>
					  			<a style="margin:5px" data-value="../sys/hapus_laporan.php?id=<?php echo $laporanin['id_pnp'];?>" class="hapus btn-danger btn-sm">
					  				<span class="glyphicon glyphicon-trash"></span></a>
					  		</td>
					  	</tr>
			    <?php }}?>
			</table>
		</div>
	</div>
	<div class="text-center">
		  <?php if ($_GET['error']=='1usr') {
						echo "<small class='text-danger'><b>Error while adding new user! please check the username!</b></small>";
		  		}elseif($_GET['error']=='0usr'){
		  				echo "<small class='text-success'><b>Successfull added new user!</b></small>";
		  		}
		  ?>
    </div>
	<div class="panel panel-default">
			<div class="panel-heading">
				<b>Setting Data User</b>
				<div class="pull-right">
					<a class="btn-success btn-sm" data-toggle="modal" href="#add_user">
					  	<span class="glyphicon glyphicon-plus-sign"></span> Tambah
					</a>
				</div>
			</div>
			<div class="table-responsive">
				<table class="table table-bordered table-striped table-hover">
				<tr class="white">
					<th class="text-center color-theme">Id User</th>
					<th class="text-center color-theme">Email</th>
					<th class="text-center color-theme">Status</th>
					<th class="text-center color-theme">Last Reset Kode</th>
					<th class="text-center color-theme">Log Daftar</th>
					<th class="text-center color-theme">Tindakan</th>
				</tr>
				<?php
					if (mysql_num_rows($data_usr)==0) {?>
						  	<tr>
						  		<td class="text-center" colspan="8">
						  			No Data
						  		</td>
						  	</tr>
					 <?php }else{
					  while ($data_user=mysql_fetch_array($data_usr)) {?>
					  	<tr>
					  		<td class="text-center"><?php echo $data_user['id_usr'];?></td>
					  		<td><?php echo $data_user['e_mail'];?></td>
					  		<td class="text-center">
					  			<?php if ($data_user['confirm']=='yes') {
					  					echo "Confirmed";
					  				  }else{
					  				  	echo "Unconfrmed";
					  				  }
					  			?>
					  		</td>
					  		<td class="text-center">
					  			<?php 
					  				if (empty($data_user['reset_pass'])){
					  					echo "Tidak ada";
					  				}else{
					  					echo $data_user['reset_pass'];
					  				}
					  			?>
					  		</td>
					  		<td class="text-center">
					  			<?php echo $data_user['log'];?>
					  		</td>
					  		<td class="text-right">
					  			<a style="margin:5px" class="edit_user btn-info btn-sm" data-value="<?php echo $data_user['id_usr'];?>">
					  				<span class="glyphicon glyphicon-pencil"></span></a>  
					  			<a data-value='../sys/hapus_usr.php?id=<?php echo $data_user['id_usr'];?>' style="margin:5px" class="hapus btn-danger btn-sm" href="#">
					  				<span class="glyphicon glyphicon-trash"></span></a>
					  		</td>
					  	</tr>
			    <?php }}?>
			</table>
		</div>
	</div>
	<div class="text-center">
		  <?php if ($_GET['error']=='1adm') {
						echo "<small class='text-danger'><b>Error while adding new admin! please check the username!</b></small>";
		  		}elseif($_GET['error']=='0adm'){
		  				echo "<small class='text-success'><b>Successfull added new admin!</b></small>";
		  		}
		  ?>
    </div>
	<div class="panel panel-default">
			<div class="panel-heading">
				<b>Setting Data Admin</b>
				<div class="pull-right">
					<a class="btn-success btn-sm" data-toggle="modal" href="#add_admin">
					  	<span class="glyphicon glyphicon-plus-sign"></span> Tambah
					</a>
				</div>
			</div>
			<div class="table-responsive">
				<table class="table table-bordered table-striped table-hover">
				<tr class="white">
					<th class="text-center color-theme">Id Admin</th>
					<th class="text-center color-theme">Username</th>
					<th class="text-center color-theme">Password</th>
					<th class="text-center color-theme">Tindakan</th>
				</tr>
				<?php
				if (mysql_num_rows($data_admin)==0) {?>
					  	<tr>
					  		<td class="text-center" colspan="8">
					  			No Data
					  		</td>
					  	</tr>
				 <?php }else{
					  while ($data_adm=mysql_fetch_array($data_admin)) {?>
					  	<tr>
					  		<td class="text-center"><?php echo $data_adm['id'];?></td>
					  		<td class="text-center"><?php echo $data_adm['username'];?></td>
					  		<td class="text-center"><?php echo $data_adm['password'];?></td>
					  		<td class="text-right">
					  			<a style="margin:5px" class="edit_admin btn-info btn-sm" data-value="<?php echo $data_adm['id'];?>">
					  				<span class="glyphicon glyphicon-pencil"></span></a>
					  			<?php if ($_SESSION['id']==$data_adm['id']) {}
					  			else{?>
									<a data-value="../sys/hapus_admin.php?id=<?php echo $data_adm['id'];?>" style="margin:5px" class="hapus btn-danger btn-sm">
					  				<span class="glyphicon glyphicon-trash"></span></a>
					  			<?php }?>
					  		</td>
					  	</tr>
			    <?php }}?>
			</table>
		</div>
	</div>
	<div class="panel panel-default">
		<div class="panel-heading">
			<b>Statistik Data</b>
		</div>
		<div class="panel-body">
			<div class="col-sm-1"></div>
			<div class="col-sm-10">
				<canvas id="chart"></canvas>
			</div>
			<div class="col-sm-1"></div>
		</div>
		<div class="panel-footer">
			
		</div>
	</div>
</div>