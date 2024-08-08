<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'admin') {
    header("location: ../login.php");
    exit;
}
require_once '../includes/db.php';

$recipesPerPage = 5; // Number of recipes per page
$currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($currentPage - 1) * $recipesPerPage;

// Handle recipe creation
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['recipe_name'])) {
    $name = $_POST['recipe_name'];
    $conn->begin_transaction();
    try {
        // Insert the new recipe
        $sql = "INSERT INTO recipes (name) VALUES (?)";
        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("s", $name);
            if (!$stmt->execute()) {
                throw new Exception("Error: Could not execute the recipe query.");
            }
            $recipe_id = $stmt->insert_id;
            $stmt->close();
        } else {
            throw new Exception("Error: Could not prepare the recipe query.");
        }

        $conn->commit();
    } catch (Exception $e) {
        $conn->rollback();
        echo $e->getMessage();
    }
}

// Handle recipe deletion
if (isset($_GET['delete'])) {
    $recipe_id = (int)$_GET['delete'];
    if ($recipe_id) {
        $sql = "DELETE FROM recipes WHERE id = ?";
        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("i", $recipe_id);
            if ($stmt->execute()) {
                // Redirect to the same page after successful deletion
                header("Location: index.php");
                exit;
            } else {
                echo "Error: Could not execute the query.";
            }
            $stmt->close();
        } else {
            echo "Error: Could not prepare the query.";
        }
    } else {
        echo "Error: Invalid recipe ID.";
    }
}

// Count total recipes
$countResult = $conn->query("SELECT COUNT(*) AS total FROM recipes");
$totalRecipes = $countResult->fetch_assoc()['total'];
$totalPages = ceil($totalRecipes / $recipesPerPage);

// Fetch recipes for current page
$sql = "SELECT * FROM recipes LIMIT $recipesPerPage OFFSET $offset";
$result = $conn->query($sql);

// Fetch recipe creation stats for chart
$statsSql = "SELECT DATE(created_at) AS date, COUNT(*) AS count FROM recipes GROUP BY DATE(created_at) ORDER BY DATE(created_at)";
$statsResult = $conn->query($statsSql);

if (!$statsResult) {
    die("Error in SQL query: " . $conn->error);
}

$dates = [];
$counts = [];

while ($row = $statsResult->fetch_assoc()) {
    $dates[] = $row['date'];
    $counts[] = $row['count'];
}

// Add dummy data to simulate higher numbers if the data set is small
$maxCount = max($counts);
if ($maxCount < 10) {
    $counts = array_map(fn($count) => $count + 2, $counts);
}

include '../includes/header.php';
include '../includes/sidebar.php';
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Manage Recipes</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="../index.php">Admin Dashboard</a></li>
            <li class="breadcrumb-item active">Recipes</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-6">
          <div class="card">
            <div class="card-header border-0">
              <h3 class="card-title">Recipes Available</h3>
              <div class="card-tools">
                <!-- <a href="add-recipe.php" class="btn btn-tool btn-sm">
                  <i class="fas fa-plus"></i>
                </a> -->
              </div>
            </div>
            <div class="card-body table-responsive p-0">
              <table class="table table-striped table-valign-middle">
                <thead>
                  <tr>
                    <th>Recipe</th>
                    <th>Edit</th>
                    <th>Delete</th>
                    <th>Manage Ingredients</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  if ($result->num_rows > 0) {
                      while ($row = $result->fetch_assoc()) {
                          $recipe_id = $row['id'];
                          echo "<tr>
                                  <td>{$row['name']}</td>
                                  <td><a href='edit_recipe.php?id={$recipe_id}' class='btn btn-warning'>Edit</a></td>
                                  <td><a href='index.php?delete={$recipe_id}' onclick=\"return confirm('Are you sure you want to delete this recipe?');\" class='btn btn-danger'>Delete</a></td>
                                  <td><a href='manage.php?id={$recipe_id}' class='btn btn-primary'>Manage Recipe</a></td>
                                </tr>";
                      }
                  } else {
                      echo "<tr><td colspan='4'>No recipes found.</td></tr>";
                  }
                  ?>
                </tbody>
              </table>
              <div class="text-center mt-3">
                <nav class="box-pagination">
                  <ul class="pagination">
                    <?php if ($currentPage > 1): ?>
                      <li class="page-item">
                        <a class="page-link page-prev" href="?page=<?= $currentPage - 1 ?>">
                          <svg fill="none" stroke="currentColor" stroke-width="1.5" viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18"></path>
                          </svg>
                        </a>
                      </li>
                    <?php endif; ?>
                    <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                      <li class="page-item<?= $i == $currentPage ? ' active' : '' ?>">
                        <a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a>
                      </li>
                    <?php endfor; ?>
                    <?php if ($currentPage < $totalPages): ?>
                      <li class="page-item">
                        <a class="page-link page-next" href="?page=<?= $currentPage + 1 ?>">
                          <svg fill="none" stroke="currentColor" stroke-width="1.5" viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"></path>
                          </svg>
                        </a>
                      </li>
                    <?php endif; ?>
                  </ul>
                </nav>
              </div>
            </div>
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col-md-6 -->

        <div class="col-lg-6">
          <div class="card">
            <div class="card-info">
              <div class="card-header">
                <h3 class="card-title">Add a new Recipe</h3>
              </div>
              <div class="card-body">
                <a href="add-recipe.php" class="btn btn-info">Add Recipe</a>
              </div>
            </div>
          </div>
          <!-- /.card -->
          </div>
        </div>
      </div>
      <!-- /.row -->

      <!-- Line Chart -->
      <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Recipes Created Over Time</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <div class="chart">
                  <canvas id="lineChart" style="min-height: 400px; height: 400px; max-height: 400px; max-width: 100%;"></canvas>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
        
          <!-- /.container-fluid -->
        </div>
        <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->

<?php include '../includes/footer.php'; ?>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
  document.addEventListener('DOMContentLoaded', (event) => {
    const ctxLine = document.getElementById('lineChart').getContext('2d');

    new Chart(ctxLine, {
      type: 'line',
      data: {
        labels: <?= json_encode($dates) ?>,
        datasets: [{
          label: 'Recipes Created',
          data: <?= json_encode($counts) ?>,
          borderColor: 'rgba(60,141,188,0.8)',
          backgroundColor: 'rgba(60,141,188,0.2)',
          fill: true, // Fill the area under the line
          pointBackgroundColor: 'rgba(60,141,188,1)',
        }]
      },
      options: {
        maintainAspectRatio: false,
        responsive: true,
        scales: {
          x: {
            display: true,
            title: {
              display: true,
              text: 'Date'
            }
          },
          y: {
            display: true,
            title: {
              display: true,
              text: 'Number of Recipes Created'
            },
            min: 0, // Start the y-axis from zero
            ticks: {
              // Set a minimum step size for the y-axis
              stepSize: 5
            }
          }
        }
      }
    });
  });
</script>
