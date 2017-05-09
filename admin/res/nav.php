<?php
	$laporan_masuk=mysql_num_rows(mysql_query("SELECT * FROM data_penipu WHERE status=0"));
	$jumlah_user=mysql_num_rows(mysql_query("SELECT * FROM user_id"));
	$jumlah_admin=mysql_num_rows(mysql_query("SELECT * FROM admin"));
	$data_pelapor=mysql_num_rows(mysql_query("SELECT * FROM data_pelapor"));
	$data_penipu=mysql_num_rows(mysql_query("SELECT * FROM data_penipu"));
?>
<div style="border-radius:0px" class="with-border">
		<div style="padding:10px 20px" class="row">
			<div class="col-md-2 text-center">
				<a href="?page=laporan" class="btn <?php if($laporan_masuk==0){echo "btn-info";}else{echo "btn-danger";}?> btn-lg menu-pad">
					<span style="font-size:50px" class="glyphicon glyphicon-bell"></span><br>
					<small>Laporan Masuk</small><br>
					<span id="lpmasuk" data-value="<?php echo $laporan_masuk;?>" class="badge"><?php echo $laporan_masuk;?></span>
				</a>
			</div>
			<div class="col-md-2 text-center">
				<a href="?page=setuser" class="<?php if($_GET['page']=='setuser'){echo "active";}?> btn btn-info btn-lg menu-pad">
					<span style="font-size:50px" class="glyphicon glyphicon-cog"></span><br>
					<small>Setting User</small><br>
					<span id="stuser" data-value="<?php echo $jumlah_user;?>" class="badge ">Atur <?php echo $jumlah_user." user"?></span>
				</a>
			</div>
			<div class="col-md-2 text-center">
				<a href="?page=setadmin" class="<?php if($_GET['page']=='setadmin'){echo "active";}?> btn btn-info btn-lg menu-pad">
					<span style="font-size:50px" class="glyphicon glyphicon-wrench"></span><br>
					<small>Setting Admin</small><br>
					<span id="stadmin" data-value="<?php echo $jumlah_admin;?>" class="badge">Atur <?php echo $jumlah_admin." admin"?></span>
				</a>
			</div>
			<div class="col-md-2 text-center">
				<a href="?page=dtpelapor" class="<?php if($_GET['page']=='dtpelapor'){echo "active";}?> btn btn-info btn-lg menu-pad">
					<span style="font-size:50px" class="glyphicon glyphicon-credit-card"></span><br>
					<small>Data Pelapor</small><br>
					<span id="dtpelapor" data-value="<?php echo $data_pelapor?>" class="badge "><?php echo $data_pelapor?></span>
				</a>
			</div>
			<div class="col-md-2 text-center">
				<a href="?page=dtpenipu" class="<?php if($_GET['page']=='dtpenipu'){echo "active";}?> btn btn-info btn-lg menu-pad">
					<span style="font-size:50px" class="glyphicon glyphicon-credit-card"></span><br>
					<small>Data Penipu</small><br>
					<span id="dtpenipu" data-value="<?php echo $data_penipu?>" class="badge "><?php echo $data_penipu?></span>
				</a>
			</div>
			<div class="col-md-2 text-center">
				<a href="?page=statistik" class="<?php if($_GET['page']=='statistik'){echo "active";}?> btn btn-info btn-lg menu-pad">
					<span style="font-size:50px" class="glyphicon glyphicon-blackboard"></span><br>
					<small>Statistik Data</small><br>
					<span class="badge ">Lihat Statistik</span>
				</a>
			</div>
		</div>
</div>