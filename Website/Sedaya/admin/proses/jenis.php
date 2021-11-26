<?php include"../syntax.php";
$proses=$_GET['proses'];
if($proses=='update'){
	$jns_id=$_POST["jns_id"];
	$jenis=$_POST["jenis"];
	$cek_proses=$syntax->update("jenis","jenis='$jenis'","jns_id='$jns_id'");
	if($cek_proses){
		header('location: ' .base_url('admin/index.php?page=jenis-seni'));
	}else{
		echo "eror";
	}
}elseif($proses=='delete'){
	$jns_id=$_GET['jns_id'];
			$cek_proses=$syntax->delete("jenis","jns_id='$jns_id'");
			if($cek_proses){
				header('location: ' .base_url('admin/index.php?page=jenis-seni'));
			}else{
				echo "eror";
			}
}elseif($proses=='insert'){
	$jenis=$_POST["jenis"];
	$cek_proses=$syntax->insert("jenis","jenis","'$jenis'");
	if($cek_proses){
		header('location: ' .base_url('admin/index.php?page=jenis-seni'));
	}else{
		echo "eror";
	}
}