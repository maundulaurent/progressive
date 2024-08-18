<?php
session_start();
require_once '../includes/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $industry_name = trim($_POST['industry_name']);

    // Validate industry name
    if (empty($industry_name)) {
        $_SESSION['error'] = 'Industry name is required.';
        header('Location: industry.php');
        exit();
    }

    // Insert industry into the database
    $query = "INSERT INTO industry (name) VALUES (?)";
    if ($stmt = $conn->prepare($query)) {
        $stmt->bind_param('s', $industry_name);
        if ($stmt->execute()) {
            $_SESSION['success'] = 'Industry added successfully.';
        } else {
            $_SESSION['error'] = 'Error: Could not add industry.';
        }
    } else {
        $_SESSION['error'] = 'Error: Database query failed.';
    }
    header('Location: industry.php');
    exit();
}
?>
