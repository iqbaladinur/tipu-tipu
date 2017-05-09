<?php
	$BatasAwal = 30;
	if (!empty($_GET['hal'])) {
	$hal = $_GET['hal'] - 1;
	$MulaiAwal = $BatasAwal * $hal;
	} else if (!empty($_GET['hal']) and $_GET['hal'] == 1) {
	$MulaiAwal = 0;
	} else if (empty($_GET['hal'])) {
	$MulaiAwal = 0;
	}//tampil data
	$data_laporan=mysql_query("SELECT data_penipu.id_pnp,
									  data_penipu.status,
									  data_penipu.nama_penipu, data_penipu.notelp_pnp, 
									  data_penipu.rek_pnp, data_penipu.jenis_tipu, 
									  data_penipu.bukti_tipu, 
									  data_pelapor.nama_pelapor 
							   FROM data_penipu 
							   INNER JOIN data_pelapor
							   ON data_penipu.id_usr=data_pelapor.id_usr
							   ORDER BY data_penipu.log DESC LIMIT $MulaiAwal, $BatasAwal") or die(mysql_error());
?>
	<h3 class="text-success">Laporan Masuk</h3>
	<div style="padding:10px" class="with-border">
		<div class="panel panel-default">
			<div class="panel-heading">
				<b>Laporan Masuk</b>
			</div>
			<div class="table-responsive">
				<table id="myTable" class="table table-bordered table-striped table-hover">
				<thead>
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
				</thead>
				<tbody>
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
					  			<?php if($laporanin['status']==0){?>
									  	   <a style="margin:5px" class="btn-success btn-sm" href="../sys/terima_laporan.php?data-page=dtpenipu&id=<?php echo $laporanin['id_pnp'];?>"><span class="glyphicon glyphicon-ok"></span></a>
					  			<?php }?>
					  			<a style="margin:5px" class="btn-info btn-sm" target="_blank" href="index.php?page=edit_data_penipu&id=<?php echo $laporanin['id_pnp'];?>">
					  				<span class="glyphicon glyphicon-pencil"></span></a>
					  			<a style="margin:5px" class="btn-warning btn-sm" target="_blank" href="index.php?page=lihat_data&id=<?php echo $laporanin['id_pnp'];?>">
					  				<span class="glyphicon glyphicon-eye-open"></span></a>
					  			<a style="margin:5px" data-value="../sys/hapus_laporan.php?page=dtlaporan&id=<?php echo $laporanin['id_pnp'];?>" class="hapus btn-danger btn-sm">
					  				<span class="glyphicon glyphicon-trash"></span></a>
					  		</td>
					  	</tr>
			    <?php }}?>
			    </tbody>
			</table>
		</div>
  		<div class="panel-footer text-center">
  			<ul class="pagination pagination-sm">
  				<?php
  					$jumlahData=mysql_num_rows(mysql_query("SELECT id_pnp FROM data_penipu"));
  					if ($jumlahData > $BatasAwal) {
						$a = explode(".", $jumlahData / $BatasAwal);
						$b = $a[0];
						if ($BatasAwal%2==0) {
							$c=$b;
						}else{
							$c = $b+1;
						}
					for ($i = 1; $i <= $c; $i++) {
						echo '<li ';
						if ($_GET['hal'] == $i) {
							echo " class='active'";
						}
					echo '" ><a href="?page=dtpenipu&hal=' . $i . '">' . $i . '</a> ';
					}
					echo '</li>';
					}else{
						echo "<small>Page 1 of 1</small>";
					}
  				?>
			</ul>
  		</div>
	</div>
</div>