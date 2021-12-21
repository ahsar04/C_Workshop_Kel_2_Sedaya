<?php
	if(isset($_GET['page'])){
		$page = $_GET['page'];

		if($page == 'home'){
			include 'views/home/index.php';
		} elseif($page == 'transaksi'){
			if ($_SESSION['login-user']['status']==2) {
			include 'views/transaksi/index.php';
			}else{
				include 'error_403.php';
			}
		} elseif($page == 'detail-transaksi'){
			if ($_SESSION['login-user']['status']==2) {
			include 'views/transaksi/detail.php';
			}else{
				include 'error_403.php';
			}
		} elseif($page == 'postingan'){
			if ($_SESSION['login-user']['status']==2) {
			include 'views/seni/index.php';
			}else{
				include 'error_403.php';
			}
		} elseif($page == 'postingan/insert'){
			if ($_SESSION['login-user']['status']==2) {
			include 'views/seni/insert.php';
			}else{
				include 'error_403.php';
			}
		} elseif($page == 'postingan/update'){
			if ($_SESSION['login-user']['status']==2) {
			include 'views/seni/update.php';
			}else{
				include 'error_403.php';
			}
		}else{
				include 'error_404.php';
			}
	} else {
		include 'views/home/index.php';
	}
?>