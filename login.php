<?php
session_start();
require_once 'admin/includes/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = md5($_POST['password']); // Hash the password using MD5

    // Validate credentials
    $sql = "SELECT id, username, password, role FROM users WHERE username = ? AND password = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($id, $db_username, $db_password, $role);
    $stmt->fetch();

    if ($stmt->num_rows == 1) {
        // Password is correct, so start a new session
        $_SESSION['id'] = $id;
        $_SESSION['username'] = $db_username;
        $_SESSION['role'] = $role;

        if ($role == 'admin') {
            header("location: admin/index.php");
        } else {
            header("location: dashboard.php");
        }
    } else {
        // Display an error message if username or password is invalid
        $login_err = "Invalid username or password.";
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
    <meta name="description" content="Index page">
    <meta name="keywords" content="index, page">
    <meta name="author" content="">
    <link rel="shortcut icon" type="image/x-icon" href="assets/imgs/template/favicon.png">
    <link href="assets/css/style.css?v=1.0.0" rel="stylesheet">
    <title>Login - Recipe Generator</title>
  </head>
  <body>
  

    <?php include_once 'includes/preloader.php'; ?>

    <?php include_once 'includes/navbar.php'; ?>

    <main class="main">
      <section class="section mt-120 mb-100"> 
        <div class="container-sub"> 
          <div class="text-center"> 
            <h2 class="heading-44-medium wow fadeInUp">Sign in</h2>

          <?php
                // Display the success message if it exists
                if (isset($_SESSION['signup_success'])) {
                  echo '<div class="alert alert-success alert-dismissible fade show" style="width: 40%;">' . $_SESSION['signup_success'] . '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">x</button></div>';
                  unset($_SESSION['signup_success']); // Clear the message after displaying it
              }
          ?>
       


          </div>
          <div class="box-login mt-70"> 
            <div class="form-contact form-comment wow fadeInUp"> 
              <form action="" method="post" name="login">
                <div class="row"> 
                  <div class="col-lg-12">
                    <div class="form-group"> 
                      <label class="form-label" for="username">Username</label>
                      <input type="text" name="username" class="form-control" id="username"  required>
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="form-group"> 
                      <label class="form-label" for="password">Password</label>
                      <input type="password" name="password" id="password" class="form-control" required>
                    </div>
                  </div>
                  <?php 
                  if (!empty($login_err)) {
                      echo '<div class="alert alert-danger">' . $login_err . '</div>';
                  }        
                  ?>
                  <div class="col-lg-12">
                    <div class="mb-20">
                      <div class="d-flex justify-content-between"> 
                        <label class="text-14 color-text"> 
                          <input class="cb-rememberme" type="checkbox">Remember me
                        </label><a class="text-14 color-text" href="">Forgot your password?</a>
                        <!-- </label><a class="text-14 color-text" href="forgot_password.php">Forgot your password?</a> -->
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <button class="btn btn-primary w-100" type="submit">Sign in
                      <svg class="icon-16 ml-5" fill="none" stroke="currentColor" stroke-width="1.5" viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 19.5l15-15m0 0H8.25m11.25 0v11.25"></path>
                      </svg>
                    </button>
                  </div>
                  <div class="col-lg-12"> 
                    <div class="mt-20 text-center"> <span class="text-14-medium color-text">Not signed up? </span><a class="text-14-medium color-text" href="signup.php">Create an account.</a></div>
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