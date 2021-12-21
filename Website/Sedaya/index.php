<?php
include "admin/syntax.php";
session_start();
// midtrans
require_once(dirname(__FILE__).'/vendor/autoload.php');
Veritrans_Config::$serverKey = "SB-Mid-server-PgZwAoO-cUY8LNP8kCmB7eJt";
Veritrans_Config::$isSanitized = true;
Veritrans_Config::$is3ds = true;
?>

<!DOCTYPE html>
<html>
  <head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="shortcut icon" href="admin/images/sedaya.png" type="" />

    <title>Sedaya | Explore Your Art</title>

    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

    <!--owl slider stylesheet -->
    <link
      rel="stylesheet"
      type="text/css"
      href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
    />
    <!-- nice select  -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css"
      integrity="sha512-CruCP+TD3yXzlvvijET8wV5WxxEh5H8P4cmz0RFbKK6FlZ2sYl3AEsKlLPHbniXKSrDdFewhbmBK5skbdsASbQ=="
      crossorigin="anonymous"
    />
    <!-- font awesome style -->
    <link rel="stylesheet" href="admin/plugins/fontawesome-free/css/all.min.css">
    <link href="css/font-awesome.min.css" rel="stylesheet" />

    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet" />
    <!-- responsive style -->
    <link href="css/responsive.css" rel="stylesheet" />
    
    <!-- DataTables -->
    <link rel="stylesheet" href="admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  </head>

  <body>
    <?php
    if (isset($_GET['page'])) {
      if ($_GET['page']=='galeri-seni'||$_GET['page']=='detail-seni'||$_GET['page']=='chart'||$_GET['page']=='profile'||$_GET['page']=='update-profile') {
        
      }else{
        echo '<div class="hero_area">
      <div class="bg-box">
      </div>';
      }
    }else{
      echo '<div class="hero_area">
      <div class="bg-box">
      </div>';
    }
    ?>
      <!-- header section strats -->
      <header <?php if (isset($_GET['page'])) {
      if ($_GET['page']=='galeri-seni'||$_GET['page']=='detail-seni'||$_GET['page']=='chart'||$_GET['page']=='profile'||$_GET['page']=='update-profile') {
        echo 'class="header_section menu-bg"';
      }else{
        echo 'id="menu" class="header_section fixed-top "';
      }
    }else{
        echo 'id="menu" class="header_section fixed-top "';
      }?> >
        <div class="container">
          <nav
            class="navbar navbar-expand-lg custom_nav-container container-fluid"
          >
            <a class="navbar-brand" href="<?=base_url('')?>">
              <span><img class="logo-sedaya" src="admin/images/sedaya.png" alt="" srcset=""> Sedaya </span>
            </a>

            <button
              class="navbar-toggler"
              type="button"
              data-toggle="collapse"
              data-target="#navbarSupportedContent"
              aria-controls="navbarSupportedContent"
              aria-expanded="false"
              aria-label="Toggle navigation"
            >
              <span class=""> </span>
            </button>

            <div class="collapse navbar-collapse menu-center" id="navbarSupportedContent">
              <?php
              echo '<ul class="navbar-nav mx-auto">';
              if (!isset($_GET['page'])) {
                echo '
                <li class="nav-item">
                  <a class="nav-link" href="#home">Home </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#menu-item">Menu</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#about">About</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#feedback">Feedback</a>
                </li>';
              }
              echo '</ul>';
              if (empty($_SESSION['login-user'])) {
                echo '<div class="user_option">
                <a href="'.base_url('index.php?page=user-login').'" class="order_online"> Login </a></div>';
              }else{
                if (isset($_GET['page'])) {
                  if ($_GET['page']=='detail-seni'||$_GET['page']=='chart'||$_GET['page']=='profile') {
                    echo '<div class="user_option">
                    <a href="'.base_url('index.php?page=galeri-seni').'" class="user_link">  Galery
                </a>';
                  }else{
                    echo'<div class="user_option">';
                  }
                }else{
                    echo'<div class="user_option">';
                }
                echo '
                <a href="'.base_url("index.php?page=chart").'" class="user_link">
                  <i class="fa fa-shopping-cart" aria-hidden="true"></i> 
                </a>
                <a href="'.base_url("index.php?page=profile").'" class="user_link">
                  <i class="fa fa-user" aria-hidden="true"></i> 
                </a>
                <a href="logout.php" class="user_link">
                Logout
                </a></div>';
              }
              ?>
              
            </div>
          </nav>
        </div>
      </header>
      <!-- end header section -->
      <!-- slider section -->
      
      <?php include 'routes.php'?>

    <!-- footer section -->
    <footer class="footer_section">
      <div class="container">
        <div class="row">
          <div class="col-md-4 footer-col">
            <div class="footer_contact">
              <h4>Contact Us</h4>
              <div class="contact_link_box">
                <a href="">
                  <i class="fa fa-map-marker" aria-hidden="true"></i>
                  <span> Sumbersari, Jember - Jawa Timur </span>
                </a>
                <a href="">
                  <i class="fa fa-phone" aria-hidden="true"></i>
                  <span> Call +62 822-1410-0363 </span>
                </a>
                <a href="">
                  <i class="fa fa-envelope" aria-hidden="true"></i>
                  <span> sedayadev@gmail.com </span>
                </a>
              </div>
            </div>
          </div>
          <div class="col-md-4 footer-col">
            <div class="footer_detail">
              <a href="" class="footer-logo"> Sedaya </a>
              <p>
              Sedaya (Seni lan Budaya) | Explore Your Art Melestarikan keberagaman Seni Indonesia, memaksimalkan potensi pegiat seni nusantara dan memudahkan para penikmat seni
              </p>
              <div class="footer_social">
                <a href="#">
                  <i class="fa fa-facebook" aria-hidden="true"></i>
                </a>
                <a href="#">
                  <i class="fa fa-twitter" aria-hidden="true"></i>
                </a>
                <a href="#">
                  <i class="fa fa-linkedin" aria-hidden="true"></i>
                </a>
                <a href="#">
                  <i class="fa fa-instagram" aria-hidden="true"></i>
                </a>
                <a href="#">
                  <i class="fa fa-pinterest" aria-hidden="true"></i>
                </a>
              </div>
            </div>
          </div>
          <div class="col-md-4 footer-col">
            <h4>Opening Hours</h4>
            <p>Senin - Jum'at</p>
            <p>10.00 Am -05.00 Pm</p>
          </div>
        </div>
        <div class="footer-info">
          <p>
            &copy; 2021 - <span id="displayYear"></span> All Rights Reserved By
            <a href="#"><b>Ahmad Saifur Rohman</b></a
            ><br /><br />
          </p>
        </div>
      </div>
    </footer>
    <!-- footer section -->

    <!-- jQery -->
    <script src="js/jquery-3.4.1.min.js"></script>
    <!-- popper js -->
    <script
      src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
      integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
      crossorigin="anonymous"
    ></script>
    <!-- bootstrap js -->
    <script src="js/bootstrap.js"></script>
    <!-- owl slider -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <!-- isotope js -->
    <script src="https://unpkg.com/isotope-layout@3.0.4/dist/isotope.pkgd.min.js"></script>
    <!-- nice select -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/js/jquery.nice-select.min.js"></script>
    <!-- custom js -->
    <script src="js/custom.js"></script>
    <!-- Google Map -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=myMap"></script>
    <!-- End Google Map -->
    <!-- datatables -->
    <script src="admin/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="admin/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="admin/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="admin/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="admin/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="admin/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <script>
      
      $(function () {
        $("#example1").DataTable({
          "responsive": true, "lengthChange": false, "autoWidth": false
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
      });
      $(function () {
        $("#example2").DataTable({
          "responsive": true, "lengthChange": false, "autoWidth": false
        }).buttons().container().appendTo('#example2_wrapper .col-md-6:eq(0)');
      });
      window.onscroll = function () {
        scrollFunction();
      };
      function scrollFunction() {
        if (
          document.body.scrollTop > 20 ||
          document.documentElement.scrollTop > 20
        ) {
          $("#menu").attr("class", "header_section fixed-top menu-bg");
        } else {
          $("#menu").attr("class", "header_section fixed-top");
        }
      }
    </script>
    <script>
  $(document).ready(function () {
    $(document).on("scroll", onScroll);
      
      //smoothscroll
      $('a[href^="#"]').on('click', function (e) {
          e.preventDefault();
          $(document).off("scroll");
          
          $('li').each(function () {
              $(this).removeClass('active');
          })
          $(this).addClass('active');
        
          var target = this.hash,
              menu = target;
          $target = $(target);
          $('html, body').stop().animate({
              'scrollTop': $target.offset().top+2
          }, 700, 'swing', function () {
              window.location.hash = target;
              $(document).on("scroll", onScroll);
          });
      });
  });

  function onScroll(event){
      var scrollPos = $(document).scrollTop();
      $('.menu-center a').each(function () {
          var currLink = $(this);
          var refElement = $(currLink.attr("href"));
          if (refElement.position().top <= scrollPos && refElement.position().top + refElement.height() > scrollPos) {
              $('.menu-center ul li').removeClass("active");
              currLink.addClass("active");
          }
          else{
              currLink.removeClass("active");
          }
      });
  }
    </script>
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-5PYAmTbvFmvFrI1d"></script>
    <script type="text/javascript">
      document.getElementById('pay-button').onclick = function(){
        snap.pay('<?=$snapToken?>', {
          onSuccess: function(result){
            document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 1);
          }
          // ,
          // onPending: function(result){
          //   document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 1);
          // },
          // onError: function(result){
          //   document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 1);
          // }
        });
      };
    </script>
  </body>
</html>
