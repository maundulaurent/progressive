<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0">
		<title>Quotation</title>
		
        <?php include_once '../includes/links.php' ?>;
	</head>
	<body class="dashboard-page">

		<!-- Main Wrapper -->
		<div class="main-wrapper">
					
			<!-- Start Navigation -->
			<!-- Header -->
            <?php include_once '../includes/header.php' ?>;
			<!-- /Header -->
			
			<!-- Page Content -->
			<div class="content content-page">
				<div class="container">
					<div class="row">
						<div class="col-xl-3 col-lg-4 theiaStickySidebar">
							<div class="settings-widget">
								<div class="settings-header d-sm-flex flex-row flex-wrap text-center text-sm-start align-items-center">
									<a href="freelancer-profile.html"><img alt="profile image" src="../assets/img/user/avatar-1.jpg" class="avatar-lg rounded-circle"></a>
									<div class="ms-sm-3 ms-md-0 ms-lg-3 mt-2 mt-sm-0 mt-md-2 mt-lg-0">
										<h3 class="mb-0"><a href="freelancer-profile.html">Bruce Bush</a><img src="../assets/img/icon/verified-badge.svg" class="ms-1" alt="Img"></h3>
										<p class="mb-0">@brucebush</p>
									</div>
								</div>
								<div class="settings-menu">
									<div id="sidebar-menu" class="sidebar-menu">
										<ul>
											<li class="nav-item">
												<a href="freelancer-dashboard.html" class="nav-link active">
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
														<a href="freelancer-project-proposals.html">My Proposal</a>
													</li>
													<li>
														<a href="freelancer-ongoing-projects.html">Ongoing Projects</a>
													</li>
													<li>
														<a href="freelancer-completed-projects.html">Completed Projects</a>
													</li>
													<li>
														<a href="freelancer-cancelled-projects.html">Cancelled Projects</a>
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
														<a href="freelancer-favourites.html">Bookmarked Projects</a>
													</li>
													<li>
														<a href="freelancer-invitations.html">Invitations</a>
													</li>
												</ul>
											</li>
											<li class="nav-item">
												<a href="freelancer-review.html" class="nav-link">
													<img src="../assets/img/icon/sidebar-icon-04.svg" alt="Img"> Reviews
												</a>
											</li>
											<li class="nav-item">
												<a href="freelancer-portfolio.html" class="nav-link">
													<img src="../assets/img/icon/sidebar-icon-05.svg" alt="Img"> Portfolio
												</a>
											</li>
											<li class="nav-item">
												<a href="freelancer-chats.html" class="nav-link">
													<img src="../assets/img/icon/sidebar-icon-06.svg" alt="Img"> Chat
												</a>
											</li>
											<li class="nav-item">
												<a href="freelancer-withdraw-money.html" class="nav-link">
													<img src="../assets/img/icon/sidebar-icon-07.svg" alt="Img"> Payments
												</a>
											</li>
											<li class="nav-item">
												<a href="freelancer-payout.html" class="nav-link">
													<img src="../assets/img/icon/sidebar-icon-08.svg" alt="Img"> Payout
												</a>
											</li>
											<li class="nav-item">
												<a href="freelancer-withdraw-money.html" class="nav-link">
													<img src="../assets/img/icon/sidebar-icon-09.svg" alt="Img"> Statement
												</a>
											</li>
											<li class="nav-item">
												<a href="javascript:void(0);" class="nav-link">
													<img src="../assets/img/icon/sidebar-icon-10.svg" alt="Img">  Settings
													<span class="menu-arrow"></span>
												</a>
												<ul class="sub-menu-ul">
													<li>
														<a href="freelancer-profile-settings.html">Profile Setting</a>
													</li>
													<li>
														<a href="freelancer-membership.html">Plan & Billing</a>
													</li>
													<li>
														<a href="freelancer-verify-identity.html">Verify Identity</a>
													</li>
													<li>
														<a href="freelancer-change-password.html">Changes Password</a>
													</li>
													<li>
														<a href="freelancer-delete-account.html">Delete Account</a>
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

						<div class="col-xl-9 col-lg-8">
							<div class="dashboard-sec">
								<div class="page-title">
									<h3>Dashboard</h3>
								</div>
								<div class="row">
									<div class="col-md-6 col-lg-4 col-xl-3">
										<div class="dash-widget">
											<div class="dash-info">
												<div class="dashboard-icon">
													<img src="../assets/img/icon/freelancer-dashboard-icon-01.svg" alt="Img">
												</div>
												<div class="dash-widget-info">Completed Jobs</div>
											</div>
											<div class="dash-widget-more d-flex align-items-center justify-content-between">
												<div class="dash-widget-count">30</div>
												<a href="freelancer-completed-projects.html" class="d-flex">View Details</a>
											</div>
										</div>
									</div>
									<div class="col-md-6 col-lg-4 col-xl-3">
										<div class="dash-widget">
											<div class="dash-info">
												<div class="dashboard-icon dashboard-icon-two">
													<img src="../assets/img/icon/freelancer-dashboard-icon-02.svg" alt="Img">
												</div>
												<div class="dash-widget-info">Task Completed</div>
											</div>
											<div class="dash-widget-more d-flex align-items-center justify-content-between">
												<div class="dash-widget-count">5</div>
												<a href="freelancer-completed-projects.html" class="d-flex">View Details</a>
											</div>
										</div>
									</div>
									<div class="col-md-6 col-lg-4 col-xl-3">
										<div class="dash-widget">
											<div class="dash-info">
												<div class="dashboard-icon dashboard-icon-three">
													<img src="../assets/img/icon/freelancer-dashboard-icon-03.svg" alt="Img">
												</div>
												<div class="dash-widget-info">Reviews</div>
											</div>
											<div class="dash-widget-more d-flex align-items-center justify-content-between">
												<div class="dash-widget-count">25</div>
												<a href="freelancer-completed-projects.html" class="d-flex">View Details</a>
											</div>
										</div>
									</div>
									<div class="col-md-6 col-lg-4 col-xl-3">
										<div class="dash-widget">
											<div class="dash-info">
												<div class="dashboard-icon dashboard-icon-four">
													<img src="../assets/img/icon/freelancer-dashboard-icon-04.svg" alt="Img">
												</div>
												<div class="dash-widget-info">Earning</div>
											</div>
											<div class="dash-widget-more d-flex align-items-center justify-content-between">
												<div class="dash-widget-count">5962</div>
												<a href="freelancer-completed-projects.html" class="d-flex">View Details</a>
											</div>
										</div>
									</div>
								</div>
								
								<!-- Chart Content -->
								<div class="row">
									<div class="col-xl-8 d-flex">
										<div class="card flex-fill ongoing-project-card">
											<div class="pro-head">	
												<h5 class="card-title mb-0">Overview</h5> 
												<div class="month-detail">	
													<select class="form-control">
														<option value="0">Last 6 months</option>
														<option value="1" >Last 2 months</option>
													</select>
												</div>
											</div>
											<div class="pro-body p-0">									
												<div id="chartprofile"></div>
											</div>
										</div>
									</div>
									<div class="col-xl-4 d-flex">
										<div class="flex-fill card ongoing-project-card">
											<div class="pro-head b-0">	
												<h5 class="card-title mb-0">Static Analytics</h5> 
											</div>
											<div class="pro-body p-0">									
												<div id="chartradial"></div>
												<div class="d-flex flex-wrap justify-content-between">
													<ul class="static-list">
														<li><span><i class="fas fa-circle text-violet me-1"></i>Jobs</span></li>
														<!-- <li><span><i class="fas fa-circle text-pink me-1"></i> Applied Proposals</span></li> -->
														<li><span><i class="fas fa-circle text-yellow me-1"></i>Proposals</span></li>
														<!-- <li><span><i class="fas fa-circle text-blue me-1"></i>Bookmarked Projects</span></li> -->
													</ul>
													<ul class="static-list">
														<!-- <li><span><i class="fas fa-circle text-violet me-1"></i>Jobs</span></li> -->
														<li><span><i class="fas fa-circle text-pink me-1"></i> Applied Proposals</span></li>
														<!-- <li><span><i class="fas fa-circle text-yellow me-1"></i>Proposals</span></li> -->
														<li><span><i class="fas fa-circle text-blue me-1"></i>Bookmarked Projects</span></li>
													</ul>
												</div>
												
											</div>
										</div>
									</div>
								</div>
								<!-- /Chart Content -->
								
								<div class="row">				
									<!-- Ongoing Projects -->
									<div class="col-xl-6 d-flex">					
										<div class="card flex-fill ongoing-project-card">
											<div class="pro-head">
												<h2>Ongoing Projects</h2>
												<a href="freelancer-ongoing-projects.html" class="btn fund-btn">View All</a>
											</div>
											<div class="pro-body p-0">
												<div class="on-project">
													<span>A2Z Tech Information</span>
													<h5>Landing Page Redesign / Sales Page Redesign</h5>
													<div class="pro-info">
														<ul class="list-details">
															<li>
																<div class="slot">
																	<p>Project type</p>
																	<h5>Hourly</h5>
																</div>
															</li>
															<li>
																<div class="slot">
																	<p>Location</p>
																	<h5 class="d-flex align-items-center"><img src="../assets/img/icon/flag-icon.svg" class="me-2" alt="Icon">UK</h5>
																</div>
															</li>
															
															<li>
																<div class="slot">
																	<p>Expiry</p>
																	<h5>5 Days Left</h5>
																</div>
															</li>
															<li>
																<div class="slot">
																	<p>Price</p>
																	<h5>$280</h5>
																</div>
															</li>
														</ul>
													</div>
												</div>
												<div class="on-project">
													<span>Amaze Tech</span>
													<h5>Landing Page Redesign / Sales Page Redesign</h5>
													<div class="pro-info">
														<ul class="list-details">
															<li>
																<div class="slot">
																	<p>Project type</p>
																	<h5>Hourly</h5>
																</div>
															</li>
															<li>
																<div class="slot">
																	<p>Location</p>
																	<h5 class="d-flex align-items-center"><img src="../assets/img/icon/flag-icon.svg" class="me-2" alt="Icon">UK</h5>
																</div>
															</li>
															
															<li>
																<div class="slot">
																	<p>Expiry</p>
																	<h5>5 Days Left</h5>
																</div>
															</li>
															<li>
																<div class="slot">
																	<p>Price</p>
																	<h5>$280</h5>
																</div>
															</li>
														</ul>
													</div>
												</div>
											</div>
										</div>
									</div>
									<!-- /Ongoing Projects -->
									<!-- Past Earnings -->
								<div class="col-xl-6">
									<div class="card mb-4 ongoing-project-card">
										<div class="pro-head">
											<h2>Recent Earnings</h2>
										</div>
										<div class="table-responsive recent-earnings flex-fill">
											<table class="table mb-0">
												<thead>
													<tr>
														<th>Date</th>
														<th>Client</th>
														<th>Amount</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td>29 Sep 2023</td>
														<td><h2 class="table-avatar table-user">
															<a href="javascript:void(0);" class="avatar avatar-m me-2"><img class="avatar-img" src="../assets/img/user/avatar-1.jpg" alt="User Image"></a>
															<a href="javascript:void(0);">
																Janet Paden
															</a>
														</h2></td>
														<td class="action-bg">$80.00</td>
													</tr>
													<tr>
														<td>17 Sep 2023</td>
														<td><h2 class="table-avatar table-user">
															<a href="javascript:void(0);" class="avatar avatar-m me-2"><img class="avatar-img" src="../assets/img/user/table-avatar-02.jpg" alt="User Image"></a>
															<a href="javascript:void(0);">
																Mary Hawkins
															</a>
														</h2></td>
														<td class="action-bg">$20.50</td>
													</tr>
													<tr>
														<td>13 Sep 2023</td>
														<td><h2 class="table-avatar table-user">
															<a href="javascript:void(0);" class="avatar avatar-m me-2"><img class="avatar-img" src="../assets/img/user/table-avatar-03.jpg" alt="User Image"></a>
															<a href="javascript:void(0);">
																Jerry Garica
															</a>
														</h2></td>
														<td class="action-bg">$35.70</td>
													</tr>
													<tr>
														<td>07 Sep 2023</td>
														<td><h2 class="table-avatar table-user">
															<a href="javascript:void(0);" class="avatar avatar-m me-2"><img class="avatar-img" src="../assets/img/user/table-avatar-04.jpg" alt="User Image"></a>
															<a href="javascript:void(0);">
																Barton Taylor
															</a>
														</h2></td>
														<td class="action-bg">$62.80</td>
													</tr>
													<tr>
														<td>02 Sep 2023</td>
														<td><h2 class="table-avatar table-user">
															<a href="javascript:void(0);" class="avatar avatar-m me-2"><img class="avatar-img" src="../assets/img/user/table-avatar-05.jpg" alt="User Image"></a>
															<a href="javascript:void(0);">
																Jeffrey Bovee
															</a>
														</h2></td>
														<td class="action-bg">$73.30</td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
								</div>
								<!-- /Past Earnings -->
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
	  
		<?php include_once '../includes/scripts.php' ?>;
		
		
	</body>
</html>