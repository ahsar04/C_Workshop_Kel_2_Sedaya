<?php
require_once("../admin/syntax.php");
	header('Content-Type: aplication/json');
	$get_id=substr("$_SERVER[REQUEST_URI]",31);
    $content = trim(file_get_contents("php://input"));
    $decoded = json_decode($content,true);
	$usr_id=$get_id;
	$nama=$decoded["nama"];
	$username=$decoded['email'];
	$email=$decoded['email'];
	$telp=$decoded["telp"];
	$cek_proses=$syntax->update("mstr_user","nama='$nama',telp='$telp',email='$email',username='$email'",
	"usr_id='$usr_id'");
	    if ($cek_proses ) {
            $cek_login = $syntax->view_kon("mstr_user","usr_id='$usr_id'");
            // $num = mysqli_num_rows($cek_login);
            $row = $cek_login->fetch_array();
                echo json_encode(array('code'=>'200',
                    'message'=>'Berhasil',
                    'data'=>$row
        ));
        }else{
            http_response_code(404);
            echo json_encode(array( 
				'ok'=>false,
				'error_code'=>404,
				'Description'=>'Gagal'
			));
        }
?>