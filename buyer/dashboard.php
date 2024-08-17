<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0">
		<title>Buyer DashBoard</title>
		
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
												<a href="dashboard.html" class="nav-link active">
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
														<a href="manage-projects.html">All Projects</a>
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
									
									<!-- Past Earnings -->
								<div class="col-xl-12">
									<div class="card mb-4 ongoing-project-card">
										<div class="pro-head">
											<h2>Recent Earnings</h2>
											<a href="view-project-detail.html" class="btn fund-btn">View All</a>
										</div>
										<div class="table-responsive recent-earnings flex-fill">
											<table class="table mb-0">
												<thead>
													<tr>
														<th>Details</th>
														<th>Job Type</th>
														<th>Budget</th>
														<th>Create On</th>
														<th>Expiring On</th>
														<th>Proposals</th>
														<th>Action</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td>Website Designer Required </td>
														<td>Hourly</td>
														<td>$2222</td>
														<td>29 Sep 2023</td>
														<td>10 Oct 2023</td>
														<td>47</td>
														<td><a href="javascript:void(0);"><i class="feather-eye"></i></a></td>
													</tr>
													<tr>
														<td>Create desktop applications </td>
														<td>Full time</td>
														<td>$5762</td>
														<td>25 Sep 2023</td>
														<td>05 Oct 2023</td>
														<td>15</td>
														<td><a href="javascript:void(0);"><i class="feather-eye"></i></a></td>
													</tr>
													<tr>
														<td>PHP, Javascript Projects  </td>
														<td>Part time</td>
														<td>$4879</td>
														<td>17 Sep 2023</td>
														<td>29 Sep 2023</td>
														<td>26</td>
														<td><a href="javascript:void(0);"><i class="feather-eye"></i></a></td>
													</tr>
													<tr>
														<td>Website Designer Required </td>
														<td>Hourly</td>
														<td>$2222</td>
														<td>29 Sep 2023</td>
														<td>10 Oct 2023</td>
														<td>47</td>
														<td><a href="javascript:void(0);"><i class="feather-eye"></i></a></td>
													</tr>
													<tr>
														<td>Swift / SwiftUI Developer</td>
														<td>Hourly</td>
														<td>$2789</td>
														<td>05 Sep 2023</td>
														<td>17 Sep 2023</td>
														<td>19</td>
														<td><a href="javascript:void(0);"><i class="feather-eye"></i></a></td>
													</tr>
													<tr>
														<td>Full-stack Developer  </td>
														<td>Part time</td>
														<td>$7853</td>
														<td>01 Sep 2023</td>
														<td>13 Sep 2023</td>
														<td>38</td>
														<td><a href="javascript:void(0);"><i class="feather-eye"></i></a></td>
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
            <?php include_once '../includes/footer.php' ?>
			<!-- /Footer -->
		   
		</div>
		<!-- /Main Wrapper -->
	  
        <?php include_once '../includes/scripts.php' ?>

		
		
	</body>
</html>