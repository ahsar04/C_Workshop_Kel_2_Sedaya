<?php
require_once("../admin/syntax.php");
	header('Content-Type: aplication/json');
	// $get_id=substr("$_SERVER[REQUEST_URI]",31);
    parse_str(file_get_contents('php://input'),$post);
    // $decoded = json_decode($content,true);
	$usr_id=$post['usr_id'];
	$nama=$post["nama"];
	$alamat=$post['alamat'];
	$telp=$post["telp"];
	$cek_proses=$syntax->update("mstr_user","nama='$nama',alamat='$alamat',telp='$telp'","usr_id='$usr_id'");
	    if ($cek_proses ) {
            $cek_login = $syntax->view_kon("mstr_user","usr_id='$usr_id'");
            // $num = mysqli_num_rows($cek_login);
            $row = $cek_login->fetch_array();
                echo json_encode(array(
					'code'=>'200',
                    'message'=>'Berhasil',
                    'data'=>$row
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