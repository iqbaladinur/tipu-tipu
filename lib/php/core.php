<?php
	session_start();
	error_reporting(1);
	/*
	$server="localhost";
	$username="root";
	$pass="";
	$db="kenatipudb";
	*/
	$server="127.0.0.1:49174";
	$username="azure";
	$pass="6#vWHD_$";
	$db="localdb";
	$defaultpics=array("antman.png","captain_america.png","deadpool.png","hulk.png","ironman.png","marvelgirl.png","silver_surfer.png","thor.png","wolverine.png");
	function conn($server,$username,$pass,$db){
		$conn=mysql_connect($server,$username,$pass);
		$selectdb=mysql_select_db($db);
		return $conn;
	}
	function searchbykontak($keyword){
		$sql="SELECT id_pnp, notelp_pnp, notelp_pnp2, foto FROM data_penipu WHERE notelp_pnp LIKE '%$keyword%' and status=1 or notelp_pnp2 LIKE '%$keyword%' and status=1
			  or pin_bbm LIKE '%$keyword%' and status=1";
		$query=mysql_query($sql);
		return $query;
	}
	function searchbyrek($keyword){
		$sql="SELECT id_pnp, rek_pnp, rek_pnp2, foto FROM data_penipu WHERE rek_pnp LIKE '%$keyword%' and status=1 or rek_pnp2 LIKE '%$keyword%' and status=1";
		$query=mysql_query($sql);
		return $query;
	}
	function searchbyname($keyword){
		$sql="SELECT id_pnp, nama_penipu, nama_alias1, foto FROM data_penipu WHERE 
			  nama_penipu LIKE '%$keyword%' and status=1
			  or nama_alias1 LIKE '%$keyword%' and status=1
			  or nama_alias2 LIKE '%$keyword%' and status=1
			  or nama_alias3 LIKE '%$keyword%' and status=1";
		$query=mysql_query($sql);
		return $query;
	}
	function rating($value){
		if ($value==null or $value=="" or $value==0) {
			echo "rate1.png";
		}elseif ($value>0 && $value<1) {
			echo "rate2.png";
		}elseif ($value==1) {
			echo "rate3.png";
		}elseif ($value>1 && $value<2) {
			echo "rate4.png";
		}elseif ($value==2) {
			echo "rate5.png";
		}elseif ($value>2 && $value<3) {
			echo "rate6.png";
		}elseif ($value==3) {
			echo "rate7.png";
		}
	}
	function givearate($id,$value){
		$sql="INSERT into rate_pelapor(id_usr,rating) VALUES ('$id','$value')";
		mysql_query($sql) or die(mysql_error());
	}
	function cekpic($val,$defaultpics){
		for ($i=0; $i < count($defaultpics); $i++) { 
			if ($val==$defaultpics[$i]) {
				return true;
			}
		}
	}
	function upload($dir,$file,$tmp_file,$rename){
		$target_file	=$dir.basename($file);
		$imageFileType	=pathinfo($target_file,PATHINFO_EXTENSION);
		$target_file	=$dir.$rename.".png";
		$uploadOk 		=1;
		$check			=getimagesize($tmp_file);
		if ($check !==false) {
			//bukan gambar
			$uploadOk=1;
		}else{
			//gambar
			$uploadOk=0;
		}
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {$uploadOk = 0;}

		if ($uploadOk==0) {
			return '0';
		}else{
			if (move_uploaded_file($tmp_file, $target_file)){
				$namefile=$rename.".png";
				return $namefile;
			}else{
		    	return '0';
		    }
		}
	}

	//generate Code
	function random($max){
	//Huruf dan angka yang akan di acak
		$char = array("A","B","C","D","E","F","G","H","J","K","L","M","N","P","Q","R","S","T","U","V","W","X","Y",
					  "Z","a","b","c","d","e","f","g","h","j","k","l","m","n","p","q","r","s","t","u","v","w","x",
					  "y","z","1","2","3","4","5","6","7","8","9");
		$keys = array();
		while(count($keys) < $max) {
		    $x = mt_rand(0, count($char)-1);
		    if(!in_array($x, $keys)) {
		       $keys[] = $x;   
		    }		
		}
		$random='';
		 foreach($keys as $key => $val){
		   $random .= $char[$val];  
		}
		 return $random;
	}
?>
