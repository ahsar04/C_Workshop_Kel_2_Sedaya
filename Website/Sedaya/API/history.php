<?php
require_once("../admin/syntax.php");
	header('Content-Type: aplication/json');
    parse_str(file_get_contents('php://input'),$post);
    $usr_id=$post['usr_id'];
    $data = $syntax->view("transaksi,seni,mstr_user where transaksi.sn_id=seni.sn_id and transaksi.usr_id=mstr_user.usr_id and transaksi.usr_id=$usr_id order by t_status asc");
if ($data) {
    $result = array();
    while ($row = mysqli_fetch_array($data)) {
        if ($row['t_status']==0) {
            $t_status="Menunggu Konfirmasi seniman";
        }else if ($row['t_status']==1) {
            $t_status="Menunggu Pembayaran";
        }else if ($row['t_status']==2) {
            $t_status="Dalam proses";
        }else if ($row['t_status']==3) {
            $t_status="Selesai";
        }else if ($row['t_status']==4) {
            $t_status="Batal";
        }
        array_push($result, array(
            'no_transaksi'=>$row['no_transaksi'],
            'sn_id'=>$row['sn_id'],
            'judul'=>$row['judul'],
            'kategori'=>$row['kategori'],
            'keterangan'=>$row['keterangan'],
            'harga'=>$row['harga'],
            'ttl_harga'=>($row['ttl_harga']+$row['transport']),
            'transport'=>$row['transport'],
            'gambar'=>$row['gambar'],
            't_status'=>$row['t_status'],
            'k_status'=>$t_status,
        ));
    }
    echo json_encode(array(
        'code'=>'200',
        'message'=>'berhasil',
        'history'=>$result
    ));
}else{
    // http_response_code(404);
    echo json_encode(array(
        'code'=>'404',
        'message'=>'Gagal',
        'history'=>null
    ));
}
       
?>