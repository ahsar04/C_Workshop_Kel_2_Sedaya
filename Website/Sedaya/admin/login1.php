<?php
include "syntax.php";
session_start();

if (isset($_POST['login'])) {
    $user = md5($_POST['username']);
    $pass = md5($_POST['password']);

    if (!empty(trim($user)) && !empty(trim($pass))) {
    $cek_login = $syntax->view_kon("mstr_admin","username='$user' && password='$pass'");
    $num = mysqli_num_rows($cek_login);
    $row = $cek_login->fetch_array();
            $adm_id = $row['adm_id'];
            $userVal = $row['username'];
            $passVal = $row['password'];
            $userName = $row['nama'];
            $status = $row['status'];
        if ($num != 0) {
            if ($userVal==$user && $passVal= $pass) {
                session_start();
                $_SESSION['login'] = $row;
                header("location:index.php?page=home");
            }else {
                echo "<script>alert('Username atau Password salah!!')</script>";
                header('location:login.php');
            }
        }else{
            echo "<script>alert('User tidak ditemukan!!')</script>";
            header('location:login.php');
        }
    }else{
        echo "<script>alert('Data tidak boleh kosong!!')</script>";
        echo $error;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Log in (v2)</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?=base_url('admin/plugins/fontawesome-free/css/all.min.css')?>">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?=base_url('admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css')?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url('admin/dist/css/adminlte.min.css')?>">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <img src="<?=base_url('admin/dist/img/login-profile.png')?>" alt="" srcset="">
      <h2><b>Se</b>daya</h2>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Silahkan login terlebih dahulu!</p>

      <form action="login.php" method="POST">
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="username" placeholder="Username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="password" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
          <br>
        <div class="row">
          <!-- /.col -->
          <div class="col-12">
            <button type="submit" name="login" class="btn btn-primary btn-block">Login</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      <!-- /.social-auth-links -->
      <br>
      <p class="mb-1">
        Forgot my password? <a href="forgot-password.html">click here!</a>
      </p>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="<?=base_url('admin/plugins/jquery/jquery.min.js')?>"></script>
<!-- Bootstrap 4 -->
<script src="<?=base_url('admin/plugins/bootstrap/js/bootstrap.bundle.min.js')?>"></script>
<!-- AdminLTE App -->
<script src="<?=base_url('admin/dist/js/adminlte.min.js')?>"></script>
</body>
</html>
