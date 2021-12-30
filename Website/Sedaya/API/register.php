<?php
require_once("../admin/syntax.php");
	header('Content-Type: aplication/json');
	
    $content = trim(file_get_contents("php://input"));
    $decoded = json_decode($content,true);

    $data=$syntax->view('mstr_user ORDER by usr_id desc limit 1');
	foreach ($data as $r){
		$get_id=$r['usr_id'];
	}
	$usr_id=$get_id + 1;
	$nama=$decoded["nama"];
	$username=$decoded['email'];
	$email=$decoded['email'];
	$alamat=$decoded['alamat'];
	$telp=$decoded["telp"];
	$password=md5($decoded['password']);
	$cek_proses=$syntax->insert("mstr_user","usr_id,nama,telp,email,alamat,username,password,status",
	"'$usr_id','$nama','$telp','$email','$alamat','$username','$password','1'");
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