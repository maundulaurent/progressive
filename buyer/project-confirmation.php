<?php
session_start();
require_once '../admin/includes/db.php';

// Ensure the session data exists
if (!isset($_SESSION['quotation'])) {
    header('Location: post-quotation.php');
    exit();
}

$quotation = $_SESSION['quotation'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0">
    <title>Quotation Confirmation</title>
    
    <?php include_once '../includes/icon.php' ?>
    
    <!-- all links -->
    <?php include_once '../includes/links.php' ?>
</head>        
<body>

    <!-- Main Wrapper -->
    <div class="main-wrapper">
                
        <!-- Start Navigation -->
        <!-- Header -->
        <?php include_once '../includes/header.php' ?>
        <!-- /Header -->
        
        <!-- Breadcrumb -->
        <div class="bread-crumb-bar">
            <div class="container">
                <div class="row align-items-center inner-banner">
                    <div class="col-md-12 col-12 text-center">
                        <div class="breadcrumb-list">
                            <h3>Post a Project</h3>
                            <nav aria-label="breadcrumb" class="page-breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="../index">Home</a></li>
                                    <li class="breadcrumb-item" aria-current="page">Quotation Confirmation</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Breadcrumb -->
                        
        <!-- Page Content -->
        <div class="content">    
            <div class="container">
                <div class="row">        
                    <div class="col-md-12">        
                        <div class="select-project mb-4">        
                            <div class="title-box widget-box">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="projecthead">
                                            <h5><?= htmlspecialchars($quotation['title']) ?></h5>
                                            <ul>
                                                <li>
                                                    <a href="post-quotation.php"><i class="feather-edit me-2"></i>Edit this job</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <h4 class="detailshead">Details</h4>
                                    </div>
                                    <div class="col-lg-12 col-md-12">
                                        <div class="catergyset">
                                            <ul class="m-0">
                                                <li>
                                                    <h5>Industry : <span><?= htmlspecialchars($quotation['industry_id']) ?></span></h5>
                                                </li>
                                                <li>
                                                    <h5>Category : <span><?= htmlspecialchars($quotation['category_id']) ?></span></h5>
                                                </li>
                                                <li>
                                                    <h5>Deliver By : <span><?= htmlspecialchars($quotation['deadline']) ?></span></h5>
                                                </li>
                                                <li>
                                                    <h5>Tags : <span><?= htmlspecialchars($quotation['tags']) ?></span></h5>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 mt-4">
                                        <h4 class="detailshead">Items</h4>
                                    </div>
                                    <div class="col-lg-12 col-md-12">
                                        <div class="catergyset">
                                            <ul class="m-0">
                                                <?php if (isset($quotation['items']) && is_array($quotation['items'])): ?>
                                                    <?php foreach ($quotation['items'] as $index => $item): ?>
                                                        <li>
                                                            <h5><?= htmlspecialchars($item['name']) ?> : <span><?= htmlspecialchars($item['quantity']) ?> pcs - Kes <?= htmlspecialchars($item['budget']) ?></span></h5>
                                                        </li>
                                                    <?php endforeach; ?>
                                                <?php else: ?>
                                                    <li>No items found.</li>
                                                <?php endif; ?>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 mt-4">
                                        <h4 class="detailshead">Attachment</h4>
                                    </div>
                                    <div class="col-lg-12 col-md-12">
                                        <div class="catergyset">
                                            <ul class="m-0">
                                                <li>
                                                    <h5><a href="<?= htmlspecialchars($quotation['written_quote']) ?>" target="_blank">View Attached File</a></h5>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 mt-4">
                                        <h4 class="detailshead">Other Details</h4>
                                    </div>
                                    <div class="col-lg-12 col-md-12">
                                        <div class="catergyset">
                                            <ul class="m-0">
                                                <li>
                                                    <h5>County : <span><?= htmlspecialchars($quotation['county']) ?></span></h5>
                                                </li>
                                                <li>
                                                    <h5>Town : <span><?= htmlspecialchars($quotation['town']) ?></span></h5>
                                                </li>
                                                <li>
                                                    <h5>Delivery Location : <span><?= htmlspecialchars($quotation['delivery_location']) ?></span></h5>
                                                </li>
                                                <li>
                                                    <h5>Preferred Delivery Day : <span><?= htmlspecialchars($quotation['preferred_delivery_day']) ?></span></h5>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 mt-4">
                                        <h4 class="detailshead">Description</h4>
                                    </div>
                                    <div class="col-lg-12 col-md-12">
                                        <div class="category-para">
                                            <p><?= nl2br(htmlspecialchars($quotation['description'])) ?></p>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="projecthead">
                                            <ul>
                                                <li>
                                                    <form action="submit-quotation.php" method="POST">
                                                        <button type="submit" class="btn btn-primary">Post Quotation</button>
                                                    </form>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
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
    <div class="modal fade" id="post-sucess" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="scuess-popup">
                        <img src="../assets/img/icon/check1.svg">
                        <h4>Project Posted Successfully</h4>
                        <h5>You can now access your project on your dashboard</h5>
                        <a href="../index"><i class="feather-arrow-left me-2"></i>Back to Dashboard</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Main Wrapper -->
  
    <?php include_once '../includes/scripts.php' ?>
    
</body>
</html>
