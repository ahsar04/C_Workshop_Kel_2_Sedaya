<?php
require_once("../../../syntax.php");
	header('Content-Type: aplication/json');
$data = $syntax->view("jenis ORDER BY jns_id DESC");
if ($data) {
    $result = array();
    while ($row = mysqli_fetch_array($data)) {
        array_push($result, array(
            'jns_id'=>$row['jns_id'],
            'jenis'=>$row['jenis'],
        ));
    }
    echo json_encode(array('jenis'=>$result));
    // print_r($result);
}
?>