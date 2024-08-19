<?php
session_start();
include_once '../admin/includes/db.php'; // Include your database connection file

// Fetch the logged-in user
$loggedInUser = $_SESSION['username'];

// Fetch requests with project_by as the logged-in user and status as 'delivered'
$sql = "SELECT id, title FROM requests WHERE project_by = ? AND status = 'delivered'";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $loggedInUser);
$stmt->execute();
$result = $stmt->get_result();
$requests = $result->fetch_all(MYSQLI_ASSOC);
$stmt->close();

// Handle form submission for confirming delivery
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $requestId = $_POST['request_id'];
    $status = $_POST['delivery_status'];

    if ($status == '1') {
        $stmt = $conn->prepare("UPDATE requests SET status = 'confirmed_delivered' WHERE id = ?");
        $stmt->bind_param("i", $requestId);
        $stmt->execute();
        $stmt->close();
        
        echo '<script>
            alert("Verification Submitted Successfully");
            window.location.href = "confirm-delivery.php"; // Redirect back to the same page or another page
        </script>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0">
    <title>JungleQuote | Confirm Delivery</title>
    
    <?php include_once '../includes/icon.php' ?>
    <?php include_once '../includes/links.php' ?>
    <!-- Include Bootstrap CSS for modal -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="dashboard-page">

<!-- Main Wrapper -->
<div class="main-wrapper">

    <!-- Start Navigation -->
    <!-- Header -->
    <?php include_once '../includes/header.php' ?>
    <!-- /Header -->

    <!-- Page Content -->
    <div class="content content-page bookmark">                    
        <div class="container">                    
            <div class="row">
                
                <!-- sidebar -->
                <div class="col-xl-3 col-lg-4 theiaStickySidebar">
                    <div class="settings-widget">
                        <div class="settings-header d-sm-flex flex-row flex-wrap text-center text-sm-start align-items-center">
                            <a href="freelancer-profile.html"><img alt="profile image" src="../assets/img/user/table-avatar-03.jpg" class="avatar-lg rounded-circle"></a>
                            <div class="ms-sm-3 ms-md-0 ms-lg-3 mt-2 mt-sm-0 mt-md-2 mt-lg-0">
                                <h3 class="mb-0"><a href="profile-settings.html">Walter Griffin</a><img src="../assets/img/icon/verified-badge.svg" class="ms-1" alt="Img"></h3>
                                <p class="mb-0">@waltergriffin</p>
                            </div>
                        </div>
                    </div>                    
                </div>
                <!-- /sidebar -->
                
                <div class="col-xl-9 col-lg-8">
                    <div class="dashboard-sec payout-section freelancer-statements">
                        <div class="page-title portfolio-title">
                            <h3 class="mb-0">Delivery Verification</h3>
                        </div>
                        <div class="row">
                            <?php if (!empty($requests)): ?>
                                <?php foreach ($requests as $request): ?>
                                    <div class="col-lg-12 mb-3">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h5><?php echo htmlspecialchars($request['title']); ?></h5>
                                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#confirmModal" data-request-id="<?php echo htmlspecialchars($request['id']); ?>">Confirm Delivery</button>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <p>No requests available for delivery confirmation.</p>
                            <?php endif; ?>
                        </div>
                    </div>                                
                </div>
            </div>
        </div>
    </div>    
    <!-- /Page Content -->

    <!-- Footer -->    
    <?php include_once '../includes/footer.php' ?>
    <!-- /Footer -->
</div>
<!-- /Main Wrapper -->

<!-- The Modal -->
<div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmModalLabel">Confirm Delivery</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="confirm-delivery.php" method="POST">
                    <input type="hidden" id="request_id" name="request_id">
                    <label for="delivery_status" class="form-label">Have the items been delivered?</label>
                    <select name="delivery_status" class="form-control select" required>
                        <option value="0">Select</option>
                        <option value="1">Yes</option>
                        <option value="2">No</option>
                    </select>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Submit Verification</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include_once '../includes/scripts.php' ?>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var confirmModal = document.getElementById('confirmModal');
        confirmModal.addEventListener('show.bs.modal', function (event) {
            var button = event.relatedTarget;
            var requestId = button.getAttribute('data-request-id');
            var modalInput = confirmModal.querySelector('#request_id');
            modalInput.value = requestId;
        });
    });
</script>
</body>
</html>
