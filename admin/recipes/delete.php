<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'admin') {
    header("location: ../../login");
    exit;
}
require_once '../includes/db.php';

// Get the ingredient ID and recipe ID from the URL
$ingredient_id = isset($_GET['id']) ? (int)$_GET['id'] : null;
$recipe_id = isset($_GET['recipe_id']) ? (int)$_GET['recipe_id'] : null;

if ($ingredient_id && $recipe_id) {
    // Prepare and execute the delete query
    $sql = "DELETE FROM recipe_ingredients WHERE id = ? AND recipe_id = ?";
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("ii", $ingredient_id, $recipe_id);
        if ($stmt->execute()) {
            // Redirect to manage.php after successful deletion
            header("Location: manage.php?id=" . $recipe_id);
            exit;
        } else {
            echo "Error: Could not execute the query.";
        }
        $stmt->close();
    } else {
        echo "Error: Could not prepare the query.";
    }
} else {
    echo "Error: Invalid parameters.";
}

$conn->close();
?>
