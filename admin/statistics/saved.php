<?php
session_start();
// Ensure the user is logged in
if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'admin') {
    header("location: ../../login");
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
$itemsPerPageSaved = 6;
$pageSaved = isset($_GET['pageSaved']) ? (int)$_GET['pageSaved'] : 1;
$offsetSaved = ($pageSaved - 1) * $itemsPerPageSaved;

// Fetch the paginated recipe list with type 'saved'
$sql_saved_recipes = "SELECT id, name, ingredients, description, created_at FROM saved_recipes WHERE type = 'saved' LIMIT $itemsPerPageSaved OFFSET $offsetSaved";
$result_saved_recipes = $conn->query($sql_saved_recipes);

// Fetch the total number of saved recipes for pagination
$sql_total_saved = "SELECT COUNT(*) as total FROM saved_recipes WHERE type = 'saved'";
$result_total_saved = $conn->query($sql_total_saved);
$row_total_saved = $result_total_saved->fetch_assoc();
$totalItemsSaved = $row_total_saved['total'];
$totalPagesSaved = ceil($totalItemsSaved / $itemsPerPageSaved);

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
            <h3 class="m-0">Recipes saved by the user</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Saved Recipes</li>
            </ol>
          </div>
        </div>
      </div>
    </div>

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- Recipes Available Column -->
          <div class="col-lg-12">
            <div class="card">
              <div class="card-header border-0">
                <h3 class="card-title">Saved Recipes</h3>
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
                      <th>Description</th>
                      <th>Created at</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    if ($result_saved_recipes->num_rows > 0) {
                      while ($row = $result_saved_recipes->fetch_assoc()) {
                        $recipe_id = $row['id'];
                        $ingredients = json_decode($row['ingredients'], true);
                        $ingredient_count = is_array($ingredients) ? count($ingredients) : 0;

                        echo "<tr>
                                <td>{$row['name']}</td>
                                <td>{$ingredient_count} Ingredients</td>
                                <td>{$row['description']}</td>
                                <td>{$row['created_at']}</td>
                              </tr>";
                      }
                    } else {
                      echo "<tr><td colspan='4'>No recipes found.</td></tr>";
                    }
                    ?>
                  </tbody>
                </table>

                <div class="text-center mt-3 justify-content-end">
                  <nav class="box-pagination justify-content-end">
                    <ul class="pagination">
                      <?php if ($pageSaved > 1): ?>
                        <li class="page-item">
                          <a class="page-link" href="?pageSaved=<?= $pageSaved - 1 ?>">Previous</a>
                        </li>
                      <?php endif; ?>

                      <?php for ($i = 1; $i <= $totalPagesSaved; $i++): ?>
                        <li class="page-item<?= $i == $pageSaved ? ' active' : '' ?>">
                          <a class="page-link" href="?pageSaved=<?= $i ?>"><?= $i ?></a>
                        </li>
                      <?php endfor; ?>

                      <?php if ($pageSaved < $totalPagesSaved): ?>
                        <li class="page-item">
                          <a class="page-link" href="?pageSaved=<?= $pageSaved + 1 ?>">Next</a>
                        </li>
                      <?php endif; ?>
                    </ul>
                  </nav>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

<?php
include '../includes/footer.php';
?>
