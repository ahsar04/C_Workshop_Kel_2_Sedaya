<?php
require_once("../admin/syntax.php");
	header('Content-Type: aplication/json');
	// $get_id=substr("$_SERVER[REQUEST_URI]",31);
    parse_str(file_get_contents('php://input'),$post);
    // $decoded = json_decode($content,true);
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
	if (strlen($ai)==1) {
		$ai='0'.$ai;
	}
	$no_transaksi=$date.$ai;
	$sn_id=$post["sn_id"];
	$usr_id=$post["usr_id"];
	$harga=$post["harga"];
	$jml=1;
	$ttl_harga=$harga*$jml;
	$tgl_pesan=date('Y-m-d');
	$tgl_mulai=$post["tgl_kegiatan"];
	$tgl_akhir=$post["tgl_kegiatan"];
	$cek_proses=$syntax->insert("transaksi","no_transaksi,tgl_pemesanan,sn_id,usr_id,tgl_kegiatan,tgl_akhir,jml,ttl_harga,t_status",
	"'$no_transaksi','$tgl_pesan','$sn_id','$usr_id','$tgl_mulai','$tgl_akhir','$jml','$ttl_harga',0");
	    if ($cek_proses ) {
                echo json_encode(array(
					'code'=>'200',
                    'message'=>'Silahkan menunggu konfirmasi.',
                    'data'=>null
        ));
        }else{
            // http_response_code(404);
            echo json_encode(array( 
					'code'=>'404',
                    'message'=>'Gagal',
                    'data'=>null
			));
        }
?>