<?php include '../admin/syntax.php'; 
session_start();
if(empty($_SESSION['login-seniman'])){
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
  <title>Sedaya | <?=$page?></title>
  <!-- <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" /> -->
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Sweetalert -->
  <!-- SweetAlert2 -->
    <link rel="stylesheet" href="plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css"/>
  <!-- flexdatalist -->
  <link href="plugins/jquery-flexdatalist-2.2.4/jquery.flexdatalist.min.css" rel="stylesheet" type="text/css">
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
<!-- Ekko Lightbox -->
<link rel="stylesheet" href="plugins/ekko-lightbox/ekko-lightbox.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <link rel="icon" href="dist/img/sedaya.png" type="image/icon type">
</head>
<body class="light-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed" style="height: auto;">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-info navbar-dark">
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
        <a class="nav-link"  href="<?=base_url('admin/index.php?page=post-pending');?>">
          <i class="far fa-bell"></i>
          <span id="new-post"></span>
        </a>
        <!-- <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
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
        </div> -->
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
      <span class="brand-text font-weight-light"><b>Sedaya</b></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?=base_url('admin/public/img/')?><?=$_SESSION['login-seniman']['foto']?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?=$_SESSION['login-seniman']['nama']?></a>
        </div>
      </div> 
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          
          <li class="nav-item">
            <a href="<?=base_url('admin/index.php?page=home');?>" class="nav-link <?php if ($page=='home') { echo "active";}?>">
              <i class="nav-icon fas fa-home"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?=base_url('admin/index.php?page=transaksi');?>" class="nav-link <?php if ($page=='transaksi') { echo "active";}?>">
              <i class="nav-icon fa fa-cash-register"></i>
              <p>Transaksi</p>
            </a>
          </li>
          <li class="nav-item <?php if ($page=='post-pending'||$page=='post-active'||$page=='post-suspend') { echo "menu-is-opening menu-open";}?>">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-mail-bulk"></i>
              <p>Post &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
              <p id="new"></p><i class="right fas fa-angle-left"></i></p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?=base_url('admin/index.php?page=post-pending');?>" class="nav-link <?php if ($page=='post-pending') { echo "active";}?>">
                  <i class="fa fa-spinner nav-icon"></i>
                  <p>Pending</p>
                  <p id="new-post2"></p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=base_url('admin/index.php?page=post-active');?>" class="nav-link <?php if ($page=='post-active') { echo "active";}?>">
                  <i class="far fa-check-square nav-icon"></i>
                  <p>Done</p>
                  <p id="post-active"></p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item <?php if ($page=='seniman'||$page=='seniman/insert'||$page=='seniman/update'||$page=='admin'||$page=='admin/insert'||$page=='admin/update'||$page=='user'||$page=='user/insert'||$page=='user/update'||$page=='jenis-seni'||$page=='jenis-seni/insert'||$page=='jenis-seni/update') { echo "menu-is-opening menu-open";}?>">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Master
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?=base_url('admin/index.php?page=admin');?>" class="nav-link <?php if ($page=='admin'||$page=='admin/insert'||$page=='admin/update') { echo "active";}?>">
                  <i class="fa fa-user nav-icon"></i>
                  <p>Admin</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=base_url('admin/index.php?page=user');?>" class="nav-link <?php if ($page=='user'||$page=='user/insert'||$page=='user/update') { echo "active";}?>">
                  <i class="fa fa-users nav-icon"></i>
                  <p>User</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=base_url('admin/index.php?page=seniman');?>" class="nav-link <?php if ($page=='seniman'||$page=='seniman/insert'||$page=='seniman/update') { echo "active";}?>">
                  <i class="fa fa-users nav-icon"></i>
                  <p>Seniman</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=base_url('admin/index.php?page=jenis-seni');?>" class="nav-link <?php if ($page=='jenis-seni'||$page=='jenis-seni/insert'||$page=='jenis-seni/update') { echo "active";}?>">
                  <i class="fa fa-palette nav-icon"></i>
                  <p>Jenis Seni</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="<?=base_url('admin/index.php?page=feedback');?>" class="nav-link <?php if ($page=='feedback') { echo "active";}?>">
              <i class="nav-icon fas fa-comments"></i>
              <p>Feedback</p>
            </a>
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
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="plugins/jszip/jszip.min.js"></script>
<script src="plugins/pdfmake/pdfmake.min.js"></script>
<script src="plugins/pdfmake/vfs_fonts.js"></script>
<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- SweetAlert2 -->
<script src="plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- flexdatalist -->
<!-- <script src="plugins/jquery-flexdatalist-2.2.4/jquery.flexdatalist.min.js"></script> -->
<!-- FLOT CHARTS -->
<script src="plugins/flot/jquery.flot.js"></script>
<!-- FLOT RESIZE PLUGIN - allows the chart to redraw when the window is resized -->
<script src="plugins/flot/plugins/jquery.flot.resize.js"></script>
<!-- FLOT PIE PLUGIN - also used to draw donut charts -->
<script src="plugins/flot/plugins/jquery.flot.pie.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  <script>
    var urlProvinsi = "provinsi.json";
    var urlKabupaten = "kabupaten/";
    var urlKecamatan = "kecamatan/";
    var urlKelurahan = "kelurahan/";

    function clearOptions(id) {
      console.log("on clearOptions");

      //$('#' + id).val(null);
      $("#" + id)
        .empty()
        .trigger("change");
    }

    console.log("Load Provinsi...");
    $.getJSON(urlProvinsi, function (res) {
      res = $.map(res, function (obj) {
        obj.text = obj.nama;
        return obj;
      });

      data = [
        {
          id: "",
          nama: "- Pilih Provinsi -",
          text: "- Pilih Provinsi -",
        },
      ].concat(res);

      //implemen data ke select provinsi
      $("#select2-provinsi").select2({
        dropdownAutoWidth: true,
        width: "100%",
        data: data,
      });
    });

    var selectProv = $("#select2-provinsi");
    $(selectProv).change(function () {
      console.log("on change selectProv");

      var value = $(selectProv).val();
      var text = $("#select2-provinsi :selected").text();
      console.log("value = " + value + " / " + "text = " + text);

      clearOptions("select2-kabupaten");
      console.log("Load Kabupaten di " + text + "...");
      $.getJSON(urlKabupaten + value + ".json", function (res) {
        res = $.map(res, function (obj) {
          obj.text = obj.nama;
          return obj;
        });

        data = [
          {
            id: "",
            nama: "- Pilih Kabupaten -",
            text: "- Pilih Kabupaten -",
          },
        ].concat(res);

        //implemen data ke select provinsi
        $("#select2-kabupaten").select2({
          dropdownAutoWidth: true,
          width: "100%",
          data: data,
        });
      });
    });

    var selectKab = $("#select2-kabupaten");
    $(selectKab).change(function () {
      console.log("on change selectKab");

      var value = $(selectKab).val();
      var text = $("#select2-kabupaten :selected").text();
      console.log("value = " + value + " / " + "text = " + text);

      clearOptions("select2-kecamatan");
      console.log("Load Kecamatan di " + text + "...");
      $.getJSON(urlKecamatan + value + ".json", function (res) {
        res = $.map(res, function (obj) {
          obj.text = obj.nama;
          return obj;
        });

        data = [
          {
            id: "",
            nama: "- Pilih Kecamatan -",
            text: "- Pilih Kecamatan -",
          },
        ].concat(res);

        //implemen data ke select provinsi
        $("#select2-kecamatan").select2({
          dropdownAutoWidth: true,
          width: "100%",
          data: data,
        });
      });
    });

    var selectKec = $("#select2-kecamatan");
    $(selectKec).change(function () {
      console.log("on change selectKec");

      var value = $(selectKec).val();
      var text = $("#select2-kecamatan :selected").text();
      console.log("value = " + value + " / " + "text = " + text);

      clearOptions("select2-kelurahan");
      console.log("Load Kelurahan di " + text + "...");
      $.getJSON(urlKelurahan + value + ".json", function (res) {
        res = $.map(res, function (obj) {
          obj.text = obj.nama;
          return obj;
        });

        data = [
          {
            id: "",
            nama: "- Pilih Kelurahan -",
            text: "- Pilih Kelurahan -",
          },
        ].concat(res);

        //implemen data ke select provinsi
        $("#select2-kelurahan").select2({
          dropdownAutoWidth: true,
          width: "100%",
          data: data,
        });
      });
    });
  </script> -->
<script>

  $(function () {
    $('.filter-container').filterizr({gutterPixels: 3});
    $('.btn[data-filter]').on('click', function() {
      $('.btn[data-filter]').removeClass('active');
      $(this).addClass('active');
    });
  })
</script>
<script>
    
    /*
     * BAR CHART
     * ---------
     */

    var bar_data = {
      data : [[1,10], [2,8], [3,4], [4,13], [5,17], [6,9], [7,11]],
      bars: { show: true }
    }
    $.plot('#bar-chart', [bar_data], {
      grid  : {
        borderWidth: 1,
        borderColor: '#f3f3f3',
        tickColor  : '#f3f3f3'
      },
      series: {
         bars: {
          show: true, barWidth: 0.5, align: 'center',
        },
      },
      colors: ['#3c8dbc'],
      xaxis : {
        ticks: [[1,'Senin'], [2,'Selasa'], [3,'Rabu'], [4,'Kamis'], [5,'Jumat'], [6,'Sabtu'], [7,'Minggu']]
      }
    })
    /* END BAR CHART */

</script>
<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
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
