<?php
session_start();
require_once '../includes/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $category_id = $_POST['category_id'];
    $category_name = trim($_POST['category_name']);
    $industry_id = $_POST['industry_id'];

    // Validate inputs
    if (empty($category_name)) {
        $_SESSION['error'] = 'Category name is required.';
        header('Location: categories.php');
        exit();
    }

    if (empty($industry_id)) {
        $_SESSION['error'] = 'Please select an industry.';
        header('Location: categories.php');
        exit();
    }

    // Update category in the database
    $query = "UPDATE category SET name = ?, industry_id = ? WHERE id = ?";
    if ($stmt = $conn->prepare($query)) {
        $stmt->bind_param('sii', $category_name, $industry_id, $category_id);
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
?>
