<?php
session_start();
// Ensure the user is logged in
if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'admin') {
    header("location: ../../login");
    exit;
}

require_once '../includes/db.php';

// Get the recipe ID from the URL
$recipe_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

// Fetch the recipe details
$query = "SELECT name, ingredients, description, username FROM saved_recipes WHERE id = ?";
$stmt = $conn->prepare($query);
if (!$stmt) {
    die("Prepare failed: " . $conn->error);
}
$stmt->bind_param("i", $recipe_id);
$stmt->execute();
$stmt->bind_result($recipe_name, $ingredients_json, $description, $recipe_username);
$stmt->fetch();
$stmt->close();

// Check if recipe was found
if (!$recipe_name) {
    echo "<div class='alert alert-danger' role='alert'>Recipe not found.</div>";
    exit;
}

// Decode the ingredients JSON data
$ingredients = json_decode($ingredients_json, true);
if (!is_array($ingredients)) {
    $ingredients = [];
}

include '../includes/head.php';
include '../includes/sidebar.php';

// If the form is submitted, handle the approval
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['approve'])) {
    // Handle file upload
    $image_path = '';
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $target_dir = "../uploads/";
        $image_name = basename($_FILES["image"]["name"]);
        $target_file = $target_dir . $image_name;
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            $image_path = $target_file;
        } else {
            echo "<div class='alert alert-danger' role='alert'>Sorry, there was an error uploading your file.</div>";
            exit;
        }
    }

    // Insert into the recipes table
    $query = "INSERT INTO recipes (name, description, image_path, created_at, recipe_by) VALUES (?, ?, ?, NOW(), ?)";
    $stmt = $conn->prepare($query);
    if (!$stmt) {
        die("Prepare failed: " . $conn->error);
    }
    $stmt->bind_param("ssss", $recipe_name, $description, $image_path, $recipe_username);
    if ($stmt->execute()) {
        $new_recipe_id = $stmt->insert_id; // Get the ID of the inserted recipe
        
        // Insert each ingredient into the recipe_ingredients table
        $ingredient_query = "INSERT INTO recipe_ingredients (recipe_id, ingredient_name, quantity) VALUES (?, ?, ?)";
        $ingredient_stmt = $conn->prepare($ingredient_query);
        if ($ingredient_stmt) {
            foreach ($ingredients as $ingredient) {
                $ingredient_name = $ingredient['name'];
                $quantity = $ingredient['quantity'];
                $ingredient_stmt->bind_param("isi", $new_recipe_id, $ingredient_name, $quantity);
                $ingredient_stmt->execute();
            }
            $ingredient_stmt->close();
        }

        echo "
        <div class='alert alert-success alert-dismissible fade show' role='alert' style='width: 40%;'>
            Recipe approved and updated successfully.
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                <span aria-hidden='true'>&times;</span>
            </button>   
        </div>";

        // Remove the recipe from the saved_recipes table
        // $delete_query = "DELETE FROM saved_recipes WHERE id = ?";
        // $delete_stmt = $conn->prepare($delete_query);
        // $delete_stmt->bind_param("i", $recipe_id);
        // if ($delete_stmt->execute()) {
        //     echo "
        //         <div class='alert alert-info alert-dismissible fade show' role='alert' style='width: 40%;'>
        //             Recipe removed from pending recipes.
        //             <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
        //                 <span aria-hidden='true'>&times;</span>
        //             </button>   
        //         </div>";
        // } else {
            
        //     echo "
        //         <div class='alert alert-warning alert-dismissible fade show' role='alert' style='width: 40%;'>
        //             Error removing the recipe from pending recipes.
        //             <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
        //                 <span aria-hidden='true'>&times;</span>
        //             </button>   
        //         </div>";
        // }
        // $delete_stmt->close();
    } else {
        echo "<div class='alert alert-danger' role='alert'>There was an error approving the recipe.</div>";
    }
    $stmt->close();
}
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
                                        <th>Cost</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (count($ingredients) > 0) {
                                        foreach ($ingredients as $ingredient) {
                                            $name = htmlspecialchars($ingredient['name']);
                                            $quantity = htmlspecialchars($ingredient['quantity']);
                                            $cost = number_format((float)$ingredient['cost'], 2);
                                            
                                            echo "<tr>
                                                    <td>{$name}</td>
                                                    <td>{$quantity}</td>
                                                    <td>sh {$cost}</td>
                                                  </tr>";
                                        }
                                    } else {
                                        echo "<tr><td colspan='3'>No ingredients found for this recipe.</td></tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header border-0">
                            <h3 class="card-title">Approve Recipe</h3>
                        </div>
                        <div class="card-body">
                            <form method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="image">Upload Image:</label>
                                    <input type="file" name="image" id="image" required class="form-control">
                                </div>
                                <button type="submit" name="approve" class="btn btn-success">Approve Recipe</button>
                            </form>
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
