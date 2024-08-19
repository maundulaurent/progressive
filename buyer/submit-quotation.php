<?php
session_start();
require_once '../admin/includes/db.php';

// Check if the necessary session data is set
if (isset($_SESSION['quotation']) && isset($_SESSION['username'])) {
    $quotation = $_SESSION['quotation'];
    $username = $_SESSION['username'];  // Assume the logged-in user's username is stored in the session

    // Prepare the SQL statement
    $stmt = $conn->prepare("
        INSERT INTO requests 
        (title, industry_id, category_id, deadline, written_quote, items, county, town, delivery_location, description, project_by, date, time)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, CURDATE(), CURTIME())
    ");

    // Check if the prepare statement failed
    if (!$stmt) {
        die('Prepare failed: ' . htmlspecialchars($conn->error));
    }

    // Encode items as JSON
    $items = isset($quotation['items']) ? json_encode($quotation['items']) : json_encode([]);

    // Bind the parameters
    $stmt->bind_param(
        'siissssssss',
        $quotation['title'],
        $quotation['industry_id'],
        $quotation['category_id'],
        $quotation['deadline'],
        $quotation['written_quote'],
        $items,
        $quotation['county'],
        $quotation['town'],
        $quotation['delivery_location'],
        $quotation['description'],
        $username  // Use the logged-in user's username from the session
    );

    // Execute the statement and check for success
    if ($stmt->execute()) {
        // Clear the session data
        unset($_SESSION['quotation']);

        // Redirect to a success page
        header('Location: ../admin');
        exit();
    } else {
        // Handle insertion error
        echo 'Error: ' . htmlspecialchars($stmt->error);
    }
} else {
    echo 'Error: Quotation data or user information not found in session.';
}
?>
