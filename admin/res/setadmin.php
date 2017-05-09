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
	$data_admin=mysql_query("SELECT * FROM admin ORDER BY id DESC LIMIT $MulaiAwal, $BatasAwal") or die(mysql_error());
?>
	<h3 class="text-success">Setting Admin</h3>
	<div style="padding:10px" class="with-border">
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
					  		<td class="text-center">
					  			<a style="margin:5px" class="edit_admin btn-info btn-sm" data-value="<?php echo $data_adm['id'];?>">
					  				<span class="glyphicon glyphicon-pencil"></span></a>
					  			<?php if ($_SESSION['id']==$data_adm['id']) {}
					  			else{?>
									<a data-value="../sys/hapus_admin.php?page=setadmin&id=<?php echo $data_adm['id'];?>" style="margin:5px" class="hapus btn-danger btn-sm">
					  				<span class="glyphicon glyphicon-trash"></span></a>
					  			<?php }?>
					  		</td>
					  	</tr>
			    <?php }}?>
			</table>
		</div>
		<div class="panel-footer text-center">
  			<ul class="pagination pagination-sm">
  				<?php
  					$jumlahData=mysql_num_rows(mysql_query("SELECT id FROM admin"));
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
					echo '" ><a href="?page=setadmin&hal=' . $i . '">' . $i . '</a> ';
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