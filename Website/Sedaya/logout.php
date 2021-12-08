<?php
session_start();
unset($_SESSION['login-user']);
header("location:index.php?page=user-login");