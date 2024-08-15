<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'admin') {
    header("location: ../../login");
    exit;
}
require_once '../includes/db.php';

// Initialize flag variable
$recipe_added = false;

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
            $conn->commit();
            $recipe_added = true; // Set flag to true
        } else {
            throw new Exception("Error: Could not prepare the recipe query.");
        }
    } catch (Exception $e) {
        $conn->rollback();
        echo $e->getMessage();
    }
}

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
                <!-- /.col-md-6 -->
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-info">
                            <div class="card-header">
                                <h3 class="card-title">Add a new Recipe</h3>
                            </div>
                            <form class="form-horizontal" action="add-recipe.php" method="post">
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="recipe_name" class="col-sm-2 col-form-label">Recipe Name</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="recipe_name" id="recipe_name" class="form-control" placeholder="Recipe Name" required>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-info">Add Recipe</button>
                                    <button type="reset" class="btn btn-default float-right">Cancel</button>
                                </div>
                                <!-- /.card-footer -->
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.content -->
        </div>
    </div>
    <!-- /.content-wrapper -->

    <script>
    // Check if recipe was added successfully
    <?php if ($recipe_added): ?>
        alert("Recipe added successfully!");
        // Redirect to index.php after alert
        window.location.href = "index.php";
    <?php endif; ?>
    </script>
