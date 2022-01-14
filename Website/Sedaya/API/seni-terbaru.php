<?php
require_once("../admin/syntax.php");
	header('Content-Type: aplication/json');
    $data = $syntax->view("seni,jenis,mstr_seniman where seni.jns_id=jenis.jns_id and seni.snm_id=mstr_seniman.snm_id and seni.status!=0 ORDER BY sn_id DESC limit 6");
if ($data) {
    $result = array();
    while ($row = mysqli_fetch_array($data)) {
        array_push($result, array(
            'sn_id'=>$row['sn_id'],
            'snm_id'=>$row['snm_id'],
            'nama_snm'=>$row['nama_snm'],
            'alamat'=>$row['alamat'],
            'judul'=>$row['judul'],
            'kategori'=>$row['kategori'],
            'jenis'=>$row['jenis'],
            'keterangan'=>$row['keterangan'],
            'harga'=>$row['harga'],
            'gambar'=>$row['gambar'],
            'status'=>$row['status'],
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