<?php
	$id=$_GET['id'];
	$result=mysql_query("SELECT data_penipu.id_pnp,
									  data_penipu.nama_penipu,	
									  data_penipu.kronologi_tipu,
									  data_penipu.bukti_tipu,
									  data_penipu.bukti_foto,
									  data_penipu.log,
									  data_pelapor.id_usr, 
									  data_pelapor.nama_pelapor 
							   FROM data_penipu 
							   INNER JOIN data_pelapor
							   ON data_penipu.id_usr=data_pelapor.id_usr
							   WHERE data_penipu.id_pnp=$id");
	$data_penipu=mysql_fetch_array($result);
?>
<h3 class="text-success">Lihat Kronologi Penipuan</h3>
	<div style="padding:20px" class="col-sm-12 with-border">
			<div class="panel panel-default">
				<div class="panel-heading">
					<span>
						Laporan No <?php echo $data_penipu['id_pnp']." (".$data_penipu['nama_penipu'].")";?>, oleh : <a target="_blank" href="<?php echo "../../viewprofile.php?id=".$data_penipu['id_usr']; ?>"><?php echo $data_penipu['nama_pelapor'];?></a>
					</span>
					<span class="pull-right"><?php echo $data_penipu['log'];?></span>
				</div>
				<div class="panel-body">
						<div class="col-sm-6">
							<p class="text-justify">
								<blockquote class="border-theme" style="word-wrap: break-word;font-size:14px">
									<b>Kronologi Penipuan</b><br>
									<?php echo $data_penipu['kronologi_tipu'];?>
								</blockquote>
							</p>
						</div>
						<div class="col-sm-6">
							<p class="text-justify">
								<blockquote class="border-theme" style="word-wrap: break-word;font-size:14px">	
									<b>Bukti Penipuan</b><br>
									<?php echo $data_penipu['bukti_tipu'];?>
								</blockquote>
							</p>
						</div>
						<div class="col-sm-12">
							<?php 
								if (empty($data_penipu['bukti_foto'])) {
									echo "<blockquote class='border-theme' style='word-wrap: break-word;font-size:14px'>No Photos</blockquote>";
								}else{
									echo "<center>
											<a target='_blank' href='../../media/bukti_foto/".$data_penipu['bukti_foto']."'>
												<img style='width:300px;height:300px' src='../../media/bukti_foto/".$data_penipu['bukti_foto']."'>
											</a>
										  </center>";
								}
							?>
						</div>
				</div>
			</div>
	</div>