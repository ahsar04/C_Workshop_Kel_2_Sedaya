<?php include"../../admin/syntax.php";
$proses=$_GET['proses'];
if($proses=='konfirmasi'){
	$no_transaksi=$_POST["no_transaksi"];
	$transport=$_POST["transport"];
	$t_status=1;
	$cek_proses=$syntax->update("transaksi","transport='$transport', t_status='$t_status'","no_transaksi='$no_transaksi'");
	if($cek_proses){
		header('location: ' .base_url('seniman/index.php?page=detail-transaksi&&no_transaksi='.$no_transaksi));
	}else{
		echo "eror";
	}
}elseif($proses=='batal'){
	$no_transaksi=$_GET["no_transaksi"];
	$t_status=4;
	$cek_proses=$syntax->update("transaksi","t_status='$t_status'","no_transaksi='$no_transaksi'");
	if($cek_proses){
		header('location: ' .base_url('index.php?page=chart'));
	}else{
		echo "eror";
	}
}elseif($proses=='selesai'){
	$no_transaksi=$_GET["no_transaksi"];
	$t_status=3;
	$cek_proses=$syntax->update("transaksi","t_status='$t_status'","no_transaksi='$no_transaksi'");
	if($cek_proses){
		header('location: ' .base_url('index.php?page=chart'));
	}else{
		echo "eror";
	}
}elseif($proses=='delete'){
	$no_transaksi=$_GET['no_transaksi'];
			$cek_proses=$syntax->delete("transaksi","no_transaksi='$no_transaksi'");
			if($cek_proses){
				header('location: ' .base_url('seniman/index.php?page=transaksi-seni'));
			}else{
				echo "eror";
			}
}elseif($proses=='insert'){
	$transaksi=$_POST["transaksi"];
	$cek_proses=$syntax->insert("transaksi","transaksi","'$transaksi'");
	if($cek_proses){
		header('location: ' .base_url('seniman/index.php?page=transaksi-seni'));
	}else{
		echo "eror";
	}
}