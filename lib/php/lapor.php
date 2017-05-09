<?php
	require_once('core.php');
	if ($_SESSION['login']!=true) {
		header("Location:../../");
	}
	$koneksi=conn($server,$username,$pass,$db);
	if ($_SERVER['REQUEST_METHOD']=='POST') {
		$id=$_SESSION['id_usr'];
		$nama_penipu	=$_POST['namapnp'];
		$namaalias 		=array('alias1' => $_POST['alias1'],'alias2' => $_POST['alias2'],'alias3' => $_POST['alias3'] );
		$nomor_rekening =array('norek1' => $_POST['norek'] , 'norek2' => $_POST['norek2'] );
		$nomor_hp 		=array('nohp1' =>$_POST['nohp'] ,'nohp2' =>$_POST['nohp2'] );
		$kronologi   	=$_POST['kronologi'];
		$pinbb			=$_POST['BBM'];
		$alamat 		=$_POST['alamat'];
		$jenistipu 		=$_POST['jenispenipuan'];
		$buktitipu 		=$_POST['bukti1'];
		$sosmed  		=array('fb' =>$_POST['fb'] , 'ig' =>$_POST['ig'], 'tw' =>$_POST['tw'] );
		//upload profil
		if (!empty($_FILES['profil']['name'])) {
			$dir="../../media/upload/penipu_img/";
			$rename="profil_".$nama_penipu;
			$file_name=$_FILES["profil"]["name"];
			$file_tmp =$_FILES["profil"]["tmp_name"];
			$profil=upload($dir,$file_name,$file_tmp,$rename);
		}
		//upload bukti
		if (!empty($_FILES['bukti2']['name'])) {
			$dir2="../../media/bukti_foto/";
			$rename2="buktitipu_".$nama_penipu;
			$file_name2=$_FILES["bukti2"]["name"];
			$file_tmp2 =$_FILES["bukti2"]["tmp_name"];
			$buktifoto=upload($dir2,$file_name2,$file_tmp2,$rename2);
		}

		$sql="INSERT INTO data_penipu(
			  id_usr,
			  status,
			  nama_penipu,
			  nama_alias1,
			  nama_alias2,
			  nama_alias3,
			  foto,
			  notelp_pnp,
			  notelp_pnp2,
			  rek_pnp,
			  rek_pnp2,
			  alamat_pnp,
			  kronologi_tipu,
			  jenis_tipu,
			  bukti_tipu,
			  bukti_foto,
			  fb_link,
			  tw_link,
			  ig_link,
			  pin_bbm
			  ) VALUES(
			  '$id',
			  '0',
			  '$nama_penipu',
			  '".$namaalias['alias1']."',
			  '".$namaalias['alias2']."',
			  '".$namaalias['alias3']."',
			  '$profil',
			  '".$nomor_hp['nohp1']."',
			  '".$nomor_hp['nohp2']."',
			  '".$nomor_rekening['norek1']."',
			  '".$nomor_rekening['norek']."',
			  '$alamat',
			  '$kronologi',
			  '$jenistipu',
			  '$buktitipu',
			  '$buktifoto',
			  '".$sosmed['fb']."',
			  '".$sosmed['tw']."',
			  '".$sosmed['ig']."',
			  '$pinbb'
			  )";
		if ($profil=='0' OR $buktifoto=='0') {
			header("Location:../../lapor.php?err=1");
		}else{
			mysql_query($sql) or die(header("Location:../../lapor.php?err=1"));
			header("Location:../../lapor.php?succes=1");
		}
	}else{
		header("Location:../../");
	}
	mysql_close($koneksi);
?>