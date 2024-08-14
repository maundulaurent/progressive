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
    <link rel="shortcut icon" type="image/x-icon" href="assets/imgs/landing/icon2.png">
    <link href="assets/css/style.css?v=1.0.0" rel="stylesheet">
    <title>Bakewave | Recipe Generator</title>
  </head>
  <body>

    <?php include_once 'includes/preloader.php'; ?>

    <?php include_once 'includes/navbar.php'; ?>

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
                    <div class="box-main-slider pt-180"> 
                        <div class="detail-gallery wow fadeInUp">
                            <div class="main-image-slider">
                                <figure><img src="assets/imgs/landing/works4.jpg" alt="luxride"></figure>
                                <figure><img src="assets/imgs/landing/works2.jpg" alt="luxride"></figure>
                                <figure><img src="assets/imgs/landing/works1.jpg" alt="luxride"></figure>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 order-lg-first justify-content-between position-z3 wow fadeInUp">
                    <ul class="slider-nav-thumbnails list-how"> 
                        <li> <span class="line-white"></span>
                            <h4 class="text-20-medium mb-20">Create and Customize Your Recipe</h4>
                            <p class="text-16">Start by crafting your own unique recipes with your choice of ingredients. Adjust the recipe to your preferences, whether it's for personal use or to share with friends and the community.</p>
                        </li>

                        <li> <span class="line-white"></span>
                            <h4 class="text-20-medium mb-20">Explore and Tailor Available Recipes</h4>
                            <p class="text-16">Browse through our extensive collection of recipes. Customize any recipe to match your dietary needs or ingredient availability. Our platform allows you to modify and enhance these recipes effortlessly.</p>
                        </li>

                        <li> <span class="line-white"></span>
                            <h4 class="text-20-medium mb-20">Share, Download, and Collaborate</h4>
                            <p class="text-16">Once your recipe is perfected, share it with the community or friends. You can also download your customized recipes, print them, and explore more ways to collaborate with other cooking enthusiasts.</p>
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
            <div class="col-lg-6 col-sm-5 col-5 text-end"><a class="text-16-medium color-white d-flex align-items-center justify-content-end wow fadeInUp" href="available.php">More Recipes
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
                        <p class="cardDesc text-14 color-white mb-30">A timeless favorite, this classic chocolate cake is rich, moist, and perfect for any occasion.</p><a class="cardLink btn btn-arrow-up" href="available.php">
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
                        <p class="cardDesc text-14 color-white mb-30"> A fresh and crunchy Caesar salad with crisp romaine lettuce, creamy Caesar dressing</p><a class="cardLink btn btn-arrow-up" href="available.php">
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
                        <p class="cardDesc text-14 color-white mb-30">Perfect for breakfast, brunch, or a delightful snack.</p><a class="cardLink btn btn-arrow-up" href="available.php">
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
                        <p class="cardDesc text-14 color-white mb-30">Flavorful and easy to make, these grilled chicken tacos are packed with seasoned chicken, fresh veggies, and a zesty lime crema. Ideal for a quick dinner or a fun weekend meal.</p><a class="cardLink btn btn-arrow-up" href="available.php">
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

      <section class="section pt-120 pb-120 bg-region">
          <div class="container-sub"> 
              <div class="row align-items-center"> 
                  <div class="col-lg-6 mb-30">
                      <div class="box-gallery justify-content-center justify-content-lg-start"> 
                          <div class="gallery-1 wow fadeInUp"><img src="assets/imgs/landing/recipe4.jpg" style="height: 720px;" alt="recipe generator"></div>
                          <div class="gallery-2 wow fadeInUp"><img src="assets/imgs/landing/profile1.jpg" alt="recipe generator"><img src="assets/imgs/landing/recipe3.jpg" alt="recipe generator"></div>
                      </div>
                  </div>
                  <div class="col-lg-6 mb-30">
                      <div class="box-region-right wow fadeInUp">
                          <h2 class="heading-44-medium color-text mb-30">From Custom, to Tailored Recipes Just for You</h2>
                          <p class="text-16 color-text mb-30">Our Recipe Generator empowers you to create and customize recipes that fit your unique preferences and ingredients. Whether you're cooking for yourself, family, or friends, discover new ways to enjoy your favorite meals.</p>
                          <a class="btn btn-primary" href="available.php">Explore Recipes
                              <svg class="icon-16 ml-5" fill="none" stroke="currentColor" stroke-width="1.5" viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                  <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 19.5l15-15m0 0H8.25m11.25 0v11.25"></path>
                              </svg>
                          </a>
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
                        This recipe generator has completely transformed how we manage and cost our recipes. </div>
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
              <div class="box-video wow fadeInUp"> <img src="assets/imgs/landing/recipe1.jpg" alt="recipe"></div>
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
                      Go to the 'Check Requirements' section, select the recipe, and enter the number of units you want to produce. The system will calculate and display the required quantities of each ingredient.
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

    <?php include_once 'includes/footer.php'; ?>

    <?php include_once 'includes/scripts.php'; ?>
    
  
  </body>
</html>
