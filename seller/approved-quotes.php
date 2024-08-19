<?php
session_start();
require_once '../admin/includes/db.php'; // Include the database connection

// Get the logged-in username
$username = $_SESSION['username'];

// Fetch approved requests for the logged-in user
$sql = "SELECT id, title, budget, date, deadline, status FROM requests WHERE approved_to = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0">
    <title>KofeJob</title>
    
    <?php include_once '../includes/icon.php' ?>
    <?php include_once '../includes/links.php' ?>
</head>
<body class="dashboard-page">

    <!-- Main Wrapper -->
    <div class="main-wrapper">
        
        <!-- Start Navigation -->
        <!-- Header -->
        <?php include_once '../includes/header.php' ?>
        <!-- /Header -->
        
        <!-- Page Content -->
        <div class="content">
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
                        <div class="page-title">
                            <h3>Approved Quotations</h3>
                        </div>
                        
                        <!-- project list -->
                        <div class="my-projects-view">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="title-head d-flex justify-content-between align-items-center mb-4">
                                        <h4 class="mb-0">Quotations</h4>
                                    </div>
                                    
                                    <div class="table-responsive table-box manage-projects-table">
                                        <table class="table table-center table-hover datatable no-sort">
                                            <thead class="thead-pink">
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Budget</th>
                                                    <th>Start date</th>
                                                    <th>Due date</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php while ($row = $result->fetch_assoc()) { ?>
												<tr data-request-id="<?php echo $row['id']; ?>">
                                                    <td><?php echo htmlspecialchars($row['title']); ?></td>
                                                    <td>$<?php echo number_format($row['budget'], 2); ?></td>
                                                    <td><?php echo htmlspecialchars($row['date']); ?></td>
                                                    <td><?php echo htmlspecialchars($row['deadline']); ?></td>
                                                    <td>
                                                        <span class="badge badge-pill <?php echo $row['status'] === 'delivered' ? 'bg-success-light' : 'bg-danger-light'; ?>">
                                                            <?php echo ucfirst($row['status']); ?>
                                                        </span>
                                                    </td>
                                                    <td>
                                                        <?php if ($row['status'] !== 'delivered') { ?>
                                                        <div class="action-table-data">
                                                            <a href="#view-milestone" data-bs-toggle="modal" class="view-icon me-2" data-request-id="<?php echo $row['id']; ?>"><i class="feather-eye me-1"></i>deliver</a>
                                                        </div>
                                                        <?php } ?>
                                                    </td>
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- project list -->
                    
                    </div>                                
                </div>
            </div>
        </div>                
        <!-- /Page Content -->
   
        <!-- Footer -->    
        <?php include_once '../includes/footer.php' ?>
        <!-- /Footer -->

        <!-- The Modal -->
        <div class="modal fade edit-proposal-modal" id="view-milestone">
            <div class="modal-dialog modal-dialog-centered modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Confirm Delivery</h4>
                        <span class="modal-close"><a href="javascript:void(0);" data-bs-dismiss="modal" aria-label="Close"><i class="feather-x"></i></a></span>
                    </div>
                    <div class="modal-body">        
                        <ul class="download-item">
                            <li>
                                <a href="javascript:void(0);">Confirm that you have delivered</a>
                            </li>
                        </ul>
                        <div class="text-end">
                            <button id="confirm-delivery-btn" class="btn btn-primary">Deliver</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /The Modal -->
    </div>
    <!-- /Main Wrapper -->
  
    <?php include_once '../includes/scripts.php' ?>

    <script>
        // JavaScript to handle delivery confirmation
        document.addEventListener('DOMContentLoaded', function () {
    var requestId;

    // Capture the request ID when the "deliver" link is clicked
    document.querySelectorAll('[data-request-id]').forEach(function (element) {
        element.addEventListener('click', function () {
            requestId = this.getAttribute('data-request-id');
        });
    });

    // Handle the delivery confirmation
    document.getElementById('confirm-delivery-btn').addEventListener('click', function () {
        if (requestId) {
            // Make an AJAX request to update the status to "delivered"
            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'update_status.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    // Update the status text in the table
                    var row = document.querySelector('tr[data-request-id="' + requestId + '"]');
                    if (row) {
                        var badge = row.querySelector('.badge');
                        if (badge) {
                            badge.classList.remove('bg-danger-light');
                            badge.classList.add('bg-success-light');
                            badge.textContent = 'Delivered';
                        }
                    }
                    // Close the modal
                    var modal = bootstrap.Modal.getInstance(document.getElementById('view-milestone'));
                    modal.hide();
                }
            };
            xhr.send('id=' + requestId + '&status=delivered');
        }
    });
});

    </script>
</body>
</html>

<?php
// Close the connection
$stmt->close();
$conn->close();
?>
