<?php
session_start();
// Ensure the user is logged in
if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'admin') {
    header("location: ../login");
    exit;
}


require_once 'includes/db.php';

// Fetch the logged-in user's name from the database
$username = $_SESSION['username'];
$query = "SELECT username FROM users WHERE username = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $username);
$stmt->execute();
$stmt->bind_result($user_name);
$stmt->fetch();
$stmt->close();


// Pagination settings
$itemsPerPage = 5; // Number of items to show per page
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $itemsPerPage;


// Fetch data for the chart
$sql = "SELECT recipes.name AS recipe_name, COUNT(recipe_ingredients.id) AS ingredient_count
        FROM recipes
        LEFT JOIN recipe_ingredients ON recipes.id = recipe_ingredients.recipe_id
        GROUP BY recipes.name";

$result = $conn->query($sql);

$recipes = [];
$ingredient_counts = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $recipes[] = $row['recipe_name'];
        $ingredient_counts[] = $row['ingredient_count'];
    }
}


// Fetch the paginated recipe list
$sql_recipes = "SELECT id, name FROM recipes LIMIT $itemsPerPage OFFSET $offset";
$result_recipes = $conn->query($sql_recipes);

// Get the total number of recipes for pagination
$sql_total = "SELECT COUNT(*) as total FROM recipes";
$result_total = $conn->query($sql_total);
$row_total = $result_total->fetch_assoc();
$totalItems = $row_total['total'];
$totalPages = ceil($totalItems / $itemsPerPage);


?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bakewave | Admin Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icon -->
  <link rel="shortcut icon" type="image/x-icon" href="../assets/imgs/landing/icon2.png">
  <!-- IonIcons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="../index" class="nav-link">Home</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>

      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        
      </li>

      <li class="nav-item d-none d-sm-inline-block">
        <a href="logout" class="nav-link">Logout</a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar  elevation-4">
    <!-- Brand Logo -->
    <a href="index" class="brand-link mt-3" style="margin-left: 10px; display: flex; align-items: center;">
    <div class="cardImage"><img src="../assets/imgs/landing/mainlogo.png" alt="bakewave" style="height: 40px; object-fit: cover; border-radius: 1px;"></div>
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
            <a href="" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Admin Dashboard
              </p>
            </a>
          </li>
          <li class="nav-header">WIDGETS</li>
          <li class="nav-item">
            <a href="index" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Admin dashboard
              </p>
            </a>
          </li>
          <li class="nav-header mt-4">MANAGE RECIPES</li>
          <li class="nav-item">
            <a href="recipes/index" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Add Recipe
                
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="recipes/index" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Edit Recipe
                
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="recipes/index" class="nav-link">
              <i class="nav-icon fas fa-tree"></i>
              <p>
                Delete Recipes
                
              </p>
            </a>
          </li>
          <li class="nav-header mt-4">MANAGE USERS</li>
          <li class="nav-item">
            <a href="users/create-user" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Create another Admin
                
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="users/create-user" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Delete Admin
                
              </p>
            </a>
          </li>
          
          <li class="nav-header mt-4">STATISTICS</li>
          <li class="nav-item">
            <a href="statistics/saved" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                View Saved Recipes
                
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="statistics/shared" class="nav-link">
              <i class="nav-icon fas fa-calendar-alt"></i>
              <p>
                View Shared Recipes
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="statistics/approved" class="nav-link">
              <i class="nav-icon far fa-image"></i>
              <p>
                View Approved Recipes
              </p>
            </a>
          </li>
          <li class="nav-header mt-4">EXTRAS</li> 
          <li class="nav-item">
            <a href="statistics/index" class="nav-link">
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

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard Admin</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


          <!-- to be main content wrapper -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- Recipes Available Column -->
        <div class="col-lg-6">
          <div class="card">
            <div class="card-header border-0">
              <h3 class="card-title">Recipes Available</h3>
              <div class="card-tools">
                <a href="#" class="btn btn-tool btn-sm">
                  <i class="fas fa-bars"></i>
                </a>
              </div>
            </div>

            <div class="card-body table-responsive p-0">
              <table class="table table-striped table-valign-middle">
                <thead>
                  <tr>
                    <th>Recipe</th>
                    <th>Ingredients</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  if ($result_recipes->num_rows > 0) {
                    while ($row = $result_recipes->fetch_assoc()) {
                      $recipe_id = $row['id'];
                      echo "<tr>
                              <td>{$row['name']}</td>
                              <td><a href='recipes/manage?id={$recipe_id}'>Manage Recipe</a></td>
                            </tr>";
                    }
                  } else {
                    echo "<tr><td colspan='2'>No recipes found.</td></tr>";
                  }
                  ?>
                </tbody>
              </table>

                <div class="text-center mt-3">
                  <nav class="box-pagination">
                    <ul class="pagination">
                      <?php if ($page > 1): ?>
                        <li class="page-item">
                          <a class="page-link" href="?page=<?= $page - 1 ?>">Previous</a>
                        </li>
                      <?php endif; ?>

                      <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                        <li class="page-item<?= $i == $page ? ' active' : '' ?>">
                          <a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a>
                        </li>
                      <?php endfor; ?>

                      <?php if ($page < $totalPages): ?>
                        <li class="page-item">
                          <a class="page-link" href="?page=<?= $page + 1 ?>">Next</a>
                        </li>
                      <?php endif; ?>
                    </ul>
                  </nav>
                </div>
            </div>
          </div>
        </div>
        <!-- /.col-lg-6 -->

        <div class="col-lg-6">
            <!-- Total Ingredients and Recipes Card -->
            <div class="card">
                <div class="card-header border-0">
                    <h3 class="card-title">Statistics</h3>
                    <div class="card-tools">
                        <a href="#" class="btn btn-tool btn-sm">
                            <i class="fas fa-bars"></i>
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h4>Total Ingredients</h4>
                            <?php
                            require_once 'includes/db.php';

                            // Count total ingredients
                            $sql_ingredients = "SELECT COUNT(*) as total_ingredients FROM recipe_ingredients";
                            $result_ingredients = $conn->query($sql_ingredients);

                            if ($result_ingredients) {
                                $row_ingredients = $result_ingredients->fetch_assoc();
                                $total_ingredients = $row_ingredients['total_ingredients'];
                            } else {
                                $total_ingredients = "Error";
                            }
                            ?>
                            <h2><?= htmlspecialchars($total_ingredients) ?></h2>
                        </div>
                        <!-- Total Recipes -->
                        <div class="col-md-6">
                            <h4>Total Recipes</h4>
                            <?php
                            // Count total recipes
                            $sql_recipes = "SELECT COUNT(*) as total_recipes FROM recipes";
                            $result_recipes = $conn->query($sql_recipes);

                            if ($result_recipes) {
                                $row_recipes = $result_recipes->fetch_assoc();
                                $total_recipes = $row_recipes['total_recipes'];
                            } else {
                                $total_recipes = "Error";
                            }
                            ?>
                            <h2><?= htmlspecialchars($total_recipes) ?></h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                  <a href="recipes/index" class="btn btn-primary btn-block mb-3">Manage Recipes</a>
              </div>
              <div class="col-md-6">
                  <a href="users/create-user" class="btn btn-primary btn-block mb-3">Users</a>
              </div>
          </div>
            <!-- /.card -->
        </div>

        <!-- /.col-lg-6 -->
      </div>
      <!-- /.row -->
    </div>
  </div>
    <!-- end to be main content -->
    
    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-6">
            <div class="card">
              <div class="card-header border-0">
                <div class="d-flex justify-content-between">
                  <h3 class="card-title">Recipes most liked</h3>
                </div>
              </div>
              <div class="card-body">
                <div class="d-flex">
                  <p class="d-flex flex-column">
                    <span class="text-bold text-lg">820</span>
                    <span>Recipe Likes</span>
                  </p>
                </div>
                <!-- /.d-flex -->

                <div class="position-relative mb-4">
                  <canvas id="visitors-chart" height="200"></canvas>
                </div>

                <div class="d-flex flex-row justify-content-end">
                  <span class="mr-2">
                    <i class="fas fa-square text-primary"></i> This Week
                  </span>

                  <span>
                    <i class="fas fa-square text-gray"></i> Last Week
                  </span>
                </div>
              </div>
            </div>
            <!-- /.card -->

          </div>
          <!-- /.col-md-6 -->
          <div class="col-lg-6">
            <div class="card">
              <div class="card-header border-0">
                <div class="d-flex justify-content-between">
                  <h3 class="card-title">Recipes created</h3>
                  <a href="javascript:void(0);">View Report</a>
                </div>
              </div>
              <div class="card-body">
                <div class="d-flex">
                  <p class="d-flex flex-column">
                    <span>Recipes</span>
                  </p>
                  <p class="ml-auto d-flex flex-column text-right">
                    <span class="text-success">
                      <i class="fas fa-arrow-up"></i> 33.1%
                    </span>
                  </p>
                </div>
                <!-- /.d-flex -->

                <div class="position-relative mb-4">
                  <canvas id="sales-chart" height="200"></canvas>
                </div>

                <div class="d-flex flex-row justify-content-end">
                  <span class="mr-2">
                    <i class="fas fa-square text-primary"></i> This year
                  </span>

                  <span>
                    <i class="fas fa-square text-gray"></i> Last year
                  </span>
                </div>
              </div>
            </div>
            <!-- /.card -->

            
          </div>
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content -->

  </div>
  <!-- /.content-wrapper -->



  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    All rights reserved@bakewave
    <div class="float-right d-none d-sm-inline-block">
      <b>Bakewave</b>
    </div>
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE -->
<script src="dist/js/adminlte.js"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard3.js"></script>
</body>
</html>
