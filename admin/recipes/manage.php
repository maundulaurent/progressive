<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'admin') {
    header("location: ../../login");
    exit;
}
require_once '../includes/db.php';

$recipe_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Initialize variables
$ingredients = null;
$recipe = null;

// Handle ingredient addition
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['ingredient_name'], $_POST['quantity'])) {
    $ingredient_name = $_POST['ingredient_name'];
    $quantity = $_POST['quantity'];

    // Add ingredient to recipe
    $sql = "INSERT INTO recipe_ingredients (recipe_id, ingredient_name, quantity) VALUES (?, ?, ?)";
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("iss", $recipe_id, $ingredient_name, $quantity);
        if (!$stmt->execute()) {
            echo "Error: Could not execute the query.";
        }
        $stmt->close();
    } else {
        echo "Error: Could not prepare the query.";
    }
}

// Handle recipe updates
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['description'])) {
        // Handle description and instructions update
        $description = $_POST['description'];
        $instructions = isset($_POST['instructions']) ? $_POST['instructions'] : ''; // Instructions part is optional

        // Update recipe with description and instructions
        $sql = "UPDATE recipes SET description = ?, instructions = ? WHERE id = ?";
        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("ssi", $description, $instructions, $recipe_id);
            if (!$stmt->execute()) {
                echo "Error: Could not execute the query.";
            }
            $stmt->close();
        } else {
            echo "Error: Could not prepare the query.";
        }
    }

    if (isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
        // Handle image upload
        $image_tmp_name = $_FILES['image']['tmp_name'];
        $image_name = basename($_FILES['image']['name']);
        $image_path = "../uploads/" . $image_name;

        // Fetch current recipe details to check for old image
        $sql = "SELECT image_path FROM recipes WHERE id = ?";
        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("i", $recipe_id);
            $stmt->execute();
            $recipe = $stmt->get_result()->fetch_assoc();
            $stmt->close();
        }

        // Delete old image if exists
        if (!empty($recipe['image_path']) && file_exists($recipe['image_path']) && $recipe['image_path'] != $image_path) {
            unlink($recipe['image_path']);
        }

        if (move_uploaded_file($image_tmp_name, $image_path)) {
            // Success, image uploaded
            // Update recipe with new image path
            $sql = "UPDATE recipes SET image_path = ? WHERE id = ?";
            if ($stmt = $conn->prepare($sql)) {
                $stmt->bind_param("si", $image_path, $recipe_id);
                if (!$stmt->execute()) {
                    echo "Error: Could not execute the query.";
                }
                $stmt->close();
            } else {
                echo "Error: Could not prepare the query.";
            }
        } else {
            echo "Error: Could not upload the image.";
        }
    }
}

// Fetch recipe details
$sql = "SELECT * FROM recipes WHERE id = ?";
if ($stmt = $conn->prepare($sql)) {
    $stmt->bind_param("i", $recipe_id);
    $stmt->execute();
    $recipe = $stmt->get_result()->fetch_assoc();
    $stmt->close();
} else {
    echo "Error: Could not prepare the query.";
    exit;
}

// Fetch ingredients
$sql = "SELECT id, ingredient_name, quantity FROM recipe_ingredients WHERE recipe_id = ?";
if ($stmt = $conn->prepare($sql)) {
    $stmt->bind_param("i", $recipe_id);
    $stmt->execute();
    $ingredients = $stmt->get_result();
    $stmt->close();
} else {
    echo "Error: Could not prepare the query.";
    exit;
}

include '../includes/head.php';
include '../includes/sidebar.php';
?>


<div class="content-wrapper">
    <div class="content">
        <div class="container-fluid">
            <h3 class="mt-20">Manage Ingredients for <?= htmlspecialchars($recipe['name'] ?? 'Recipe') ?></h3>

            <!-- Prepare Ingredients -->
            <h2>Prepare Ingredients</h2>
            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header border-0">
                            <h3 class="card-title">Ingredients Available</h3>
                        </div>
                        <div class="card-body table-responsive p-0">
                            <table class="table table-striped table-valign-middle">
                                <thead>
                                    <tr>
                                        <th>Ingredient</th>
                                        <th>Quantity(Kgs)</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if ($ingredients && $ingredients->num_rows > 0) {
                                        while ($row = $ingredients->fetch_assoc()) {
                                            echo "<tr>
                                                    <td>{$row['ingredient_name']}</td>
                                                    <td>{$row['quantity']}</td>
                                                    <td><a href='edit.php?id={$row['id']}&recipe_id={$recipe_id}'>Edit</a></td>
                                                    <td><a href='delete.php?id={$row['id']}&recipe_id={$recipe_id}'>Delete</a></td>
                                                </tr>";
                                        }
                                    } else {
                                        echo "<tr><td colspan='4'>No ingredients found.</td></tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Add a New Ingredient</h3>
                        </div>
                        <form class="form-horizontal" action="manage.php?id=<?= $recipe_id ?>" method="post">
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="ingredient_name" class="col-sm-2 col-form-label">Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="ingredient_name" id="ingredient_name" class="form-control" placeholder="Ingredient Name" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="quantity" class="col-sm-2 col-form-label">Quantity(Kgs)</label>
                                    <div class="col-sm-10">
                                        <input type="number" name="quantity" id="quantity" class="form-control" step="0.000001" required>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Add Ingredient</button>
                                <button type="reset" class="btn btn-default float-right">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Recipe Description and Image Upload -->
            <h2>Update Recipe Details</h2>
            <div class="row">
                <!-- Description and Instructions Form -->
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Update Description</h3>
                        </div>
                        <form class="form-horizontal" action="manage.php?id=<?= $recipe_id ?>" method="post">
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="description" class="col-sm-2 col-form-label">Description</label>
                                    <div class="col-sm-10">
                                        <textarea name="description" id="description" class="form-control" rows="4" required><?= htmlspecialchars($recipe['description'] ?? '') ?></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Update Details</button>
                                <button type="reset" class="btn btn-default float-right">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Image Upload Form -->
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Update Recipe Image</h3>
                        </div>
                        <form class="form-horizontal" action="manage.php?id=<?= $recipe_id ?>" method="post" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="image" class="col-sm-2 col-form-label">Current Image</label>
                                    <div class="col-sm-10">
                                        <?php if (!empty($recipe['image_path'])) : ?>
                                            <img src="<?= htmlspecialchars($recipe['image_path']) ?>" alt="Recipe Image" class="img-fluid">
                                        <?php else : ?>
                                            <p>No image available</p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="image" class="col-sm-2 col-form-label">Upload New Image</label>
                                    <div class="col-sm-10">
                                        <input type="file" name="image" id="image" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Upload Image</button>
                                <button type="reset" class="btn btn-default float-right">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include '../includes/footer.php';
?>
