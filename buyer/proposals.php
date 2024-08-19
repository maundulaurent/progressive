<?php
session_start();
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
								<h3>Manage Projects</h3>
							</div>
							<nav class="user-tabs mb-4">
								<ul class="nav nav-tabs nav-tabs-bottom nav-justified">
									<li class="nav-item">
										<a class="nav-link active" href="view-project-detail.html">Overview & Discussions</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="milestones.html">Milestones</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="tasks.html">Tasks</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="files.html">Files</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="project-payment.html">Payments</a>
									</li>
								</ul>
							</nav>
							
							<!-- project list -->
							<div class="my-projects">
								
								<!-- Proposals -->
								<div class="freelancer-proposals proposal-ongoing">
									<div class="project-proposals align-items-center freelancer">
										<div class="proposal-info">
											<div class="proposals-details">
												<h3 class="proposals-title">Name of the Seller</h3>
												<ul>
													
													<li>
														<div class="proposal-client-price">
															<h4 class="title-info">Client Price</h4>
															<h3 class="client-price">$599.00 <span class="price-type">( Fixed )</span></h3>
														</div>
													</li>
													<li>
														<div class="proposal-job-type">
															<h4 class="title-info">Project Deadline</h4>
															<h3>28 Oct 2023</h3>
														</div>
													</li>
													<li>
														<div class="proposal-img">
															<div class="proposal-client d-flex align-items-center">
																<img src="../assets/img/user/table-avatar-03.jpg" alt="Img" class="img-fluid me-2">
																<div>
																	<h4>Seller2</h4>
																	<span>10 Oct 2023<i class="fa-solid fa-star"></i>5.0</span>
																</div>
															</div>
														</div>
													</li>
													<li>
														<div class="project-action text-center overview-action">
															<a href="javascript:void(0);" class="projects-btn ">Approve seller</a>
														</div>
													</li>
												</ul>
											</div>
										</div>
									</div>
								</div>
								<!-- Proposals --> 
							</div>
							<!-- /project list -->
								
						
						
							<!-- /Overview -->
							
							<!-- Skills Required -->
							<div class="skill-required">
								<h4 >Skills Required</h4>
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
			<?php include_once '../includes/footer.php' ?>
			<!-- /Footer -->
		   
		</div>
		<!-- /Main Wrapper -->
	  
        <?php include_once '../includes/scripts.php' ?>
		
	</body>
</html>