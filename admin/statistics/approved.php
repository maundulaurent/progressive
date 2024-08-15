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
$itemsPerPage = 5; // Number of items to show per page
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $itemsPerPage;

// Fetch the paginated recipe list with non-empty 'recipe_by' field
$sql_recipes = "SELECT id, name, description, created_at FROM recipes WHERE recipe_by IS NOT NULL LIMIT ? OFFSET ?";
$stmt = $conn->prepare($sql_recipes);
$stmt->bind_param("ii", $itemsPerPage, $offset);
$stmt->execute();
$result_recipes = $stmt->get_result();

// Get the total number of recipes with non-empty 'recipe_by' for pagination
$sql_total = "SELECT COUNT(*) as total FROM recipes WHERE recipe_by IS NOT NULL";
$result_total = $conn->query($sql_total);
$row_total = $result_total->fetch_assoc();
$totalItems = $row_total['total'];
$totalPages = ceil($totalItems / $itemsPerPage);

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
            <h3 class="m-0">Approved Recipes</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="../index">Home</a></li>
              <li class="breadcrumb-item active">Approved Recipes</li>
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
                <h3 class="card-title">Approved Recipes</h3>
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
                      <th>Likes</th>
                      <th>Dislikes</th>
                      <th>Comments</th>
                      <th>Approved at</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    if ($result_recipes->num_rows > 0) {
                      while ($row = $result_recipes->fetch_assoc()) {
                        $recipe_id = $row['id'];
                        $recipe_name = htmlspecialchars($row['name']);
                        $recipe_description = htmlspecialchars($row['description']);
                        $approved_at = htmlspecialchars($row['created_at']);

                        // Count the number of ingredients from the ingredients JSON
                        $sql_ingredients = "SELECT COUNT(*) as ingredient_count FROM recipe_ingredients WHERE recipe_id = ?";
                        $stmt_ingredients = $conn->prepare($sql_ingredients);
                        $stmt_ingredients->bind_param("i", $recipe_id);
                        $stmt_ingredients->execute();
                        $result_ingredients = $stmt_ingredients->get_result();
                        $ingredient_count = $result_ingredients->fetch_assoc()['ingredient_count'];

                        // Get the number of likes
                        $sql_likes = "SELECT COUNT(*) as like_count FROM recipe_likes_dislikes WHERE recipe_id = ? AND type = 'like'";
                        $stmt_likes = $conn->prepare($sql_likes);
                        $stmt_likes->bind_param("i", $recipe_id);
                        $stmt_likes->execute();
                        $result_likes = $stmt_likes->get_result();
                        $like_count = $result_likes->fetch_assoc()['like_count'];

                        // Get the number of dislikes
                        $sql_dislikes = "SELECT COUNT(*) as dislike_count FROM recipe_likes_dislikes WHERE recipe_id = ? AND type = 'dislike'";
                        $stmt_dislikes = $conn->prepare($sql_dislikes);
                        $stmt_dislikes->bind_param("i", $recipe_id);
                        $stmt_dislikes->execute();
                        $result_dislikes = $stmt_dislikes->get_result();
                        $dislike_count = $result_dislikes->fetch_assoc()['dislike_count'];

                        // Get the number of comments
                        $sql_comments = "SELECT COUNT(*) as comment_count FROM recipe_comments WHERE recipe_id = ?";
                        $stmt_comments = $conn->prepare($sql_comments);
                        $stmt_comments->bind_param("i", $recipe_id);
                        $stmt_comments->execute();
                        $result_comments = $stmt_comments->get_result();
                        $comment_count = $result_comments->fetch_assoc()['comment_count'];

                        echo "<tr>
                                <td>{$recipe_name}</td>
                                <td>{$ingredient_count} Ingredients</td>
                                <td>{$recipe_description}</td>
                                <td>{$like_count}</td>
                                <td>{$dislike_count}</td>
                                <td>{$comment_count}</td>
                                <td>{$approved_at}</td>
                                <td><a href='../recipes/manage.php?id={$recipe_id}'>Check Recipe</a></td>
                              </tr>";
                      }
                    } else {
                      echo "<tr><td colspan='8'>No recipes found.</td></tr>";
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
      </div>
    </div>
  </div>

<?php
include '../includes/footer.php';
?>
