<?php include"../../admin/syntax.php";
$t_status=$_GET['transaction_status'];
if($t_status=='pending'){
	echo $no_transaksi=$_GET["order_id"];
	$t_status=2;
	$cek_proses=$syntax->update("transaksi","t_status='$t_status'","no_transaksi='$no_transaksi'");
	if($cek_proses){
		header('location: ' .base_url('index.php?page=chart'));
	}else{
		echo "eror";
	}
}