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
	$data_usr=mysql_query("SELECT * FROM user_id ORDER BY log DESC LIMIT $MulaiAwal, $BatasAwal") or die(mysql_error());
?>
	<h3 class="text-success">Setting User</h3>
	<div style="padding:10px" class="with-border">
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
					  		<td class="text-center">
					  			<a style="margin:5px" class="edit_user btn-info btn-sm" data-value="<?php echo $data_user['id_usr'];?>">
					  				<span class="glyphicon glyphicon-pencil"></span></a>  
					  			<a data-value='../sys/hapus_usr.php?page=setuser&id=<?php echo $data_user['id_usr'];?>' style="margin:5px" class="hapus btn-danger btn-sm" href="#">
					  				<span class="glyphicon glyphicon-trash"></span></a>
					  		</td>
					  	</tr>
			    <?php }}?>
			</table>
		</div>
		<div class="panel-footer text-center">
  			<ul class="pagination pagination-sm">
  				<?php
  					$jumlahData=mysql_num_rows(mysql_query("SELECT id_usr FROM user_id"));
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
					echo '" ><a href="?page=setuser&hal=' . $i . '">' . $i . '</a> ';
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