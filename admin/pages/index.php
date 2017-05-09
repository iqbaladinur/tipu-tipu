<?php
	error_reporting(0);
	require_once('../../lib/php/core.php');
	if ($_SESSION['admin']!=true) {
		header('Location:../');
	}
	$koneksi=conn($server,$username,$pass,$db);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php include("../res/meta.html");?>
	<meta charset="UTF-8">
	<title>Admin : Dashboard</title>
	<link rel="stylesheet" type="text/css" href="../../lib/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../../lib/css/myapp.css">
</head>
<body>
<?PHP include("../res/navbar.php");?>
<div class="container">
	<h3 class="text-success">DASHBOARD</h3>
	<?php include('../res/nav.php');?>
	<?php
		if (!isset($_GET['page'])) {
			include('../res/quick_access.php');
			include('../res/edit_data_user.php');
			include('../res/edit_data_admin.php');
		}elseif($_GET['page']=="laporan"){
			include('../res/laporan_masuk.php');
		}elseif($_GET['page']=="setuser"){
			include('../res/setuser.php');
			include('../res/edit_data_user.php');
		}elseif($_GET['page']=="setadmin"){
			include('../res/setadmin.php');
			include('../res/edit_data_admin.php');
		}elseif($_GET['page']=="dtpelapor"){
			include('../res/dtpelapor.php');
		}elseif($_GET['page']=="dtpenipu"){
			include('../res/dtpenipu.php');
		}elseif($_GET['page']=="statistik"){
			include('../res/statistik.php');
		}elseif($_GET['page']=="lihat_data"){
			include('../res/lihat_data.php');
		}elseif($_GET['page']=="edit_data_penipu"){
			include('../res/edit_data_penipu.php');
		}
	?>
</div>
<?php 
	include("../res/footer.html");
	include("../res/add_modal.php");
	include("../res/modal_alert.php");
?>
</body>
	<script type="text/javascript" src="../../lib/js/jquery.js"></script>
	<script type="text/javascript" src="../../lib/js/bootstrap.js"></script>
	<script src="../../lib/js/chart.js"></script>
	<script>
		$(document).ready(function(){
			//confirmation delete user
		    $(".hapus").click(function(){
		        $("#delete").modal();
		        $("#del").attr("href",$(this).data().value);
		    });
		    $(".edit_user").click(function(){
		        $("#edit_usr").modal();
		        $("#edit_id_usr").val($(this).data().value);
		    });
		    $(".edit_admin").click(function(){
		        $("#edit_adm").modal();
		        $("#id_admin").val($(this).data().value);
		    });
		    var dt1 = Number($('#lpmasuk').data().value);
		    var dt2 = Number($('#stuser').data().value);
		    var dt3 = Number($('#stadmin').data().value);
		    var dt4 = Number($('#dtpelapor').data().value);
		    var dt5 = Number($('#dtpenipu').data().value);
		    var ctx = document.getElementById("chart");
			var myChart = new Chart(ctx, {
			    type: 'bar',
			    data: {
			        labels: ["Jumlah Laporan Masuk", "Jumlah User Data", "Jumlah Admin", "Jumlah Data Pelapor", "Jumlah Data Penipu"],
			        datasets: [{
			            label: 'statistik',
			            data: [dt1, dt2, dt3, dt4, dt5],
			            backgroundColor: [
			                'rgb(92, 184, 92)',
			                'rgb(91, 192, 222)',
			                'rgb(240, 173, 78)',
			                'rgb(217, 83, 79)',
			                'rgb(0, 80, 73)'
			            ],
			            borderColor: [
			                'rgba(0,0,0,1)',
			                'rgba(0, 0, 0, 1)',
			                'rgba(0, 0, 0, 1)',
			                'rgba(0, 0, 0, 1)',
			                'rgba(0, 0, 0, 1)'
			            ],
			            borderWidth: 0
			        }]
			    },
			    options: {
			        scales: {
			            yAxes: [{
			                ticks: {
			                    beginAtZero:true
			                }
			            }]
			        }
			    }
			});

		});
	</script>
</html>
<?php mysqli_close($koneksi);?>