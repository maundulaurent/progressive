<?php
session_start();
// Ensure the user is logged in
if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'admin') {
    header("location: ../../login.php");
    exit;
}

require_once '../includes/db.php';

// Get the recipe ID from the URL
$recipe_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

// Fetch the recipe details
$query = "SELECT name, ingredients FROM saved_recipes WHERE id = ?";
$stmt = $conn->prepare($query);
if (!$stmt) {
    die("Prepare failed: " . $conn->error);
}
$stmt->bind_param("i", $recipe_id);
$stmt->execute();
$stmt->bind_result($recipe_name, $ingredients_json);
$stmt->fetch();
$stmt->close();

// Check if recipe was found
if (!$recipe_name) {
    echo "<p>Recipe not found.</p>";
    exit;
}

// Decode the ingredients JSON data
$ingredients = json_decode($ingredients_json, true);
if (!is_array($ingredients)) {
    $ingredients = [];
}

include '../includes/head.php';
include '../includes/sidebar.php';
?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h3 class="m-0">Recipe Details: <?= htmlspecialchars($recipe_name) ?></h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Recipe Details</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header border-0">
                            <h3 class="card-title">Ingredients</h3>
                        </div>
                        <div class="card-body table-responsive p-0">
                            <table class="table table-striped table-valign-middle">
                                <thead>
                                    <tr>
                                        <th>Ingredient</th>
                                        <th>Quantity</th>
                                        <th>Unit</th>
                                        <th>Cost</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (count($ingredients) > 0) {
                                        foreach ($ingredients as $ingredient) {
                                            $name = htmlspecialchars($ingredient['name']);
                                            $quantity = htmlspecialchars($ingredient['quantity']);
                                            $unit = htmlspecialchars($ingredient['unit']) ?: 'N/A';
                                            $cost = number_format((float)$ingredient['cost'], 2);
                                            
                                            echo "<tr>
                                                    <td>{$name}</td>
                                                    <td>{$quantity}</td>
                                                    <td>{$unit}</td>
                                                    <td>\${$cost}</td>
                                                  </tr>";
                                        }
                                    } else {
                                        echo "<tr><td colspan='4'>No ingredients found for this recipe.</td></tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>
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
