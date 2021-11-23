<?php
include "syntax.php";
if ($_POST['data']=='new-post') {
    $getData = $syntax->view('seni where status=0');
		$data=mysqli_num_rows($getData);
    if (mysqli_num_rows($getData)>0){
		echo '<span class="badge badge-warning navbar-badge">'.$data.'</span>';
        }
}elseif ($_POST['data']=='new-post2') {
    $getData = $syntax->view('seni where status=0');
		$data=mysqli_num_rows($getData);
		echo '<span class="right badge badge-warning">'.$data.'</span>';
}elseif ($_POST['data']=='active') {
    $getData = $syntax->view('seni where status=1');
		$data=mysqli_num_rows($getData);
		echo '<span class="right badge badge-success">'.$data.'</span>';
}elseif ($_POST['data']=='new') {
    $getData = $syntax->view('seni where status=0');
		if (mysqli_num_rows($getData)>0){
		echo '<span class="badge badge-primary">new</span>';
        }
}