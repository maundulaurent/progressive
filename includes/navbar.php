<header class="header sticky-bar">
  <div class="container">
    <div class="main-header">
      <div class="header-left">
        <div class="header-logo d-flex">
          <div class="cardImage "><img src="assets/imgs/landing/mainlogo.png" alt="bakewave" style=" height: 40px; object-fit: cover; border-radius: 1px;"></div>
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
