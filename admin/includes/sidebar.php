

  <?php 
  include_once 'head.php'; 

  define('BASE_URL', 'localhost/projects/finrecipe/');
  
  ?>

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar  elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link" style="margin-left: 20px;">
      <span class="brand-text text-dark"><h3 class="fst-bold">Bakewave</h3></span>
    </a>
    

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <hr class="mt-3" style="border: 0; border-top: 1px solid #333;">
      <div class="user-panel d-flex">
        
      <div class="image">
        <img src="https://ui-avatars.com/api/?name=<?php echo urlencode($user_name); ?>&background=random&rounded=true" class="img-circle elevation-2" alt="User Image" style="display: block; margin: 0 auto;">
        </div>
        <div class="info">
          <a href="#" class="text-dark"><?php echo htmlspecialchars($user_name); ?></a>
        </div>
      </div>
      <hr style="border: 0; border-top: 1px solid #333;">
      
      
      

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Admin Dashboard
              </p>
            </a>
          </li>
          <li class="nav-header">WIDGETS</li>
          <li class="nav-item">
            <a href="../index.php" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Admin dashboard
              </p>
            </a>
          </li>
          <li class="nav-header">MANAGE RECIPES</li>
          <li class="nav-item">
            <a href="/projects/finrecipe/admin/recipes/index.php" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Add Recipe
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/projects/finrecipe/admin/recipes/index.php" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Edit Recipe
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/projects/finrecipe/admin/recipes/index.php" class="nav-link">
              <i class="nav-icon fas fa-tree"></i>
              <p>
                Delete Recipes
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
          </li>
          <li class="nav-header">MANAGE USERS</li>
          <li class="nav-item">
            <a href="/projects/finrecipe/admin/users/create-user.php" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Create another Admin
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/projects/finrecipe/admin/users/create-user.php" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Delete Admin
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
          </li>
          <li class="nav-header">STATISTICS</li>
          <li class="nav-item">
            <a href="/projects/finrecipe/admin/statistics/index.php" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                View all Recipes
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/projects/finrecipe/admin/statistics/index.php" class="nav-link">
              <i class="nav-icon fas fa-calendar-alt"></i>
              <p>
                Approve Recipes
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/projects/finrecipe/admin/statistics/index.php" class="nav-link">
              <i class="nav-icon far fa-image"></i>
              <p>
                Check Approved Recipes
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/projects/finrecipe/admin/statistics/index.php" class="nav-link">
              <i class="nav-icon fas fa-columns"></i>
              <p>
                User Customized Recipes
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/projects/finrecipe/admin/statistics/index.php" class="nav-link">
              <i class="nav-icon far fa-envelope"></i>
              <p>
                Mailbox
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="/projects/finrecipe/admin/statistics/index.php" class="nav-link">
              <i class="nav-icon far fa-plus-square"></i>
              <p>
                Extras
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <?php include_once 'scripts.php'; ?>