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
$itemsPerPage = 5;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $itemsPerPage;

// Fetch the paginated recipe list with type 'shared'
$sql_shared_recipes = "SELECT id, name, ingredients, description, created_at FROM saved_recipes WHERE type = 'shared' LIMIT $itemsPerPage OFFSET $offset";
$result_shared_recipes = $conn->query($sql_shared_recipes);

// Fetch the total number of shared recipes for pagination
$sql_total_shared = "SELECT COUNT(*) as total FROM saved_recipes WHERE type = 'shared'";
$result_total_shared = $conn->query($sql_total_shared);
$row_total_shared = $result_total_shared->fetch_assoc();
$totalItemsShared = $row_total_shared['total'];
$totalPagesShared = ceil($totalItemsShared / $itemsPerPage);

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
            <h3 class="m-0">Recipes Shared by Users</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Available Recipes</li>
            </ol>
          </div>
        </div>
      </div>
    </div>

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- Recipes Shared Column -->
          <div class="col-lg-12">
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
                      <th>Status</th>
                      <th>Ingredients</th>
                      <th>Description</th>
                      <th>Created at</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    if ($result_shared_recipes->num_rows > 0) {
                      while ($row = $result_shared_recipes->fetch_assoc()) {
                        $recipe_id = $row['id'];
                        $ingredients = json_decode($row['ingredients'], true);
                        $ingredient_count = is_array($ingredients) ? count($ingredients) : 0;

                        // Check if the recipe is approved
                        // $stmt = $conn->prepare("SELECT COUNT(*) FROM recipes WHERE id = ? AND name = ?");
                        $stmt = $conn->prepare("SELECT COUNT(*) FROM recipes WHERE name = ?");
                        // $stmt->bind_param("is", $recipe_id, $row['name']);
                        $stmt->bind_param("s",  $row['name']);
                        $stmt->execute();
                        $stmt->bind_result($approved);
                        $stmt->fetch();
                        $stmt->close();

                        $status_button = $approved > 0
                            ? "<span class='btn btn-success btn-sm'>Approved</span>"
                            : "<span class='btn btn-warning btn-sm'>Not Approved</span>";
                        $action_button = $approved > 0
                            ? "<a href='../../evaluation.php?id={$recipe_id}'></a>"
                            : "<a href='details.php?id={$recipe_id}'>Review Recipe</a>";

                        echo "<tr>
                                <td>{$row['name']}</td>
                                <td>{$status_button}</td>
                                <td>{$ingredient_count} Ingredients</td>
                                <td>{$row['description']}</td>
                                <td>{$row['created_at']}</td>
                                <td>{$action_button}</td>
                              </tr>";
                      }
                    } else {
                      echo "<tr><td colspan='6'>No shared recipes found.</td></tr>";
                    }
                    ?>
                  </tbody>
                </table>

                <div class="justify-content-end mt-3">
                  <nav class="justify-content-end box-pagination">
                    <ul class="pagination">
                      <?php if ($page > 1): ?>
                        <li class="page-item">
                          <a class="page-link" href="?page=<?= $page - 1 ?>">Previous</a>
                        </li>
                      <?php endif; ?>

                      <?php for ($i = 1; $i <= $totalPagesShared; $i++): ?>
                        <li class="page-item<?= $i == $page ? ' active' : '' ?>">
                          <a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a>
                        </li>
                      <?php endfor; ?>

                      <?php if ($page < $totalPagesShared): ?>
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
      </div>
    </div>
  </div>

<?php
include '../includes/footer.php';
?>
