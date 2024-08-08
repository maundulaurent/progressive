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
    <title>Recipe Generator</title>
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
      
      <!-- hero section -->
      <section class="section banner-home1">
        <div class="box-swiper"> 
          <div class="swiper-container swiper-banner-1 pb-0">
            <div class="swiper-wrapper">
              <div class="swiper-slide">
                <div class="box-cover-image" style="background-image:url(assets/imgs/landing/recipe2.jpg)"></div>
                <div class="box-banner-info"> 
                  <p class="text-16 color-white wow fadeInUp">Discover the Perfect Ingredients</p>
                  <h2 class="heading-52-medium color-white wow fadeInUp">Master Your Recipe  <br class="d-none d-lg-block">With Expert Guidance</h2>
                </div>
              </div>
              <div class="swiper-slide">
                <div class="box-cover-image" style="background-image:url(assets/imgs/landing/recipe3.jpg)"></div>
                <div class="box-banner-info"> 
                  <p class="text-16 color-white wow fadeInUp">Transform Your Ingredients</p>
                  <h2 class="heading-52-medium color-white wow fadeInUp">Create Delicious  <br class="d-none d-lg-block">Recipes Effortlessly</h2>
                </div>
              </div>
              <div class="swiper-slide">
                <div class="box-cover-image" style="background-image:url(assets/imgs/landing/recipe4.jpg)"></div>
                <div class="box-banner-info"> 
                  <p class="text-16 color-white wow fadeInUp">Elevate Your Cooking Skills</p>
                  <h2 class="heading-52-medium color-white wow fadeInUp">Unleash Your Culinary  <br class="d-none d-lg-block">Creativity</h2>
                </div>
              </div>
            </div>
            <div class="box-pagination-button">
              <div class="swiper-button-prev swiper-button-prev-banner"></div>
              <div class="swiper-button-next swiper-button-next-banner"></div>
              <div class="swiper-pagination swiper-pagination-banner"></div>
            </div>
          </div>
        </div>
       
      </section>
      <!-- end hero section -->     
     
      <section class="section pt-120 pb-20 bg-primary bg-how-it-works"> 
        <div class="container-sub"> 
          <h2 class="heading-44-medium color-white mb-60 wow fadeInUp">How It Works</h2>
          <div class="row"> 
            <div class="col-lg-6 order-lg-last">
              <div class="box-main-slider"> 
                <div class="detail-gallery wow fadeInUp">
                  <div class="main-image-slider">
                    <figure><img src="assets/imgs/landing/works3.jpg" alt="luxride"></figure>
                    <figure><img src="assets/imgs/landing/works2.jpg" alt="luxride"></figure>
                    <figure><img src="assets/imgs/landing/works1.jpg" alt="luxride"></figure>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-6 order-lg-first justify-content-between position-z3 wow fadeInUp">
              <ul class="slider-nav-thumbnails list-how"> 
                <li> <span class="line-white"></span>
                    <h4 class="text-20-medium mb-20">Select Your Recipe</h4>
                    <p class="text-16">Choose from a variety of recipes that match your ingredients. You can view details, adjust ingredient quantities, and see cost calculations.</p>
                </li>

                <li> <span class="line-white"></span>
                  <h4 class="text-20-medium mb-20">Enter Your Ingredients</h4>
                  <p class="text-16">Provide the quantities and current prices of ingredients you have on hand. Our system will help you identify recipes and ratios that you can create with them.</p>
                </li>
                
                <li> <span class="line-white"></span>
                  <h4 class="text-20-medium mb-20">Calculate Costs and Quantities</h4>
                  <p class="text-16">Use our tool to calculate the total cost of your recipe and the quantities needed for the desired number of servings. Get detailed cost breakdowns and ingredient requirements.</p>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </section>
      <section class="section pt-120 pb-120 bg-our-service-2">
       
        <div class="container-sub"> 
          <div class="row align-items-center">
            <div class="col-lg-6 col-sm-7 col-7">
              <h2 class="color-white heading-44-medium title-fleet wow fadeInUp">Featured Recipes</h2>
            </div>
            <div class="col-lg-6 col-sm-5 col-5 text-end"><a class="text-16-medium color-white d-flex align-items-center justify-content-end wow fadeInUp" href="dashboard.php">More Recipes
                <svg class="icon-16 ml-5" fill="none" stroke="currentColor" stroke-width="1.5" viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 19.5l15-15m0 0H8.25m11.25 0v11.25"></path>
                </svg></a></div>
          </div>
        </div>
        <div class="box-slide-fleet mt-50">
          <div class="box-swiper"> 
            <div class="swiper-container swiper-group-4-service pb-0">
              <div class="swiper-wrapper">
                <div class="swiper-slide"> 
                  <div class="cardService wow fadeInUp">
                    <div class="cardInfo">
                      <h3 class="cardTitle text-20-medium color-white mb-10">Classic Chocolate Cake</h3>
                      <div class="box-inner-info">
                        <p class="cardDesc text-14 color-white mb-30">A timeless favorite, this classic chocolate cake is rich, moist, and perfect for any occasion.</p><a class="cardLink btn btn-arrow-up" href="">
                          <svg class="icon-16" fill="none" stroke="currentColor" stroke-width="1.5" viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 19.5l15-15m0 0H8.25m11.25 0v11.25"></path>
                          </svg></a>
                      </div>
                    </div>
                    <div class="cardImage" ><img src="assets/imgs/landing/cake.jpg" alt="recipe" style="width: 100%; height: 430px; object-fit: cover; border-radius: 10px;"></div>
                  </div>
                </div>
                <div class="swiper-slide"> 
                  <div class="cardService wow fadeInUp">
                    <div class="cardInfo">
                      <h3 class="cardTitle text-20-medium color-white mb-10">Caesar Salad</h3>
                      <div class="box-inner-info">
                        <p class="cardDesc text-14 color-white mb-30"> A fresh and crunchy Caesar salad with crisp romaine lettuce, creamy Caesar dressing</p><a class="cardLink btn btn-arrow-up" href="">
                          <svg class="icon-16" fill="none" stroke="currentColor" stroke-width="1.5" viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 19.5l15-15m0 0H8.25m11.25 0v11.25"></path>
                          </svg></a>
                      </div>
                    </div>
                    <div class="cardImage" ><img src="assets/imgs/landing/salad.jpg" alt="recipe" style="width: 100%; height: 430px; object-fit: cover; border-radius: 10px;"></div>
                  </div>
                </div>
                <div class="swiper-slide"> 
                  <div class="cardService wow fadeInUp">
                    <div class="cardInfo">
                      <h3 class="cardTitle text-20-medium color-white mb-10">Blueberry Muffins</h3>
                      <div class="box-inner-info">
                        <p class="cardDesc text-14 color-white mb-30">Perfect for breakfast, brunch, or a delightful snack.</p><a class="cardLink btn btn-arrow-up" href="">
                          <svg class="icon-16" fill="none" stroke="currentColor" stroke-width="1.5" viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 19.5l15-15m0 0H8.25m11.25 0v11.25"></path>
                          </svg></a>
                      </div>
                    </div>
                    <div class="cardImage" ><img src="assets/imgs/landing/muffins.jpg" alt="recipe" style="width: 100%; height: 430px; object-fit: cover; border-radius: 10px;"></div>
                  </div>
                </div>
                <div class="swiper-slide"> 
                  <div class="cardService wow fadeInUp">
                    <div class="cardInfo">
                      <h3 class="cardTitle text-20-medium color-white mb-10">Grilled Chicken Tacos</h3>
                      <div class="box-inner-info">
                        <p class="cardDesc text-14 color-white mb-30">Flavorful and easy to make, these grilled chicken tacos are packed with seasoned chicken, fresh veggies, and a zesty lime crema. Ideal for a quick dinner or a fun weekend meal.</p><a class="cardLink btn btn-arrow-up" href="">
                          <svg class="icon-16" fill="none" stroke="currentColor" stroke-width="1.5" viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 19.5l15-15m0 0H8.25m11.25 0v11.25"></path>
                          </svg></a>
                      </div>
                    </div>
                    <div class="cardImage" ><img src="assets/imgs/landing/tacos1.jpg" alt="recipe" style="width: 100%; height: 430px; object-fit: cover; border-radius: 10px;"></div>
                  </div>
                </div>
              </div>
              <div class="box-pagination-fleet">
                <div class="swiper-button-prev swiper-button-prev-fleet">
                  <svg fill="none" stroke="currentColor" stroke-width="1.5" viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18"></path>
                  </svg>
                </div>
                <div class="swiper-button-next swiper-button-next-fleet">
                  <svg fill="none" stroke="currentColor" stroke-width="1.5" viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"></path>
                  </svg>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section class="section mb-30 mt-80 box-showcase">
        <div class="bg-showcase pt-100 pb-70">
          <div class="container-sub"> 
            <div class="row align-items-center"> 
              <div class="col-lg-6 mb-30"> 
                <h2 class="heading-44-medium color-white wow fadeInUp">In our Works.</h2>
              </div>
              <div class="col-lg-6">
                <div class="row align-items-center">
                  <div class="col-4 mb-30 wow fadeInUp">
                    <div class="box-number"> 
                      <h2 class="heading-44-medium color-white">90</h2>
                      <p class="text-20 color-white">Recipes</p>
                    </div>
                  </div>
                  <div class="col-4 mb-30 wow fadeInUp">
                    <div class="box-number"> 
                      <h2 class="heading-44-medium color-white">127</h2>
                      <p class="text-20 color-white">Ingredients</p>
                    </div>
                  </div>
                  <div class="col-sm-4 col-12 mb-30 wow fadeInUp">
                    <div class="box-number"> 
                      <h2 class="heading-44-medium color-white">8K</h2>
                      <p class="text-20 color-white">Happy clients</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      
      <section class="section pt-130 pb-130 bg-primary box-testimonials">
        <div class="container-sub"> 
          <div class="row"> 
            <div class="col-lg-5 col-md-6 mb-30">
              <div class="box-swiper"> 
                <div class="swiper-container swiper-group-testimonials pb-50">
                  <div class="swiper-wrapper">
                    <div class="swiper-slide"> 
                      <div class="cardQuote wow fadeInUp">
                        <div class="box-quote"> 
                          <div class="icon-quote"> </div>
                          <div class="info-quote"> 
                            <h5 class="color-white text-18-medium">Mark</h5>
                            <p class="color-white text-14">Restaurant chef</p>
                          </div>
                        </div>
                        <div class="content-quote">
                        This recipe generator has completely transformed how we manage and cost our recipes. </div>
                      </div>
                    </div>
                    <div class="swiper-slide"> 
                      <div class="cardQuote wow fadeInUp">
                        <div class="box-quote"> 
                          <div class="icon-quote"> </div>
                          <div class="info-quote"> 
                            <h5 class="color-white text-18-medium">Mark</h5>
                            <p class="color-white text-14">Restaurant chef</p>
                          </div>
                        </div>
                        <div class="content-quote">
                        The recipe generator is a game-changer for our kitchen operations. It's efficient and reliable, which is exactly what we needed. </div>
                      </div>
                    </div>
                    <div class="swiper-slide"> 
                      <div class="cardQuote wow fadeInUp">
                        <div class="box-quote"> 
                          <div class="icon-quote"> </div>
                          <div class="info-quote"> 
                            <h5 class="color-white text-18-medium">Mark</h5>
                            <p class="color-white text-14">Restaurant chef</p>
                          </div>
                        </div>
                        <div class="content-quote">
                        his recipe generator has completely transformed how we manage and cost our recipes. </div>
                      </div>
                    </div>
                    
                   
                  </div>
                  <div class="box-pagination-testimonials mt-40 wow fadeInUp"> <span class="firstNumber"></span><span class="lastNumber"></span>
                    <div class="swiper-pagination swiper-pagination-testimonials"></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-7 col-md-6 mb-30 text-lg-end text-center d-none d-md-block">
              <div class="box-video wow fadeInUp"> <a class="btn btn-play popup-youtube hover-up" href=""></a><img src="assets/imgs/landing/recipe1.jpg" alt="recipe"></div>
            </div>
          </div>
        </div>
      </section>
    
      <section class="section pt-80 mb-30 bg-faqs">
        <div class="container-sub">
          <div class="box-faqs">
            <div class="text-center"> 
              <h2 class="color-brand-1 mb-20 wow fadeInUp">Frequently Asked Questions</h2>
            </div>
            <div class="mt-60 mb-40">
              <div class="accordion wow fadeInUp" id="accordionFAQ">
                <div class="accordion-item">
                  <h5 class="accordion-header" id="headingOne">
                    <button class="accordion-button text-heading-5" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">How do I calculate the cost of a recipe?</button>
                  </h5>
                  <div class="accordion-collapse collapse show" id="collapseOne" aria-labelledby="headingOne" data-bs-parent="#accordionFAQ">
                    <div class="accordion-body">
                      To calculate the cost of a recipe, go to the 'Valuate Recipe' section. Select the recipe, input the prices for each ingredient, and the system will calculate the total cost for you.
                    </div>
                  </div>
                </div>
                <div class="accordion-item">
                  <h5 class="accordion-header" id="headingTwo">
                    <button class="accordion-button text-heading-5 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">How can I find the quantity of ingredients needed to produce a specific number of units?</button>
                  </h5>
                  <div class="accordion-collapse collapse" id="collapseTwo" aria-labelledby="headingTwo" data-bs-parent="#accordionFAQ">
                    <div class="accordion-body">
                      Go to the 'Check Quantity' section, select the recipe, and enter the number of units you want to produce. The system will calculate and display the required quantities of each ingredient.
                    </div>
                  </div>
                </div>
                <div class="accordion-item">
                  <h5 class="accordion-header" id="headingThree">
                    <button class="accordion-button text-heading-5 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">What should I do if I encounter an error or need support?</button>
                  </h5>
                  <div class="accordion-collapse collapse" id="collapseThree" aria-labelledby="headingThree" data-bs-parent="#accordionFAQ">
                    <div class="accordion-body">
                      If you encounter an error or need support, please visit our 'Support' section or contact our customer service team. We are here to help you with any issues you may face.
                    </div>
                  </div>
                </div>
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
