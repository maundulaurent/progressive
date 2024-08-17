<?php
require_once '../includes/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $category_name = trim($_POST['category_name']);

    // Validate category name
    if (empty($category_name)) {
        $_SESSION['error'] = 'Category name is required.';
        header('Location: categories.php');
        exit();
    }

    // Insert category into the database
    $query = "INSERT INTO categories (name) VALUES (?)";
    if ($stmt = $conn->prepare($query)) {
        $stmt->bind_param('s', $category_name);
        if ($stmt->execute()) {
            $_SESSION['success'] = 'Category added successfully.';
            header('Location: categories.php');
            exit();
        } else {
            $_SESSION['error'] = 'Error: Could not add category.';
            header('Location: categories.php');
            exit();
        }
    } else {
        $_SESSION['error'] = 'Error: Database query failed.';
        header('Location: categories.php');
        exit();
    }
}
