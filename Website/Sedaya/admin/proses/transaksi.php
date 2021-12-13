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
}elseif($proses=='booking'){
	$data=$syntax->view('transaksi ORDER by no_transaksi desc limit 1');
	foreach ($data as $r){
		$get_id=$r['no_transaksi'];
	}
	$d=substr($get_id,0,8);
	$n=substr($get_id,8,);
	if ($d==date('Ymd')) {
		$date=$d;
		$ai=$n+1;
	}else{
		$date=date('Ymd');
		$ai=1;
	}
	$no_transaksi=$date.$ai;
	$sn_id=$_POST["sn_id"];
	$usr_id=$_POST["usr_id"];
	$harga=$_POST["harga"];
	$jml=$_POST["jml"];
	$ttl_harga=$harga*$jml;
	$tgl_pesan=date('Y-m-d');
	$tgl_mulai=$_POST["tgl"];
	$tgl_akhir=$_POST["tgl"];
	$cek_proses=$syntax->insert("transaksi","no_transaksi,tgl_pemesanan,sn_id,usr_id,tgl_kegiatan,tgl_akhir,jml,ttl_harga,t_status",
	"'$no_transaksi','$tgl_pesan','$sn_id','$usr_id','$tgl_mulai','$tgl_akhir','$jml','$ttl_harga',0");
	if($cek_proses){
		header('location: ' .base_url('index.php?page=chart'));
	}else{
		echo "eror";
	}
}