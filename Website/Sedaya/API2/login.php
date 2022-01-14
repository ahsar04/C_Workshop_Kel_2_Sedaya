<?php
require_once("../admin/syntax.php");
	header('Content-Type: aplication/json');
    $content = trim(file_get_contents("php://input"));
    $decoded = json_decode($content,true);

    $user = $decoded['username'];
    $pass = $decoded['password'];
    if (empty($user)|| empty($pass)) {
        http_response_code(404);
        echo json_encode(array(
            'code'=>'404',
            'message'=>'Username dan Password tidak boleh kosong!!',
            'data'=>null
        ));
    }else{
        if (!empty(trim($user)) && !empty(trim($pass))) {
            $cek_login = $syntax->view_kon("mstr_user, mstr_seniman","mstr_user.usr_id=mstr_seniman.usr_id and mstr_user.username='$user' && mstr_user.password='".md5($pass)."'");
            $num = mysqli_num_rows($cek_login);
            if ($num<=0) {
                    $cek_login = $syntax->view_kon("mstr_user"," mstr_user.username='$user' && mstr_user.password='".md5($pass)."'");
                    $num = mysqli_num_rows($cek_login);
                    if ($num<=0) {
                            http_response_code(404);
                            echo json_encode(array(
                                'code'=>'404',
                                'message'=>'Username atau Password salah!',
                                'data'=>null
                            ));
                    }else{
                        $row = $cek_login->fetch_array();
                        if ($cek_login ) {
                            echo json_encode(array(
                                'code'=>'200',
                                'message'=>'Berhasil',
                                'data'=>$row
                        ));
                        }else{
                            http_response_code(404);
                            echo json_encode(array(
                                'code'=>'404',
                                'message'=>'Data tidak ditemukan!',
                                'data'=>$row
                            ));
                        }
                    }
            }else{
                $row = $cek_login->fetch_array();
                if ($cek_login ) {
                    echo json_encode(array(
                        'code'=>'200',
                        'message'=>'Berhasil',
                        'data'=>$row
                ));
                }else{
                    http_response_code(404);
                    echo json_encode(array(
                        'code'=>'404',
                        'message'=>'Data tidak ditemukan!',
                        'data'=>null
                    ));
                }
            }
        }
    }
       
?>