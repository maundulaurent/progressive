<?php
session_start();

include 'admin/includes/db.php';

if (!isset($_SESSION['username'])) {
    header('Location: login.php'); // Redirect to login page if not logged in
    exit();
}


$username = $_SESSION['username'];

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="msapplication-TileColor" content="#0E0E0E">
    <meta name="template-color" content="#0E0E0E">
    <meta name="description" content="User Profile">
    <meta name="keywords" content="profile, user">
    <meta name="author" content="">
    <link rel="shortcut icon" type="image/x-icon" href="assets/imgs/template/favicon.png">
    <link href="assets/css/style.css?v=1.0.0" rel="stylesheet">
    <title>Bakewave | User Profile</title>
  </head>
  <body>
    
  <?php include_once 'includes/preloader.php' ?>
  <?php include_once 'includes/navbar.php' ?>

    <main class="main">
      <div class="section pt-60 pb-60 bg-primary">
        <div class="container-sub"> 
          <h1 class="heading-44-medium color-white mb-5">My Profile</h1>
          <div class="box-breadcrumb"> 
            <ul>
              <li> <a href="index.html">Home</a></li>
              <li> <a href="profile.html">My Profile</a></li>
            </ul>
          </div>
        </div>
      </div>
      <section class="section pt-60 bg-white latest-new-white">
        <div class="container-sub"> 
          <div class="row align-items-center"> 
            <div class="col-lg-6 col-md-6 col-sm-6 text-center text-sm-start mb-30"> 
              <h2 class="heading-24-medium wow fadeInUp">Account Details</h2>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 text-center text-sm-end mb-30 wow fadeInUp"> 
              <div class="dropdown dropdown-menu-box"><a class="dropdown-toggle" id="dropdownMenuButton1" href="#" data-bs-toggle="dropdown" aria-expanded="false">Settings</a>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                  <li><a class="dropdown-item" href="#">Edit Profile</a></li>
                  <li><a class="dropdown-item" href="#">Change Password</a></li>
                </ul>
              </div>
            </div>
          </div>
         
        </div>
      </section>

      <section class="section">
        <div class="container-sub"> 
         
          <div class="box-row-tab mt-50">

            <!-- box-tab-right is now on the left -->
            <div class="box-tab-right">
              <div class="sidebar"> 
                <div class="mt-20 wow fadeInUp"> 
                  <div class=""> 
                    <div class=""> <span class="text-14 color-grey">Username</span><span class="text-14-medium color-text">. <?php echo htmlspecialchars($username); ?></span></div>
                    <div class=""> <span class="text-14 color-grey">Name</span><span class="text-14-medium color-text"> John Doe</span></div>
                    <div class=""> <span class="text-14 color-grey">Email</span><span class="text-14-medium color-text"> johndoe@example.com</span></div>
                    <div class=""> <span class="text-14 color-grey">Member Since</span><span class="text-14-medium color-text"> January 1, 2020</span></div>
                  </div>
                  <div class="border-bottom mt-30 mb-25"></div>
                  <div class="mt-0"> <span class="text-14 color-grey">Membership Level</span><br><span class="text-14-medium color-text">Premium</span></div>
                  <div class="border-bottom mt-30 mb-25"></div>
                  <div class="mt-0"> <span class="text-14 color-grey">Preferences</span><br><span class="text-14-medium color-text">Vegan, Gluten-Free</span></div>
                </div>
              </div>
            </div>

            <!-- box-tab-left is now on the right -->
            <div class="box-tab-left">
              <div class="sidebar"> 
                <div class="mt-20 wow fadeInUp"> 
                  <div class="box-info-route"> 
                    <div class="info-route-left"> <span class="text-14 color-grey">My Saved Recipes</span></div>
                    <div class="info-route-left"> 
                    <ul class="text-14-medium color-text">
                    <?php
                        try {
                            $pdo = new PDO('mysql:host=localhost;dbname=recipe', 'root', '');
                            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                            // Fetch recipes of type 'shared' by the logged-in user
                            $stmt = $pdo->prepare("SELECT name FROM saved_recipes WHERE username = ? AND type = 'saved'");
                            $stmt->execute([$username]);
                            $recipes = $stmt->fetchAll(PDO::FETCH_ASSOC);

                            if ($recipes) {
                                foreach ($recipes as $recipe) {
                                    echo '<li>' . htmlspecialchars($recipe['name']) . '</li>';
                                }
                            } else {
                                echo '<li>No shared recipes found.</li>';
                            }
                        } catch (PDOException $e) {
                            echo '<li>Error retrieving recipes: ' . htmlspecialchars($e->getMessage()) . '</li>';
                        }
                        ?>
                        </ul>
                    </div>
                  </div>
                  <div class="border-bottom mt-30 mb-25"></div>
                  <div class="box-info-route"> 
                    <div class="info-route-left"> <span class="text-14 color-grey">Proposed Recipes</span></div>
                    <div class="info-route-left"> 
                      <ul class="text-14-medium color-text">
                      <?php
                        try {
                            $pdo = new PDO('mysql:host=localhost;dbname=recipe', 'root', '');
                            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                            // Fetch recipes of type 'shared' by the logged-in user
                            $stmt = $pdo->prepare("SELECT name FROM saved_recipes WHERE username = ? AND type = 'shared'");
                            $stmt->execute([$username]);
                            $recipes = $stmt->fetchAll(PDO::FETCH_ASSOC);

                            if ($recipes) {
                                foreach ($recipes as $recipe) {
                                    echo '<li>' . htmlspecialchars($recipe['name']) . '</li>';
                                }
                            } else {
                                echo '<li>No shared recipes found.</li>';
                            }
                        } catch (PDOException $e) {
                            echo '<li>Error retrieving recipes: ' . htmlspecialchars($e->getMessage()) . '</li>';
                        }
                        ?>

                      </ul>
                    </div>
                  </div>
                  <div class="border-bottom mt-30 mb-25"></div>
                  <div class="box-info-route"> 
                    <div class="info-route-left"> <span class="text-14 color-grey">Approved Recipes</span></div>
                    <div class="info-route-left"> 
                      <ul class="text-14-medium color-text">
                        <li>Avocado Toast</li>
                        <li>Blueberry Muffins</li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
         
          </div>
        </div>
      </section>
    </main>
    
    <?php include_once 'includes/footer.php' ?>
    <?php include_once 'includes/scripts.php' ?>
  </body>
</html>
