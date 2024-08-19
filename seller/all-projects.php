<?php
session_start();
require_once '../admin/includes/db.php'; // Include the database connection

// Fetch the project requests from the database
$query = "SELECT r.id, r.title, r.description, r.date, r.delivery_location, r.written_quote, r.items, r.budget, i.name AS industry_name, c.name AS category_name
          FROM requests r
          JOIN industry i ON r.industry_id = i.id
          JOIN category c ON r.category_id = c.id
          ORDER BY r.date DESC, r.time DESC";

$result = $conn->query($query);

// Check if the query was successful
if ($result === false) {
    die('Database query failed: ' . $conn->error);
}

if ($result->num_rows > 0) {
    $projects = $result->fetch_all(MYSQLI_ASSOC);
} else {
    $projects = [];
}
?>




<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0">
		<title>Jungle Quote</title>
		
		<?php include_once '../includes/icon.php' ?>;
		<?php include_once '../includes/links.php' ?>;
	</head>		
	<body>

		<!-- Main Wrapper -->
		<div class="main-wrapper">
		
			<!-- Start Navigation -->
			<!-- Header -->
			<?php include_once '../includes/header.php' ?>;
			<!-- /Header -->

			<!-- Breadcrumb -->
			<div class="bread-crumb-bar">
				<div class="container">
					<div class="row align-items-center inner-banner">
						<div class="col-md-12 col-12 text-center">
							<div class="breadcrumb-list">
								<h2>Quotations List</h2>
								<nav aria-label="breadcrumb" class="page-breadcrumb">
									<ol class="breadcrumb">
										<li class="breadcrumb-item"><a href="">Home</a></li>
										<li class="breadcrumb-item" aria-current="page">All Projects</li>
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
						<div class="col-md-12 col-lg-4 col-xl-3 theiaStickySidebar">
						
							<!-- Search Filter -->
							<!-- Search Filter -->
							<div class="card search-filter">
								<div class="card-header d-flex justify-content-between">
									<h4 class="card-title mb-0">Search Filter</h4>
								</div>
								<div class="card-body">
									<div class="filter-widget">
										<h4 class="filter-title">
											<a href="javascript:void(0);" class="w-100" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
												Category	
												<span class="float-end"><i class="fa-solid fa-chevron-down"></i></span>
											</a> 
										</h4>
										<div id="collapseOne" class="collapse show"  data-bs-parent="#accordionExample1" >
											<div>
												<label class="custom_check">
													<input type="checkbox" name="select_time" >
													<span class="checkmark"></span> Developer (25) 
												</label>
											</div>
											<div>
												<label class="custom_check">
													<input type="checkbox" name="select_time">
													<span class="checkmark"></span> UI Developer (62)
												</label>
											</div>
											<div>
												<label class="custom_check">
													<input type="checkbox" name="select_time">
													<span class="checkmark"></span>  React Developer (46)
												</label>
											</div>
											<div>
												<label class="custom_check">
													<input type="checkbox" name="select_time">
													<span class="checkmark"></span>  .Net Developer (37)
												</label>
											</div>
											<div id="collapseOnes" class="collapse"  data-bs-parent="#accordionExample1" >
												<div>
													<label class="custom_check">
														<input type="checkbox" name="select_time">
														<span class="checkmark"></span> UI Developer (62)
													</label>
												</div>
												<div>
													<label class="custom_check">
														<input type="checkbox" name="select_time">
														<span class="checkmark"></span>  React Developer (46)
													</label>
												</div>
												<div>
													<label class="custom_check">
														<input type="checkbox" name="select_time">
														<span class="checkmark"></span>  .Net Developer (37)
													</label>
												</div>
											</div>
											<div class="showmore mt-2">
												<a href="javascript:void(0);"  data-bs-toggle="collapse" data-bs-target="#collapseOnes" aria-expanded="true" aria-controls="collapseOne"><i class="feather-plus me-1"></i>Show More</a>
											</div>
										</div>
									</div>
									<div class="filter-widget">
										<h4 class="filter-title">
											<a href="javascript:void(0);" class="w-100" data-bs-toggle="collapse" data-bs-target="#collapsproject" aria-expanded="true" aria-controls="collapseOne">
												Project Type	
												<span class="float-end"><i class="fa-solid fa-chevron-down"></i></span>
											</a> 
										</h4>
										<div id="collapsproject" class="collapse show"  data-bs-parent="#accordionExample1" >
											<div>
												<label class="custom_check">
													<input type="checkbox" name="select_time" >
													<span class="checkmark"></span>Fixed (6) 
												</label>
											</div>
											<div>
												<label class="custom_check">
													<input type="checkbox" name="select_time">
													<span class="checkmark"></span>Hourly (7)
												</label>
											</div>
										</div>
									</div>
									<div class="filter-widget">
										<h4 class="filter-title">
											<a href="javascript:void(0);" class="w-100" data-bs-toggle="collapse" data-bs-target="#collapseOne1" aria-expanded="true" aria-controls="collapseOne">
												Project Duration	
												<span class="float-end"><i class="fa-solid fa-chevron-down"></i></span>
											</a> 
										</h4>
										<div id="collapseOne1" class="collapse show"  data-bs-parent="#accordionExample1" >
											<div>
												<label class="custom_check">
													<input type="checkbox" name="select_time" >
													<span class="checkmark"></span> 1-3 Weeks (4)
												</label>
											</div>
											<div>
												<label class="custom_check">
													<input type="checkbox" name="select_time">
													<span class="checkmark"></span> 1 Month (2)
												</label>
											</div>
											<div>
												<label class="custom_check">
													<input type="checkbox" name="select_time">
													<span class="checkmark"></span>  Less than 3 Months (2)
												</label>
											</div>
											
											
										</div>
									</div>
									<div class="filter-widget">
										<h4 class="filter-title">
											<a href="javascript:void(0);" class="w-100" data-bs-toggle="collapse" data-bs-target="#collapseskills" aria-expanded="true" aria-controls="collapseOne">
												Skills	
												<span class="float-end"><i class="fa-solid fa-chevron-down"></i></span>
											</a> 
										</h4>
										<div id="collapseskills" class="collapse show"  data-bs-parent="#accordionExample1" >
											<div>
												<label class="custom_check">
													<input type="checkbox" name="select_time" >
													<span class="checkmark"></span> After Effects (6)
												</label>
											</div>
											<div>
												<label class="custom_check">
													<input type="checkbox" name="select_time">
													<span class="checkmark"></span> Android Developer (7)	
												</label>
											</div>
											<div>
												<label class="custom_check">
													<input type="checkbox" name="select_time">
													<span class="checkmark"></span> Backend Developer (7)
												</label>
											</div>
											<div>
												<label class="custom_check">
													<input type="checkbox" name="select_time">
													<span class="checkmark"></span> Computer Operator (1)
												</label>
											</div>
											<div id="collapseOnes1" class="collapse"  data-bs-parent="#accordionExample1" >
												<div>
													<label class="custom_check">
														<input type="checkbox" name="select_time" >
														<span class="checkmark"></span> After Effects (6)
													</label>
												</div>
												<div>
													<label class="custom_check">
														<input type="checkbox" name="select_time">
														<span class="checkmark"></span> Android Developer (7)	
													</label>
												</div>
												<div>
													<label class="custom_check">
														<input type="checkbox" name="select_time">
														<span class="checkmark"></span> Backend Developer (7)
													</label>
												</div>
												<div>
													<label class="custom_check">
														<input type="checkbox" name="select_time">
														<span class="checkmark"></span> Computer Operator (1)
													</label>
												</div>
											</div>
											<div class="showmore mt-2">
												<a href="javascript:void(0);"  data-bs-toggle="collapse" data-bs-target="#collapseOnes1" aria-expanded="true" aria-controls="collapseOne"><i class="feather-plus me-1"></i>Show More</a>
											</div>
										</div>
									</div>
									<div class="filter-widget">
										<h4 class="filter-title">
											<a href="javascript:void(0);" class="w-100" data-bs-toggle="collapse" data-bs-target="#collapselanguage" aria-expanded="true" aria-controls="collapseOne">
												Languages	
												<span class="float-end"><i class="fa-solid fa-chevron-down"></i></span>
											</a> 
										</h4>
										<div id="collapselanguage" class="collapse show"  data-bs-parent="#accordionExample1" >
											<div>
												<label class="custom_check">
													<input type="checkbox" name="select_time" >
													<span class="checkmark"></span> English (5)
												</label>
											</div>
											<div>
												<label class="custom_check">
													<input type="checkbox" name="select_time">
													<span class="checkmark"></span> Arabic (2)
												</label>
											</div>
											<div>
												<label class="custom_check">
													<input type="checkbox" name="select_time">
													<span class="checkmark"></span>German (1)
												</label>
											</div>
											
											<div id="collapseOnes2" class="collapse"  data-bs-parent="#accordionExample1" >
												<div>
													<label class="custom_check">
														<input type="checkbox" name="select_time" >
														<span class="checkmark"></span> English (5)
													</label>
												</div>
												<div>
													<label class="custom_check">
														<input type="checkbox" name="select_time">
														<span class="checkmark"></span> Arabic (2)
													</label>
												</div>
												<div>
													<label class="custom_check">
														<input type="checkbox" name="select_time">
														<span class="checkmark"></span>German (1)
													</label>
												</div>
											</div>
											<div class="showmore mt-2">
												<a href="javascript:void(0);"  data-bs-toggle="collapse" data-bs-target="#collapseOnes2" aria-expanded="true" aria-controls="collapseOne"><i class="feather-plus me-1"></i>Show More</a>
											</div>
										</div>
									</div>
									
								
								
									<div class="btn-search">
										<button type="button" class="btn btn-primary">Search</button>
										<button type="button" class="btn btn-block">Reset</button>
									</div>	
								</div>
							</div>
							<!-- /Search Filter -->
						</div>
						<!-- /Search Filter -->
						<div class="col-md-12 col-lg-8 col-xl-9">
							<div class="sort-tab develop-list-select">
								<div class="row align-items-center">
									<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
										<div class="d-flex align-items-center">
											<div class="freelance-view">
												<h4>Found 9 Results</h4>
											</div>
										</div>
										</div>
										<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 d-flex justify-content-sm-end">
										<div class="sort-by">
											<select class=" select">
												<option>Relevance</option>
												<option>Rating</option>
												<option>Popular</option>
												<option>Latest</option>
												<option>Free</option>
											</select>
											</div>
											<ul class="list-grid d-flex align-items-center">
											<li><a href="all-projects-grid"><i class="fas fa-th-large"></i></a></li>
											<li><a href="all-projects" class="favour-active"><i class="fas fa-list"></i></a></li>
										</ul>
										
									</div>
								</div>
							</div>
							
							<div class="list-book-mark book-mark favour-book">
							<div class="row">
								<div class="col-lg-12">
									<?php if (!empty($projects)): ?>
										<?php foreach ($projects as $project): ?>
											<div class="project-list-card">
												<a href="javascript:void(0);" class="add-fav-list"><i class="fa-regular fa-heart"></i></a>
												<div class="company-detail-image">
													<img src="../assets/img/default-logo.svg" class="img-fluid" alt="logo">
												</div>
												<div>
													<div class="company-title">
														<p><?= htmlspecialchars($project['industry_name']); ?></p>
														<h4><?= htmlspecialchars($project['title']); ?></h4>
													</div>
													<div class="company-splits">
														<div>
															<div class="company-address">
																<ul>
																	<li>
																		<i class="feather-map-pin"></i><?= htmlspecialchars($project['delivery_location']); ?>
																	</li>
																	<li>
																		<i class="feather-calendar"></i><?= htmlspecialchars(date('d/m/Y', strtotime($project['date']))); ?>
																	</li>
																	<li>
																		<i class="feather-file-2"></i><?= htmlspecialchars($project['category_name']); ?>
																	</li>
																</ul>
															</div>
															<div class="company-description">
																<p><?= nl2br(htmlspecialchars($project['description'])); ?></p>
															</div>
															<div class="company-description">
																<div class="tags">
																	<a href="javascript:void(0);"><span class="badge badge-pill badge-design">tag1</span></a>
																</div>
															</div>
														</div>
														<div class="company-split-price">
															<h5>Kes <?= htmlspecialchars(number_format($project['budget'], 2)); ?></h5>
															<!-- <a href="projects-details.php" class="btn btn-submits">Submit Proposal</a> -->
															<form action="projects-details.php" method="POST">
																<input type="hidden" name="id" value="<?php echo htmlspecialchars($project['id']); ?>">
																<button type="submit" class="btn btn-primary">Submit Proposal</button>
															</form>
														</div>
													</div>
												</div>    
											</div>
										<?php endforeach; ?>
									<?php else: ?>
										<p>No projects found.</p>
									<?php endif; ?>
								</div>
							</div>

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
		<div class="modal fade" id="rating">
			<div class="modal-dialog modal-dialog-centered modal-md">
				<div class="modal-content">
					<div class="modal-header d-block b-0 pb-0">
						<span class="modal-close float-end"><a href="javascript:void(0);" data-bs-dismiss="modal" aria-label="Close"><i class="fa fa-times orange-text"></i></a></span>
					</div>
					<div class="modal-body">		
						<form action="all-projects-grid">
							<div class="modal-info">
								<div class="text-center pt-0 mb-5">
									<h3>Please login to Favourite Freelancer</h3>
								</div>
								<div class="submit-section text-center">
									<button  data-bs-dismiss="modal" class="btn btn-primary black-btn click-btn">Cancel</button>
									<button type="submit" class="btn btn-primary click-btn">Submit</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<!-- /The Modal -->
	  
        <?php include_once '../includes/scripts.php' ?>;
		
	</body>
</html>