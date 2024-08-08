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
    <title>Recipes - Choosing the right recipe</title>
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
      <section class="section">
        <div class="container-sub"> 
          <div class="box-booking-tabs"> 
            <div class="item-tab wow fadeInUp"><a href="dashboard.php">
              <div class="box-tab-step active">
                <div class="icon-tab"> <span class="icon-book icon-vehicle"> </span><span class="text-tab">Recipes </span></div>
                <div class="number-tab"> <span>01</span></div>
              </div></a></div>
            <div class="item-tab wow fadeInUp">
              <div class="box-tab-step ">
                <div class="icon-tab"> <span class="icon-book icon-extra"> </span><span class="text-tab">Entry and Details</span></div>
                <div class="number-tab"> <span>02</span></div>
              </div></div>
            <div class="item-tab wow fadeInUp">
              <div class="box-tab-step "> 
                <div class="icon-tab"> <span class="icon-book icon-payment"> </span><span class="text-tab">Final Valuation  </span></div>
                <div class="number-tab"> <span>03</span></div>
              </div></div>
            <div class="item-tab wow fadeInUp">
              <div class="box-tab-step">
                <div class="icon-tab"> <span class="icon-book icon-pax"> </span><span class="text-tab">Print Recipe  </span></div>
                <div class="number-tab"> <span>04</span></div>
              </div></div>
          </div>
          <div class="box-row-tab mt-50">
            <div class="box-tab-left">
              <div class="box-content-detail"> 
                <h3 class="heading-24-medium color-text mb-30 wow fadeInUp">Select Your Recipe</h3>
                <div class="list-vehicles wow fadeInUp"> 

                <?php
                    include 'admin/includes/db.php';

                    $recipesPerPage = 3; // Number of recipes per page
                    $currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;
                    $offset = ($currentPage - 1) * $recipesPerPage;

                    // Count total recipes
                    $countResult = $conn->query("SELECT COUNT(*) AS total FROM recipes");
                    $totalRecipes = $countResult->fetch_assoc()['total'];
                    $totalPages = ceil($totalRecipes / $recipesPerPage);

                    // Fetch recipes for current page
                    $sql = "SELECT * FROM recipes LIMIT $recipesPerPage OFFSET $offset";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                ?>
                <div class="item-vehicle wow fadeInUp">
                    <div class="vehicle-left">
                        <div class="vehicle-image"><img src="admin/uploads/<?php echo $row['image_path']; ?>" alt="<?php echo $row['name']; ?>" style="width: 100%; height: 320px; object-fit: cover; border-radius: 10px;"></div>
                    </div>
                    <div class="vehicle-right">
                        <h5 class="text-20-medium color-text mb-10"><?php echo $row['name']; ?></h5>
                        <p class="text-14 color-text mb-20">Description - <?php echo $row['description']; ?></p>
                        <form action="evaluation.php" method="POST">
                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                            <input type="hidden" name="name" value="<?php echo $row['name']; ?>">
                            <input type="hidden" name="description" value="<?php echo $row['description']; ?>">
                            <input type="hidden" name="instructions" value="<?php echo $row['instructions']; ?>">
                            <input type="hidden" name="image_path" value="<?php echo $row['image_path']; ?>">
                            <button type="submit" class="btn btn-primary w-100">Select
                                <svg class="icon-16 ml-5" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 19.5l15-15m0 0H8.25m11.25 0v11.25"></path>
                                </svg>
                            </button>
                        </form>
                    </div>
                </div>
                <?php
                        }
                    } else {
                        echo "No recipes found.";
                    }
                    $conn->close();
                ?>

                <div class="text-center mt-60 mb-100">
                  <nav class="box-pagination">
                    <ul class="pagination">
                        <?php if ($currentPage > 1): ?>
                            <li class="page-item">
                                <a class="page-link page-prev" href="?page=<?= $currentPage - 1 ?>">
                                    <svg fill="none" stroke="currentColor" stroke-width="1.5" viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18"></path>
                                    </svg>
                                </a>
                            </li>
                        <?php endif; ?>

                        <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                            <li class="page-item<?= $i == $currentPage ? ' active' : '' ?>">
                                <a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a>
                            </li>
                        <?php endfor; ?>

                        <?php if ($currentPage < $totalPages): ?>
                            <li class="page-item">
                                <a class="page-link page-next" href="?page=<?= $currentPage + 1 ?>">
                                    <svg fill="none" stroke="currentColor" stroke-width="1.5" viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"></path>
                                    </svg>
                                </a>
                            </li>
                        <?php endif; ?>
                    </ul>
                  </nav>
                </div>

                </div>
              </div>
            </div>
            <div class="box-tab-right">
              <div class="sidebar"> 
                <div class="d-flex align-items-center justify-content-between wow fadeInUp"> 
                  <h6 class="text-20-medium color-text">About Recipes</h6>
                </div>
              </div>
              <div class="sidebar wow fadeInUp"> 
                <ul class="list-ticks list-ticks-small list-ticks-small-booking">
                  <li class="text-14 mb-20">+200 recipes available</li>
                  <li class="text-14 mb-20">Instant recipe calculations</li>
                  <li class="text-14 mb-20">Accurate cost estimation</li>
                  <li class="text-14 mb-20">Easy ingredient management</li>
                </ul>
              </div>
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