<?php
	if(isset($_GET['page'])){
		$page = $_GET['page'];

		if($page == 'home'){
			include 'views/home/index.php';
		} elseif($page == 'admin'){
			if ($_SESSION['login']['status']==1) {
			include 'views/admin/index.php';
			}else{
				include 'error_403.php';
			}
		} elseif($page == 'admin/insert'){
			if ($_SESSION['login']['status']==1) {
			include 'views/admin/insert.php';
			}else{
				include 'error_403.php';
			}
		} elseif($page == 'admin/update'){
			if ($_SESSION['login']['status']==1) {
			include 'views/admin/update.php';
			}else{
				include 'error_403.php';
			}
		}elseif($page == 'jenis-seni'){
			include 'views/jenis/index.php';
		}elseif($page == 'post-active'){
			include 'views/seni/active.php';
		}elseif($page == 'post-pending'){
			include 'views/seni/pending.php';
		}elseif($page == 'user'){
			include 'views/user/index.php';
		}elseif($page == 'user/insert'){
			include 'views/user/insert.php';
		}elseif($page == 'user/update'){
			include 'views/user/update.php';
		}elseif($page == 'feedback'){
			include 'views/feedback/index.php';
		}else {
			include 'error_404.php';
		}
	} else {
		include 'views/admin/index.php';
	}
?>