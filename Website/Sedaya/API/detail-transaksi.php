<?php
require_once("../admin/syntax.php");
	header('Content-Type: aplication/json');
    parse_str(file_get_contents('php://input'),$post);
    $no_transaksi=$post['no_transaksi'];
    $data = $syntax->view("transaksi,seni,mstr_user where transaksi.sn_id=seni.sn_id and transaksi.usr_id=mstr_user.usr_id and transaksi.no_transaksi=$no_transaksi ");
if ($data) {
    $result = array();
    while ($row = mysqli_fetch_array($data)) {
        array_push($result, array(
            'sn_id'=>$row['sn_id'],
            'judul'=>$row['judul'],
            'harga'=>$row['harga'],
            'tgl_pemesanan'=>$row['tgl_pemesanan'],
            'tgl_kegiatan'=>$row['tgl_kegiatan'],
            'ttl_harga'=>$row['ttl_harga'],
            'transport'=>$row['transport'],
            'gambar'=>$row['gambar'],
            't_status'=>$row['t_status'],
        ));
    }
    echo json_encode(array(
        'code'=>'200',
        'message'=>'berhasil',
        'seni'=>$result
    ));
}else{
    // http_response_code(404);
    echo json_encode(array(
        'code'=>'404',
        'message'=>'Gagal',
        'seni   '=>null
    ));
}
       
?>