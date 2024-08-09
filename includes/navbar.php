<header class="header sticky-bar">
  <div class="container">
    <div class="main-header">
      <div class="header-left">
        <div class="header-logo"><a class="d-flex" href="index.php"><h3 class="text-white">Recipe</h3></a></div>
        <div class="header-nav">
          <nav class="nav-main-menu d-none d-xl-block">
            <ul class="main-menu">
              <li><a class="active" href="index.php">Home</a></li>
              <li><a href="about.php">About</a></li>
              <li><a href="contact.php">Contact</a></li>
            </ul>
          </nav>
          <div class="burger-icon burger-icon-white"><span class="burger-icon-mid"></span><span class="burger-icon-bottom"></span></div>
        </div>
        <div class="header-right">
          <div class="d-none d-xxl-inline-block align-middle mr-10">
            <a class="text-14-medium call-phone color-white hover-up" href="">+254 23 056 447</a>
          </div>
          <div class="d-none d-xxl-inline-block box-dropdown-cart align-middle mr-10">
            <span class="text-14-medium icon-list icon-account">
              <span class="text-14-medium color-white arrow-down">EN</span>
            </span>
            <div class="dropdown-account">
              <ul>
                <li><a class="font-md" href="#"><img src="assets/imgs/template/icons/en.png" alt="English"> English</a></li>
                <li><a class="font-md" href="#"><img src="assets/imgs/template/icons/fr.png" alt="French"> French</a></li>
                <li><a class="font-md" href="#"><img src="assets/imgs/template/icons/cn.png" alt="Chinese"> Chinese</a></li>
              </ul>
            </div>
          </div>
            <div class="box-button-login d-inline-block mr-10 align-middle">
              <a class="btn btn-default hover-up" href="dashboard.php">Recipes</a>
            </div>
          <?php if (isset($_SESSION['username'])): ?>
            
            <div class="box-button-login d-inline-block align-middle">
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
