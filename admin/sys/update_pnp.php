<?php
	require_once('../../lib/php/core.php');
	if ($_SESSION['login']!=true) {header("location:../");}
	if ($_SESSION['admin']!=true) {header("location:../");}
	$koneksi=conn($server,$username,$pass,$db);
	if ($_SERVER['REQUEST_METHOD']=='POST') {
		$id_pnp=$_POST['id_pnp'];
		$id=$_POST['id_usr'];
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

		$sql="UPDATE data_penipu 
			  SET
			  nama_penipu='$nama_penipu',
			  nama_alias1='".$namaalias['alias1']."',
			  nama_alias2='".$namaalias['alias2']."',
			  nama_alias3='".$namaalias['alias3']."',
			  foto='$profil',
			  notelp_pnp='".$nomor_hp['nohp1']."',
			  notelp_pnp2='".$nomor_hp['nohp2']."',
			  rek_pnp='".$nomor_rekening['norek1']."',
			  rek_pnp2='".$nomor_rekening['norek2']."',
			  alamat_pnp='$alamat',
			  kronologi_tipu='$kronologi',
			  jenis_tipu='$jenistipu',
			  bukti_tipu='$buktitipu',
			  bukti_foto='$buktifoto',
			  fb_link='".$sosmed['fb']."',
			  tw_link='".$sosmed['tw']."',
			  ig_link='".$sosmed['ig']."',
			  pin_bbm='$pinbb'
			  WHERE id_pnp=$id_pnp";

		if ($profil=='0' OR $buktifoto=='0') {
			header("Location:../pages/?page=edit_data_penipu&id=".$id_pnp."&error=1");
		}else{
			mysql_query($sql) or die(mysql_error());
			header("Location:../pages/?page=dtpenipu&id=".$id_pnp."&error=0");
		}
	}else{
		header("location:../pages/");
	}
	mysql_close($koneksi);
?>