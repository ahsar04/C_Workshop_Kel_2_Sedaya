<?php include 'syntax.php'; 
session_start();
if(empty($_SESSION['login'])){
echo "<script>alert('Silahkan login terlebih dahulu!!')</script>";
header("location:login.php");
}
if (!isset($_GET['page'])) {
  $page='dashboard';
}else{
  $page=$_GET['page'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sedaya | Expose Your Art</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?=base_url('admin/plugins/fontawesome-free/css/all.min.css')?>">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?=base_url('admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')?>">
  <link rel="stylesheet" href="<?=base_url('admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')?>">
  <link rel="stylesheet" href="<?=base_url('admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url('admin/dist/css/adminlte.min.css')?>">
  <link rel="icon" href="<?=base_url('admin/dist/img/sedaya.png')?>" type="image/icon type">
</head>
<body class="sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Home</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span id="new-post"></span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="logout.php" role="button">
          <i class="nav-icon fa fa-sign-out-alt"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="<?=base_url('admin/dist/img/sedaya.jpg')?>" alt="logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light"><b>Welcome!</b></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?=base_url('admin/public/img/')?><?=$_SESSION['login']['foto']?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?=$_SESSION['login']['nama']?></a>
        </div>
      </div> 
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          
          <li class="nav-item">
            <a href="<?=base_url('admin/index.php?page=home');?>" class="nav-link <?php if ($_GET['page']=='home') { echo "active";}?>">
              <i class="nav-icon fas fa-home"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item <?php if ($_GET['page']=='post-pending'||$_GET['page']=='post-active') { echo "menu-is-opening menu-open";}?>">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-mail-bulk"></i>
              <p>Post &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
              <p id="new"></p><i class="right fas fa-angle-left"></i></p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?=base_url('admin/index.php?page=post-pending');?>" class="nav-link <?php if ($_GET['page']=='post-pending') { echo "active";}?>">
                  <i class="fa fa-spinner nav-icon"></i>
                  <p>Pending</p>
                  <p id="new-post2"></p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=base_url('admin/index.php?page=post-active');?>" class="nav-link <?php if ($_GET['page']=='post-active') { echo "active";}?>">
                  <i class="far fa-check-square nav-icon"></i>
                  <p>Active</p>
                  <p id="post-active"></p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item <?php if ($_GET['page']=='admin'||$_GET['page']=='admin/insert'||$_GET['page']=='admin/update'||$_GET['page']=='user'||$_GET['page']=='user/insert'||$_GET['page']=='user/update'||$_GET['page']=='jenis-seni'||$_GET['page']=='jenis-seni/insert'||$_GET['page']=='jenis-seni/update') { echo "menu-is-opening menu-open";}?>">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Master
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?=base_url('admin/index.php?page=admin');?>" class="nav-link <?php if ($_GET['page']=='admin'||$_GET['page']=='admin/insert'||$_GET['page']=='admin/update') { echo "active";}?>">
                  <i class="fa fa-user nav-icon"></i>
                  <p>Admin</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=base_url('admin/index.php?page=user');?>" class="nav-link <?php if ($_GET['page']=='user'||$_GET['page']=='user/insert'||$_GET['page']=='user/update') { echo "active";}?>">
                  <i class="fa fa-users nav-icon"></i>
                  <p>User</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=base_url('admin/index.php?page=jenis-seni');?>" class="nav-link <?php if ($_GET['page']=='jenis-seni'||$_GET['page']=='jenis-seni/insert'||$_GET['page']=='jenis-seni/update') { echo "active";}?>">
                  <i class="fa fa-palette nav-icon"></i>
                  <p>Jenis Seni</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="<?=base_url('admin/logout.php');?>" class="nav-link">
              <i class="nav-icon fa fa-sign-out-alt"></i>
              <p>
                Logout
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <?php include "routes.php";?>
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 1
    </div>
    <strong>Copyright &copy; 2021 <a href="#">Sedaya</a>|</strong> Expose Your Art With Us
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?=base_url('admin/plugins/jquery/jquery.min.js')?>"></script>
<!-- Bootstrap 4 -->
<script src="<?=base_url('admin/plugins/bootstrap/js/bootstrap.bundle.min.js')?>"></script>
<!-- DataTables  & Plugins -->
<script src="<?=base_url('admin/plugins/datatables/jquery.dataTables.min.js')?>"></script>
<script src="<?=base_url('admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')?>"></script>
<script src="<?=base_url('admin/plugins/datatables-responsive/js/dataTables.responsive.min.js')?>"></script>
<script src="<?=base_url('admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')?>"></script>
<script src="<?=base_url('admin/plugins/datatables-buttons/js/dataTables.buttons.min.js')?>"></script>
<script src="<?=base_url('admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')?>"></script>
<script src="<?=base_url('admin/plugins/jszip/jszip.min.js')?>"></script>
<script src="<?=base_url('admin/plugins/pdfmake/pdfmake.min.js')?>"></script>
<script src="<?=base_url('admin/plugins/pdfmake/vfs_fonts.js')?>"></script>
<script src="<?=base_url('admin/plugins/datatables-buttons/js/buttons.html5.min.js')?>"></script>
<script src="<?=base_url('admin/plugins/datatables-buttons/js/buttons.print.min.js')?>"></script>
<script src="<?=base_url('admin/plugins/datatables-buttons/js/buttons.colVis.min.js')?>"></script>
<!-- AdminLTE App -->
<script src="<?=base_url('admin/dist/js/adminlte.min.js')?>"></script>
<!-- AdminLTE for demo purposes -->
<!-- <script src="<?=base_url('admin/dist/js/demo.js')?>"></script> -->
<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    // $('#example2').DataTable({
    //   "paging": true,
    //   "lengthChange": false,
    //   "searching": false,
    //   "ordering": true,
    //   "info": true,
    //   "autoWidth": false,
    //   "responsive": true,
    // });
  });
  function getData(){
    $.ajax({
            type: "POST",
            url: "backend-data.php",
            data:'data=new-post',
            dataType: "html",
            success: function (data) {
            $('#new-post').html(data);
            },
            error: function(output){
            alert("fail");
            }
      });
      $.ajax({
            type: "POST",
            url: "backend-data.php",
            data:'data=new-post2',
            dataType: "html",
            success: function (data) {
            $('#new-post2').html(data);
            },
            error: function(output){
            alert("fail");
            }
      });
      $.ajax({
            type: "POST",
            url: "backend-data.php",
            data:'data=active',
            dataType: "html",
            success: function (data) {
            $('#post-active').html(data);
            },
            error: function(output){
            alert("fail");
            }
      });
      $.ajax({
            type: "POST",
            url: "backend-data.php",
            data:'data=new',
            dataType: "html",
            success: function (data) {
            $('#new').html(data);
            },
            error: function(output){
            alert("fail");
            }
      });
    setTimeout(getData, 3000);
  }
  getData();
</script>
</body>
</html>
