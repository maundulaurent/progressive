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
    <title>Bakewave | About Recipe Generator</title>
  </head>
  <body>
  <?php include_once 'includes/preloader.php'; ?>
  <?php include_once 'includes/navbar.php'; ?>

  <main class="main">


    <section class="section bg-primary banner-about">
      <div class="container-sub"> 
          <div class="row"> 
              <div class="col-lg-5 col-md-12">
                  <div class="padding-box">
                      <h2 class="heading-44-medium color-white mb-5">About Us</h2>
                      <div class="box-breadcrumb"> 
                          <ul>
                              <li> <a href="index">Home</a></li>
                              <li> <a href="about">About</a></li>
                          </ul>
                      </div>
                      <div class="mt-60 wow fadeInUp"> 
                          <h2 class="heading-44-medium mb-30 color-white title-fleet">Master Your Kitchen with Precision</h2>
                          <div class="content-single"> 
                              <p class="color-white">Discover the ultimate recipe creation tool. Accurately calculate ingredients, analyze costs, and customize your recipes with ease. From professional bakers to home cooks, we've got you covered.</p>
                              <ul class="list-ticks list-ticks-small">
                                  <li class="text-16 mb-20 color-white">Precise Ingredient Measurement</li>
                                  <li class="text-16 mb-20 color-white">Detailed Cost Analysis</li>
                                  <li class="text-16 mb-20 color-white">Customizable Recipe Builder</li>
                              </ul>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <div class="box-banner-right wow fadeInUp"></div>
    </section>

    <section class="section mt-110">
        <div class="container-sub">
            <div class="text-center">
                <h2 class="heading-44-medium color-text wow fadeInUp">Create, Share, and Discover Delicious Recipes</h2>
            </div>
            <div class="row mt-50 cardIconStyleCircle">
                <div class="col-lg-4">
                    <div class="cardIconTitleDesc wow fadeInUp">
                        <div class="cardIcon"><img src="assets/imgs/page/homepage1/safe.svg" alt="recipe generator"></div>
                        <div class="cardTitle">
                            <h5 class="text-20-medium color-text">Precision and Accuracy</h5>
                        </div>
                        <div class="cardDesc">
                            <p class="text-16 color-text">Create flawless recipes with our precise ingredient measurements and step-by-step guidance.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="cardIconTitleDesc wow fadeInUp">
                        <div class="cardIcon"><img src="assets/imgs/page/homepage1/price.svg" alt="recipe generator"></div>
                        <div class="cardTitle">
                            <h5 class="text-20-medium color-text">Cost-Effective Cooking</h5>
                        </div>
                        <div class="cardDesc">
                            <p class="text-16 color-text">Plan your meals and manage your budget with our smart cost analysis feature.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4"> 
                    <div class="cardIconTitleDesc wow fadeInUp">
                        <div class="cardIcon"><img src="assets/imgs/landing/community.png" style="width: 48px; height: 48x;" alt="recipe generator"></div>
                        <div class="cardTitle">
                            <h5 class="text-20-medium color-text">A Community of Cooks</h5>
                        </div>
                        <div class="cardDesc">
                            <p class="text-16 color-text">Share your culinary creations, discover new recipes, and connect with other food enthusiasts.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <div class="mb-90"></div>
    <section class="section pt-120">
        <div class="container-sub"> 
            <div class="text-center"> 
                <h2 class="heading-44-medium wow fadeInUp">How It Works</h2>
            </div>
            <div class="box-list-how mt-90"> 
                <ul> 
                    <li class="has-arrow wow fadeInUp"> 
                        <div class="cardWork"> 
                            <div class="cardImage"> <img src="assets/imgs/landing/create.png" alt="recipe generator"></div>
                            <div class="cardTitle"> 
                                <h5 class="text-20-medium color-text">Create Your Recipe</h5>
                            </div>
                            <div class="cardDesc"> 
                                <p class="color-text text-16">Start by create a recipe and adding ingredients or selecting a base recipe. Customize it to fit your preferences.</p>
                            </div>
                        </div>
                    </li>
                    <li class="has-arrow wow fadeInUp"> 
                        <div class="cardWork"> 
                            <div class="cardImage"> <img src="assets/imgs/landing/customize.png" alt="recipe generator"></div>
                            <div class="cardTitle"> 
                                <h5 class="text-20-medium color-text">Customize & Optimize</h5>
                            </div>
                            <div class="cardDesc"> 
                                <p class="color-text text-16">Adjust ingredient quantities, calculate costs, and optimize your recipe for the number of outputs and servings you need.</p>
                            </div>
                        </div>
                    </li>
                    <li class="wow fadeInUp"> 
                        <div class="cardWork"> 
                            <div class="cardImage"> <img src="assets/imgs/page/homepage2/like.svg" alt="recipe generator"></div>
                            <div class="cardTitle"> 
                                <h5 class="text-20-medium color-text">Share & Enjoy</h5>
                            </div>
                            <div class="cardDesc"> 
                                <p class="color-text text-16">Share your perfected recipe with friends, download it for future use, or share it with the community.</p>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </section>
      
    <section class="section pt-120 pb-120">
      <div class="container-sub"> 
          <div class="row align-items-center"> 
              <div class="col-lg-6 mb-30">
                  <div class="box-image-showcase wow fadeInUp">
                      <div class="box-image-top text-center text-lg-start"><img src="assets/imgs/landing/about3.jpg" style="width:390px; height:400px;" alt="recipe generator"></div>
                      <div class="box-image-bottom text-end text-sm-center text-lg-end"><img src="assets/imgs/landing/works5.jpg" style="width:190px; height:190px;" alt="recipe generator"><img src="assets/imgs/landing/about1.jpg" style="width:290px; height:290px;" alt="recipe generator"></div>
                  </div>
              </div>
              <div class="col-lg-6 mb-30">
                  <div class="box-region-right wow fadeInUp">
                      <h2 class="heading-44-medium color-text mb-30">Discover Endless Culinary Possibilities</h2>
                      <p class="text-16 color-text mb-20">Create, share, and enjoy delicious recipes with our innovative platform.</p>
                      <ul class="list-ticks"> 
                          <li>Accurate and Reliable Recipes</li>
                          <li>Vibrant Community of Cooks</li>
                          <li>Inspiration for Every Occasion</li>
                      </ul>
                  </div>
              </div>
          </div>
        </div>
    </section>
   
    <section class="section pt-80 mb-30">
      <div class="container-sub">
        <div class="box-faqs">
          <div class="text-center"> 
            <h2 class="color-brand-1 mb-20 wow fadeInUp">Frequently Asked Questions</h2>
          </div>
          <div class="mt-60 mb-40">
            <div class="accordion wow fadeInUp" id="accordionFAQ">
              <div class="accordion-item">
                <h5 class="accordion-header" id="headingOne">
                  <button class="accordion-button text-heading-5" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">How do I add a new recipe?</button>
                </h5>
                <div class="accordion-collapse collapse show" id="collapseOne" aria-labelledby="headingOne" data-bs-parent="#accordionFAQ">
                  <div class="accordion-body">To add a new recipe, navigate to the "Add Recipe" section, fill in the required details such as recipe name, ingredients, and instructions, and click the "Submit" button.</div>
                </div>
              </div>
              <div class="accordion-item">
                <h5 class="accordion-header" id="headingTwo">
                  <button class="accordion-button text-heading-5 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">How can I edit or delete a recipe?</button>
                </h5>
                <div class="accordion-collapse collapse" id="collapseTwo" aria-labelledby="headingTwo" data-bs-parent="#accordionFAQ">
                  <div class="accordion-body">To edit or delete a recipe, go to the "Manage Recipes" section, select the recipe you want to edit or delete, and use the provided options to make your changes or remove the recipe.</div>
                </div>
              </div>
              <div class="accordion-item">
                <h5 class="accordion-header" id="headingThree">
                  <button class="accordion-button text-heading-5 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">How do I calculate the cost of a recipe?</button>
                </h5>
                <div class="accordion-collapse collapse" id="collapseThree" aria-labelledby="headingThree" data-bs-parent="#accordionFAQ">
                  <div class="accordion-body">To calculate the cost of a recipe, input the prices of the ingredients in the "Cost Calculation" section. The system will automatically compute the total cost based on the quantities and prices provided.</div>
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