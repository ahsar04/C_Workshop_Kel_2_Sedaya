<?php
require_once("../admin/syntax.php");
	header('Content-Type: aplication/json');
	
    // $content = trim(file_get_contents("php://input"));
    // $_POST = json_decode($content,true);

    $data=$syntax->view('mstr_user ORDER by usr_id desc limit 1');
	foreach ($data as $r){
		$get_id=$r['usr_id'];
	}
	$usr_id=$get_id + 1;
	$nama=$_POST["nama"];
	$username=$_POST['email'];
	$email=$_POST['email'];
	$alamat=$_POST['alamat'];
	$telp=$_POST["telp"];
	$password=md5($_POST['password']);
	$cek_email = $syntax->view_kon("mstr_user"," mstr_user.username='$username'");
    $num = mysqli_num_rows($cek_email);
    if ($num<=0) {
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
            // http_response_code(404);
            echo json_encode(array( 
				'ok'=>false,
				'code'=>'404',
				'message'=>'Gagal'
			));
        }
    }else{
		// http_response_code(404);
		echo json_encode(array(
        	'code'=>'404',
            'message'=>'Email sudah terdaftar!',
            'data'=>null
            ));
	}
	
?>