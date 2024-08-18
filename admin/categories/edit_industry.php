<?php
session_start();
require_once '../includes/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $industry_id = $_POST['industry_id'];
    $industry_name = trim($_POST['industry_name']);

    // Validate industry name
    if (empty($industry_name)) {
        $_SESSION['error'] = 'Industry name is required.';
        header('Location: industry.php');
        exit();
    }

    // Update industry in the database
    $query = "UPDATE industry SET name = ? WHERE id = ?";
    if ($stmt = $conn->prepare($query)) {
        $stmt->bind_param('si', $industry_name, $industry_id);
        if ($stmt->execute()) {
            $_SESSION['success'] = 'Industry updated successfully.';
        } else {
            $_SESSION['error'] = 'Error: Could not update industry.';
        }
    } else {
        $_SESSION['error'] = 'Error: Database query failed.';
    }
    header('Location: industry.php');
    exit();
}
?>
