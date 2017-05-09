<?php
	require_once('core.php');
	if ($_SESSION['login']!=true) {
		header("Location:../../");
	}
	$koneksi=conn($server,$username,$pass,$db);
	if ($_SERVER['REQUEST_METHOD']=='POST') {
		$id=$_SESSION['id_usr'];
		$nama=$_POST['nama'];
		$kelamin=$_POST['gender'];
		$alamat=$_POST['alamat'];
		$noid=$_POST['no'];
		$kerjaan=$_POST['pekerjaan'];
		$ttl=$_POST['ttl'];
		$sosmed=$_POST['sosmed'];
		$sql="UPDATE data_pelapor SET nama_pelapor='$nama',gender='$kelamin',alamat_pelapor='$alamat',no_identitas='$noid',pekerjaan='$kerjaan',
			  tgl_lhr='$ttl',sosmed='$sosmed' WHERE id_usr='$id'";
		// cek opsional
		if (empty($_FILES["picture"]["name"])) {
			mysql_query($sql) or die(mysql_error());
			header("location:../../viewprofile.php?id=$id");
		}else{
			$target_dir = "../../media/upload/pelapor_img/";
			$target_file = $target_dir . basename($_FILES["picture"]["name"]);
			$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
			$target_file = $target_dir."foto".$id.".png";
			$uploadOk = 1;
			$foto="foto".$id.".png";
			$check = getimagesize($_FILES["picture"]["tmp_name"]);
			if($check !== false) {$uploadOk = 1;} else {$uploadOk = 0;}
			if ($_FILES["picture"]["size"] > 500000) {$uploadOk = 0;}
			if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
			&& $imageFileType != "gif" ) {$uploadOk = 0;}
			if ($uploadOk == 0) {
				mysql_query($sql) or die(mysql_error());
				header("location:../../updateprofile.php?id=$id&err=1");
			} else {
			    if (move_uploaded_file($_FILES["picture"]["tmp_name"], $target_file)){
			    	mysql_query($sql) or die(mysql_error());
			    	mysql_query("UPDATE data_pelapor SET foto='$foto' WHERE id_usr='$id'");
			    	header("location:../../viewprofile.php?id=$id");
			    }else{
			    	mysql_query($sql) or die(mysql_error());
			    	header("location:../../updateprofile.php?id=$id&err=1");
			    }
			}
		}
	}else{
		header("location:../../updateprofile.php?id=$id&err=1");
	}
	mysql_close($koneksi);
?>