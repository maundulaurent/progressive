<?php
session_start();
require_once '../admin/includes/db.php'; // Ensure your database connection file is correctly linked

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Collect and sanitize user input
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    // Validate inputs
    if (empty($email) || empty($password)) {
        $_SESSION['error'] = 'Email and password are required.';
        header('Location: login.php');
        exit();
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['error'] = 'Invalid email format.';
        header('Location: login.php');
        exit();
    }

    // Check the database for the user
    $query = "SELECT username, password, type FROM users WHERE email = ?";
    if ($stmt = $conn->prepare($query)) {
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $stmt->store_result();
        
        if ($stmt->num_rows > 0) {
            $stmt->bind_result($username, $hashed_password, $type);
            $stmt->fetch();

            // Verify the password
            if (password_verify($password, $hashed_password)) {
                // Password is correct, determine user type and redirect
                $_SESSION['username'] = $username;
                $_SESSION['type'] = $type;

                if ($type === 'buyer') {
                    header('Location: ../buyer/dashboard');
                } elseif ($type === 'seller') {
                    header('Location: ../seller/dashboard');
                } else {
                    $_SESSION['error'] = 'Unauthorized access.';
                    header('Location: login.php');
                }
                exit();
            } else {
                $_SESSION['error'] = 'Incorrect password.';
                header('Location: login.php');
                exit();
            }
        } else {
            $_SESSION['error'] = 'No account found with that email.';
            header('Location: login.php');
            exit();
        }
    } else {
        $_SESSION['error'] = 'Error: Database query failed.';
        header('Location: login.php');
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0">
    <title>Login</title>
    
    <!-- Favicon -->
    <?php include_once '../includes/icon.php' ?>
    <!-- links -->
    <?php include_once '../includes/links.php' ?>

</head>        
<body class="account-page">

    <!-- Main Wrapper -->
    <div class="main-wrapper">
                
        <!-- Start Navigation -->
        <!-- Header -->
        <?php include_once '../includes/header.php' ?>

        <!-- /Header -->
        
        <!-- Page Content -->
        <div class="login-wrapper">
            <div class="content">
                <!-- Login Content -->
                <div class="account-content">
                    <div class="align-items-center justify-content-center">
                        <div class="login-right">
                            <div class="login-header text-center">
                                <a href="index.html"><img src="../assets/img/logo.svg" alt="logo" class="img-fluid"></a>
                                <h3>Welcome! Nice to see you again</h3>
                            </div>
                            <!-- Login Form -->
                            <form action="login.php" method="POST">
                                <div class="input-block">
                                    <label class="focus-label">Email Address <span class="label-star"> *</span></label>
                                    <input type="email" name="email" class="form-control floating" required>
                                </div>
                                <div class="input-block">
                                    <label class="focus-label">Password <span class="label-star"> *</span></label>
                                    <div class="position-relative">
                                        <input type="password" name="password" class="form-control floating pass-input" required>
                                        <div class="password-icon">
                                            <span class="fas toggle-password fa-eye-slash"></span>
                                        </div>
                                    </div>
                                </div>                                            
                                <button class="btn btn-primary w-100 btn-lg login-btn d-flex align-items-center justify-content-center" type="submit">Login Now<i class="feather-arrow-right ms-2"></i></button>
                            </form>
                            <!-- /Login Form -->
                            <div class="login-or">
                                <p><span>OR</span></p>
                            </div>
                            <div class="row social-login">
                                <div class="col-sm-4">
                                    <a href="javascript:void(0);" class="btn btn-block"><img src="../assets/img/icon/google-icon.svg" alt="Google">Google</a>
                                </div>
                                <div class="col-sm-4">
                                    <a href="javascript:void(0);" class="btn btn-block"><img src="../assets/img/icon/fb-icon.svg" alt="Fb">Facebook</a>
                                </div>
                                <div class="col-sm-4">
                                    <a href="javascript:void(0);" class="btn btn-block"><img src="../assets/img/icon/ios-icon.svg" alt="Apple">Apple</a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-8 dont-have d-flex align-items-center">New to Kofejob <a href="register.html" class="ms-2">Signup?</a></div>
                                <div class="col-sm-4 text-sm-end">
                                    <a class="forgot-link" href="forgot-password.html">Lost Password?</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Login Content -->
            </div>            
        </div>
        <!-- /Page Content -->
   
        <!-- Footer -->    
        <?php include_once '../includes/footer.php' ?>

        <!-- /Footer -->    
        
    </div>
    <!-- /Main Wrapper -->
  
    <?php include_once '../includes/scripts.php' ?>
    
</body>
</html>
