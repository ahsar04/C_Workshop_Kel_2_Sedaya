<?php
if(isset($_GET['page'])){
		$page = $_GET['page'];
		if($page == 'user-login'){
			include 'pages/user-login.php';
		} elseif($page == 'galeri-seni'){
			if (!empty($_SESSION['login-user'])) {
			include 'pages/galeri-seni.php';
			}else{
				include 'pages/user-login.php';
			}
		} elseif($page == 'detail-seni'){
			if (!empty($_SESSION['login-user'])) {
			include 'pages/detail-seni.php';
			}else{
				include 'pages/user-login.php';
			}
		}elseif($page == 'user-register'){
			include 'pages/user-register.php';
		}else {
			include 'error_404.php';
		}
	} else {
		include 'pages/landing-page.php';
	}