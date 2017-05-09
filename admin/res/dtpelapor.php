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
	$data_usr=mysql_query("SELECT * FROM data_pelapor ORDER BY nama_pelapor ASC LIMIT $MulaiAwal, $BatasAwal") or die(mysql_error());
?>
	<h3 class="text-success">Setting User</h3>
	<div style="padding:10px" class="with-border">
	<div class="panel panel-default">
			<div class="panel-heading">
				<b>Data Pelapor</b>
			</div>
			<div class="table-responsive">
				<table class="table table-bordered table-striped table-hover">
				<tr class="white">
					<th class="text-center color-theme">Id User</th>
					<th class="text-center color-theme">Nama</th>
					<th class="text-center color-theme">Gender</th>
					<th class="text-center color-theme">Alamat</th>
					<th class="text-center color-theme">No dentitas</th>
					<th class="text-center color-theme">Pekerjaan</th>
					<th class="text-center color-theme">Tanggal Lahir</th>
					<th class="text-center color-theme">Sosial Media</th>
					<th class="text-center color-theme">Foto Profile</th>
					<th class="text-center color-theme">Tindakan</th>
				</tr>
				<?php
					if (mysql_num_rows($data_usr)==0) {?>
						  	<tr>
						  		<td class="text-center" colspan="10">
						  			No Data
						  		</td>
						  	</tr>
					 <?php }else{
					  while ($data_user=mysql_fetch_array($data_usr)) {?>
					  	<tr>
					  		<td class="text-center"><?php echo $data_user['id_usr'];?></td>
					  		<td class="text-center"><?php echo $data_user['nama_pelapor'];?></td>
					  		<td class="text-center"><?php echo $data_user['gender'];?></td>
					  		<td class="text-center"><?php echo $data_user['alamat_pelapor'];?></td>
					  		<td class="text-center"><?php echo $data_user['no_identitas'];?></td>
					  		<td class="text-center"><?php echo $data_user['pekerjaan'];?></td>
					  		<td class="text-center"><?php echo $data_user['tgl_lhr'];?></td>
					  		<td class="text-center"><?php echo $data_user['sosmed'];?></td>
					  		<td class="text-center">
					  			<?php
						  			$cekpic=cekpic($data_user['foto'],$defaultpics);
									if ($cekpic==true){
						  			 	echo "<a target='_blank' href='../../media/upload/default_profile/".$data_user['foto']."'><img style='width:25px;height:25px' src='../../media/upload/default_profile/".$data_user['foto']."'></a>";
						  			}else{ 
						  				echo "<a target='_blank' href='../../media/upload/pelapor_img/".$data_user['foto']."'><img style='width:25px;height:25px' src='../../media/upload/pelapor_img/".$data_user['foto']."'></a>";
						  			}
					  			?>
					  		</td>
					  		<td class="text-center">
					  			<a target="_blank" style="margin:5px" class="edit_dtpelapor btn-warning btn-sm" href="../../viewprofile.php?id=<?php echo $data_user['id_usr'];?>">
					  				<span class="glyphicon glyphicon-eye-open"></span></a>  
					  			<a data-value='../sys/hapus_dtpelapor.php?page=dtpelapor&id=<?php echo $data_user['id_usr'];?>' style="margin:5px" class="hapus btn-danger btn-sm" href="#">
					  				<span class="glyphicon glyphicon-trash"></span></a>
					  		</td>
					  	</tr>
			    <?php }}?>
			</table>
		</div>
		<div class="panel-footer text-center">
  			<ul class="pagination pagination-sm">
  				<?php
  					$jumlahData=mysql_num_rows(mysql_query("SELECT id_usr FROM data_pelapor"));
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
					echo '" ><a href="?page=dtpelapor&hal=' . $i . '">' . $i . '</a> ';
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