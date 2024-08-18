<?php
session_start();
require_once '../includes/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $industry_id = $_POST['industry_id'];

    // Delete industry from the database
    $query = "DELETE FROM industry WHERE id = ?";
    if ($stmt = $conn->prepare($query)) {
        $stmt->bind_param('i', $industry_id);
        if ($stmt->execute()) {
            $_SESSION['success'] = 'Industry deleted successfully.';
        } else {
            $_SESSION['error'] = 'Error: Could not delete industry.';
        }
    } else {
        $_SESSION['error'] = 'Error: Database query failed.';
    }
    header('Location: industry.php');
    exit();
}
?>
