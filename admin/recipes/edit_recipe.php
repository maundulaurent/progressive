<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'admin') {
    header("location: ../../login");
    exit;
}
require_once '../includes/db.php';

// Get the recipe ID from the URL
$recipe_id = isset($_GET['id']) ? (int)$_GET['id'] : null;

// Handle recipe update
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['recipe_name'])) {
    $name = $_POST['recipe_name'];
    if ($recipe_id) {
        $sql = "UPDATE recipes SET name = ? WHERE id = ?";
        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("si", $name, $recipe_id);
            if ($stmt->execute()) {
                header("Location: index.php");
                exit;
            } else {
                echo "Error: Could not execute the query.";
            }
            $stmt->close();
        } else {
            echo "Error: Could not prepare the query.";
        }
    }
}

// Fetch current recipe details
if ($recipe_id) {
    $sql = "SELECT name FROM recipes WHERE id = ?";
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("i", $recipe_id);
        $stmt->execute();
        $recipe = $stmt->get_result()->fetch_assoc();
        $stmt->close();
    }
}

include '../includes/head.php';
include '../includes/sidebar.php';
?>

<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <h1>Edit Recipe</h1>
            <form action="edit_recipe.php?id=<?= $recipe_id ?>" method="post">
                <div class="form-group">
                    <label for="recipe_name">Recipe Name</label>
                    <input type="text" name="recipe_name" id="recipe_name" class="form-control" value="<?= htmlspecialchars($recipe['name']) ?>" required>
                </div>
                <button type="submit" class="btn btn-primary">Update Recipe</button>
            </form>
        </div>
    </section>
</div>

<?php include '../includes/footer.php'; ?>
