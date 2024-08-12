<?php
session_start();
// Ensure the user is logged in
if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'admin') {
    header("location: ../../login.php");
    exit;
}


require_once '../includes/db.php';

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

// Fetch the paginated recipe list with type 'shared'
$sql_shared_recipes = "SELECT id, name FROM saved_recipes WHERE type = 'shared' LIMIT $itemsPerPage OFFSET $offset";
$result_shared_recipes = $conn->query($sql_shared_recipes);


include '../includes/head.php';
include '../includes/sidebar.php';
?>



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3 class="m-0">Saved and Shared Recipes</h3>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">available Recipes</li>
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
       <!-- Recipes Shared Column -->
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header border-0">
                    <h3 class="card-title">Recipes Shared</h3>
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
                                <th>Details</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($result_shared_recipes->num_rows > 0) {
                                while ($row = $result_shared_recipes->fetch_assoc()) {
                                    $recipe_id = $row['id'];
                                    echo "<tr>
                                            <td>{$row['name']}</td>
                                            <td><a href='details.php?id={$recipe_id}'>Review Recipe</a></td>
                                        </tr>";
                                }
                            } else {
                                echo "<tr><td colspan='2'>No shared recipes found.</td></tr>";
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
      </div>
      <!-- /.row -->
    </div>
  </div>
    <!-- end to be main content -->
    
  </div>
  <!-- /.content-wrapper -->




<?php
include '../includes/footer.php';
?>
