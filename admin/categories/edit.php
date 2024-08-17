<?php
require_once '../includes/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $category_id = $_POST['category_id'];
    $category_name = trim($_POST['category_name']);

    // Validate category name
    if (empty($category_name)) {
        $_SESSION['error'] = 'Category name is required.';
        header('Location: categories.php');
        exit();
    }

    // Update category in the database
    $query = "UPDATE categories SET name = ? WHERE id = ?";
    if ($stmt = $conn->prepare($query)) {
        $stmt->bind_param('si', $category_name, $category_id);
        if ($stmt->execute()) {
            $_SESSION['success'] = 'Category updated successfully.';
            header('Location: categories.php');
            exit();
        } else {
            $_SESSION['error'] = 'Error: Could not update category.';
            header('Location: categories.php');
            exit();
        }
    } else {
        $_SESSION['error'] = 'Error: Database query failed.';
        header('Location: categories.php');
        exit();
    }
}
