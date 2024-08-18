<?php
session_start();
require_once '../includes/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
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

    // Insert category into the database
    $query = "INSERT INTO category (name, industry_id) VALUES (?, ?)";
    if ($stmt = $conn->prepare($query)) {
        $stmt->bind_param('si', $category_name, $industry_id);
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
?>
