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
													
													<tr>
														<td>Create desktop applications</td>
														<td>$5762</td>
														<td>25 Sep 2023</td>
														<td>25 Sep 2023</td>
														<td><span class="badge badge-pill bg-danger-light">Ongoing</span></td>
														<td>
															<div class="action-table-data">
																<a href="#view-milestone" data-bs-toggle="modal" class="view-icon me-2"><i class="feather-eye me-1"></i>View</a>
																
															</div>
														</td>
													</tr>
													<tr>
														<td>PHP, Javascript Projects </td>
														<td>$4879</td>
														<td>17 Sep 2023</td>
														<td>17 Sep 2023</td>
														<td><span class="badge badge-pill bg-success-light">Finished</span></td>
														<td>
															<div class="action-table-data">
																<a href="#view-milestone" data-bs-toggle="modal" class="view-icon me-2"><i class="feather-eye me-1"></i>View</a>
															</div>
														</td>
													</tr>
													
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
			<div class="modal fade edit-proposal-modal" id="add-milestone">
				<div class="modal-dialog modal-dialog-centered modal-md">
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title">Add Milestone</h4>
							<span class="modal-close"><a href="javascript:void(0);" data-bs-dismiss="modal" aria-label="Close"><i class="feather-x"></i></a></span>
						</div>
						<div class="modal-body">		
							<form action="#">
								<div class="modal-info">
									<div class="row">
										<div class="col-lg-4">
											<div class="input-block">
												<label class="form-label">Milestone name</label>
												<input type="text" class="form-control">
											</div>
										</div>
										<div class="col-lg-2">
											<div class="input-block">
												<label class="form-label">Amount</label>
												<input type="text" class="form-control">
												<span class="input-group-text">$</span>
											</div>
										</div>
										<div class="col-lg-3">
											<div class="input-block">
												<label class="form-label">Start Date</label>
												<div class="cal-icon">
													<input class="form-control datetimepicker" type="text">
												</div>
											</div>
										</div>
										<div class="col-lg-3">
											<div class="input-block">
												<label class="form-label">End Date</label>
												<div class="cal-icon">
													<input class="form-control datetimepicker" type="text">
												</div>
											</div>
										</div>
										<div class="col-lg-12">
											<div class="input-block">
												<label class="form-label">Description</label>
												<textarea class="form-control summernote"></textarea>
											</div>
										</div>
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
			<!-- The Modal -->
			<div class="modal fade edit-proposal-modal" id="edit-milestone">
				<div class="modal-dialog modal-dialog-centered modal-md">
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title">Edit Milestone</h4>
							<span class="modal-close"><a href="javascript:void(0);" data-bs-dismiss="modal" aria-label="Close"><i class="feather-x"></i></a></span>
						</div>
						<div class="modal-body">		
							<form action="#">
								<div class="modal-info">
									<div class="row">
										<div class="col-lg-4">
											<div class="input-block">
												<label class="form-label">Milestone name</label>
												<input type="text" class="form-control" value="Creating Logo">
											</div>
										</div>
										<div class="col-lg-2">
											<div class="input-block">
												<label class="form-label">Amount</label>
												<input type="text" class="form-control" value="200">
												<span class="input-group-text">$</span>
											</div>
										</div>
										<div class="col-lg-3">
											<div class="input-block">
												<label class="form-label">Start Date</label>
												<div class="cal-icon">
													<input class="form-control datetimepicker" type="text">
												</div>
											</div>
										</div>
										<div class="col-lg-3">
											<div class="input-block">
												<label class="form-label">End Date</label>
												<div class="cal-icon">
													<input class="form-control datetimepicker" type="text">
												</div>
											</div>
										</div>
										<div class="col-lg-12">
											<div class="input-block">
												<label class="form-label">Description</label>
												<textarea class="form-control summernote">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</textarea>
											</div>
										</div>
										<div class="col-md-6">
											<div class="input-block">
												<label class="form-label">Completion (%)</label>
												<select class="select">
													<option value="">10</option>
													<option value="">20</option>
													<option value="">30</option>
													<option value="">40</option>
												</select>
											</div>
										</div>
										<div class="col-md-6">
											<div class="input-block">
												<label class="form-label">Status</label>
												<select class="select">
													<option value="">Select</option>
													<option value="">Approved</option>
													<option value="">On Hold</option>
													<option value="">Cancelled</option>
												</select>
											</div>
										</div>
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

			<!-- The Modal -->
			<div class="modal fade edit-proposal-modal" id="view-milestone">
				<div class="modal-dialog modal-dialog-centered modal-md">
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title">View Milestone</h4>
							<span class="modal-close"><a href="javascript:void(0);" data-bs-dismiss="modal" aria-label="Close"><i class="feather-x"></i></a></span>
						</div>
						<div class="modal-body">		
							<div class="d-flex justify-content-between milestone-view">
								<h5>Create desktop applications</h5>
								<span>Amount : $400</span>
							</div>
							<ul class="download-item">
								<li>
									<a href="javascript:void(0);">Preview_Screens.zip <i class="feather-download"></i></a>
								</li>
								<li>
									<a href="javascript:void(0);">Finalupdate.zip <i class="feather-download"></i></a>
								</li>
							</ul>
							<div class="text-end">
								<a href="javascript:void(0);" class="btn btn-primary">Approve</a>
							</div>
							
						</div>
					</div>
				</div>
			</div>
			<!-- /The Modal -->

			<!-- The Modal -->
			<div class="modal fade edit-proposal-modal success-modal" id="success-milestone">
				<div class="modal-dialog modal-dialog-centered modal-md">
					<div class="modal-content">
						<div class="modal-header justify-content-end">
							<span class="modal-close"><a href="javascript:void(0);" data-bs-dismiss="modal" aria-label="Close"><i class="feather-x"></i></a></span>
						</div>
						<div class="modal-body">	
							<div class="success-msg-content text-center">
								<h4>Payment Initiated Successfully</h4>
								<p>You will be notified when payment is credited to
									your account</p>
								<a href="manage-projects.html" class="btn btn-primary mt-3">Go to Projects</a>
							</div>	
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