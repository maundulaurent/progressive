<?php
require_once '../admin/includes/db.php';

if (isset($_POST['industry_id'])) {
    $industry_id = $_POST['industry_id'];

    // Fetch categories based on industry
    $query = "SELECT id, name FROM category WHERE industry_id = ? ORDER BY name ASC";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $industry_id);
    $stmt->execute();
    $result = $stmt->get_result();

    echo '<option value="">Select Category</option>';
    while ($row = $result->fetch_assoc()) {
        echo '<option value="' . $row['id'] . '">' . htmlspecialchars($row['name']) . '</option>';
    }
}
?>
