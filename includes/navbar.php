<?php
// navbar.php

// Include the database connection file
include_once 'admin/includes/db.php';

// Now the $conn variable is available for use in this file
if (isset($_SESSION['username'])) {
    $stmt = $conn->prepare("SELECT avatar FROM users WHERE username = ?");
    $stmt->bind_param("s", $_SESSION['username']);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
    $avatar_path = !empty($user['avatar']) ? 'admin/uploads/' . htmlspecialchars($user['avatar']) : 'assets/imgs/landing/avatar1.png';
}
?>

<header class="header sticky-bar">
    <div class="container">
        <div class="main-header">
            <div class="header-left">
                <div class="header-logo d-flex">
                    <div class="cardImage"><img src="assets/imgs/landing/mainlogo.png" alt="bakewave" style="height: 40px; object-fit: cover; border-radius: 1px;"></div>
                    <div class="">
                        <a class="d-flex" href="index.php"><h3 class="text-white">Recipe</h3></a>
                    </div>
                </div>
                <div class="header-nav">
                    <nav class="nav-main-menu d-none d-xl-block">
                        <ul class="main-menu">
                            <li><a class="active" href="index.php">Home</a></li>
                            <li><a href="about">About</a></li>
                            <li><a href="contact.php">Contact</a></li>
                            <li><a href="customize.php">Create Recipes</a></li>
                        </ul>
                    </nav>
                    <div class="burger-icon burger-icon-white"><span class="burger-icon-mid"></span><span class="burger-icon-bottom"></span></div>
                </div>
                <div class="header-right d-flex">
                    <div class="box-button-login d-inline-block mr-10 align-middle">
                        <a class="btn btn-default hover-up" href="dashboard.php">Recipes</a>
                    </div>
                    <?php if (isset($_SESSION['username'])): ?>
                        <div class="box-button-login d-inline-block mr-10 align-middle">
                            <a class="btn btn-white hover-up" href="profile.php">Profile</a>
                        </div>

                        <div class="box-button-login d-inline-block mr-10 align-middle">
                            <a class="btn btn-white hover-up" href="admin/logout.php">Logout</a>
                        </div>

                        <div class="cardImage">
                            <img src="<?= $avatar_path ?>" alt="User Avatar" style="height: 50px; width: 50px; object-fit: cover; border-radius: 50px;">
                        </div>

                    <?php else: ?>
                        <div class="box-button-login d-inline-block align-middle">
                            <a class="btn btn-white hover-up" href="login.php">Login</a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</header>
