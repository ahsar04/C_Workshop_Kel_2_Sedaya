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
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>Login Template</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="css/style.css" />
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <img class="pic-login-3" src="images/pic-login-3.svg" />
        </div>
        <form class="col-lg-4 offset-lg-1 col-md-10 offset-md-1 col-sm-12 col-12"
         action="login.php" method="post">
          <div class="card login-form">
            <h4>Login</h4>
            <div class="form-group col-lg-10 offset-lg-1">
              <input
                type="text"
                name="username"
                class="form-control field"
                placeholder="Username"
              />
              <svg
                width="1.2em"
                height="1.2em"
                viewBox="0 0 16 16"
                class="bi bi-person-fill"
                fill="currentColor"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  fill-rule="evenodd"
                  d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"
                />
              </svg>
            </div>
            <div class="form-group col-lg-10 offset-lg-1">
              <input
                type="password"
                name="password"
                class="form-control field"
                placeholder="Password"
              />
              <svg
                width="1.2em"
                height="1.2em"
                viewBox="0 0 16 16"
                class="bi bi-lock-fill"
                fill="currentColor"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  d="M2.5 9a2 2 0 0 1 2-2h7a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-7a2 2 0 0 1-2-2V9z"
                />
                <path
                  fill-rule="evenodd"
                  d="M4.5 4a3.5 3.5 0 1 1 7 0v3h-1V4a2.5 2.5 0 0 0-5 0v3h-1V4z"
                />
              </svg>
            </div>
            <div class="remember-forgot-div col-lg-10 offset-lg-1">
              <span class="form-check">
                <input
                  class="form-check-input"
                  type="checkbox"
                  id="gridCheck"
                />
                <label class="form-check-label" for="gridCheck">
                  Remember
                </label>
              </span>
              <a href="">Forgot password?</a>
            </div>
            <div
              class="
                form-group
                col-lg-8
                offset-lg-2
                col-md-10
                offset-md-1
                col-sm-10
                offset-sm-1
                login-btn
              "
            >
              <input
                type="submit" name="login"
                class="form-control btn btn-primary"
                value="LOGIN"
              />
            </div>
          </div>
        </form>
      </div>
    </div>
  </body>
</html>
