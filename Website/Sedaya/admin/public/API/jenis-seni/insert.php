<?php
require_once("../../../syntax.php");
	header('Content-Type: aplication/json');
    $jenis = $_POST['jenis'];
        $data = $syntax->insert("jenis","jns_id,jenis","'','$jenis'");
        if ($data) {
            echo json_encode(array('message'=>'Berhasil'));
        }else{
            echo json_encode(array('message'=>'Gagal'));
        }
?>