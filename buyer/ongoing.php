<?php
session_start();
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
											<li class="nav-item">
												<a href="dashboard.html" class="nav-link">
													<img src="../assets/img/icon/sidebar-icon-01.svg" alt="Img"> Dashboard
												</a>
											</li>
											<li class="nav-item submenu">
												<a href="freelancer-project-proposals.html" class="nav-link">
													<img src="../assets/img/icon/sidebar-icon-02.svg" alt="Img"> Projects
													<span class="menu-arrow"></span>
												</a>
												<ul class="sub-menu-ul">
													<li>
														<a href="manage-projects.html" class="active">All Projects</a>
													</li>
													<li>
														<a href="ongoing-projects.html">Ongoing Projects</a>
													</li>
													<li>
														<a href="completed-projects.html">Completed Projects</a>
													</li>
													<li>
														<a href="pending-projects.html">Pending Projects</a>
													</li>
													<li>
														<a href="cancelled-projects.html">Cancelled Projects</a>
													</li>
													<li>
														<a href="expired-projects.html">Expired Projects</a>
													</li>
												</ul>
											</li>
											<li class="nav-item submenu">
												<a href="freelancer-favourites.html" class="nav-link">
													<img src="../assets/img/icon/sidebar-icon-03.svg" alt="Img"> Favourites
													<span class="menu-arrow"></span>
												</a>
												<ul class="sub-menu-ul">
													<li>
														<a href="favourites.html">Bookmarked Projects</a>
													</li>
													<li>
														<a href="invited-favourites.html">Invitations</a>
													</li>
												</ul>
											</li>
											<li class="nav-item">
												<a href="review.html" class="nav-link">
													<img src="../assets/img/icon/sidebar-icon-04.svg" alt="Img"> Reviews
												</a>
											</li>
											<li class="nav-item">
												<a href="chats.html" class="nav-link">
													<img src="../assets/img/icon/sidebar-icon-06.svg" alt="Img"> Chat
												</a>
											</li>
											<li class="nav-item">
												<a href="deposit-funds.html" class="nav-link">
													<img src="../assets/img/icon/sidebar-icon-07.svg" alt="Img"> Payments
												</a>
											</li>
											<li class="nav-item">
												<a href="javascript:void(0);" class="nav-link">
													<img src="../assets/img/icon/sidebar-icon-10.svg" alt="Img">  Settings
													<span class="menu-arrow"></span>
												</a>
												<ul class="sub-menu-ul">
													<li>
														<a href="profile-settings.html">Profile</a>
													</li>
													<li>
														<a href="membership-plans.html">Plan & Billing</a>
													</li>
													<li>
														<a href="verify-identity.html">Verify Identity</a>
													</li>
													<li>
														<a href="change-password.html">Change Password</a>
													</li>
													<li>
														<a href="delete-account.html">Delete Account</a>
													</li>
												</ul>
											</li>
											<li class="nav-item">
												<a href="index.html" class="nav-link">
													<img src="../assets/img/icon/sidebar-icon-11.svg" alt="Img"> Logout
												</a>
											</li>
										</ul>
									</div>
									
								</div>
							</div>					
						</div>
						<!-- /sidebar -->
						
						<div class="col-xl-9 col-lg-8">
							<div class="page-title">
								<h3>Ongoing Projects</h3>
							</div>
							<!-- project list -->
							<div class="my-projects-list ongoing-projects">
								<div class="row">
									<div class="col-xl-9 flex-wrap">
										<div class="freelancer-proposals proposal-ongoing mb-0">
											<div class="project-proposals align-items-center freelancer">
												<div class="proposal-info">
													<div class="proposals-details">
														<span class="tech-name-badge">Dreamguystech</span>
														<div class="d-flex justify-content-between align-items-start">
															<div class="employee-project-card">
																
																<h3 class="proposals-title">Website Designer Required For Directory Theme</h3>
																<ul>
																	
																	<li>
																		<div class="proposal-job-type">
																			<h4 class="title-info">Project type</h4>
																			<h3>Hourly</h3>
																		</div>
																	</li>
																	<li>
																		<div class="proposal-job-type">
																			<h4 class="title-info">Location</h4>
																			<h3 class="flag-icon"><img src="../assets/img/icon/flag-icon.svg" height="13" alt="Lang"> UK</h3>
																		</div>
																	</li>
																	<li>
																		<div class="proposal-job-type">
																			<h4 class="title-info">Expiry</h4>
																			<h3>4 Days Left</h3>
																		</div>
																	</li>
																	<li>
																		<div class="proposal-job-type">
																			<h4 class="title-info">Price</h4>
																			<h3>$500</h3>
																		</div>
																	</li>
																</ul>
															</div>
															<ul class="employee-project">
																<li>
																	<div class="project-action text-center">
																		<a href="view-project-detail.html" class="projects-btn">View Details</a>
																		<span>Hired on 19 Sep 2023</span>
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
													<h3>Hired</h3>
													<img src="../assets/img/user/user-04.jpg" alt="Img" class="img-fluid">
													<p class="mb-0">Hannah Finn</p>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- /project list -->
							
							<!-- project list -->
							<div class="my-projects-list ongoing-projects">
								<div class="row">
									<div class="col-xl-12 flex-wrap">
										<div class="freelancer-proposals proposal-ongoing mb-0">
											<div class="project-proposals align-items-center freelancer">
												<div class="proposal-info">
													<div class="proposals-details">
														<span class="tech-name-badge">Dreamguystech</span>
														<div class="d-flex justify-content-between align-items-start">
															<div class="employee-project-card">
																
																<h3 class="proposals-title">Landing Page Redesign / Sales Page Redesign</h3>
																<ul>
																	
																	<li>
																		<div class="proposal-job-type">
																			<h4 class="title-info">Project type</h4>
																			<h3>Fixed</h3>
																		</div>
																	</li>
																	<li>
																		<div class="proposal-job-type">
																			<h4 class="title-info">Location</h4>
																			<h3 class="flag-icon"><img src="../assets/img/icon/flag-icon.svg" height="13" alt="Lang"> UK</h3>
																		</div>
																	</li>
																	<li>
																		<div class="proposal-job-type">
																			<h4 class="title-info">Expiry</h4>
																			<h3>5 Days Left</h3>
																		</div>
																	</li>
																	<li>
																		<div class="proposal-job-type">
																			<h4 class="title-info">Price</h4>
																			<h3>$280</h3>
																		</div>
																	</li>
																</ul>
															</div>
															<ul class="employee-project">
																<li>
																	<div class="project-action text-center">
																		<a href="javascript:void(0);" class="projects-btn">Repost</a>
																		<a href="javascript:void(0);" class="mb-0">Delete</a>
																	</div>
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
							<!-- /project list -->

							<!-- project list -->
							<div class="my-projects-list ongoing-projects">
								<div class="row">
									<div class="col-xl-9 flex-wrap">
										<div class="freelancer-proposals proposal-ongoing mb-0">
											<div class="project-proposals align-items-center freelancer">
												<div class="proposal-info">
													<div class="proposals-details">
														<span class="tech-name-badge">Dreamguystech</span>
														<div class="d-flex justify-content-between align-items-start">
															<div class="employee-project-card">
																
																<h3 class="proposals-title">PHP Laravel Developer Required</h3>
																<ul>
																	
																	<li>
																		<div class="proposal-job-type">
																			<h4 class="title-info">Project type</h4>
																			<h3>Hourly</h3>
																		</div>
																	</li>
																	<li>
																		<div class="proposal-job-type">
																			<h4 class="title-info">Location</h4>
																			<h3 class="flag-icon"><img src="../assets/img/icon/flag-icon.svg" height="13" alt="Lang"> UK</h3>
																		</div>
																	</li>
																	<li>
																		<div class="proposal-job-type">
																			<h4 class="title-info">Expiry</h4>
																			<h3>3 Days Left</h3>
																		</div>
																	</li>
																	<li>
																		<div class="proposal-job-type">
																			<h4 class="title-info">Price</h4>
																			<h3>$700</h3>
																		</div>
																	</li>
																</ul>
															</div>
															<ul class="employee-project">
																<li>
																	<div class="project-action text-center">
																		<a href="view-project-detail.html" class="projects-btn">View Details</a>
																		<a href="javascript:void(0);" class="projects-btn completed-btn"><i  class="fa fa-award me-2"></i>Completed</a>
																		<span>
																			<i class="fa-solid fa-star"></i>
																			<i class="fa-solid fa-star"></i>
																			<i class="fa-solid fa-star"></i>
																			<i class="fa-solid fa-star"></i>
																			<i class="fa-solid fa-star"></i>
																			4.5
																		</span>
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
													<h3>Hired</h3>
													<img src="../assets/img/user/table-avatar-03.jpg" alt="Img" class="img-fluid">
													<p class="mb-0">Gerth Enoksen</p>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- /project list -->

							<!-- project list -->
							<div class="my-projects-list ongoing-projects">
								<div class="row">
									<div class="col-xl-9 flex-wrap">
										<div class="freelancer-proposals proposal-ongoing mb-0">
											<div class="project-proposals align-items-center freelancer">
												<div class="proposal-info">
													<div class="proposals-details">
														<span class="tech-name-badge">Dreamguystech</span>
														<div class="d-flex justify-content-between align-items-start">
															<div class="employee-project-card">
																
																<h3 class="proposals-title">WooCommerce Product Page Back Up Restoration</h3>
																<ul>
																	
																	<li>
																		<div class="proposal-job-type">
																			<h4 class="title-info">Project type</h4>
																			<h3>Hourly</h3>
																		</div>
																	</li>
																	<li>
																		<div class="proposal-job-type">
																			<h4 class="title-info">Location</h4>
																			<h3 class="flag-icon"><img src="../assets/img/icon/flag-icon.svg" height="13" alt="Lang"> UK</h3>
																		</div>
																	</li>
																	<li>
																		<div class="proposal-job-type">
																			<h4 class="title-info">Expiry</h4>
																			<h3>3 Days Left</h3>
																		</div>
																	</li>
																	<li>
																		<div class="proposal-job-type">
																			<h4 class="title-info">Price</h4>
																			<h3>$700</h3>
																		</div>
																	</li>
																</ul>
															</div>
															<ul class="employee-project">
																<li>
																	<div class="project-action text-center">
																		<a href="view-project-detail.html" class="projects-btn">View Proposal</a>
																		<a href="javascript:void(0);" class="mb-0">Edit Project</a>
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
													<h2>27</h2>
													<h3 class="mb-0">Proposal</h3>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- /project list -->

							<!-- project list -->
							<div class="my-projects-list ongoing-projects">
								<div class="row">
									<div class="col-xl-12 flex-wrap">
										<div class="freelancer-proposals proposal-ongoing mb-0">
											<div class="project-proposals align-items-center freelancer">
												<div class="proposal-info">
													<div class="proposals-details">
														<span class="tech-name-badge">Dreamguystech</span>
														<div class="d-flex justify-content-between align-items-start">
															<div class="employee-project-card">
																
																<h3 class="proposals-title">Website Designer Required For Directory Theme</h3>
																<ul>
																	
																	<li>
																		<div class="proposal-job-type">
																			<h4 class="title-info">Project type</h4>
																			<h3>Fixed Price</h3>
																		</div>
																	</li>
																	<li>
																		<div class="proposal-job-type">
																			<h4 class="title-info">Location</h4>
																			<h3 class="flag-icon"><img src="../assets/img/icon/flag-icon.svg" height="13" alt="Lang"> UK</h3>
																		</div>
																	</li>
																	<li>
																		<div class="proposal-job-type">
																			<h4 class="title-info">Price</h4>
																			<h3>$500</h3>
																		</div>
																	</li>
																</ul>
															</div>
															<ul class="employee-project">
																<li>
																	<div class="project-action text-center">
																		<a href="view-project-detail.html" class="projects-btn">View Details</a>
																		<span>Expired on 19 Sep 2023</span>
																	</div>
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
							<!-- /project list -->

							<!-- project list -->
							<div class="my-projects-list ongoing-projects">
								<div class="row">
									<div class="col-xl-9 flex-wrap">
										<div class="freelancer-proposals proposal-ongoing mb-0">
											<div class="project-proposals align-items-center freelancer">
												<div class="proposal-info">
													<div class="proposals-details">
														<span class="tech-name-badge">Dreamguystech</span>
														<div class="d-flex justify-content-between align-items-start">
															<div class="employee-project-card">
																
																<h3 class="proposals-title">Landing Page Redesign / Sales Page Redesign</h3>
																<ul>
																	
																	<li>
																		<div class="proposal-job-type">
																			<h4 class="title-info">Project type</h4>
																			<h3>Fixed</h3>
																		</div>
																	</li>
																	<li>
																		<div class="proposal-job-type">
																			<h4 class="title-info">Location</h4>
																			<h3 class="flag-icon"><img src="../assets/img/icon/flag-icon.svg" height="13" alt="Lang"> UK</h3>
																		</div>
																	</li>
																	<li>
																		<div class="proposal-job-type">
																			<h4 class="title-info">Expiry</h4>
																			<h3>5 Days Left</h3>
																		</div>
																	</li>
																	<li>
																		<div class="proposal-job-type">
																			<h4 class="title-info">Price</h4>
																			<h3>$280</h3>
																		</div>
																	</li>
																</ul>
															</div>
															<ul class="employee-project">
																<li>
																	<div class="project-action text-center">
																		<a href="view-project-detail.html" class="projects-btn">View Details</a>
																		<a href="javascript:void(0);" class="projects-btn completed-btn"><i  class="fa fa-award me-2"></i>Completed</a>
																		<a href="#write-review" data-bs-toggle="modal" class="btn-write-review mb-0">Write Review</a>
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
													<h3>Hired</h3>
													<img src="../assets/img/user/table-avatar-02.jpg" alt="Img" class="img-fluid">
													<p class="mb-0">Bolethe Fleischer</p>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- /project list -->
							
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
			
			<!-- /Page Content -->
   
			<!-- Footer -->	
			<?php include_once '../includes/footer.php' ?>
			<!-- /Footer -->

			<!-- The Modal -->
			<div class="modal fade edit-proposal-modal" id="write-review">
				<div class="modal-dialog modal-dialog-centered modal-md">
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title">Write a Review</h4>
							<span class="modal-close"><a href="javascript:void(0);" data-bs-dismiss="modal" aria-label="Close"><i class="feather-x"></i></a></span>
						</div>
						<div class="modal-body">		
							<form action="#">
								<div class="modal-info">
									<div class="reviewed-user">
										<img src="../assets/img/user/table-avatar-02.jpg" alt="Img">
										<span>Bolethe Fleischer</span>
									</div>
									<div class="input-block form-info">
										<label class="col-form-label mb-0 mt-2">Ratings</label>
										<div class="rating rating-select mb-0">
											<a href="javascript:void(0);"><i class="fas fa-star"></i></a>
											<a href="javascript:void(0);"><i class="fas fa-star"></i></a>
											<a href="javascript:void(0);"><i class="fas fa-star"></i></a>
											<a href="javascript:void(0);"><i class="fas fa-star"></i></a>
											<a href="javascript:void(0);"><i class="fas fa-star"></i></a>
										</div>
									</div>
									<div class="input-block">
										<label class="form-label">Description</label>
										<textarea class="form-control"></textarea>
									</div>
								</div>
								<div class="submit-section text-end">
									<a href="javascript:void(0);" class="btn btn-cancel">Cancel</a>
									<button type="submit" class="btn btn-primary submit-btn">Submit</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<!-- /The Modal -->
		   
		</div>
		<!-- /Main Wrapper -->
	  
        <?php include_once '../includes/scripts.php' ?>
		
	</body>
</html>