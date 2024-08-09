<?php
include 'admin/includes/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    session_start();
    $recipeName = $_POST['recipe_name'];
    $pieces = $_POST['pieces'];
    $ingredients = $_POST['ingredient'];
    $quantities = $_POST['quantity'];
    $units = $_POST['unit'];
    $costs = $_POST['cost'];
    $totalCost = array_sum($costs);

    // Store the recipe data in the session
    $_SESSION['recipe'] = [
        'name' => $recipeName,
        'pieces' => $pieces,
        'ingredients' => [],
        'total_cost' => $totalCost,
    ];

    foreach ($ingredients as $index => $ingredient) {
        $_SESSION['recipe']['ingredients'][] = [
            'name' => $ingredient,
            'quantity' => $quantities[$index],
            'unit' => $units[$index],
            'cost' => $costs[$index],
        ];
    }

    // Redirect to the summary page
    header('Location: customize-summary.php');
    exit();
}
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
    <title>Booking Passenger - Multipurpose Startup SaaS HTML Template</title>
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
            <div class="header-logo"><a class="d-flex" href="index.html"><img alt="luxride" src="assets/imgs/template/logo.svg"></a></div>
            <div class="header-nav">
              <nav class="nav-main-menu d-none d-xl-block">
                <ul class="main-menu">
                  <li class="has-children"><a class="active" href="index.html">Home</a>
                    <ul class="sub-menu">
                      <li><a href="index.html">Homepage 1</a></li>
                      <li><a href="index-2.html">Homepage 2</a></li>
                      <li><a href="index-3.html">Homepage 3</a></li>
                      <li><a href="index-4.html">Homepage 4</a></li>
                      <li><a href="index-5.html">Homepage 5</a></li>
                      <li><a href="index-6.html">Homepage 6</a></li>
                      <li><a href="index-7.html">Homepage 7</a></li>
                      <li><a href="index-8.html">Homepage 8</a></li>
                      <li><a href="index-9.html">Homepage 9</a></li>
                      <li><a href="index-10.html">Homepage 10</a></li>
                    </ul>
                  </li>
                  <li class="has-children"><a href="#">Pages</a>
                    <ul class="sub-menu">
                      <li><a href="about.html">About</a></li>
                      <li><a href="about-2.html">About 2</a></li>
                      <li><a href="our-team.html">Our team</a></li>
                      <li><a href="team-single.html">Team single</a></li>
                      <li><a href="login.html">Login</a></li>
                      <li><a href="register.html">Register</a></li>
                      <li><a href="pricing.html">Pricing</a></li>
                      <li><a href="coming-soon.html">Coming soon</a></li>
                      <li><a href="404.html">Error 404</a></li>
                      <li><a href="booking-vehicle.html">Booking vehicle</a></li>
                      <li><a href="booking-extra.html">Booking Extra</a></li>
                      <li><a href="booking-passenger.html">Booking Passenger</a></li>
                      <li><a href="booking-payment.html">Booking Payment</a></li>
                      <li><a href="booking-receved.html">Booking Receieved</a></li>
                      <li><a href="invoice.html">Invoice</a></li>
                    </ul>
                  </li>
                  <li class="has-children"><a href="fleet-list.html">Our Fleet</a>
                    <ul class="sub-menu">
                      <li><a href="fleet-list.html">Our Fleet 1</a></li>
                      <li><a href="fleet-list-2.html">Our Fleet 2</a></li>
                      <li><a href="fleet-list-3.html">Our Fleet 3</a></li>
                      <li><a href="fleet-list-4.html">Our Fleet 4</a></li>
                      <li><a href="fleet-single.html">Fleet single</a></li>
                    </ul>
                  </li>
                  <li class="has-children"><a href="service-grid.html">Services</a>
                    <ul class="sub-menu">
                      <li><a href="service-grid.html">Service Listing</a></li>
                      <li><a href="service-grid-2.html">Service Listing 2</a></li>
                      <li><a href="service-grid-3.html">Service Listing 3</a></li>
                      <li><a href="service-single.html">Service Single</a></li>
                    </ul>
                  </li>
                  <li class="has-children"><a href="blog-list.html">Blog</a>
                    <ul class="sub-menu">
                      <li><a href="blog-grid.html">Blog Grid</a></li>
                      <li><a href="blog-grid-2.html">Blog Grid 2</a></li>
                      <li><a href="blog-list.html">Blog List</a></li>
                      <li><a href="blog-single.html">Blog Single</a></li>
                    </ul>
                  </li>
                  <li><a href="contact.html">Contact</a></li>
                </ul>
              </nav>
              <div class="burger-icon burger-icon-white"><span class="burger-icon-mid"></span><span class="burger-icon-bottom"></span></div>
            </div>
            <div class="header-right">
              <div class="d-none d-xxl-inline-block align-middle mr-10"><a class="text-14-medium call-phone color-white hover-up" href="tel:+41227157000">+41 22 715 7000</a></div>
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
              <div class="box-button-login d-inline-block mr-10 align-middle"><a class="btn btn-default hover-up" href="login.html">Log In</a></div>
              <div class="box-button-login d-none2 d-inline-block align-middle"><a class="btn btn-white hover-up" href="register.html">Sign Up</a></div>
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
                  <li class="has-children"><a class="active" href="index.html">Home</a>
                    <ul class="sub-menu">
                      <li><a href="index.html">Homepage - 1</a></li>
                      <li><a href="index-2.html">Homepage - 2</a></li>
                      <li><a href="index-3.html">Homepage - 3</a></li>
                      <li><a href="index-4.html">Homepage - 4</a></li>
                      <li><a href="index-5.html">Homepage - 5</a></li>
                      <li><a href="index-6.html">Homepage - 6</a></li>
                      <li><a href="index-7.html">Homepage - 7</a></li>
                      <li><a href="index-8.html">Homepage - 8</a></li>
                      <li><a href="index-9.html">Homepage - 9</a></li>
                      <li><a href="index-10.html">Homepage - 10</a></li>
                    </ul>
                  </li>
                  <li class="has-children"><a href="#">Pages</a>
                    <ul class="sub-menu">
                      <li><a href="about.html">About</a></li>
                      <li><a href="about-2.html">About 2</a></li>
                      <li><a href="our-team.html">Our team</a></li>
                      <li><a href="team-single.html">Team single</a></li>
                      <li><a href="login.html">Login</a></li>
                      <li><a href="register.html">Register</a></li>
                      <li><a href="pricing.html">Pricing</a></li>
                      <li><a href="coming-soon.html">Coming soon</a></li>
                      <li><a href="404.html">Error 404</a></li>
                      <li><a href="booking-vehicle.html">Booking vehicle</a></li>
                      <li><a href="booking-extra.html">Booking Extra</a></li>
                      <li><a href="booking-passenger.html">Booking Passenger</a></li>
                      <li><a href="booking-payment.html">Booking Payment</a></li>
                      <li><a href="booking-receved.html">Booking Receieved</a></li>
                      <li><a href="invoice.html">Invoice</a></li>
                    </ul>
                  </li>
                  <li class="has-children"><a href="fleet-list.html">Our Fleet</a>
                    <ul class="sub-menu">
                      <li><a href="fleet-list.html">Our Fleet 1</a></li>
                      <li><a href="fleet-list-2.html">Our Fleet 2</a></li>
                      <li><a href="fleet-list-3.html">Our Fleet 3</a></li>
                      <li><a href="fleet-list-4.html">Our Fleet 4</a></li>
                      <li><a href="fleet-single.html">Fleet single</a></li>
                    </ul>
                  </li>
                  <li class="has-children"><a href="service-grid.html">Services</a>
                    <ul class="sub-menu">
                      <li><a href="service-grid.html">Service Listing</a></li>
                      <li><a href="service-grid-2.html">Service Listing 2</a></li>
                      <li><a href="service-grid-3.html">Service Listing 3</a></li>
                      <li><a href="service-single.html">Service Single</a></li>
                    </ul>
                  </li>
                  <li class="has-children"><a href="blog.html">Blog</a>
                    <ul class="sub-menu">
                      <li><a href="blog-grid.html">Blog Grid</a></li>
                      <li><a href="blog-grid-2.html">Blog Grid 2</a></li>
                      <li><a href="blog-list.html">Blog List</a></li>
                      <li><a href="blog-single.html">Blog Details</a></li>
                    </ul>
                  </li>
                  <li><a href="contact.html">Contact</a></li>
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
            <div class="item-tab wow fadeInUp"><a href="booking-vehicle.html">
                <div class="box-tab-step active">
                  <div class="icon-tab"> <span class="icon-book icon-vehicle"> </span><span class="text-tab">Vehicle </span></div>
                  <div class="number-tab"> <span>01</span></div>
                </div></a></div>
            <div class="item-tab wow fadeInUp"><a href="booking-extra.html">
                <div class="box-tab-step active">
                  <div class="icon-tab"> <span class="icon-book icon-extra"> </span><span class="text-tab">Extras</span></div>
                  <div class="number-tab"> <span>02</span></div>
                </div></a></div>
            <div class="item-tab wow fadeInUp"><a href="booking-passenger.html">
                <div class="box-tab-step active">
                  <div class="icon-tab"> <span class="icon-book icon-pax"> </span><span class="text-tab">Details  </span></div>
                  <div class="number-tab"> <span>03</span></div>
                </div></a></div>
            <div class="item-tab wow fadeInUp"><a href="booking-payment.html">
                <div class="box-tab-step"> 
                  <div class="icon-tab"> <span class="icon-book icon-payment"> </span><span class="text-tab">Payment  </span></div>
                  <div class="number-tab"> <span>04</span></div>
                </div></a></div>
          </div>
          <div class="box-row-tab mt-50">
            <div class="box-tab-left">
              <div class="box-content-detail"> 
                <h3 class="heading-24-medium color-text mb-30 wow fadeInUp">Passenger Details</h3>
                <div class="form-contact form-comment wow fadeInUp"> 
                  <form action="#">
                    <div class="row"> 
                      <div class="col-lg-6">
                        <div class="form-group"> 
                          <label class="form-label" for="fullname">Name</label>
                          <input class="form-control" id="fullname" type="text" value="">
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group"> 
                          <label class="form-label" for="lastname">Last Name</label>
                          <input class="form-control" id="lastname" type="text" value="">
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group"> 
                          <label class="form-label" for="email">Email Address</label>
                          <input class="form-control" id="email" type="text" value="creativelayers088@gmail.com">
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group"> 
                          <label class="form-label" for="phone">Phone Number</label>
                          <input class="form-control" id="phone" type="text" value="+29 954 029 13">
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
                <div class="mt-30"></div>
                <h3 class="heading-24-medium color-text mb-30 wow fadeInUp">Options</h3>
                <div class="form-contact form-comment wow fadeInUp"> 
                  <form action="#">
                    <div class="row"> 
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label class="form-label" for="passengers">Passengers</label>
                          <select class="form-control" id="passengers">
                            <option value=""></option>
                            <option value="1">1 </option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group"> 
                          <label class="form-label" for="luggage">Luggage</label>
                          <select class="form-control" id="luggage">
                            <option value=""></option>
                            <option value="1">1 </option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-lg-12">
                        <div class="form-group"> 
                          <label class="form-label" for="notes">Notes to driver</label>
                          <textarea class="form-control" id="notes" rows="5"></textarea>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
                <div class="mt-30 mb-120 wow fadeInUp"> <a class="btn btn-primary btn-primary-big w-100" href="booking-payment.html">Continue 
                    <svg class="icon-16 ml-5" fill="none" stroke="currentColor" stroke-width="1.5" viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 19.5l15-15m0 0H8.25m11.25 0v11.25"></path>
                    </svg></a></div>
              </div>
            </div>
            <div class="box-tab-right">
              <div class="sidebar"> 
                <div class="d-flex align-items-center justify-content-between wow fadeInUp"> 
                  <h6 class="text-20-medium color-text">Ride Summary</h6><a class="text-14-medium color-text text-decoration-underline" href="#">Edit</a>
                </div>
                <div class="mt-20 wow fadeInUp"> 
                  <ul class="list-routes"> 
                    <li> <span class="location-item">A </span><span class="info-location text-14-medium">Manchester, UK </span></li>
                    <li> <span class="location-item">A </span><span class="info-location text-14-medium">London, UK</span></li>
                  </ul>
                </div>
                <div class="mt-20 wow fadeInUp"> 
                  <ul class="list-icons"> 
                    <li> <span class="icon-item icon-plan"> </span><span class="info-location text-14-medium">Thu, Oct 06, 2022</span></li>
                    <li> <span class="icon-item icon-time"></span><span class="info-location text-14-medium">6 PM  :  15</span></li>
                  </ul>
                </div>
                <div class="mt-20 wow fadeInUp"> 
                  <div class="box-map-route"> 
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d193595.15830869428!2d-74.119763973046!3d40.69766374874431!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2zVGjDoG5oIHBo4buRIE5ldyBZb3JrLCBUaeG7g3UgYmFuZyBOZXcgWW9yaywgSG9hIEvhu7M!5e0!3m2!1svi!2s!4v1679223612023!5m2!1svi!2s" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                  </div>
                  <div class="box-info-route"> 
                    <div class="info-route-left"> <span class="text-14 color-grey">Total Distance</span><span class="text-14-medium color-text">311 km/ 194 miles</span></div>
                    <div class="info-route-left"> <span class="text-14 color-grey">Total Time</span><span class="text-14-medium color-text">3h 43m</span></div>
                  </div>
                  <div class="border-bottom mt-30 mb-25"> </div>
                  <div class="mt-0"> <span class="text-14 color-grey">Vehicle</span><br><span class="text-14-medium color-text">Mercedes-Benz E220</span></div>
                  <div class="border-bottom mt-30 mb-25"> </div>
                  <div class="mt-0"> <span class="text-14 color-grey">Extra Options</span><br><span class="text-14-medium color-text">1 x Child Seat - $5.00</span><br><span class="text-14-medium color-text">1 x Bouquet of Flowers - $75.00</span><br><span class="text-14-medium color-text">2 x Vodka Bottle - $78.00</span><br><span class="text-14-medium color-text">1 x Bodyguard Service - $750.00</span></div>
                </div>
              </div>
              <div class="sidebar wow fadeInUp"> 
                <ul class="list-prices list-prices-2"> 
                  <li> <span class="text">Selected vehicle</span><span class="price">$174</span></li>
                  <li> <span class="text">Extra options</span><span class="price">$90.25</span></li>
                </ul>
                <div class="border-bottom mt-30 mb-15"> </div>
                <ul class="list-prices"> 
                  <li> <span class="text text-20-medium">Total</span><span class="price text-20-medium">$909.47</span></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>

    <section>
      <h1>Create Your Recipe</h1>
      <form action="" method="POST">
          <label for="recipe_name">Recipe Name:</label>
          <input type="text" id="recipe_name" name="recipe_name" required><br><br>
  
          <label for="pieces">This recipe makes how many pieces/items:</label>
          <input type="number" id="pieces" name="pieces" required><br><br>
  
          <h3>Ingredients:</h3>
          <div id="ingredients">
              <div class="ingredient">
                  <label>Ingredient Name:</label>
                  <input type="text" name="ingredient[]" required>
                  
                  <label>Quantity:</label>
                  <input type="number" name="quantity[]" required>
  
                  <label>Unit:</label>
                  <select name="unit[]" required>
                      <option value="kg">Kg</option>
                      <option value="liter">Liter</option>
                      <option value="grams">Grams</option>
                      <option value="ml">Milliliters</option>
                      <option value="pieces">Pieces</option>
                  </select>
  
                  <label>Cost:</label>
                  <input type="number" name="cost[]" step="0.01" required><br><br>
              </div>
          </div>
          
          <button type="button" onclick="addIngredient()">Add Another Ingredient</button><br><br>
          <input type="submit" value="Submit Recipe">
      </form>
  
      <script>
          function addIngredient() {
              const ingredientsDiv = document.getElementById('ingredients');
              const newIngredient = document.createElement('div');
              newIngredient.classList.add('ingredient');
              newIngredient.innerHTML = `
                  <label>Ingredient Name:</label>
                  <input type="text" name="ingredient[]" required>
                  
                  <label>Quantity:</label>
                  <input type="number" name="quantity[]" required>
  
                  <label>Unit:</label>
                  <select name="unit[]" required>
                      <option value="kg">Kg</option>
                      <option value="liter">Liter</option>
                      <option value="grams">Grams</option>
                      <option value="ml">Milliliters</option>
                      <option value="pieces">Pieces</option>
                  </select>
  
                  <label>Cost:</label>
                  <input type="number" name="cost[]" step="0.01" required><br><br>
              `;
              ingredientsDiv.appendChild(newIngredient);
          }
      </script>
    </section>
    <footer class="footer">
      <div class="footer-1">
        <div class="container-sub">
          <div class="box-footer-top">
            <div class="row align-items-center">
              <div class="col-lg-6 col-md-6 text-md-start text-center mb-15 wow fadeInUp">
                <div class="d-flex align-items-center justify-content-md-start justify-content-center"><a class="mr-30" href="#"><img src="assets/imgs/template/logo.svg" alt="Luxride"></a><a class="text-14-medium call-phone color-white hover-up" href="tel:+41227157000">+41 22 715 7000</a></div>
              </div>
              <div class="col-lg-6 col-md-6 text-md-end text-center mb-15 wow fadeInUp">
                <div class="d-flex align-items-center justify-content-md-end justify-content-center"><span class="text-18-medium color-white mr-10">Follow Us</span><a class="icon-socials icon-facebook" href="#"></a><a class="icon-socials icon-twitter" href="#"></a><a class="icon-socials icon-instagram" href="#"></a><a class="icon-socials icon-linkedin" href="#"></a></div>
              </div>
            </div>
          </div>
          <div class="row mb-40">
            <div class="col-lg-3 width-20">
              <h5 class="text-18-medium color-white mb-20 wow fadeInUp">Company</h5>
              <ul class="menu-footer wow fadeInUp">
                <li><a href="#">About us</a></li>
                <li><a href="#">Our offerings</a></li>
                <li><a href="#">Newsroom</a></li>
                <li><a href="#">Investors</a></li>
                <li><a href="#">Blog</a></li>
                <li><a href="#">Careers</a></li>
                <li><a href="#">Gift cards</a></li>
              </ul>
            </div>
            <div class="col-lg-3 width-20 mb-30">
              <h5 class="text-18-medium color-white mb-20 wow fadeInUp">Top cities</h5>
              <ul class="menu-footer wow fadeInUp">
                <li><a href="about.html">New York</a></li>
                <li><a href="our-team.html">London</a></li>
                <li><a href="#">Berlin</a></li>
                <li><a href="#">Los Angeles</a></li>
                <li><a href="#">Paris</a></li>
              </ul>
            </div>
            <div class="col-lg-3 width-20 mb-30">
              <h5 class="text-18-medium color-white mb-20 wow fadeInUp">Explore</h5>
              <ul class="menu-footer wow fadeInUp">
                <li><a href="#">Intercity rides</a></li>
                <li><a href="#">Limousine service</a></li>
                <li><a href="#">Chauffeur service</a></li>
                <li><a href="#">Private car service</a></li>
                <li><a href="#">Ground transportation</a></li>
                <li><a href="#">Airport transfer</a></li>
              </ul>
            </div>
            <div class="col-lg-3 width-20 mb-30">
              <h5 class="text-18-medium color-white mb-20 wow fadeInUp">Classes</h5>
              <ul class="menu-footer wow fadeInUp">
                <li><a href="#">Business</a></li>
                <li><a href="#">First</a></li>
                <li><a href="#">XL</a></li>
                <li><a href="#">Assistant</a></li>
              </ul>
            </div>
            <div class="col-lg-3 width-20">
              <h5 class="text-18-medium color-white mb-20 wow fadeInUp">Download The App</h5>
              <div class="text-start wow fadeInUp">
                <div class="box-button-download"><a class="btn btn-download hover-up wow fadeInUp" href="#">
                    <div class="inner-download">
                      <div class="icon-download"><img src="assets/imgs/template/icons/apple-icon.svg" alt="luxride"></div>
                      <div class="info-download"><span class="text-download-top">Download on the</span><span class="text-14-medium">Apple Store</span></div>
                    </div></a><a class="btn btn-download hover-up wow fadeInUp" href="#">
                    <div class="inner-download">
                      <div class="icon-download"><img src="assets/imgs/template/icons/google-icon.svg" alt="luxride"></div>
                      <div class="info-download"><span class="text-download-top">Download on the</span><span class="text-14-medium">Apple Store</span></div>
                    </div></a></div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="footer-2">
        <div class="container-sub">
          <div class="footer-bottom">
            <div class="row align-items-center">
              <div class="col-lg-8 col-md-12 text-center text-lg-start"><span class="text-14 color-white mr-50">© 2024 Luxride</span>
                <ul class="menu-bottom">
                  <li><a href="term-conditions.html">Terms</a></li>
                  <li><a href="term-conditions.html">Privacy policy</a></li>
                  <li><a href="term-conditions.html">Legal notice</a></li>
                  <li><a href="#">Accessibility</a></li>
                </ul>
              </div>
              <div class="col-lg-4 col-md-12 text-center text-lg-end"><a class="btn btn-link-location" href="#">New York</a><a class="btn btn-link-globe active" href="#">English</a></div>
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