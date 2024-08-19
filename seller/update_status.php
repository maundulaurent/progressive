<?php
require_once '../admin/includes/db.php'; // Include the database connection

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'], $_POST['status'])) {
    $requestId = intval($_POST['id']);
    $status = $_POST['status'];

    // Update the status in the requests table
    $sql = "UPDATE requests SET status = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $status, $requestId);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo "Status updated successfully.";
    } else {
        echo "Failed to update status.";
    }
    
    $stmt->close();
}

$conn->close();
?>
