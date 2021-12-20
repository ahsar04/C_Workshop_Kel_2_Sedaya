<?php
require_once("../admin/syntax.php");
	header('Content-Type: aplication/json');

    $data=$syntax->view('mstr_user ORDER by usr_id desc limit 1');
	foreach ($data as $r){
		$get_id=$r['usr_id'];
	}
	$usr_id=$get_id + 1;
	$nama=$_POST["nama"];
	$jk=$_POST["jk"];
	$tmp_lahir=$_POST["tmp_lahir"];
	$tgl_lahir=$_POST["tgl_lahir"];
	$telp=$_POST["telp"];
	$alamat=$_POST["alamat"];
	$email=$_POST['email'];
	$username=$_POST['username'];
	$pasword=md5($_POST['password']);
	$cek_proses=$syntax->insert("mstr_user","usr_id,nama,jk,tmp_lahir,tgl_lahir,telp,alamat,email,username,password,status",
	"'$usr_id','$nama','$jk','$tmp_lahir','$tgl_lahir','$telp','$alamat','$email','$username','$pasword','1'");
	    if ($cek_proses ) {
            $cek_login = $syntax->view_kon("mstr_user","usr_id='$usr_id'");
            // $num = mysqli_num_rows($cek_login);
            $row = $cek_login->fetch_array();
                echo json_encode(array('code'=>'200',
                    'message'=>'Berhasil',
                    'data'=>$row
        ));
        }else{
            echo json_encode(array( 'code'=>'400',
				'message'=>'Gagal'
			));
        }
    
    
       
?>