<?php
session_start();
require_once 'admin/includes/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $username = $_POST['username'];
    $password = md5($_POST['password']); // Hash the password using MD5
    $confirm_password = md5($_POST['confirm_password']);
    
    // Initialize an error array
    $errors = [];

    // Validate form data
    if (empty($username) || empty($password) || empty($confirm_password)) {
        $errors[] = "Please fill in all fields.";
    }

    if ($password !== $confirm_password) {
        $errors[] = "Passwords do not match.";
    }

    // Check if username already exists
    $sql = "SELECT id FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $errors[] = "Username already exists.";
    }

    if (empty($errors)) {
        // Insert new user into database
        $sql = "INSERT INTO users (username, password, role) VALUES (?, ?, 'user')";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $username, $password);
        
        if ($stmt->execute()) {
            // Redirect to login page
            header("location: login.php");
        } else {
            $errors[] = "Something went wrong. Please try again later.";
        }
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
    <meta name="description" content="Register page">
    <meta name="keywords" content="register, page">
    <meta name="author" content="">
    <link rel="shortcut icon" type="image/x-icon" href="assets/imgs/template/favicon.png">
    <link href="assets/css/style.css?v=1.0.0" rel="stylesheet">
    <title>Register - Recipe Generator</title>
  </head>
  <body>
  <?php include_once 'includes/preloader.php'; ?>

  <?php include_once 'includes/navbar.php'; ?>
    <main class="main">
      <section class="section mt-120 mb-100"> 
        <div class="container-sub"> 
          <div class="text-center"> 
            <h2 class="heading-44-medium wow fadeInUp">Create Account</h2>
            <p class="color-text text-14 wow fadeInUp">Sign in with this account across the following sites.</p>
          </div>
          <div class="box-login mt-70"> 
            <div class="form-contact form-comment wow fadeInUp"> 
              <form action="" method="post">
                <div class="row"> 
                  <div class="col-lg-12">
                    <div class="form-group"> 
                      <label class="form-label" for="username">Username</label>
                      <input class="form-control" id="username" name="username" type="text" required>
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="form-group"> 
                      <label class="form-label" for="password">Password</label>
                      <input class="form-control" id="password" name="password" type="password" required>
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="form-group"> 
                      <label class="form-label" for="confirm_password">Confirm Password</label>
                      <input class="form-control" id="confirm_password" name="confirm_password" type="password" required>
                    </div>
                  </div>
                 
                  <?php 
                  if (!empty($errors)) {
                      echo '<div class="alert alert-danger">' . implode('<br>', $errors) . '</div>';
                  }        
                  ?>
                  <div class="col-lg-12">
                    <button class="btn btn-primary w-100" type="submit">Create Account
                      <svg class="icon-16 ml-5" fill="none" stroke="currentColor" stroke-width="1.5" viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 19.5l15-15m0 0H8.25m11.25 0v11.25"></path>
                      </svg>
                    </button>
                  </div>
                  <div class="col-lg-12"> 
                    <div class="mt-20 text-center"> <span class="text-14-medium color-text">Already a Member? </span><a class="text-14-medium color-text" href="login.php">Login</a></div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </section>
    </main>

    <?php include_once 'includes/footer.php'; ?>

    <?php include_once 'includes/scripts.php'; ?>
  </body>
</html>
