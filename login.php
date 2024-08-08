<?php
session_start();
require_once 'admin/includes/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = md5($_POST['password']); // Hash the password using MD5

    // Validate credentials
    $sql = "SELECT id, username, password, role FROM users WHERE username = ? AND password = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($id, $db_username, $db_password, $role);
    $stmt->fetch();

    if ($stmt->num_rows == 1) {
        // Password is correct, so start a new session
        $_SESSION['id'] = $id;
        $_SESSION['username'] = $db_username;
        $_SESSION['role'] = $role;

        if ($role == 'admin') {
            header("location: admin/index.php");
        } else {
            header("location: user/dashboard.php");
        }
    } else {
        // Display an error message if username or password is invalid
        $login_err = "Invalid username or password.";
    }
    $stmt->close();
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="msapplication-TileColor" content="#0E0E0E">
    <meta name="template-color" content="#0E0E0E">
    <meta name="description" content="Index page">
    <meta name="keywords" content="index, page">
    <meta name="author" content="">
    <link rel="shortcut icon" type="image/x-icon" href="assets/imgs/template/favicon.png">
    <link href="assets/css/style.css?v=1.0.0" rel="stylesheet">
    <title>Login - Recipe Generator</title>
  </head>
  <body>
    <div id="preloader-active">
      <div class="preloader d-flex align-items-center justify-content-center">
        <div class="preloader-inner position-relative">
          <div class="page-loading">
            <div class="page-loading-inner">
              <div></div>
              <div></div>
              <div></div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <header class="header sticky-bar">
      <div class="container">
        <div class="main-header">
          <div class="header-left">
            <div class="header-logo"><a class="d-flex" href="index.php"><h3 class="text-white">Recipe</h3></a></div>
            <div class="header-nav">
              <nav class="nav-main-menu d-none d-xl-block">
                <ul class="main-menu">
                  <li ><a class="active" href="index.php">Home</a></li>
                  <li ><a href="about.php">About</a></li>
                  <li><a href="contact.php">Contact</a></li>
                </ul>
              </nav>
              <div class="burger-icon burger-icon-white"><span class="burger-icon-mid"></span><span class="burger-icon-bottom"></span></div>
            </div>
            <div class="header-right">
              <div class="d-none d-xxl-inline-block align-middle mr-10"><a class="text-14-medium call-phone color-white hover-up" href="">+254 23 056 447</a></div>
              <div class="d-none d-xxl-inline-block box-dropdown-cart align-middle mr-10"><span class="text-14-medium icon-list icon-account"><span class="text-14-medium color-white arrow-down">EN</span></span>
                <div class="dropdown-account">
                  <ul>
                    <li><a class="font-md" href="#"><img src="assets/imgs/template/icons/en.png" alt="luxride">
                        English</a></li>
                    <li><a class="font-md" href="#"><img src="assets/imgs/template/icons/fr.png" alt="luxride">
                        French</a></li>
                    <li><a class="font-md" href="#"><img src="assets/imgs/template/icons/cn.png" alt="luxride">
                        Chiness</a></li>
                  </ul>
                </div>
              </div>
              <div class="box-button-login d-inline-block mr-10 align-middle"><a class="btn btn-default hover-up" href="dashboard.php">Recipes</a></div>
              <!-- <div class="box-button-login d-none2 d-inline-block align-middle"><a class="btn btn-white hover-up" href="login.php">Admin</a></div> -->
            </div>
          </div>
        </div>
      </div>
    </header>
    <div class="mobile-header-active mobile-header-wrapper-style perfect-scrollbar">
      <div class="mobile-header-wrapper-inner">
        <div class="mobile-header-content-area">
          <div class="perfect-scroll">
            <div class="mobile-menu-wrap mobile-header-border">
              <nav class="mt-15">
                <ul class="mobile-menu font-heading">
                <li ><a class="active" href="index.php">Home</a></li>
                  <li ><a href="about.php">About</a></li>
                  <li><a href="contact.php">Contact</a></li>
                </ul>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>
    <main class="main">
      <section class="section mt-120 mb-100"> 
        <div class="container-sub"> 
          <div class="text-center"> 
            <h2 class="heading-44-medium wow fadeInUp">Sign in</h2>
            <p class="color-text text-14 wow fadeInUp">Sign in with this account across the following sites.</p>
          </div>
          <div class="box-login mt-70"> 
            <div class="form-contact form-comment wow fadeInUp"> 
              <form action="" method="post" name="login">
                <div class="row"> 
                  <div class="col-lg-12">
                    <div class="form-group"> 
                      <label class="form-label" for="username">Username</label>
                      <input type="text" name="username" class="form-control" id="username"  required>
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="form-group"> 
                      <label class="form-label" for="password">Password</label>
                      <input type="password" name="password" id="password" class="form-control" required>
                    </div>
                  </div>
                  <?php 
                  if (!empty($login_err)) {
                      echo '<div class="alert alert-danger">' . $login_err . '</div>';
                  }        
                  ?>
                  <div class="col-lg-12">
                    <div class="mb-20">
                      <div class="d-flex justify-content-between"> 
                        <label class="text-14 color-text"> 
                          <input class="cb-rememberme" type="checkbox">Remember me
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <button class="btn btn-primary w-100" type="submit">Sign in
                      <svg class="icon-16 ml-5" fill="none" stroke="currentColor" stroke-width="1.5" viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 19.5l15-15m0 0H8.25m11.25 0v11.25"></path>
                      </svg>
                    </button>
                  </div>
                  <div class="col-lg-12"> 
                    <div class="text-or-box"> <span class="text-or">OR</span></div>
                    <div class="mb-20"><a class="btn btn-login-google" href="#">Continue Google</a></div>
                  </div>
                  
                </div>
              </form>
            </div>
          </div>
        </div>
      </section>
    </main>
    <footer class="footer">
      <div class="footer-1">
        <div class="container-sub">
          <div class="box-footer-top">
            <div class="row align-items-center">
              <div class="col-lg-6 col-md-6 text-md-start text-center mb-15 wow fadeInUp">
                <div class="d-flex align-items-center justify-content-md-start justify-content-center"><a class="mr-30" href="#"><h3 class="text-light">Recipe Generator</h3></a><a class="text-14-medium call-phone color-white hover-up" href="tel:+254723056447">+254723056447</a></div>
              </div>
              <div class="col-lg-6 col-md-6 text-md-end text-center mb-15 wow fadeInUp">
                <div class="d-flex align-items-center justify-content-md-end justify-content-center"><span class="text-18-medium color-white mr-10">Follow Us</span><a class="icon-socials icon-facebook" href="#"></a><a class="icon-socials icon-twitter" href="#"></a><a class="icon-socials icon-instagram" href="#"></a><a class="icon-socials icon-linkedin" href="#"></a></div>
              </div>
            </div>
          </div>
          <div class="row mb-40">
            <div class="col-lg-4 width-20">
              <h5 class="text-18-medium color-white mb-20 wow fadeInUp">Our Offices</h5>
            </div> 
            <div class="col-lg-4 width-30">
              <h5 class="text-18-medium color-white mb-20 wow fadeInUp">3rd Godown after Odds and Ends, Next to Plaza 2000, Mombasa Road</h5>
            </div> 
            <div class="col-lg-4 width-30">
              <h3 class="text-18-medium color-white mb-20 wow fadeInUp">About Us</h3>
              <h5 class="text-18-medium color-white mb-20 wow fadeInUp">Are you an aspiring baker in Kenya today?  Bakewave offers end-to-end solutions in the baking industry in Kenya.</h5>
            </div>          
          </div>
        </div>
      </div>
      <div class="footer-2">
        <div class="container-sub">
          <div class="footer-bottom">
            <div class="row align-items-center">
              <div class="col-lg-8 col-md-12 text-center text-lg-start"><span class="text-14 color-white mr-50">© 2024 Recipe Generator</span>
                <ul class="menu-bottom">
                  <li><a href="">Terms</a></li>
                  <li><a href="">Privacy policy</a></li>
                  <li><a href="">Legal notice</a></li>
                  <li><a href="#">Accessibility</a></li>
                </ul>
              </div>
              <div class="col-lg-4 col-md-12 text-center text-lg-end"><a class="btn btn-link-location" href="#">Nairobi</a><a class="btn btn-link-globe active" href="#">Kenya</a></div>
            </div>
          </div>
        </div>
      </div>
    </footer>
    <script src="assets/js/vendors/modernizr-3.6.0.min.js"></script>
    <script src="assets/js/vendors/jquery-3.6.0.min.js"></script>
    <script src="assets/js/vendors/jquery-migrate-3.3.0.min.js"></script>
    <script src="assets/js/vendors/bootstrap.bundle.min.js"></script>
    <script src="assets/js/vendors/waypoints.js"></script>
    <script src="assets/js/vendors/wow.js"></script>
    <script src="assets/js/vendors/magnific-popup.js"></script>
    <script src="assets/js/vendors/perfect-scrollbar.min.js"></script>
    <script src="assets/js/vendors/select2.min.js"></script>
    <script src="assets/js/vendors/isotope.js"></script>
    <script src="assets/js/vendors/scrollup.js"></script>
    <script src="assets/js/vendors/swiper-bundle.min.js"></script>
    <script src="assets/js/vendors/noUISlider.js"></script>
    <script src="assets/js/vendors/slider.js"></script>
    <!-- Count down-->
    <script src="assets/js/vendors/counterup.js"></script>
    <script src="assets/js/vendors/jquery.countdown.min.js"></script>
    <!-- Count down--><script src="assets/js/vendors/jquery.elevatezoom.js"></script>
<script src="assets/js/vendors/slick.js"></script>
<script src="assets/js/vendors/jquery-ui.js"></script>
<script src="assets/js/vendors/jquery.timepicker.min.js"></script>
    <script src="assets/js/main.js?v=1.0.0"></script>
  </body>
</html>