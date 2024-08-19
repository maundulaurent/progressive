<?php
session_start(); // Start session at the beginning

include_once 'includes/db.php'; // Include your database connection file

// Fetch the logged-in user
if (!isset($_SESSION['username'])) {
    // Redirect to login or handle unauthorized access
    header("Location: login.php");
    exit();
}

$loggedInUser = $_SESSION['username'];

// Fetch requests with status 'confirmed_delivered'
$sql = "SELECT id, title FROM requests WHERE project_by = ? AND status = 'confirmed_delivered'";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $loggedInUser);
$stmt->execute();
$result = $stmt->get_result();
$requests = $result->fetch_all(MYSQLI_ASSOC);
$stmt->close();

// Handle form submission for completing the project
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $requestId = $_POST['request_id'];

    // Validate requestId to prevent SQL injection or invalid input
    if (!filter_var($requestId, FILTER_VALIDATE_INT)) {
        echo '<script>
            alert("Invalid request ID");
            window.location.href = "complete-request.php"; // Refresh the page
        </script>';
        exit();
    }

    // Update the status to 'completed'
    $stmt = $conn->prepare("UPDATE requests SET status = 'completed' WHERE id = ?");
    $stmt->bind_param("i", $requestId);
    $stmt->execute();
    $stmt->close();
    
    echo '<script>
        alert("Project marked as completed successfully");
        window.location.href = "complete-request.php"; // Refresh the page
    </script>';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>JungleQuote | Complete Project</title>
    
    <?php include_once 'includes/icon.php' ?>
    <?php include_once 'includes/links.php' ?>
    
</head>
<body>
<!-- Main Wrapper -->
<div class="main-wrapper">
    <!-- Header -->
    <?php include_once 'includes/header.php' ?>
    <!-- /Header -->
    
    <!-- Sidebar -->
    <?php include_once 'includes/sidebar.php' ?>
    <!-- /Sidebar -->
    
    <!-- Page Wrapper -->
    <div class="page-wrapper">
        <div class="content container-fluid">
            <!-- Page Header -->
            <div class="page-header subscribe-head">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">Complete Project</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index">Home</a></li>
                            <li class="breadcrumb-item active">Complete Project</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->

            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-center table-hover mb-0 datatable">
                                    <thead>
                                        <tr>
                                            <th>
                                                <div class="form-check custom-checkbox">
                                                    <input type="checkbox" class="form-check-input" id="select-all">
                                                    <label class="form-check-label" for="customCheck1"></label>
                                                </div>
                                            </th>
                                            <th>Project Name</th>
                                            <th>Status</th>
                                            <th class="text-end">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (!empty($requests)): ?>
                                            <?php foreach ($requests as $request): ?>
                                                <tr>
                                                    <td>
                                                        <div class="form-check custom-checkbox">
                                                            <input type="checkbox" class="form-check-input" id="customCheck<?php echo $request['id']; ?>">
                                                            <label class="form-check-label" for="customCheck<?php echo $request['id']; ?>"></label>
                                                        </div>
                                                    </td>
                                                    <td><a href="javascript:void(0);"><?php echo htmlspecialchars($request['title']); ?></a></td>
                                                    <td><a href="javascript:void(0);">Confirmed Delivered</a></td>
                                                    <td class="text-end">
                                                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#completeModal" data-request-id="<?php echo htmlspecialchars($request['id']); ?>">Confirm Complete</button>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <tr>
                                                <td colspan="4">No requests available for completion.</td>
                                            </tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>            
            </div>
        </div>            
    </div>
    <!-- /Page Wrapper -->
</div>
<!-- /Main Wrapper -->

<!-- Completion Confirmation Modal -->
<div class="modal fade" id="completeModal" tabindex="-1" aria-labelledby="completeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="completeModalLabel">Confirm Completion</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="complete-request.php" method="POST">
                    <input type="hidden" id="request_id" name="request_id">
                    <p>Are you sure you want to mark this project as completed?</p>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Confirm Completion</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- jQuery -->
<script src="assets/js/jquery-3.7.1.min.js"></script>

<!-- Bootstrap Core JS -->
<script src="assets/js/bootstrap.bundle.min.js"></script>

<!-- Feather Icon JS -->
<script src="assets/js/feather.min.js"></script>

<!-- Slimscroll JS -->
<script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<!-- Select2 JS -->
<script src="assets/plugins/select2/js/select2.min.js"></script>

<!-- Datepicker Core JS -->
<script src="assets/plugins/moment/moment.min.js"></script>
<script src="assets/js/bootstrap-datetimepicker.min.js"></script>

<!-- Datatables JS -->
<script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="assets/plugins/datatables/datatables.min.js"></script>

<!-- Custom JS -->
<script src="assets/js/script.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var completeModal = document.getElementById('completeModal');
        completeModal.addEventListener('show.bs.modal', function (event) {
            var button = event.relatedTarget;
            var requestId = button.getAttribute('data-request-id');
            var modalInput = completeModal.querySelector('#request_id');
            modalInput.value = requestId;
        });
    });
</script>
</body>
</html>
