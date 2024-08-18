<?php
session_start();
require_once '../admin/includes/db.php';

if (isset($_SESSION['quotation'])) {
    $quotation = $_SESSION['quotation'];

    // Prepare the SQL statement
    $stmt = $conn->prepare("INSERT INTO requests (title, industry_id, category_id, deadline, written_quote, items, county, town, delivery_location, description, project_by, date, time)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, CURDATE(), CURTIME())");

    // Check if the prepare statement failed
    if (!$stmt) {
        die('Prepare failed: ' . htmlspecialchars($conn->error));
    }

    // Encode items as JSON
    $items = isset($quotation['items']) ? json_encode($quotation['items']) : json_encode([]);

    // Bind the parameters
    $stmt->bind_param('siissssssss', 
        $quotation['title'], 
        $quotation['industry_id'], 
        $quotation['category_id'], 
        $quotation['deadline'], 
        $quotation['written_quote'], 
        $items, 
        $quotation['county'], 
        $quotation['town'], 
        $quotation['delivery_location'], 
        // $quotation['preferred_delivery_day'], 
        $quotation['description'], 
        $_SESSION['user']['username']
    );

    // Execute the statement
    if ($stmt->execute()) {
        // Clear the session
        unset($_SESSION['quotation']);

        // Redirect to a success page
        header('Location: success.php');
        exit();
    } else {
        // Handle insertion error
        $_SESSION['error'] = 'There was an issue posting your quotation. Please try again.';
        header('Location: project-confirmation.php');
        exit();
    }
} else {
    header('Location: post-quotation.php');
    exit();
}
?>
