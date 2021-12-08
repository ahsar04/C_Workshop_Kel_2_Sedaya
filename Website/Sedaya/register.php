<?php
include "admin/syntax.php";
session_start();

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
    <link rel="shortcut icon" href="images/favicon.png" type="" />

    <title>Feane</title>

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
    <link href="css/font-awesome.min.css" rel="stylesheet" />

    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet" />
    <!-- responsive style -->
    <link href="css/responsive.css" rel="stylesheet" />
  </head>

  <body class="sub_page">
    <div class="hero_area">
      <div class="bg-box">
        <!-- <img src="images/hero-bg.jpg" alt=""> -->
      </div>
      <!-- header section strats -->
      <header class="header_section">
        <div class="container">
          <nav
            class="navbar navbar-expand-lg custom_nav-container container-fluid"
          >
            <a class="navbar-brand" href="index.html">
              <span> Sedaya </span>
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
              <ul class="navbar-nav mx-auto">
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
                </li>
              </ul>
              <div class="user_option">
                <a href="" class="user_link">
                  <i class="fa fa-user" aria-hidden="true"></i>
                </a>
                <a href="" class="order_online"> Login </a>
              </div>
            </div>
          </nav>
        </div>
      </header>
      <!-- end header section -->
    </div>

    <!-- book section -->
    <section class="book_section">
      <div class="container">
        <div class="row">
        <div class="col-md-3"></div>
        <div class="heading_container">
          <h2>Register</h2>
        </div></div>
        <div class="row">
          <div class="col-md-3"></div>
          <div class="col-md-6">
            <div class="form_container">
              <form action="<?=base_url('admin/proses/user.php?proses=register');?>" method="POST">
                <div>
                  <input
                    type="text"
                    class="form-control"
                    name="nama"
                    placeholder="Your Name"
                  />
                </div>
                <div>
                  <input
                    type="email"
                    class="form-control"
                    name="email"
                    placeholder="Your Email"
                  />
                </div>
                <div>
                  <input
                    type="text"
                    class="form-control"
                    name="username"
                    placeholder="Username"
                  />
                </div>
                <div>
                  <input
                    type="password"
                    class="form-control"
                    name="password"
                    placeholder="Password"
                  />
                </div>
                <div class="btn_box">
                  <button type="submit" name="register">Register</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
    <br /><br /><br /><br /><br /><br><br>
    <!-- end book section -->

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
                  <span> Location </span>
                </a>
                <a href="">
                  <i class="fa fa-phone" aria-hidden="true"></i>
                  <span> Call +62-8221-4100-363 </span>
                </a>
                <a href="">
                  <i class="fa fa-envelope" aria-hidden="true"></i>
                  <span> Sedaya@gmail.com </span>
                </a>
              </div>
            </div>
          </div>
          <div class="col-md-4 footer-col">
            <div class="footer_detail">
              <a href="" class="footer-logo"> Sedaya </a>
              <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsum, sapiente amet earum asperiores veniam eaque perferendis. Magni hic nesciunt repudiandae.
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
            <p>Everyday</p>
            <p>10.00 Am -10.00 Pm</p>
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
  </body>
</html>
