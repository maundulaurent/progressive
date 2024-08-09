<?php
session_start();
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="assets/css/style.css?v=1.0.0" rel="stylesheet">
    <title>Bakewave | Recipes</title>
  </head>
  <body>
    <?php include_once 'includes/preloader.php'; ?>

    <?php include_once 'includes/navbar.php'; ?>

    <main class="main">
      <section class="section banner-home8">
        <div class="box-banner-homepage-8"> 
          <div class="box-cover-image" style="background-image:url(assets/imgs/landing/dash2.jpg)">
            <div class="container-sub">
              <div class="row align-items-center"> 
                <div class="col-lg-7">
                <h2 class="heading-52-medium color-white mb-10 wow fadeInUp">Curate and Customize  <br class="d-none d-lg-block"> Your Perfect Recipe</h2>
                  <p class="color-white text-16 wow fadeInUp">Explore our extensive collection of recipes, carefully curated to cater to all tastes and dietary needs. Whether you're cooking for a special event or just looking for a weeknight meal, we have something for everyone.</p>
                  <div class="mt-30 wow fadeInUp"> <a class="btn btn-white-big" href="available.php">Browse Our Recipes
                      <svg class="icon-16" fill="none" stroke="currentColor" stroke-width="1.5" viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 19.5l15-15m0 0H8.25m11.25 0v11.25"></path>
                      </svg></a></div>
                </div>
                <div class="col-lg-5">
                    <div class="box-search-ride box-search-ride-style-2 box-search-ride-style-4 wow fadeInUp"> 
                        <div class="box-search-tabs">
                        <div class="head-tabs"> 
                            <ul class="nav nav-tabs nav-tabs-search" role="tablist">
                            <li><a class="active" href="#tab-customize" data-bs-toggle="tab" role="tab" aria-controls="tab-customize" aria-selected="true">
                                <span class="item-icon icon-customize"></span> Customize Recipe
                            </a></li>
                            <li><a href="#tab-available" data-bs-toggle="tab" role="tab" aria-controls="tab-available" aria-selected="false">
                                <span class="item-icon icon-view"></span> Available Recipes
                            </a></li>
                            </ul>
                        </div>
                        <div class="tab-content">
                            <!-- Customize Recipe Tab -->
                            <div class="tab-pane fade active show" id="tab-customize" role="tabpanel" aria-labelledby="tab-customize">
                            <div class="box-form-search">
                                <div class="search-item"> 
                                <div class="search-icon"> <i class="bi bi-egg-fried fs-2"></i></div>
                                <div class="search-inputs"> 
                                    <label class="text-14 color-grey">Customize your recipe with various ingredients and options.</label>
                                </div>
                                </div>
                                <div class="search-item"> 
                                <div class="search-icon"> <i class="bi bi-bar-chart-steps fs-2"></i></div>
                                <div class="search-inputs"> 
                                    <label class="text-14 color-grey">Explore different ways to tailor your recipes to your taste.</label>
                                </div>
                                </div>
                                <div class="search-item search-button mb-0"> 
                                    <a class="btn btn-search" href="customize.php"> 
                                        Customize a Recipe
                                    </a>
                                </div>
                            </div>
                            </div>
                            <!-- Available Recipes Tab -->
                            <div class="tab-pane fade" id="tab-available" role="tabpanel" aria-labelledby="tab-available">
                            <div class="box-form-search">
                                <div class="search-item"> 
                                <div class="search-icon"> <i class="bi bi-view-list fs-2"></i></div>
                                <div class="search-inputs"> 
                                    <label class="text-14 color-grey">View a list of all available recipes curated by our experts.</label>
                                </div>
                                </div>
                                <div class="search-item"> 
                                <div class="search-icon"> <i class="bi bi-clipboard2-heart fs-2"></i></div>
                                <div class="search-inputs"> 
                                    <label class="text-14 color-grey">Browse through the collection to find the perfect dish.</label>
                                </div>
                                </div>
                                <div class="search-item search-button mb-0"> 
                                    <a class="btn btn-search" href="available.php"> 
                                        View Recipes
                                    </a>
                                </div>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>


              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="section box-makeyourtrip-home8">
        <div class="container-sub"> 
          <div class="text-center"> 
            <h2 class="heading-44-medium wow fadeInUp">Make Your Trip Your Way With Us</h2>
          </div>
          <div class="row mt-60 cardIconTitleDescLeft"> 
            <div class="col-lg-4 col-md-6 col-sm-6 mb-30"> 
              <div class="cardIconTitleDesc wow fadeInUp">
                <div class="cardIcon"><img src="assets/imgs/page/homepage7/route.svg" alt="luxride"></div>
                <div class="cardTitle">
                  <h5 class="text-20-medium color-text">Safety First</h5>
                </div>
                <div class="cardDesc">
                  <p class="text-16 color-text">Both you and your shipments will travel with professional drivers. Always with the highest quality standards.</p>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 mb-30"> 
              <div class="cardIconTitleDesc wow fadeInUp">
                <div class="cardIcon"><img src="assets/imgs/page/homepage7/price.svg" alt="luxride"></div>
                <div class="cardTitle">
                  <h5 class="text-20-medium color-text">Prices With No Surprises</h5>
                </div>
                <div class="cardDesc">
                  <p class="text-16 color-text">Both you and your shipments will travel with professional drivers. Always with the highest quality standards.</p>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 mb-30"> 
              <div class="cardIconTitleDesc wow fadeInUp">
                <div class="cardIcon"><img src="assets/imgs/page/homepage7/vehicle.svg" alt="luxride"></div>
                <div class="cardTitle">
                  <h5 class="text-20-medium color-text">Private Travel Solutions</h5>
                </div>
                <div class="cardDesc">
                  <p class="text-16 color-text">Both you and your shipments will travel with professional drivers. Always with the highest quality standards.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="section box-our-fleet-home8">
        <div class="container-sub"> 
          <div class="row align-items-center">
            <div class="col-lg-6 col-7">
              <h2 class="heading-44-medium wow fadeInUp">Our Fleet</h2>
            </div>
            <div class="col-lg-6 col-5 text-end"><a class="text-16-medium color-primary wow fadeInUp" href="#">More Fleet
                <svg class="icon-16" fill="none" stroke="currentColor" stroke-width="1.5" viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 19.5l15-15m0 0H8.25m11.25 0v11.25"></path>
                </svg></a></div>
          </div>
          <div class="box-slide-fleet-2 fleet-style-3 mt-50">
            <div class="box-swiper"> 
              <div class="swiper-container swiper-group-3-fleet pb-40">
                <div class="swiper-wrapper">
                  <div class="swiper-slide"> 
                    <div class="cardFleet wow fadeInUp">
                      <div class="cardInfo"><a href="fleet-single.html">
                          <h3 class="text-20-medium color-text mb-10">Business Class</h3></a>
                        <p class="text-14 color-text mb-30">Mercedes-Benz E-Class, BMW 5 Series, Cadillac XTS or similar</p>
                      </div>
                      <div class="cardImage mb-30"><a href="fleet-single.html"><img src="assets/imgs/page/homepage1/e-class.png" alt="Luxride"></a></div>
                      <div class="cardInfoBottom">
                        <div class="passenger"><span class="icon-circle icon-passenger"></span><span class="text-14">Passengers<span>4</span></span></div>
                        <div class="luggage"><span class="icon-circle icon-luggage"></span><span class="text-14">Luggage<span>2</span></span></div>
                      </div>
                    </div>
                  </div>
                  <div class="swiper-slide"> 
                    <div class="cardFleet wow fadeInUp">
                      <div class="cardInfo"><a href="fleet-single.html">
                          <h3 class="text-20-medium color-text mb-10">First Class</h3></a>
                        <p class="text-14 color-text mb-30">Mercedes-Benz EQS, BMW 7 Series, Audi A8 or similar</p>
                      </div>
                      <div class="cardImage mb-30"><a href="fleet-single.html"><img src="assets/imgs/page/homepage1/eqs.png" alt="Luxride"></a></div>
                      <div class="cardInfoBottom">
                        <div class="passenger"><span class="icon-circle icon-passenger"></span><span class="text-14">Passengers<span>4</span></span></div>
                        <div class="luggage"><span class="icon-circle icon-luggage"></span><span class="text-14">Luggage<span>2</span></span></div>
                      </div>
                    </div>
                  </div>
                  <div class="swiper-slide"> 
                    <div class="cardFleet wow fadeInUp">
                      <div class="cardInfo"><a href="fleet-single.html">
                          <h3 class="text-20-medium color-text mb-10">Business Van/SUV</h3></a>
                        <p class="text-14 color-text mb-30">Mercedes-Benz V-Class, Chevrolet Suburban, Cadillac Escalade, Toyota Alphard or similar</p>
                      </div>
                      <div class="cardImage mb-30"><a href="fleet-single.html"><img src="assets/imgs/page/homepage1/suv.png" alt="Luxride"></a></div>
                      <div class="cardInfoBottom">
                        <div class="passenger"><span class="icon-circle icon-passenger"></span><span class="text-14">Passengers<span>4</span></span></div>
                        <div class="luggage"><span class="icon-circle icon-luggage"></span><span class="text-14">Luggage<span>2</span></span></div>
                      </div>
                    </div>
                  </div>
                  <div class="swiper-slide"> 
                    <div class="cardFleet wow fadeInUp">
                      <div class="cardInfo"><a href="fleet-single.html">
                          <h3 class="text-20-medium color-text mb-10">Electric Class</h3></a>
                        <p class="text-14 color-text mb-30">Mercedes-Benz V-Class, Chevrolet Suburban, Cadillac Escalade, Toyota Alphard or similar</p>
                      </div>
                      <div class="cardImage mb-30"><a href="fleet-single.html"><img src="assets/imgs/page/homepage1/v-class.png" alt="Luxride"></a></div>
                      <div class="cardInfoBottom">
                        <div class="passenger"><span class="icon-circle icon-passenger"></span><span class="text-14">Passengers<span>4</span></span></div>
                        <div class="luggage"><span class="icon-circle icon-luggage"></span><span class="text-14">Luggage<span>2</span></span></div>
                      </div>
                    </div>
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
      <section class="section bg-primary box-how-it-works-home8 position-relative"> 
        <div class="container-sub">
          <h2 class="heading-44-medium color-white mb-60 wow fadeInUp">How It Works</h2>
          <div class="row"> 
            <div class="col-lg-6 col-md-6 order-md-last">
              <div class="box-main-slider"> 
                <div class="detail-gallery wow fadeInUp">
                  <div class="main-image-slider">
                    <figure><img src="assets/imgs/page/homepage1/laptop.png" alt="luxride"></figure>
                    <figure><img src="assets/imgs/page/homepage1/desktop.png" alt="luxride"></figure>
                    <figure><img src="assets/imgs/page/homepage1/desktop2.png" alt="luxride"></figure>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-6 col-md-6 order-md-first justify-content-between position-z3 wow fadeInUp">
              <ul class="slider-nav-thumbnails list-how"> 
                <li> <span class="line-white"></span>
                  <h4 class="text-20-medium mb-20">Create Your Route</h4>
                  <p class="text-16">Enter your pickup & dropoff locations or the number of hours you wish to book a car and driver for</p>
                </li>
                <li> <span class="line-white"></span>
                  <h4 class="text-20-medium mb-20">Choose Vehicle For You</h4>
                  <p class="text-16">On the day of your ride, you will receive two email and SMS updates - one informing you that.</p>
                </li>
                <li> <span class="line-white"></span>
                  <h4 class="text-20-medium mb-20">Enjoy The Journey</h4>
                  <p class="text-16">After your ride has taken place, we would appreciate it if you could rate your car and driver.</p>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </section>
      <section class="section pt-120">
        <div class="container-sub"> 
          <div class="row align-items-center">
            <div class="col-lg-6 col-sm-7 col-7">
              <h2 class="heading-44-medium wow fadeInUp">Top Cities</h2>
            </div>
            <div class="col-lg-6 col-sm-5 col-5 text-end"><a class="text-16-medium color-primary d-flex align-items-center justify-content-end wow fadeInUp" href="#">More Cities
                <svg class="icon-16 ml-5" fill="none" stroke="currentColor" stroke-width="1.5" viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 19.5l15-15m0 0H8.25m11.25 0v11.25"></path>
                </svg></a></div>
          </div>
          <div class="box-slide-fleet-2 mt-50">
            <div class="box-swiper"> 
              <div class="swiper-container swiper-group-4-fleet pb-0">
                <div class="swiper-wrapper">
                  <div class="swiper-slide"> 
                    <div class="cardCities wow fadeInUp">
                      <div class="cardImage"><a href="#"><img src="assets/imgs/page/homepage3/city1.png" alt="Luxride"></a></div>
                      <div class="cardInfo"><a href="#">
                          <h3 class="cardTitle color-text">20 routes to/from this city</h3></a>
                        <p class="cardDesc color-text">London</p>
                      </div>
                    </div>
                  </div>
                  <div class="swiper-slide"> 
                    <div class="cardCities wow fadeInUp">
                      <div class="cardImage"><a href="#"><img src="assets/imgs/page/homepage3/city2.png" alt="Luxride"></a></div>
                      <div class="cardInfo"><a href="#">
                          <h3 class="cardTitle color-text">8 routes to/from this city</h3></a>
                        <p class="cardDesc color-text">New York</p>
                      </div>
                    </div>
                  </div>
                  <div class="swiper-slide"> 
                    <div class="cardCities wow fadeInUp">
                      <div class="cardImage"><a href="#"><img src="assets/imgs/page/homepage3/city3.png" alt="Luxride"></a></div>
                      <div class="cardInfo"><a href="#">
                          <h3 class="cardTitle color-text">6 routes to/from this city</h3></a>
                        <p class="cardDesc color-text">Berlin</p>
                      </div>
                    </div>
                  </div>
                  <div class="swiper-slide"> 
                    <div class="cardCities wow fadeInUp">
                      <div class="cardImage"><a href="#"><img src="assets/imgs/page/homepage3/city4.png" alt="Luxride"></a></div>
                      <div class="cardInfo"><a href="#">
                          <h3 class="cardTitle color-text">4 routes to/from this city</h3></a>
                        <p class="cardDesc color-text">Paris</p>
                      </div>
                    </div>
                  </div>
                  <div class="swiper-slide"> 
                    <div class="cardCities wow fadeInUp">
                      <div class="cardImage"><a href="#"><img src="assets/imgs/page/homepage3/city5.png" alt="Luxride"></a></div>
                      <div class="cardInfo"><a href="#">
                          <h3 class="cardTitle color-text">20 routes to/from this city</h3></a>
                        <p class="cardDesc color-text">Los Angeles</p>
                      </div>
                    </div>
                  </div>
                  <div class="swiper-slide"> 
                    <div class="cardCities wow fadeInUp">
                      <div class="cardImage"><a href="#"><img src="assets/imgs/page/homepage3/city6.png" alt="Luxride"></a></div>
                      <div class="cardInfo"><a href="#">
                          <h3 class="cardTitle color-text">20 routes to/from this city</h3></a>
                        <p class="cardDesc color-text">Roma</p>
                      </div>
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
        </div>
      </section>
      <section class="section box-intercity-home8 banner-homepage6"> 
        <div class="container-fluid"> 
          <div class="box-slider-customers wow fadeInUp">
            <div class="box-swiper"> 
              <div class="swiper-container swiper-group-1-number pb-0">
                <div class="swiper-wrapper">
                  <div class="swiper-slide"> 
                    <div class="row align-items-center"> 
                      <div class="col-lg-6">
                        <div class="box-img-intercity"><img src="assets/imgs/page/homepage8/img2.png" alt="luxride"></div>
                      </div>
                      <div class="col-lg-6">
                        <div class="box-info-slide-custmer">
                          <h3 class="heading-44-medium color-text mb-30">Intercity <br class="d-none d-lg-block">Rides</h3>
                          <p class="text-16 color-text">The price of tickets for low-cost airlines for a specific route has a much larger spread than that of regular airlines. It depends on the time to departure, demand and competition on the route. Unlike regular airlines, low-cost airlines rarely offer cheap tickets more than 3 months before departure. </p>
                          <div class="mt-30"> <a class="btn btn-primary">More Detail
                              <svg class="icon-16 ml-5" fill="none" stroke="currentColor" stroke-width="1.5" viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 19.5l15-15m0 0H8.25m11.25 0v11.25"></path>
                              </svg></a></div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="swiper-slide"> 
                    <div class="row align-items-center"> 
                      <div class="col-lg-6">
                        <div class="box-img-intercity"><img src="assets/imgs/page/homepage8/img2.png" alt="luxride"></div>
                      </div>
                      <div class="col-lg-6">
                        <div class="box-info-slide-custmer">
                          <h3 class="heading-44-medium color-text mb-30">Limousine <br class="d-none d-lg-block">service</h3>
                          <p class="text-16 color-text">The price of tickets for low-cost airlines for a specific route has a much larger spread than that of regular airlines. It depends on the time to departure, demand and competition on the route. Unlike regular airlines, low-cost airlines rarely offer cheap tickets more than 3 months before departure. </p>
                          <div class="mt-30"> <a class="btn btn-primary">More Detail
                              <svg class="icon-16 ml-5" fill="none" stroke="currentColor" stroke-width="1.5" viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 19.5l15-15m0 0H8.25m11.25 0v11.25"></path>
                              </svg></a></div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="swiper-slide"> 
                    <div class="row align-items-center"> 
                      <div class="col-lg-6">
                        <div class="box-img-intercity"><img src="assets/imgs/page/homepage8/img2.png" alt="luxride"></div>
                      </div>
                      <div class="col-lg-6">
                        <div class="box-info-slide-custmer">
                          <h3 class="heading-44-medium color-text mb-30">Chauffeur <br class="d-none d-lg-block">service</h3>
                          <p class="text-16 color-text">The price of tickets for low-cost airlines for a specific route has a much larger spread than that of regular airlines. It depends on the time to departure, demand and competition on the route. Unlike regular airlines, low-cost airlines rarely offer cheap tickets more than 3 months before departure. </p>
                          <div class="mt-30"> <a class="btn btn-primary">More Detail
                              <svg class="icon-16 ml-5" fill="none" stroke="currentColor" stroke-width="1.5" viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 19.5l15-15m0 0H8.25m11.25 0v11.25"></path>
                              </svg></a></div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="swiper-slide"> 
                    <div class="row align-items-center"> 
                      <div class="col-lg-6">
                        <div class="box-img-intercity"><img src="assets/imgs/page/homepage8/img2.png" alt="luxride"></div>
                      </div>
                      <div class="col-lg-6">
                        <div class="box-info-slide-custmer">
                          <h3 class="heading-44-medium color-text mb-30">Private car <br class="d-none d-lg-block">service</h3>
                          <p class="text-16 color-text">The price of tickets for low-cost airlines for a specific route has a much larger spread than that of regular airlines. It depends on the time to departure, demand and competition on the route. Unlike regular airlines, low-cost airlines rarely offer cheap tickets more than 3 months before departure. </p>
                          <div class="mt-30"> <a class="btn btn-primary">More Detail
                              <svg class="icon-16 ml-5" fill="none" stroke="currentColor" stroke-width="1.5" viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 19.5l15-15m0 0H8.25m11.25 0v11.25"></path>
                              </svg></a></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="swiper-pagination swiper-pagination-number"></div>
          </div>
        </div>
      </section>
      <section class="section bg-white pt-120">
        <div class="container-sub">
          <div class="row align-items-center"> 
            <div class="col-lg-6 mb-30">
              <h2 class="heading-44-medium color-text wow fadeInUp">We make sure that your every trip is comfortable </h2>
            </div>
            <div class="col-lg-6 mb-30"> 
              <p class="text-16 color-text wow fadeInUp">Aliquam erat volutpat. Integer malesuada turpis id fringilla suscipit. Maecenas ultrices.</p>
            </div>
          </div>
          <div class="row mt-50 justify-content-between"> 
            <div class="col-lg-4 col-sm-6"> 
              <div class="cardImageText wow fadeInUp"> 
                <div class="cardImage"> <img src="assets/imgs/page/homepage4/limo.svg" alt="luxride"></div>
                <div class="cardInfo">
                  <p class="text-20-medium color-text">Luxury Limousine <br class="d-none d-lg-block">Selection</p>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-sm-6"> 
              <div class="cardImageText wow fadeInUp"> 
                <div class="cardImage"> <img src="assets/imgs/page/homepage4/phone.svg" alt="luxride"></div>
                <div class="cardInfo">
                  <p class="text-20-medium color-text">27/7 Order <br class="d-none d-lg-block">Available</p>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-sm-6"> 
              <div class="cardImageText wow fadeInUp"> 
                <div class="cardImage"> <img src="assets/imgs/page/homepage4/wheel.svg" alt="luxride"></div>
                <div class="cardInfo">
                  <p class="text-20-medium color-text">Fast Car Delivery<br class="d-none d-lg-block">Service</p>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-sm-6"> 
              <div class="cardImageText wow fadeInUp"> 
                <div class="cardImage"> <img src="assets/imgs/page/homepage4/seat.svg" alt="luxride"></div>
                <div class="cardInfo">
                  <p class="text-20-medium color-text">High Safety <br class="d-none d-lg-block">and Nurity</p>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-sm-6"> 
              <div class="cardImageText wow fadeInUp"> 
                <div class="cardImage"> <img src="assets/imgs/page/homepage4/price.svg" alt="luxride"></div>
                <div class="cardInfo">
                  <p class="text-20-medium color-text">Fixed Price & <br class="d-none d-lg-block">Bonus System</p>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-sm-6"> 
              <div class="cardImageText wow fadeInUp"> 
                <div class="cardImage"> <img src="assets/imgs/page/homepage4/driver.svg" alt="luxride"></div>
                <div class="cardInfo">
                  <p class="text-20-medium color-text">Professional <br class="d-none d-lg-block">Car Drivers</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="section mb-30 mt-80 box-showcase-home8">
        <div class="bg-showcase pt-100 pb-70">
          <div class="container-sub"> 
            <div class="row align-items-center"> 
              <div class="col-lg-6 mb-30"> 
                <h2 class="heading-44-medium color-white wow fadeInUp">Showcase some impressive numbers.</h2>
              </div>
              <div class="col-lg-6">
                <div class="row align-items-center">
                  <div class="col-4 mb-30">
                    <div class="box-number wow fadeInUp"> 
                      <h2 class="heading-44-medium color-white">285</h2>
                      <p class="text-20 color-white">Vehicles</p>
                    </div>
                  </div>
                  <div class="col-4 mb-30">
                    <div class="box-number wow fadeInUp"> 
                      <h2 class="heading-44-medium color-white">97</h2>
                      <p class="text-20 color-white">Awards</p>
                    </div>
                  </div>
                  <div class="col-sm-4 col-12 mb-30">
                    <div class="box-number wow fadeInUp"> 
                      <h2 class="heading-44-medium color-white">13K</h2>
                      <p class="text-20 color-white">Happy Customer</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="section box-testimonials-home8">
        <div class="container-sub"> 
          <div class="row align-items-center">
            <div class="col-lg-5 col-md-6 mb-30">
              <div class="box-customers-images"><img src="assets/imgs/page/homepage8/img1.png" alt="luxride"></div>
            </div>
            <div class="col-lg-7 col-md-6 mb-30">
              <div class="box-swiper"> 
                <div class="swiper-container swiper-group-testimonials-fraction pb-0">
                  <div class="swiper-wrapper">
                    <div class="swiper-slide"> 
                      <div class="cardQuote cardTestimonialsStyle2 wow fadeInUp">
                        <div class="comment-author mb-30"> 
                          <p class="text-18-medium color-text">Jonathan Miller</p><span class="text-14 color-text">Web Developer</span>
                        </div>
                        <div class="content-quote color-text">
                           For my return pickup from the hotel to airport, I was assigned 4 drivers instead of the original 3. Was not provided the 4th drivers contact information and he was late for pickup.</div>
                      </div>
                    </div>
                    <div class="swiper-slide"> 
                      <div class="cardQuote cardTestimonialsStyle2 wow fadeInUp">
                        <div class="comment-author mb-30"> 
                          <p class="text-18-medium color-text">Jonathan Miller</p><span class="text-14 color-text">Web Developer</span>
                        </div>
                        <div class="content-quote color-text">
                           For my return pickup from the hotel to airport, I was assigned 4 drivers instead of the original 3. Was not provided the 4th drivers contact information and he was late for pickup.</div>
                      </div>
                    </div>
                    <div class="swiper-slide"> 
                      <div class="cardQuote cardTestimonialsStyle2 wow fadeInUp">
                        <div class="comment-author mb-30"> 
                          <p class="text-18-medium color-text">Jonathan Miller</p><span class="text-14 color-text">Web Developer</span>
                        </div>
                        <div class="content-quote color-text">
                           For my return pickup from the hotel to airport, I was assigned 4 drivers instead of the original 3. Was not provided the 4th drivers contact information and he was late for pickup.</div>
                      </div>
                    </div>
                    <div class="swiper-slide"> 
                      <div class="cardQuote cardTestimonialsStyle2 wow fadeInUp">
                        <div class="comment-author mb-30"> 
                          <p class="text-18-medium color-text">Jonathan Miller</p><span class="text-14 color-text">Web Developer</span>
                        </div>
                        <div class="content-quote color-text">
                           For my return pickup from the hotel to airport, I was assigned 4 drivers instead of the original 3. Was not provided the 4th drivers contact information and he was late for pickup.</div>
                      </div>
                    </div>
                  </div>
                  <div class="box-pagination-fleet">
                    <div class="swiper-button-prev swiper-button-prev-fleet swiper-button-prev-small swiper-button-prev-testimonials-fraction">
                      <svg fill="none" stroke="currentColor" stroke-width="1.5" viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18"></path>
                      </svg>
                    </div>
                    <div class="swiper-button-next swiper-button-next-fleet swiper-button-next-small swiper-button-next-testimonials-fraction">
                      <svg fill="none" stroke="currentColor" stroke-width="1.5" viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"></path>
                      </svg>
                    </div>
                    <div class="swiper-pagination swiper-pagination-testimonials-fraction"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="section pt-120 pb-90 bg-primary">
        <div class="container-sub"> 
          <div class="row align-items-center">
            <div class="col-lg-6 col-7">
              <h2 class="heading-44-medium color-white wow fadeInUp">Latest From News</h2>
            </div>
            <div class="col-lg-6 col-5 text-end"><a class="text-16-medium color-white hover-up d-inline-block wow fadeInUp" href="#">More News
                <svg class="icon-16 color-white" fill="none" stroke="currentColor" stroke-width="1.5" viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 19.5l15-15m0 0H8.25m11.25 0v11.25"></path>
                </svg></a></div>
          </div>
          <div class="row mt-50"> 
            <div class="col-lg-4">
              <div class="cardNews wow fadeInUp"><a href="blog-single.html">
                  <div class="cardImage">
                    <div class="datePost">
                      <div class="heading-52-medium color-white">14.</div>
                      <p class="text-14 color-white">Jun, 2022</p>
                    </div><img src="assets/imgs/page/homepage1/news1.png" alt="luxride">
                  </div></a>
                <div class="cardInfo">
                  <div class="tags mb-10"><a href="#">Travel</a></div><a class="color-white" href="blog-single.html">
                    <h3 class="text-20-medium color-white mb-20">3 hidden-gem destinations for your wish list</h3></a><a class="cardLink btn btn-arrow-up" href="blog-single.html">
                    <svg class="icon-16" fill="none" stroke="currentColor" stroke-width="1.5" viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 19.5l15-15m0 0H8.25m11.25 0v11.25"></path>
                    </svg></a>
                </div>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="cardNews wow fadeInUp"><a href="blog-single.html">
                  <div class="cardImage">
                    <div class="datePost">
                      <div class="heading-52-medium color-white">18.</div>
                      <p class="text-14 color-white">Jun, 2022</p>
                    </div><img src="assets/imgs/page/homepage1/news2.png" alt="luxride">
                  </div></a>
                <div class="cardInfo">
                  <div class="tags mb-10"><a href="#">Culture</a></div><a class="color-white" href="blog-single.html">
                    <h3 class="text-20-medium color-white mb-20">Explore the big things happening in Dallas</h3></a><a class="cardLink btn btn-arrow-up" href="blog-single.html">
                    <svg class="icon-16" fill="none" stroke="currentColor" stroke-width="1.5" viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 19.5l15-15m0 0H8.25m11.25 0v11.25"></path>
                    </svg></a>
                </div>
              </div>
            </div>
            <div class="col-lg-4"> 
              <div class="cardNews wow fadeInUp"><a href="blog-single.html">
                  <div class="cardImage">
                    <div class="datePost">
                      <div class="heading-52-medium color-white">20.</div>
                      <p class="text-14 color-white">Jun, 2022</p>
                    </div><img src="assets/imgs/page/homepage1/news3.png" alt="luxride">
                  </div></a>
                <div class="cardInfo">
                  <div class="tags mb-10"><a href="#">News</a></div><a class="color-white" href="blog-single.html">
                    <h3 class="text-20-medium color-white mb-20">LA’s worst traffic areas and how to avoid them</h3></a><a class="cardLink btn btn-arrow-up" href="blog-single.html">
                    <svg class="icon-16" fill="none" stroke="currentColor" stroke-width="1.5" viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 19.5l15-15m0 0H8.25m11.25 0v11.25"></path>
                    </svg></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="section pt-65 pb-35 border-bottom"> 
        <div class="container-sub"> 
          <div class="row align-items-center">
            <div class="col-xl-3 col-lg-4 mb-30"> 
              <h3 class="color-primary wow fadeInUp">The partners who sell<br class="d-none d-lg-block">our products</h3>
            </div>
            <div class="col-xl-9 col-lg-8 mb-30">
              <ul class="list-logos d-flex align-item-center wow fadeInUp"> 
                <li><img src="assets/imgs/slider/logo/air.svg" alt="luxride"></li>
                <li><img src="assets/imgs/slider/logo/eb.svg" alt="luxride"></li>
                <li><img src="assets/imgs/slider/logo/nba.svg" alt="luxride"></li>
                <li><img src="assets/imgs/slider/logo/nla.svg" alt="luxride"></li>
              </ul>
            </div>
          </div>
        </div>
      </section>
    </main>

    <?php include_once 'includes/footer.php'; ?>

    <?php include_once 'includes/scripts.php'; ?>

  </body>
</html>