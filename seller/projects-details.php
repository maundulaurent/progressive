<?php
session_start();
require_once '../admin/includes/db.php'; // Include the database connection

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $projectId = intval($_POST['id']);
    // Fetch project details from the database using $projectId
    $query = "SELECT r.id, r.title, r.description, r.date, r.delivery_location, i.name AS industry_name, c.name AS category_name
              FROM requests r
              JOIN industry i ON r.industry_id = i.id
              JOIN category c ON r.category_id = c.id
              WHERE r.id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $projectId);
    $stmt->execute();
    $result = $stmt->get_result();
    $project = $result->fetch_assoc();

    // Check if project was found
    if (!$project) {
        die('Project not found');
    }

    // Proceed with displaying the project details
} else {
    die('No project ID specified');
}
?>


<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0">
		<title>Jungle Quote</title>
		
		<?php include_once '../includes/icon.php' ?>
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
								<h2>Project Details</h2>
								<nav aria-label="breadcrumb" class="page-breadcrumb">
									<ol class="breadcrumb">
										<li class="breadcrumb-item"><a href="index.html">Home</a></li>
										<li class="breadcrumb-item" aria-current="page">Project Details</li>
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
							<div class="col-lg-8 col-md-12">
								<div class="company-detail-block pt-0">
									<div class="company-detail">
										<div class="company-detail-image">
											<img src="../assets/img/default-logo.svg" class="img-fluid" alt="logo">
										</div>
										<div class="company-title">
											<p><?= htmlspecialchars($project['industry_name']); ?></p>
											<h4><?= htmlspecialchars($project['title']); ?></h4>
										</div>
									</div>
									<div class="company-address">
										<ul>
											<li><i class="feather-map-pin"></i><?= htmlspecialchars($project['delivery_location']); ?></li>
											<li><i class="feather-calendar"></i><?= htmlspecialchars(date('d/m/Y', strtotime($project['date']))); ?></li>
											<li><i class="feather-file-2"></i><?= htmlspecialchars($project['category_name']); ?></li>
										</ul>
									</div>
									<div class="company-description">
										<p><?= nl2br(htmlspecialchars($project['description'])); ?></p>
									</div>
									<!-- Additional project details can be added here -->
								</div>
							</div>
							<div class="col-lg-4 col-md-12">
								<div class="contact-form">
									<h3>Submit Proposal</h3>
									<form action="submit-proposal.php" method="POST">
										<!-- Include project ID in the form -->
										<input type="hidden" name="project_id" value="<?= htmlspecialchars($project['id']); ?>">
										<!-- Form fields go here -->
										<textarea name="proposal" placeholder="Write your proposal here" ></textarea>
										<button type="submit" class="btn btn-primary">Submit Proposal</button>
									</form>
								</div>
							</div>
						</div>
					</div>
			</div>		
			<!-- /Page Content -->
   
			<!-- Footer -->	
			<?php include_once '../includes/footer.php' ?>;
			<!-- /Footer -->
		   
		</div>
		<!-- /Main Wrapper -->
		
		<!-- The Modal -->
		<div class="modal fade custom-modal" id="hire">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content bg-modal">
					<div class="modal-header">
						<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">×</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="text-center pt-0 mb-4">
							<img src="../assets/img/logo-01.png" alt="logo" class="img-fluid mb-1">
							<h5 class="modal-title">Discuss your project with David</h5>
						</div>
						<form action="dashboard.html">
							<div class="modal-info">
								<div class="row">
									<div class="col-12 col-md-12">
										<div class="input-block">
											<input type="text" name="name" class="form-control" placeholder="First name & Lastname">
										</div> 
										<div class="input-block">
											<input type="email" name="name" class="form-control" placeholder="Email Address">
										</div> 
										<div class="input-block">
											<input type="text" name="name" class="form-control" placeholder="Phone Number">
										</div> 
										<div class="input-block">
											<textarea class="form-control" name="message" rows="5" placeholder="Message"></textarea>
										</div> 
										<div class="input-block row">
											<div class="col-12 col-md-4 pr-0">
												<label class="file-upload">
													Add Attachment <input type="file">
												</label>
											</div>											
											<div class="col-12 col-md-8">
												<p class="mb-1">Allowed file types: zip, pdf, png, jpg</p>
												<p>Max file size: 50 MB</p>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="submit-section text-center">
								<button type="submit" class="btn btn-primary btn-block submit-btn">Hire Now</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<!-- /The Modal -->
		
		<!-- The Modal -->
		<div class="modal fade" id="file">
			<div class="modal-dialog modal-dialog-centered modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">Send Your Proposal</h4>
						<span class="modal-close"><a href="javascript:void(0);" data-bs-dismiss="modal" aria-label="Close"><i class="fa fa-times orange-text"></i></a></span>
					</div>
					<div class="modal-body">	
						<div class="modal-info proposal-modal-info">
							<form action="freelancer-project-proposals.html">
								<div class="feedback-form proposal-form ">
									<div class="row">
										<div class="col-md-6 input-block">
											<label class="form-label">Your Price</label>
											<input type="text" class="form-control" placeholder="Your Price">
										</div>
										<div class="col-md-6 mb-3">
											<label class="form-label">Estimated Delivery</label>
											<div class="input-group ">
												<input type="text" class="form-control" placeholder="Estimated Hours" aria-label="Recipient's username" aria-describedby="basic-addon2">
												<span class="input-group-text" id="basic-addon2">Days</span>
											  </div>
										</div>
										
										<div class="col-md-12 input-block">
											<label class="form-label">Cover Letter</label>
											<textarea class="form-control summernote"></textarea>
										</div>
									</div>
								</div>
								<div class="suggested-milestones-form">
									<div class="row">
										<div class="col-md-4 input-block">
											<label class="form-label">Milestone name</label>
											<input type="text" class="form-control" placeholder="Milestone name">
										</div>
										<div class="col-md-2 input-block floating-icon">
											<label class="form-label">Amount</label>
											<input type="text" class="form-control" placeholder="Amount">
											<span><i class="feather-dollar-sign"></i></span>
										</div>
										<div class="col-md-3 input-block floating-icon">
											<label class="form-label">Start Date</label>
											<input type="text" class="form-control datetimepicker" placeholder="Choose">
											<span><i class="feather-calendar"></i></span>
										</div>
										<div class="col-md-3 input-block floating-icon">
											<label class="form-label">End Date</label>
											<input type="text" class="form-control datetimepicker" placeholder="Choose">
											<span><i class="feather-calendar"></i></span>
										</div>
										<div class="col-md-12">
											<div class="new-addd">
												<a  id="new_add1" class="add-new"><i class="feather-plus-circle "></i> Add New</a>
											</div>
										</div>
									</div>
									<div id="add_row1"></div>
								</div>
								<div class="proposal-features">
									<div class="proposal-widget proposal-warning">
										<label class="custom_check">
											<input type="checkbox" name="select_time" checked><span class="checkmark"></span>
											<span class="proposal-text">Stick this Proposal to the Top</span>
											<span class="proposal-text float-end">$12.00</span>
										</label>
										<p>The sticky proposal will always be displayed on top of all the proposals.</p>
									</div>
									<div class="proposal-widget proposal-blue">
										<label class="custom_check">
											<input type="checkbox" name="select_time"><span class="checkmark"></span>
											<span class="proposal-text">Stick this Proposal to the Top</span>
											<span class="proposal-text float-end">$12.00</span>
										</label>
										<p>The sticky proposal will always be displayed on top of all the proposals.</p>
									</div>
									
								</div>
								<div class="row">
									<div class="col-md-12 submit-section">
										<label class="custom_check">
											<input type="checkbox" name="select_time">
											<span class="checkmark"></span> I agree to the Terms And Conditions
										</label>
									</div>
									<div class="col-md-12 submit-section text-end">
										<a data-bs-dismiss="modal" href="javascript:void(0);" class="btn btn-cancel submit-btn">Cancel</a>
										<a data-bs-toggle="modal" data-bs-dismiss="modal" href="#success" class="btn btn-primary submit-btn">Send Proposal</a>
									</div>
								</div>											
							</form>		
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- /The Modal -->
	  
		<!-- The Modal -->
		<div class="modal fade custom-modal" id="success">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content proposal-modal-info">
					<div class="modal-header">
						<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">×</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="text-center modal-body-content pt-0">
							<h5 class="modal-title">Submitted Successfully</h5>
							<p>You will be Notified once, your Proposal approves.</p>
						</div>
						<div class="col-md-12 submit-section text-center">
							<a data-bs-dismiss="modal" href="freelancer-dashboard.html"  class="btn btn-primary submit-btn">Go to Dashboard</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- /The Modal -->
		<?php include_once '../includes/scripts.php' ?>
		
	</body>
</html>