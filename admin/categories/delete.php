<?php
require_once '../includes/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $category_id = $_POST['category_id'];

    // Delete category from the database
    $query = "DELETE FROM categories WHERE id = ?";
    if ($stmt = $conn->prepare($query)) {
        $stmt->bind_param('i', $category_id);
        if ($stmt->execute()) {
            $_SESSION['success'] = 'Category deleted successfully.';
            header('Location: categories');
            exit();
        } else {
            $_SESSION['error'] = 'Error: Could not delete category.';
            header('Location: categories');
            exit();
        }
    } else {
        $_SESSION['error'] = 'Error: Database query failed.';
        header('Location: categories');
        exit();
    }
}
