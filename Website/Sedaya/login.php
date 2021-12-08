<?php
include "../admin/syntax.php";
class login{
    public function login($username, $password)
    {
        $user = $username;
        $pass = md5($password);
        if (!empty(trim($user)) && !empty(trim($pass))) {
        $cek_login = $syntax->view_kon("mstr_admin","username='$user' && password='$pass'");
        $num = mysqli_num_rows($cek_login);
        $row = $cek_login->fetch_array();
                // $adm_id = $row['adm_id'];
                // $userVal = $row['username'];
                // $passVal = $row['password'];
                // $userName = $row['nama'];
                // $status = $row['status'];
            if ($num != 0) {
                if ($row['username']==$user && $$row['password']= $pass) {
                    session_start();
                    return true;
                    $_SESSION['login'] = $row;
                    header("location:index.php?page=home");
                }else {
                    echo "<script>alert('Username atau Password salah!!')</script>";
                    echo "<script>window.location.href='login.php'</script>";
                }
            }else{
                echo "<script>alert('Username tidak ditemukan!')</script>";
                echo "<script>window.location.href='login.php'</script>";
            }
        }
    }
}
