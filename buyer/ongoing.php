<?php
session_start();

require_once '../admin/includes/db.php'; // Include the database connection

// Get logged-in username
$username = $_SESSION['username'];

// Fetch user projects with industry and category
$sql = "
    SELECT r.id, r.title, r.town, r.county, r.proposals, i.name AS industry_name, c.name AS category_name
    FROM requests r
    JOIN industry i ON r.industry_id = i.id
    JOIN category c ON r.category_id = c.id
    WHERE FIND_IN_SET(?, r.project_by)
";
$stmt = $conn->prepare($sql);  // Use $conn instead of $mysqli
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0">
        <title>quotation</title>
        
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
            <div class="content content-page">
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
                                <div class="settings-menu">
                                    <div id="sidebar-menu" class="sidebar-menu">
                                        <ul>
                                            <!-- Sidebar Menu Items Here -->
                                        </ul>
                                    </div>
                                </div>
                            </div>                    
                        </div>
                        <!-- /sidebar -->
                        
                        <div class="col-xl-9 col-lg-8">
                            <div class="page-title">
                                <h3>My Quotations</h3>
                            </div>
                                                        
                            <!-- project list -->
                            <div class="my-projects-list ongoing-projects">
                                <?php while ($row = $result->fetch_assoc()) { 
                                    // Counting the number of proposals
                                    if (!empty($row['proposals'])) {
										$proposalsArray = explode(',', $row['proposals']);
										$proposalCount = count($proposalsArray);
									} else {
										$proposalCount = 0;
									}

                                    // Location
                                    $location = $row['town'] . ', ' . $row['county'];
                                ?>
                                <div class="row">
                                    <div class="col-xl-9 flex-wrap">
                                        <div class="freelancer-proposals proposal-ongoing mb-0">
                                            <div class="project-proposals align-items-center freelancer">
                                                <div class="proposal-info">
                                                    <div class="proposals-details">
                                                        <span class="tech-name-badge"><?php echo htmlspecialchars($username); ?></span>
                                                        <div class="d-flex justify-content-between align-items-start">
                                                            <div class="employee-project-card">

                                                                <h3 class="proposals-title"><?php echo htmlspecialchars($row['title']); ?></h3>
                                                                <ul>
                                                                    <li>
                                                                        <div class="proposal-job-type">
                                                                            <h4 class="title-info">Industry</h4>
                                                                            <h3><?php echo htmlspecialchars($row['industry_name']); ?></h3>
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <div class="proposal-job-type">
                                                                            <h4 class="title-info">Category</h4>
                                                                            <h3><?php echo htmlspecialchars($row['category_name']); ?></h3>
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <div class="proposal-job-type">
                                                                            <h4 class="title-info">Location</h4>
                                                                            <h3 class="flag-icon"><?php echo htmlspecialchars($location); ?></h3>
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <div class="proposal-job-type">
                                                                            <h4 class="title-info">Proposals</h4>
                                                                            <h3><?php echo $proposalCount; ?></h3>
                                                                        </div>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                            <ul class="employee-project">
                                                                <li>
                                                                    <div class="project-action text-center">
                                                                        <a href="proposals" class="projects-btn">View Proposal</a>
                                                                        <a href="javascript:void(0);" class="projects-btn completed-btn"><i class="fa fa-award me-2"></i>Completed</a>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 d-flex flex-wrap">
                                        <div class="projects-card flex-fill">
                                            <div class="card-body p-2">
                                                <div class="prj-proposal-count text-center hired">
                                                    <h2><?php echo $proposalCount; ?></h2>
                                                    <h3 class="mb-0">Proposal(s)</h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                            <!-- /project list -->

                            <!-- Pagination -->
                            <div class="row">
                                <div class="col-md-12">
                                    <ul class="paginations list-pagination">
                                        <li class="page-item"><a href="javascript:void(0);"><i class="feather-chevron-left"></i></a>
                                        </li>
                                        <li class="page-item"><a href="javascript:void(0);" class="active">1</a></li>
                                        <li class="page-item"><a href="javascript:void(0);">2</a></li>
                                        <li class="page-item"><a href="javascript:void(0);">3</a></li>
                                        <li class="page-item"><a href="javascript:void(0);">...</a></li>
                                        <li class="page-item"><a href="javascript:void(0);">10</a></li>
                                        <li class="page-item"><a href="javascript:void(0);"><i class="feather-chevron-right"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- /Pagination -->

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
      
        <?php include_once '../includes/scripts.php' ?>
        
    </body>
</html>

<?php
// Close connection
$conn->close();
?>
