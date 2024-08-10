<?php
session_start();
include 'admin/includes/db.php';

$recipe_id = isset($_POST['id']) ? intval($_POST['id']) : 0;
$action = isset($_POST['action']) ? $_POST['action'] : '';

if ($recipe_id > 0 && in_array($action, ['like', 'dislike']) && isset($_SESSION['username'])) {
    $username = $_SESSION['username'];

    $sql_check = "SELECT type FROM recipe_likes_dislikes WHERE recipe_id = ? AND username = ?";
    $stmt_check = $conn->prepare($sql_check);
    $stmt_check->bind_param('is', $recipe_id, $username);
    $stmt_check->execute();
    $result_check = $stmt_check->get_result();

    if ($result_check->num_rows > 0) {
        $existing_action = $result_check->fetch_assoc()['type'];
        if ($existing_action != $action) {
            $sql_update = "UPDATE recipe_likes_dislikes SET type = ? WHERE recipe_id = ? AND username = ?";
            $stmt_update = $conn->prepare($sql_update);
            $stmt_update->bind_param('sis', $action, $recipe_id, $username);
            $stmt_update->execute();
            $stmt_update->close();
        } else {
            $sql_delete = "DELETE FROM recipe_likes_dislikes WHERE recipe_id = ? AND username = ?";
            $stmt_delete = $conn->prepare($sql_delete);
            $stmt_delete->bind_param('is', $recipe_id, $username);
            $stmt_delete->execute();
            $stmt_delete->close();
        }
    } else {
        $sql_insert = "INSERT INTO recipe_likes_dislikes (recipe_id, username, type) VALUES (?, ?, ?)";
        $stmt_insert = $conn->prepare($sql_insert);
        $stmt_insert->bind_param('iss', $recipe_id, $username, $action);
        $stmt_insert->execute();
        $stmt_insert->close();
    }

    $sql_likes_dislikes = "SELECT type, COUNT(*) as count FROM recipe_likes_dislikes WHERE recipe_id = ? GROUP BY type";
    $stmt_likes_dislikes = $conn->prepare($sql_likes_dislikes);
    $stmt_likes_dislikes->bind_param('i', $recipe_id);
    $stmt_likes_dislikes->execute();
    $likes_dislikes_result = $stmt_likes_dislikes->get_result();
    $likes_count = 0;
    $dislikes_count = 0;

    while ($row = $likes_dislikes_result->fetch_assoc()) {
        if ($row['type'] === 'like') {
            $likes_count = $row['count'];
        } else if ($row['type'] === 'dislike') {
            $dislikes_count = $row['count'];
        }
    }
    $stmt_likes_dislikes->close();

    $conn->close();

    echo json_encode(['likes' => $likes_count, 'dislikes' => $dislikes_count]);
} else {
    echo json_encode(['error' => 'Invalid request']);
}
?>
