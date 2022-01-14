<?php
require_once("../admin/syntax.php");
	header('Content-Type: aplication/json');
	// $get_id=substr("$_SERVER[REQUEST_URI]",31);
    parse_str(file_get_contents('php://input'),$post);
    // $decoded = json_decode($content,true);
	$no_transaksi=$post["no_transaksi"];
	$t_status=3;
	$cek_proses=$syntax->update("transaksi","t_status='$t_status'","no_transaksi='$no_transaksi'");
	    if ($cek_proses ) {
                echo json_encode(array(
					'code'=>'200',
                    'message'=>'Transaksi selesai.',
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