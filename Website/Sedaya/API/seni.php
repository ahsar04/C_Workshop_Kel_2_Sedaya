<?php
require_once("../admin/syntax.php");
	header('Content-Type: aplication/json');
    $data = $syntax->view("seni,jenis where seni.jns_id=jenis.jns_id ORDER BY sn_id DESC");
if ($data) {
    $result = array();
    while ($row = mysqli_fetch_array($data)) {
        array_push($result, array(
            'sn_id'=>$row['sn_id'],
            'snm_id'=>$row['snm_id'],
            'judul'=>$row['judul'],
            'kategori'=>$row['kategori'],
            'jns_id'=>$row['jns_id'],
            'jenis'=>$row['jenis'],
            'keterangan'=>$row['keterangan'],
            'harga'=>$row['harga'],
            'gambar'=>$row['gambar'],
            'status'=>$row['status'],
        ));
    }
    echo json_encode(array(
        'message'=>'berhasil',
        'data   '=>$result
    ));
}else{
    http_response_code(404);
    echo json_encode(array(
        'code'=>'400',
        'message'=>'berhasil'
    ));
}
       
?>