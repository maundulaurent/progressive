<?php
session_start();

include 'admin/includes/db.php';

if (!isset($_SESSION['username'])) {
    header('Location: login.php'); // Redirect to login page if not logged in
    exit();
}

$username = $_SESSION['username'];

// Prepare SQL query to fetch user details
try {
    $stmt = $conn->prepare("SELECT email, phone_number, created_at FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->bind_result($email, $phone_number, $created_at);
    $stmt->fetch();
    $stmt->close();
} catch (Exception $e) {
    echo "Error retrieving user details: " . $e->getMessage();
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
    <meta name="description" content="User Profile">
    <meta name="keywords" content="profile, user">
    <meta name="author" content="">
    <link rel="shortcut icon" type="image/x-icon" href="assets/imgs/landing/icon2.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="assets/css/style.css?v=1.0.0" rel="stylesheet">
    <title>Bakewave | User Profile</title>
</head>
<body>
  
<?php include_once 'includes/preloader.php' ?>
<?php include_once 'includes/navbar.php' ?>

<main class="main">
    <div class="section pt-60 pb-60 bg-image" style="background-image: url('assets/imgs/landing/profile1.jpg'); background-size: cover; background-position: center;">
        <div class="container-sub">
            <h1 class="heading-44-medium color-white mb-5">My Profile</h1>
            <div class="box-breadcrumb">
                <ul>
                    <li><a href="index">Home</a></li>
                    <li><a href="profile">My Profile</a></li>
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
                    <div class="dropdown dropdown-menu-box"><a class="dropdown-toggle" id="dropdownMenuButton1" href="#" data-bs-toggle="dropdown" aria-expanded="false">Account Details</a>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item" href="#editProfile">Edit Profile</a></li>
                            <li><a class="dropdown-item" href="#changePassword">Change Password</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="container-sub"> 
            <div class="box-row-tab mt-30">
                <!-- box-tab-right is now on the left -->
                <div class="box-tab-right">
                    <div class="sidebar"> 
                        <div class="mt-20 wow fadeInUp"> 
                            <div class=""> 
                                <div class=""> 
                                    <span class="text-14 color-grey">Name |</span><br>
                                    <span class="text-14-medium color-text ms-4"><?php echo htmlspecialchars($username); ?></span>
                                </div>
                                <div class="border-bottom mt-30 mb-25"></div>
                                <div class="">
                                    <span class="text-14 color-grey">Email |</span><br>
                                    <span class="text-14-medium color-text ms-4">
                                        <?php echo htmlspecialchars($email) ?: 'Update your email address'; ?>
                                    </span>
                                </div>
                                <div class="border-bottom mt-30 mb-25"></div>
                                <div class="">
                                    <span class="text-14 color-grey">Phone Number |</span><br>
                                    <span class="text-14-medium color-text ms-4">
                                        <?php echo htmlspecialchars($phone_number) ?: 'Add your phone number'; ?>
                                    </span>
                                </div>
                                <div class="border-bottom mt-30 mb-25"></div>
                                <div class="">
                                    <span class="text-14 color-grey">Member Since |</span><br>
                                    <span class="text-14-medium color-text ms-4">
                                        <?php echo htmlspecialchars($created_at); ?>
                                    </span>
                                </div>
                            </div>
                            <!-- <div class="border-bottom mt-30 mb-25"></div> -->
                        </div>
                    </div>
                </div>

                <!-- box-tab-left is now on the right -->
                <div class="box-tab-left">
                    <div class="sidebar"> 
                        <div class="mt-20 wow fadeInUp"> 
                            <div class="box-info-route"> 
                                <div class="info-route-left"> 
                                    <span class="text-14 color-grey">My Saved Recipes</span>
                                </div>
                                <div class="info-route-left"> 
                                    <ul class="text-14-medium color-text">
                                    <?php
                                        try {
                                            $pdo = new PDO('mysql:host=localhost;dbname=recipe', 'root', '');
                                            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                                            // Fetch recipes of type 'saved' by the logged-in user
                                            $stmt = $pdo->prepare("SELECT name FROM saved_recipes WHERE username = ? AND type = 'saved'");
                                            $stmt->execute([$username]);
                                            $recipes = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                            if ($recipes) {
                                                foreach ($recipes as $recipe) {
                                                    echo '<li>' . htmlspecialchars($recipe['name']) . '</li>';
                                                }
                                            } else {
                                                echo '<li>You have not shared any recipe. To share, go to create recipes, then after creating press share with platform.</li>';
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
                                <div class="info-route-left"> 
                                    <span class="text-14 color-grey">Proposed Recipes</span>
                                </div>
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
                                                echo '<li>You have not shared any recipe. </li>
                                                    <li> To share, go to homepage, then create recipes, </li>
                                                    then after creating press share with platform.</li>';
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
                                <div class="info-route-left"> 
                                    <span class="text-14 color-grey">Approved Recipes</span>
                                </div>
                                <div class="info-route-left"> 
                                    <ul class="text-14-medium color-text">
                                        <!-- <li>Recipe Name  - Action</li> -->
                                        <div class="border-bottom mt-5 mb-25"></div>
                                        <?php
                                        try {
                                            $pdo = new PDO('mysql:host=localhost;dbname=recipe', 'root', '');
                                            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                    
                                            // Fetch recipes where the logged-in user is the creator
                                            $stmt = $pdo->prepare("SELECT id, name FROM recipes WHERE recipe_by = ?");
                                            $stmt->execute([$username]);
                                            $recipes = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                    
                                            if ($recipes) {
                                                foreach ($recipes as $recipe) {
                                                    // Generate a link to the evaluation page with the recipe id
                                                    $recipeName = htmlspecialchars($recipe['name']);
                                                    $recipeId = htmlspecialchars($recipe['id']);
                                                    echo '<li>' . $recipeName . ' <a href="evaluation.php?id=' . $recipeId . '">  - View Recipe</a></li>';
                                                }
                                            } else {
                                                echo '<li>No recipes found.</li>';
                                            }
                                        } catch (PDOException $e) {
                                            echo '<li>Error retrieving recipes: ' . htmlspecialchars($e->getMessage()) . '</li>';
                                        }
                                        ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section pt-60 bg-white latest-new-white" id="accountDetails">
        <div class="container-sub"> 
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-sm-6 text-center text-sm-start mb-30">
                    <h2 class="heading-24-medium wow fadeInUp">Account Settings</h2>
                </div>
                
            </div>

            <!-- Alerts -->
            <?php if (isset($_SESSION['message'])): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert" style="width: 40%;">
                    <?php echo $_SESSION['message']; ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">x</button>
                </div>
                <?php unset($_SESSION['message']); ?>
            <?php elseif (isset($_SESSION['error'])): ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert" style="width: 40%;">
                    <?php echo $_SESSION['error']; ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">x</button>
                </div>
                <?php unset($_SESSION['error']); ?>
            <?php endif; ?>

            <!-- Profile Image and Email/Phone Update Section -->
            <div class="row mt-40" id="editProfile">
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <h3 class="heading-20-medium mb-20">Change Profile Image</h3>
                    <form action="update_profile.php" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="profileImage"></label>
                            <input type="file" name="profileImage" id="profileImage" class="form-control">
                        </div>
                        <button type="submit" name="update_image" class="btn btn-primary mt-2">Update Image</button>
                    </form>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <h3 class="heading-20-medium mb-20">Update Email</h3>
                    <form action="update_profile.php" method="POST">
                        <div class="form-group">
                            <label for="newEmail"></label>
                            <input type="email" name="new_email" id="newEmail" class="form-control" placeholder="Enter new email" value="<?php echo htmlspecialchars($email); ?>" required>
                        </div>
                        <button type="submit" name="update_email" class="btn btn-primary mt-2">Update Email</button>
                    </form>

                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <h3 class="heading-20-medium mb-20">Update Phone Number</h3>
                    <form action="update_profile.php" method="POST">
                      <div class="form-group">
                          <label for="newPhoneNumber"></label>
                          <input type="text" name="new_phone_number" id="newPhoneNumber" class="form-control" placeholder="Enter new phone number" value="<?php echo htmlspecialchars($phone_number); ?>" required>
                      </div>
                      <button type="submit" name="update_phone_number" class="btn btn-primary mt-2">Update Phone Number</button>
                    </form>

                </div>
            </div>

            <div class="row mt-40" id="changePassword">
                <div class="col-lg-12">
                    <h3 class="heading-20-medium mb-20">Change Password</h3>
                    <form action="update_profile.php" method="POST">
                        <div class="form-group">
                            <label for="currentPassword"></label>
                            <input type="password" name="currentPassword" id="currentPassword" class="form-control" placeholder="Current Password:" required>
                        </div>
                        <div class="form-group">
                            <label for="newPassword"></label>
                            <input type="password" name="newPassword" id="newPassword" class="form-control" placeholder="New Password:" required>
                        </div>
                        <div class="form-group">
                            <label for="confirmPassword"></label>
                            <input type="password" name="confirmPassword" id="confirmPassword" class="form-control" placeholder="Confirm New Password:" required>
                        </div>
                        <button type="submit" name="update_password" class="btn btn-primary">Change Password</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</main>

<?php include_once 'includes/footer.php' ?>
<?php include_once 'includes/scripts.php' ?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $('a[href^="#"]').on('click', function(event) {
        var target = $(this.getAttribute('href'));
        if (target.length) {
            event.preventDefault();
            $('html, body').stop().animate({
                scrollTop: target.offset().top
            }, 1000);
        }
    });


  
});
</script>
</body>
</html>
