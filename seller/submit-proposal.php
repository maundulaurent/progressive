<?php
session_start();
require_once '../admin/includes/db.php'; // Include the database connection

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['project_id'])) {
    $projectId = intval($_POST['project_id']);
    $username = $_SESSION['username']; // Assuming username is stored in session

    // Check if user has already submitted a proposal
    $checkProposalQuery = "SELECT proposals FROM requests WHERE id = ?";
    $stmt = $conn->prepare($checkProposalQuery);
    $stmt->bind_param("i", $projectId);
    $stmt->execute();
    $result = $stmt->get_result();
    $request = $result->fetch_assoc();

    if ($request) {
        $proposals = $request['proposals'] ? explode(',', $request['proposals']) : [];

        if (in_array($username, $proposals)) {
            die('You have already submitted a proposal for this project.');
        }

        // Check if there are less than 5 proposals
        if (count($proposals) >= 5) {
            die('The maximum number of proposals for this project has been reached.');
        }

        // Add new proposal
        $proposals[] = $username;
        $updatedProposals = implode(',', $proposals);

        $updateQuery = "UPDATE requests SET proposals = ? WHERE id = ?";
        $stmt = $conn->prepare($updateQuery);
        $stmt->bind_param("si", $updatedProposals, $projectId);
        $stmt->execute();

        // Redirect or notify success
        header('Location: ../admin'); // Redirect to a success page or show a success message
    } else {
        die('Project not found');
    }
} else {
    die('Invalid request');
}
?>
