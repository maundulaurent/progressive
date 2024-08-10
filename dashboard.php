
<?php
session_start();
include 'admin/includes/db.php';

// Fetch the latest three recipes from the database
$sql = "SELECT * FROM recipes ORDER BY created_at DESC LIMIT 3";
$result = $conn->query($sql);

// Check if there are any results
if ($result->num_rows > 0) {
    $recipes = [];
    while ($row = $result->fetch_assoc()) {
        $recipes[] = $row;
    }
} else {
    $recipes = [];
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
                <h2 class="heading-44-medium wow fadeInUp">Enhance Your Baking Experience With Us</h2>
            </div>
            <div class="row mt-60 cardIconTitleDescLeft"> 
                <div class="col-lg-4 col-md-6 col-sm-6 mb-30"> 
                    <div class="cardIconTitleDesc wow fadeInUp">
                        <div class="cardIcon"><img src="assets/imgs/page/homepage7/route.svg" alt="personalized recipes"></div>
                        <div class="cardTitle">
                            <h5 class="text-20-medium color-text">Personalized Recipes</h5>
                        </div>
                        <div class="cardDesc">
                            <p class="text-16 color-text">Create and customize recipes to fit your exact preferences and dietary needs.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 mb-30"> 
                    <div class="cardIconTitleDesc wow fadeInUp">
                        <div class="cardIcon"><img src="assets/imgs/page/homepage7/price.svg" alt="cost estimation"></div>
                        <div class="cardTitle">
                            <h5 class="text-20-medium color-text">Accurate Cost Estimation</h5>
                        </div>
                        <div class="cardDesc">
                            <p class="text-16 color-text">Calculate the cost of your recipes accurately to manage your budget effectively.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 mb-30"> 
                    <div class="cardIconTitleDesc wow fadeInUp">
                        <div class="cardIcon"><img src="assets/imgs/page/homepage7/route.svg" alt="recipe sharing"></div>
                        <div class="cardTitle">
                            <h5 class="text-20-medium color-text">Easy Recipe Sharing</h5>
                        </div>
                        <div class="cardDesc">
                            <p class="text-16 color-text">Share your favorite recipes with friends and family effortlessly with just a few clicks.</p>
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
                    <figure><img src="assets/imgs/landing/recipe-selection.jpg" alt="recipe-selection"></figure>
                    <figure><img src="assets/imgs/landing/recipe2.jpg" alt="recipe-customization"></figure>
                    <figure><img src="assets/imgs/landing/sharing.png" alt="recipe-evaluation"></figure>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-6 col-md-6 order-md-first justify-content-between position-z3 wow fadeInUp">
              <ul class="slider-nav-thumbnails list-how"> 
                <li> <span class="line-white"></span>
                  <h4 class="text-20-medium mb-20">Select or Create Your Recipe</h4>
                  <p class="text-16">Choose from our list of available recipes or create your own recipe from scratch.</p>
                </li>
                <li> <span class="line-white"></span>
                  <h4 class="text-20-medium mb-20">Customize and Evaluate</h4>
                  <p class="text-16">Enter ingredients, quantities, and prices. Evaluate your recipe with our built-in tools.</p>
                </li>
                <li> <span class="line-white"></span>
                  <h4 class="text-20-medium mb-20">Share or Download Your Recipe</h4>
                  <p class="text-16">Once you're satisfied, you can print, share, or download your recipe for future use.</p>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </section>


      <section class="section bg-white pt-120">
        <div class="container-sub">
          <div class="row align-items-center"> 
            <div class="col-lg-6 mb-30">
              <h2 class="heading-44-medium color-text wow fadeInUp">Enhance Your Recipe Creation Experience</h2>
            </div>
            <div class="col-lg-6 mb-30"> 
              <p class="text-16 color-text wow fadeInUp">We ensure a seamless recipe customization process, from selecting or creating recipes to evaluating and sharing them.</p>
            </div>
          </div>
          <div class="row mt-50 justify-content-between"> 
            <div class="col-lg-4 col-sm-6"> 
              <div class="cardImageText wow fadeInUp"> 
                <div class="cardImage"> <img src="assets/imgs/page/homepage4/limo.svg" alt="luxride"></div>
                <div class="cardInfo">
                  <p class="text-20-medium color-text">Diverse Recipe <br class="d-none d-lg-block">Selection</p>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-sm-6"> 
              <div class="cardImageText wow fadeInUp"> 
                <div class="cardImage"> <img src="assets/imgs/page/homepage4/phone.svg" alt="luxride"></div>
                <div class="cardInfo">
                  <p class="text-20-medium color-text">24/7 Access <br class="d-none d-lg-block">To Recipe Tools</p>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-sm-6"> 
              <div class="cardImageText wow fadeInUp"> 
                <div class="cardImage"> <img src="assets/imgs/page/homepage4/wheel.svg" alt="luxride"></div>
                <div class="cardInfo">
                  <p class="text-20-medium color-text">Easy Recipe <br class="d-none d-lg-block">Customization</p>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-sm-6"> 
              <div class="cardImageText wow fadeInUp"> 
                <div class="cardImage"> <img src="assets/imgs/page/homepage4/seat.svg" alt="luxride"></div>
                <div class="cardInfo">
                  <p class="text-20-medium color-text">Accurate Cost <br class="d-none d-lg-block">Estimations</p>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-sm-6"> 
              <div class="cardImageText wow fadeInUp"> 
                <div class="cardImage"> <img src="assets/imgs/page/homepage4/price.svg" alt="luxride"></div>
                <div class="cardInfo">
                  <p class="text-20-medium color-text">Transparent Pricing <br class="d-none d-lg-block">and Bonuses</p>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-sm-6"> 
              <div class="cardImageText wow fadeInUp"> 
                <div class="cardImage"> <img src="assets/imgs/page/homepage4/driver.svg" alt="luxride"></div>
                <div class="cardInfo">
                  <p class="text-20-medium color-text">Expert Recipe <br class="d-none d-lg-block">Guidance</p>
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
                      <h2 class="heading-44-medium color-white wow fadeInUp">Latest Recipes</h2>
                  </div>
                  <div class="col-lg-6 col-5 text-end">
                      <a class="text-16-medium color-white hover-up d-inline-block wow fadeInUp" href="#">More Recipes
                          <svg class="icon-16 color-white" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 19.5l15-15m0 0H8.25m11.25 0v11.25"></path>
                          </svg>
                      </a>
                  </div>
              </div>
              <div class="row mt-50"> 
                  <?php
                  // Fetch the latest three recipes
                  $query = "SELECT * FROM recipes ORDER BY created_at DESC LIMIT 3";
                  $result = mysqli_query($conn, $query);

                  while ($recipe = mysqli_fetch_assoc($result)):
                  ?>
                      <div class="col-lg-4">
                          <div class="cardNews wow fadeInUp">
                              <a href="recipe-details.php?id=<?php echo $recipe['id']; ?>">
                                  <div class="cardImage">
                                      <div class="datePost">
                                          <div class="heading-52-medium color-white"><?php echo date('d', strtotime($recipe['created_at'])); ?></div>
                                          <p class="text-14 color-white"><?php echo date('M, Y', strtotime($recipe['created_at'])); ?></p>
                                      </div>
                                      <img src="admin/uploads/<?php echo $recipe['image_path']; ?>" alt="<?php echo htmlspecialchars($recipe['name']); ?>" style="width: 100%; height: 320px; object-fit: cover; border-radius: 10px;">
                                  </div>
                              </a>
                              <div class="cardInfo">
                                  <div class="tags mb-10">
                                      <a href="#">Recipe</a>
                                  </div>
                                  <a class="color-white" href="recipe-details.php?id=<?php echo $recipe['id']; ?>">
                                      <h3 class="text-20-medium color-white mb-20"><?php echo htmlspecialchars($recipe['name']); ?></h3>
                                  </a>
                                  <a class="cardLink btn btn-arrow-up" href="recipe-details.php?id=<?php echo $recipe['id']; ?>">
                                      <svg class="icon-16" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                          <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 19.5l15-15m0 0H8.25m11.25 0v11.25"></path>
                                      </svg>
                                  </a>
                              </div>
                          </div>
                      </div>
                  <?php endwhile; ?>
              </div>
          </div>
      </section>


    
    </main>

    <?php include_once 'includes/footer.php'; ?>

    <?php include_once 'includes/scripts.php'; ?>

  </body>
</html>