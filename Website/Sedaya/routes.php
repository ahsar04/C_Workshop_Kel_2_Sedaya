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
		}elseif($page == 'detail-seni'){
			if (!empty($_SESSION['login-user'])) {
			include 'pages/detail-seni.php';
			}else{
				include 'pages/user-login.php';
			}
		}elseif($page == 'chart'){
			if (!empty($_SESSION['login-user'])) {
			include 'pages/chart.php';
			}else{
				include 'pages/user-login.php';
			}
		}elseif($page == 'profile'){
			if (!empty($_SESSION['login-user'])) {
			include 'pages/profile.php';
			}else{
				include 'pages/user-login.php';
			}
		}elseif($page == 'update-profile'){
			if (!empty($_SESSION['login-user'])) {
			include 'pages/update-profile.php';
			}else{
				include 'pages/user-login.php';
			}
		}elseif($page == 'daftar-seniman'){
			if (!empty($_SESSION['login-user'])) {
			include 'pages/daftar-seniman.php';
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