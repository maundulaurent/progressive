

  <?php 
  include_once 'head.php'; 

  define('BASE_URL', 'localhost/projects/finrecipe/');
  
  ?>

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar  elevation-4">
    <!-- Brand Logo -->
    <a href="index" class="brand-link mt-3" style="margin-left: 10px; display: flex; align-items: center;">
    <div class="cardImage"><img src="../../assets/imgs/landing/mainlogo.png" alt="bakewave" style="height: 40px; object-fit: cover; border-radius: 1px;"></div>
    <span class="brand-text text-dark" style="margin-left: 10px;"><h3 class="fst-bold">Bakewave</h3></span>
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
          <li class="nav-header mt-4">WIDGETS</li>
          <li class="nav-item">
            <a href="../index" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Admin dashboard
              </p>
            </a>
          </li>
          <li class="nav-header mt-4">MANAGE RECIPES</li>
          <li class="nav-item">
            <a href="/projects/finrecipe/admin/recipes/index" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Add Recipe
                
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/projects/finrecipe/admin/recipes/index" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Edit Recipe
                
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/projects/finrecipe/admin/recipes/index" class="nav-link">
              <i class="nav-icon fas fa-tree"></i>
              <p>
                Delete Recipes
                
              </p>
            </a>
          </li>
          <li class="nav-header mt-4">MANAGE USERS</li>
          <li class="nav-item">
            <a href="/projects/finrecipe/admin/users/create-user" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Create another Admin
                
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/projects/finrecipe/admin/users/create-user" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Delete Admin
                
              </p>
            </a>
          </li>
          <li class="nav-header mt-4">STATISTICS</li>
          <li class="nav-item">
            <a href="../statistics/saved" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                View Saved Recipes
                
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="../statistics/shared" class="nav-link">
              <i class="nav-icon fas fa-calendar-alt"></i>
              <p>
                View Shared Recipes
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="../statistics/approved" class="nav-link">
              <i class="nav-icon far fa-image"></i>
              <p>
                View Approved Recipes
              </p>
            </a>
          </li>
          <li class="nav-header mt-4">EXTRAS</li> 
          <li class="nav-item">
            <a href="../statistics/index" class="nav-link">
              <i class="nav-icon far fa-plus-square"></i>
              <p>
                Extras
                
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