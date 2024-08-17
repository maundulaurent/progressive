<?php
session_start();
require_once '../admin/includes/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Collect and sanitize user input
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $confirm_password = trim($_POST['confirm_password']);
    $type = $_POST['type']; // Get the user type (buyer or seller)

    // Validate inputs
    if (empty($username) || empty($email) || empty($password) || empty($confirm_password)) {
        $_SESSION['error'] = 'All fields are required.';
        header('Location: signup.php');
        exit();
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['error'] = 'Invalid email format.';
        header('Location: signup.php');
        exit();
    }

    if ($password !== $confirm_password) {
        $_SESSION['error'] = 'Passwords do not match.';
        header('Location: signup.php');
        exit();
    }
    
    // Hash the password using bcrypt
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    // Insert into database
    $query = "INSERT INTO users (username, email, password, type) VALUES (?, ?, ?, ?)";
    if ($stmt = $conn->prepare($query)) {
        $stmt->bind_param('ssss', $username, $email, $hashed_password, $type);
        if ($stmt->execute()) {
            $_SESSION['success'] = 'Registration successful. Please log in.';
            header('Location: login.php');
            exit();
        } else {
            $_SESSION['error'] = 'Error: Could not complete registration. Please try again later.';
            header('Location: signup.php');
            exit();
        }
    } else {
        $_SESSION['error'] = 'Error: Database query failed.';
        header('Location: signup.php');
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0">
    <title>Register</title>
    
    <?php include_once '../includes/icon.php' ?>
    <?php include_once '../includes/links.php' ?>
</head>        
<body class="account-page">

    <!-- Main Wrapper -->
    <div class="main-wrapper">
                
        <!-- Start Navigation -->
        <!-- Header -->
        <?php include_once '../includes/header.php' ?>
        <!-- /Header -->
        
        <div class="login-wrapper">
            <div class="content w-100">
                <!-- Login Content -->
                <div class="account-content">
                    <div class="align-items-center justify-content-center">
                        <div class="login-right">
                            <div class="login-header text-center">
                                <a href="index.html"><img src="../assets/img/logo.svg" alt="logo" class="img-fluid"></a>
                                <h3>We love to see you joining our community</h3>
                            </div>
                            <nav class="user-tabs mb-4">
                                <ul role="tablist" class="nav nav-pills nav-justified">
                                    <li class="nav-item">
                                        <a href="#buyer" data-bs-toggle="tab" class="nav-link active">Buyer</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#seller" data-bs-toggle="tab" class="nav-link">Seller</a>
                                    </li>
                                </ul>
                            </nav>
                            <div class="tab-content pt-0">
                                <div role="tabpanel" id="buyer" class="tab-pane fade active show">
                                    <form action="signup.php" method="POST">
                                        <input type="hidden" name="type" value="buyer">
                                        <div class="input-block">
                                            <label class="focus-label">User Name <span class="label-star"> *</span></label>
                                            <input type="text" name="username" class="form-control floating" required>
                                        </div>
                                        <div class="input-block">
                                            <label class="focus-label">Email Address<span class="label-star"> *</span></label>
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
                                        <div class="input-block mb-0">
                                            <label class="focus-label">Confirm Password <span class="label-star"> *</span></label>
                                            <div class="position-relative">
                                                <input type="password" name="confirm_password" class="form-control floating pass-inputs" required>
                                                <div class="password-icons">
                                                    <span class="fas toggle-passwords fa-eye-slash"></span>
                                                </div>
                                            </div>
                                        </div>  
                                        <div class="dont-have">
                                            <label class="custom_check">
                                                <input type="checkbox" name="rem_password" required>
                                                <span class="checkmark"></span> I have read and agree to all <a href="privacy-policy.html">Terms &amp; Conditions</a>
                                            </label>
                                        </div>
                                        <button class="btn btn-primary w-100 btn-lg login-btn d-flex align-items-center justify-content-center" type="submit">Sign Up Now<i class="feather-arrow-right ms-2"></i></button> 
                                    </form>
                                </div>
                                <div role="tabpanel" id="seller" class="tab-pane fade">
                                    <form action="signup.php" method="POST">
                                        <input type="hidden" name="type" value="seller">
                                        <div class="input-block">
                                            <label class="focus-label">User Name <span class="label-star"> *</span></label>
                                            <input type="text" name="username" class="form-control floating" required>
                                        </div>
                                        <div class="input-block">
                                            <label class="focus-label">Email Address<span class="label-star"> *</span></label>
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
                                        <div class="input-block mb-0">
                                            <label class="focus-label">Confirm Password <span class="label-star"> *</span></label>
                                            <div class="position-relative">
                                                <input type="password" name="confirm_password" class="form-control floating pass-inputs" required>
                                                <div class="password-icons">
                                                    <span class="fas toggle-passwords fa-eye-slash"></span>
                                                </div>
                                            </div>
                                        </div>  
                                        <div class="dont-have">
                                            <label class="custom_check">
                                                <input type="checkbox" name="rem_password" required>
                                                <span class="checkmark"></span> I have read and agree to all <a href="privacy-policy.html">Terms &amp; Conditions</a>
                                            </label>
                                        </div>
                                        <button class="btn btn-primary w-100 btn-lg login-btn d-flex align-items-center justify-content-center" type="submit">Sign Up Now<i class="feather-arrow-right ms-2"></i></button> 
                                    </form>
                                </div>
                            </div>      
                        </div>
                    </div>
                </div>
                <!-- /Login Content -->
            </div>  
        </div>
   
        <!-- Footer -->    
        <?php include_once '../includes/footer.php' ?>
        <!-- /Footer -->
       
    </div>
    <!-- /Main Wrapper -->
  
    <?php include_once '../includes/scripts.php' ?>
    
</body>
</html>
