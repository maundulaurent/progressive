<?php
session_start();
require_once '../admin/includes/db.php'; // Include the database connection

// Get the project ID from the URL parameter
$projectId = isset($_GET['project_id']) ? intval($_GET['project_id']) : 0;

if ($projectId > 0) {
    // Fetch the project and its proposals
    $query = "SELECT title, proposals FROM requests WHERE id = ?";
    $stmt = $conn->prepare($query);
    
    // Check if the statement was prepared successfully
    if ($stmt === false) {
        die("Error preparing the query: " . $conn->error);
    }
    
    // Bind parameters and execute
    $stmt->bind_param("i", $projectId);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $project = $result->fetch_assoc();
        $proposalsArray = !empty($project['proposals']) ? explode(',', $project['proposals']) : [];
    } else {
        die("Project not found.");
    }
} else {
    // Handle error: No valid project ID
    die("Invalid project ID.");
}

// Handle approval (using POST method)
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['approve_user'])) {
    $approvedUser = $_POST['approve_user'];

    // Update status to "approved" and insert into approved_to
    $updateQuery = "UPDATE requests SET status = 'approved', approved_to = ? WHERE id = ?";
    $updateStmt = $conn->prepare($updateQuery);
    
    // Check if the statement was prepared successfully
    if ($updateStmt === false) {
        die("Error preparing the update query: " . $conn->error);
    }

    $updateStmt->bind_param("si", $approvedUser, $projectId);
    $updateStmt->execute();

    if ($updateStmt->affected_rows > 0) {
        echo "Seller approved successfully.";
    } else {
        echo "Failed to approve the seller.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0">
    <title>Manage Proposals - Jungle Quote</title>
    
    <?php include_once '../includes/icon.php'; ?>
    <?php include_once '../includes/links.php'; ?>

</head>        
<body class="dashboard-page">

    <!-- Main Wrapper -->
    <div class="main-wrapper">
                
        <!-- Start Navigation -->
        <!-- Header -->
        <?php include_once '../includes/header.php'; ?>
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
                            <h3>Manage Quotations - <?php echo htmlspecialchars($project['title']); ?></h3>
                        </div>                            
                        <!-- project list -->
                        <div class="my-projects">
                            
                            <!-- Proposals -->
                            <?php foreach ($proposalsArray as $seller) { ?>
                            <div class="freelancer-proposals proposal-ongoing">
                                <div class="project-proposals align-items-center freelancer">
                                    <div class="proposal-info">
                                        <div class="proposals-details">
                                            <h3 class="proposals-title"><?php echo htmlspecialchars($seller); ?></h3>
                                            <ul>
                                                <li>
                                                    <div class="proposal-client-price">
                                                        <h4 class="title-info">Client Price</h4>
                                                        <h3 class="client-price">$ - <span class="price-type">(Fixed)</span></h3>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="proposal-job-type">
                                                        <h4 class="title-info">Project Deadline</h4>
                                                        <h3>-</h3>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="proposal-img">
                                                        <div class="proposal-client d-flex align-items-center">
                                                            <img src="../assets/img/user/table-avatar-03.jpg" alt="Img" class="img-fluid me-2">
                                                            <div>
                                                                <h4><?php echo htmlspecialchars($seller); ?></h4>
                                                                <span>- <i class="fa-solid fa-star"></i> -</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="project-action text-center overview-action">
                                                        <form method="post" action="">
                                                            <input type="hidden" name="approve_user" value="<?php echo htmlspecialchars($seller); ?>">
                                                            <button type="submit" class="projects-btn">Approve seller</button>
                                                        </form>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                            <!-- /Proposals --> 
                        </div>
                        <!-- /project list -->
                            
                        <!-- /Overview -->
                        
                        <!-- Skills Required -->
                        <div class="skill-required">
                            <h4>Skills Required</h4>
                            <div class="pro-content">
                                <div class="tags">
                                    <span class="badge badge-pill badge-design">Web design</span>
                                    <span class="badge badge-pill badge-design">UI Design</span>
                                    <span class="badge badge-pill badge-design">React</span>
                                    <span class="badge badge-pill badge-design">Design Writing</span>
                                    <span class="badge badge-pill badge-design">Software Design</span>
                                    <span class="badge badge-pill badge-design">HTML5</span>
                                    <span class="badge badge-pill badge-design">Sketch</span>    
                                </div>
                            </div>
                        </div>
                        <!-- /Skills Required -->
                    
                    </div>                            
                </div>
            </div>
        </div>                
        <!-- /Page Content -->
   
        <!-- Footer -->    
        <?php include_once '../includes/footer.php'; ?>
        <!-- /Footer -->
       
    </div>
    <!-- /Main Wrapper -->
  
    <?php include_once '../includes/scripts.php'; ?>
    
</body>
</html>

<?php
// Close the statement and connection
$stmt->close();
$conn->close();
?>
