<?php
require_once("../../../syntax.php");
	header('Content-Type: aplication/json');

    parse_str(file_get_contents('php://input'),$post);
    $jenis = $post['jenis'];
    $jns_id = $post['jns_id'];
        $data = $syntax->update("jenis","jns_id='$jns_id',jenis='$jenis'","jns_id='$jns_id'");
        if ($data) {
            echo json_encode(array('message'=>'Berhasil'));
        }else{
            echo json_encode(array('message'=>'Gagal'));
        }
?>