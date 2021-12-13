<?php
require_once("../../../syntax.php");
	header('Content-Type: aplication/json');

    parse_str(file_get_contents('php://input'),$post);
    $jns_id = $post['jns_id'];
        $data = $syntax->delete("jenis","jns_id='$jns_id'");
        if ($data) {
            echo json_encode(array('message'=>'Berhasil'));
        }else{
            echo json_encode(array('message'=>'Gagal'));
        }
?>