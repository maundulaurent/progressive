<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
		<title>Kofejob - Bootstrap Admin HTML Template</title>
		
		<!-- Favicon -->
		<link rel="shortcut icon" href="assets/img/favicon.png">
		
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="assets/css/bootstrap.min.css">
		
		<!-- Fontawesome CSS -->
		<link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
		<link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">

		<!-- Feather CSS -->
		<link rel="stylesheet" href="assets/css/feather.css">

		<!-- Select2 CSS -->
		<link rel="stylesheet" href="assets/plugins/select2/css/select2.min.css">

		<!-- Date Tine Picker  CSS -->
		<link rel="stylesheet" href="assets/css/bootstrap-datetimepicker.min.css">

		<!-- Datatables CSS -->
		<link rel="stylesheet" href="assets/plugins/datatables/datatables.min.css">
		
		<!-- Main CSS -->
		<link rel="stylesheet" href="assets/css/style.css">
		
    </head>
    <body>
	
		<!-- Main Wrapper -->
        <div class="main-wrapper">
		
			<!-- Header -->
			<div class="header">
			
				<!-- Logo -->
				<div class="header-left">
					<a href="index.html" class="logo">
						<img src="assets/img/logo.png" alt="Logo">
					</a>
					<a href="index.html" class="logo logo-small">
						<img src="assets/img/logo-small.png" alt="Logo" width="30" height="30">
					</a>
					<!-- Sidebar Toggle -->
					<a href="javascript:void(0);" id="toggle_btn">
						<i class="feather-chevrons-left"></i>
					</a>
					<!-- /Sidebar Toggle -->
					
					<!-- Mobile Menu Toggle -->
					<a class="mobile_btn" id="mobile_btn">
						<i class="feather-chevrons-left"></i>
					</a>
					<!-- /Mobile Menu Toggle -->
				</div>
				<!-- /Logo -->
				
				<!-- Search -->
				<div class="top-nav-search">
					<form>
						<input type="text" class="form-control" placeholder="Start typing your Search...">
						<button class="btn" type="submit"><i class="feather-search"></i></button>
					</form>
				</div>
				<!-- /Search -->
				
				<!-- Header Menu -->
				<ul class="nav user-menu">

					<!-- Notifications -->
					<li class="nav-item dropdown">
						<a href="javascript:void(0);" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
							<i class="feather-bell"></i> <span class="badge badge-pill">5</span>
						</a>
						<div class="dropdown-menu notifications">
							<div class="topnav-dropdown-header">
								<span class="notification-title">Notifications</span>
								<a href="javascript:void(0)" class="clear-noti"> Clear All</a>
							</div>
							<div class="noti-content">
								<ul class="notification-list">
									<li class="notification-message">
										<a href="javascript:void(0);">
											<div class="media d-flex">
												<span class="avatar avatar-sm flex-shrink-0">
													<img class="avatar-img rounded-circle" alt="Img" src="assets/img/profiles/avatar-02.jpg">
												</span>
												<div class="media-body flex-grow-1">
													<p class="noti-details"><span class="noti-title">Brian Johnson</span> paid the invoice <span class="noti-title">#DF65485</span></p>
													<p class="noti-time"><span class="notification-time">4 mins ago</span></p>
												</div>
											</div>
										</a>
									</li>
									<li class="notification-message">
										<a href="javascript:void(0);">
											<div class="media d-flex">
												<span class="avatar avatar-sm flex-shrink-0">
													<img class="avatar-img rounded-circle" alt="Img" src="assets/img/profiles/avatar-03.jpg">
												</span>
												<div class="media-body flex-grow-1">
													<p class="noti-details"><span class="noti-title">Marie Canales</span> has accepted your estimate <span class="noti-title">#GTR458789</span></p>
													<p class="noti-time"><span class="notification-time">6 mins ago</span></p>
												</div>
											</div>
										</a>
									</li>
									<li class="notification-message">
										<a href="javascript:void(0);">
											<div class="media d-flex">
												<div class="avatar avatar-sm flex-shrink-0">
													<span class="avatar-title rounded-circle bg-primary-light"><i class="far fa-user"></i></span>
												</div>
												<div class="media-body flex-grow-1">
													<p class="noti-details"><span class="noti-title">New user registered</span></p>
													<p class="noti-time"><span class="notification-time">8 mins ago</span></p>
												</div>
											</div>
										</a>
									</li>
									<li class="notification-message">
										<a href="javascript:void(0);">
											<div class="media d-flex">
												<span class="avatar avatar-sm flex-shrink-0">
													<img class="avatar-img rounded-circle" alt="Img" src="assets/img/profiles/avatar-04.jpg">
												</span>
												<div class="media-body flex-grow-1">
													<p class="noti-details"><span class="noti-title">Barbara Moore</span> declined the invoice <span class="noti-title">#RDW026896</span></p>
													<p class="noti-time"><span class="notification-time">12 mins ago</span></p>
												</div>
											</div>
										</a>
									</li>
									<li class="notification-message">
										<a href="javascript:void(0);">
											<div class="media d-flex">
												<div class="avatar avatar-sm flex-shrink-0">
													<span class="avatar-title rounded-circle bg-info-light"><i class="far fa-comment"></i></span>
												</div>
												<div class="media-body flex-grow-1">
													<p class="noti-details"><span class="noti-title">You have received a new message</span></p>
													<p class="noti-time"><span class="notification-time">2 days ago</span></p>
												</div>
											</div>
										</a>
									</li>
								</ul>
							</div>
							<div class="topnav-dropdown-footer">
								<a href="javascript:void(0);">View all Notifications</a>
							</div>
						</div>
					</li>
					<!-- /Notifications -->
					
					<!-- User Menu -->
					<li class="nav-item dropdown has-arrow main-drop">
						<a href="javascript:void(0);" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
							<span class="user-img">
								<img src="assets/img/profiles/avatar-07.jpg" alt="Img">
								<span class="status online"></span>
							</span>
						</a>
						<div class="dropdown-menu">
							<a class="dropdown-item" href="profile.html"><i data-feather="user" class="me-1"></i> Profile</a>
							<a class="dropdown-item" href="settings.html"><i data-feather="settings" class="me-1"></i> Settings</a>
							<a class="dropdown-item" href="login.html"><i data-feather="log-out" class="me-1"></i> Logout</a>
						</div>
					</li>
					<!-- /User Menu -->
					
				</ul>
				<!-- /Header Menu -->
				
			</div>
			<!-- /Header -->
			
			<!-- Sidebar -->
			<div class="sidebar" id="sidebar">
				<div class="sidebar-inner slimscroll">
					<div id="sidebar-menu" class="sidebar-menu">
						<ul>
							<li class="menu-title"><span>Main</span></li>
							<li class="active">
								<a href="index.html"><i data-feather="home"></i> <span>Dashboard</span></a>
							</li>
							<li>
								<a href="categories.html"><i data-feather="copy"></i> <span>Categories</span></a>
							</li>
							<li>
								<a href="projects.html"><i data-feather="database"></i> <span>Projects</span></a>
							</li>
							<li>
								<a href="users.html"><i data-feather="users"></i> <span>Freelancer</span></a>
							</li>
							<li>
								<a href="deposit.html"><i data-feather="user-check"></i> <span>Deposit</span></a>
							</li>
							<li>
								<a href="withdrawn.html"><i data-feather="user-check"></i> <span>Withdrawn</span></a>
							</li>
							<li>
								<a href="transaction.html"><i data-feather="clipboard"></i> <span>Transaction</span></a>
							</li>
							<li>
								<a href="providers.html"><i data-feather="user-check"></i> <span>Providers</span></a>
							</li>
							<li>
								<a href="subscription.html"><i data-feather="user-check"></i> <span>Subscription</span></a>
							</li>
							<li>
								<a href="reports.html"><i data-feather="pie-chart"></i> <span>Reports</span></a>
							</li>
							<li>
								<a href="roles.html"><i data-feather="clipboard"></i> <span>Roles</span></a>
							</li>
							<li>
								<a href="skills.html"><i data-feather="award"></i> <span>Skills</span></a>
							</li>							
							<li>
								<a href="verify-identity.html"><i data-feather="user-check"></i> <span>Verify Identity</span></a>
							</li>
							<li>
								<a href="settings.html"><i data-feather="settings"></i> <span>Settings</span></a>
							</li>
							<li class="menu-title"><span>UI Interface</span></li>
							<li>
								<a href="components.html"><i data-feather="pocket"></i> <span>Components</span></a>
							</li>
							<li class="submenu">
								<a href="javascript:void(0);"><i data-feather="file-minus"></i> <span> Forms</span> <span class="menu-arrow"></span></a>
								<ul>
									<li><a href="form-basic-inputs.html">Basic Inputs</a></li>
									<li><a href="form-input-groups.html">Input Groups</a></li>
									<li><a href="form-horizontal.html">Horizontal Form</a></li>
									<li><a href="form-vertical.html">Vertical Form</a></li>
									<li><a href="form-mask.html">Form Mask</a></li>
									<li><a href="form-validation.html">Form Validation</a></li>
								</ul>
							</li>
							<li class="submenu">
								<a href="javascript:void(0);"><i data-feather="align-justify"></i> <span> Tables</span> <span class="menu-arrow"></span></a>
								<ul>
									<li><a href="tables-basic.html">Basic Tables</a></li>
									<li><a href="data-tables.html">Data Table</a></li>
								</ul>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<!-- /Sidebar -->
			
			
			<!-- Page Wrapper -->
            <div class="page-wrapper">
                <div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header">
						<div class="row align-items-center">
							<div class="col">
								<h3 class="page-title">Dashboard</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.html">Home</a></li>
									<li class="breadcrumb-item active">Dashboard</li>
								</ul>
							</div>
							
						</div>
					</div>
					<!-- /Page Header -->

					
						<div class="row">
						<div class="col-md-8">
							<!--/Wizard-->
							<div class="row">
								<div class="col-md-4 d-flex">
									<div class="card wizard-card flex-fill">
										<div class="card-body">
											<p class="text-primary mt-0 mb-2">Users</p>
											<h5>1682</h5>
											<p><a href="users.html">view details</a></p>
											<span class="dash-widget-icon bg-1">
												<i class="fas fa-users"></i>
											</span>
										</div>
									</div>
								</div>
								<div class="col-md-4 d-flex">
									<div class="card wizard-card flex-fill">
										<div class="card-body">
											<p class="text-primary mt-0 mb-2">Completed Projects</p>
											<h5>15k</h5>
											<p><a href="projects.html">view details</a></p>
											
											<span class="dash-widget-icon bg-1">
												<i class="fas fa-th-large"></i>
											</span>
										</div>
									</div>
								</div>
								<div class="col-md-4 d-flex">
									<div class="card wizard-card flex-fill">
										<div class="card-body">
											<p class="text-primary mt-0 mb-2">Active Projects</p>
											<h5>1568</h5>
											<p><a href="projects.html">view details</a></p>
											
											<span class="dash-widget-icon bg-1">
												<i class="fas fa-bezier-curve"></i>
											</span>
										</div>
									</div>
								</div>
							</div>
							<!--/Wizard-->
							<div class="row">
								<div class="col-lg-12 d-flex">
									<div class="card w-100">
										<div class="card-body pt-0 pb-2">
											<div class="card-header">
												<h5 class="card-title">Over view</h5>
											</div>
											<div id="chart" class="mt-4"></div>
										</div>
									</div>
								</div>
							</div>
						</div>	
						<div class="col-md-4 d-flex">
							<div class="card w-100">
								<div class="card-body pt-0">
									<div class="card-header">
										<div class="row">
											<div class="col-7">
												<p>Welcome back,</p>
												<h6 class="text-primary">Super Admin</h6>
											</div>
											<div class="col-5 text-end">
												<span class="welcome-dash-icon bg-1">
													<i class="fas fa-user"></i>
												</span>
											</div>
										</div>
									</div>
									<div class="account-balance">
										<p>Account balance</p>
										<h6>$50,000,00 </h6>
									</div>
									<div class="mt-3">
										<h6 class="text-primary">Payments</h6>
										<div class="table-responsive">
											<table class="table table-center table-hover mb-0">
												<thead>
													<tr>
														<th class="text-nowrap">Client or Freelancer</th>
														<th>Amount</th>
														<th class="text-end">Status</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td class="text-nowrap">Sakib Khan</td>
														<td>$2222</td>
														<td class="text-end">Completed</td>
													</tr>
													<tr>
														<td class="text-nowrap">Pixel Inc Ltd</td>
														<td>$750</td>
														<td class="text-end">
															<a href="javascript:void(0);" class="btn btn-sm btn-success me-2"><i class="far fa-edit"></i></a> 
															<a href="javascript:void(0);" class="btn btn-sm btn-danger me-2"><i class="far fa-trash-alt"></i></a>
														</td>
													</tr>
													<tr>
														<td class="text-nowrap">Jon M Mullins</td>
														<td>$3150</td>
														<td class="text-end text-nowrap">Money released to Freelancer</td>
													</tr>
													<tr>
														<td class="text-nowrap">Rose M Milewski</td>
														<td>$1455</td>
														<td class="text-end text-nowrap">Money returned to Client</td>
													</tr>
													<tr>
														<td class="text-nowrap">Gerald K Myers</td>
														<td>$3000</td>
														<td class="text-end">
															<a href="javascript:void(0);" class="btn btn-sm btn-success me-2"><i class="far fa-edit"></i></a> 
															<a href="javascript:void(0);" class="btn btn-sm btn-danger me-2"><i class="far fa-trash-alt"></i></a>
														</td>
													</tr>
													<tr>
														<td class="text-nowrap">Marcin Kowalski</td>
														<td>$895</td>
														<td class="text-end">
															<a href="javascript:void(0);" class="btn btn-sm btn-success me-2"><i class="far fa-edit"></i></a> 
															<a href="javascript:void(0);" class="btn btn-sm btn-danger me-2"><i class="far fa-trash-alt"></i></a>
														</td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>			
					</div>
					<div class="row">
						<div class="col-lg-12">
							<div class="card bg-white projects-card">
								<div class="card-body pt-0">
									<div class="card-header">
										<h5 class="card-title">Reviews</h5>
									</div>
									<div class="reviews-menu-links">
										<ul role="tablist" class="nav nav-pills card-header-pills nav-justified">
											<li class="nav-item">
												<a href="#tab-4" data-bs-toggle="tab" class="nav-link active">All (272)</a>
											</li>
											<li class="nav-item">
												<a href="#tab-5" data-bs-toggle="tab" class="nav-link">Active (218)</a>
											</li>
											<li class="nav-item">
												<a href="#tab-6" data-bs-toggle="tab" class="nav-link"> Pending Approval (03)
												</a>
											</li>
											<li class="nav-item">
												<a href="#tab-7" data-bs-toggle="tab" class="nav-link">Trash (0)</a>
											</li>
										</ul>
									</div>

									<div class="tab-content pt-0">
										<div role="tabpanel" id="tab-4" class="tab-pane fade active show">
											<div class="table-responsive">
												<table class="table table-hover table-center mb-0 datatable">
													<thead>
														<tr>
															<th></th>
															<th>Profile</th>	
															<th>Designation</th>	
															<th>comments</th>	
															<th>Stars</th>	
															<th>Category</th>
															<th class="text-end">Actions</th>
														</tr>
													</thead>
													<tbody>
														<tr>
															<td>
																<div class="form-check custom-checkbox">
																  <input type="checkbox" class="form-check-input" id="customCheck1">
																  <label class="form-check-label" for="customCheck1"></label>
																</div>
															</td>
															<td>
																<h2 class="table-avatar">
																	<a href="profile.html"><img class="avatar-img rounded-circle me-2" src="assets/img/profiles/avatar-14.jpg" alt="User Image">
																	Janet Paden
																	</a>
																</h2>
															</td>
															<td>
																CEO
															</td>
															<td>
																<div class="desc-info">
																	Lorem ipsum dolor sit amet, consectetur adipiscing elit. Volutpat orci enim, mattis nibh aliquam dui, nibh faucibus aenean. Eget volutpat
																</div>
															</td>
															<td>
																<i class="fas fa-star text-primary"></i>
																<i class="fas fa-star text-primary"></i>
																<i class="fas fa-star text-primary"></i>
																<i class="fas fa-star text-primary"></i>
																<i class="fas fa-star text-muted"></i>
															</td>
															<td>
																Angular
															</td>
															
															<td class="text-end text-nowrap">
																<a href="javascript:void(0);" class=" btn btn-approve text-white me-2">Approve</a>
																<a href="javascript:void(0);" class="btn btn-disable">Enable</a>
															</td>
														</tr>
														<tr>
															<td>
																<div class="form-check custom-checkbox">
																  <input type="checkbox" class="form-check-input" id="customCheck2">
																  <label class="form-check-label" for="customCheck2"></label>
																</div>
															</td>
															<td>
																<h2 class="table-avatar">
																	<a href="profile.html"><img class="avatar-img rounded-circle me-2" src="assets/img/profiles/avatar-01.jpg" alt="User Image">
																		George Wells
																	</a>
																</h2>
															</td>
															<td>
																Tech Lead
															</td>
															<td>
																<div class="desc-info">
																	Lorem ipsum dolor sit amet, consectetur adipiscing elit. Volutpat orci enim, mattis nibh aliquam dui, nibh faucibus aenean. Eget volutpat
																</div>
															</td>
															<td class="text-nowrap">
																<i class="fas fa-star text-primary"></i>
																<i class="fas fa-star text-primary"></i>
																<i class="fas fa-star text-primary"></i>
																<i class="fas fa-star text-primary"></i>
																<i class="fas fa-star text-muted"></i>
															</td>
															<td>
																Node
															</td>
															
															<td class="text-end text-nowrap">
																<a href="javascript:void(0);" class=" btn btn-approve text-white me-2">Approve</a>
																<a href="javascript:void(0);" class="btn btn-disable">Enable</a>
															</td>
														</tr>
														<tr>
															<td>
																<div class="form-check custom-checkbox">
																  <input type="checkbox" class="form-check-input" id="customCheck3">
																  <label class="form-check-label" for="customCheck3"></label>
																</div>
															</td>
															<td>
																<h2 class="table-avatar">
																	<a href="profile.html"><img class="avatar-img rounded-circle me-2" src="assets/img/profiles/avatar-15.jpg" alt="User Image">
																		Timothy Smith
																	</a>
																</h2>
															</td>
															<td>
																Technial Manager
															</td>
															<td>
																<div class="desc-info">
																	Lorem ipsum dolor sit amet, consectetur adipiscing elit. Volutpat orci enim, mattis nibh aliquam dui, nibh faucibus aenean. Eget volutpat
																</div>
															</td>
															<td class="text-nowrap">
																<i class="fas fa-star text-primary"></i>
																<i class="fas fa-star text-primary"></i>
																<i class="fas fa-star text-primary"></i>
																<i class="fas fa-star text-primary"></i>
																<i class="fas fa-star text-muted"></i>
															</td>
															<td>
																Angular
															</td>
															<td class="text-end text-nowrap">
																<a href="javascript:void(0);" class=" btn btn-approve text-white me-2">Approve</a>
																<a href="javascript:void(0);" class="btn btn-disable">Enable</a>
															</td>
														</tr>
														<tr>
															<td>
																<div class="form-check custom-checkbox">
																  <input type="checkbox" class="form-check-input" id="customCheck10">
																  <label class="form-check-label" for="customCheck10"></label>
																</div>
															</td>
															<td>
																<h2 class="table-avatar">
																	<a href="profile.html"><img class="avatar-img rounded-circle me-2" src="assets/img/profiles/avatar-16.jpg" alt="User Image">
																		Lois Alexander
																	</a>
																</h2>
															</td>
															<td>
																Designer
															</td>
															<td>
																<div class="desc-info">
																	Lorem ipsum dolor sit amet, consectetur adipiscing elit. Volutpat orci enim, mattis nibh aliquam dui, nibh faucibus aenean. Eget volutpat
																</div>
															</td>
															<td class="text-nowrap">
																<i class="fas fa-star text-primary"></i>
																<i class="fas fa-star text-primary"></i>
																<i class="fas fa-star text-primary"></i>
																<i class="fas fa-star text-primary"></i>
																<i class="fas fa-star text-muted"></i>
															</td>
															<td>
																Laravel
															</td>
															<td class="text-end text-nowrap">
																<a href="javascript:void(0);" class=" btn btn-approve text-white me-2">Approve</a>
																<a href="javascript:void(0);" class="btn btn-disable">Enable</a>
															</td>
														</tr>
														<tr>
															<td>
																<div class="form-check custom-checkbox">
																  <input type="checkbox" class="form-check-input" id="customCheck4">
																  <label class="form-check-label" for="customCheck4"></label>
																</div>
															</td>
															<td>
																<h2 class="table-avatar">
																	<a href="profile.html"><img class="avatar-img rounded-circle me-2" src="assets/img/profiles/avatar-03.jpg" alt="User Image">
																		Sara Grayson
																	</a>
																</h2>
															</td>
															<td>
																Developer
															</td>
															<td>
																<div class="desc-info">
																	Lorem ipsum dolor sit amet, consectetur adipiscing elit. Volutpat orci enim, mattis nibh aliquam dui, nibh faucibus aenean. Eget volutpat
																</div>
															</td>
															<td class="text-nowrap">
																<i class="fas fa-star text-primary"></i>
																<i class="fas fa-star text-primary"></i>
																<i class="fas fa-star text-primary"></i>
																<i class="fas fa-star text-primary"></i>
																<i class="fas fa-star text-muted"></i>
															</td>
															<td>
																Angular
															</td>
															<td class="text-end text-nowrap">
																<a href="javascript:void(0);" class=" btn btn-approve text-white me-2">Approve</a>
																<a href="javascript:void(0);" class="btn btn-disable">Enable</a>
															</td>
														</tr>
														<tr>
															<td>
																<div class="form-check custom-checkbox">
																  <input type="checkbox" class="form-check-input" id="customCheck5">
																  <label class="form-check-label" for="customCheck5"></label>
																</div>
															</td>
															<td>
																<h2 class="table-avatar">
																	<a href="profile.html"><img class="avatar-img rounded-circle me-2" src="assets/img/profiles/avatar-04.jpg" alt="User Image">
																		Deboarah
																	</a>
																</h2>
															</td>
															<td>
																Associate Engineer
															</td>
															<td>
																<div class="desc-info">
																	Lorem ipsum dolor sit amet, consectetur adipiscing elit. Volutpat orci enim, mattis nibh aliquam dui, nibh faucibus aenean. Eget volutpat
																</div>
															</td>
															<td class="text-nowrap">
																<i class="fas fa-star text-primary"></i>
																<i class="fas fa-star text-primary"></i>
																<i class="fas fa-star text-primary"></i>
																<i class="fas fa-star text-primary"></i>
																<i class="fas fa-star text-muted"></i>
															</td>
															<td>
																React
															</td>
															<td class="text-end text-nowrap">
																<a href="javascript:void(0);" class=" btn btn-approve text-white me-2">Approve</a>
																<a href="javascript:void(0);" class="btn btn-disable">Enable</a>
															</td>
														</tr>
														<tr>
															<td>
																<div class="form-check custom-checkbox">
																  <input type="checkbox" class="form-check-input" id="customCheck6">
																  <label class="form-check-label" for="customCheck6"></label>
																</div>
															</td>
															<td>
																<h2 class="table-avatar">
																	<a href="profile.html"><img class="avatar-img rounded-circle me-2" src="assets/img/profiles/avatar-11.jpg" alt="User Image">
																		Sofia Briant
																	</a>
																</h2>
															</td>
															<td>
																Technial Manager
															</td>
															<td>
																<div class="desc-info">
																	Lorem ipsum dolor sit amet, consectetur adipiscing elit. Volutpat orci enim, mattis nibh aliquam dui, nibh faucibus aenean. Eget volutpat
																</div>
															</td>
															<td class="text-nowrap">
																<i class="fas fa-star text-primary"></i>
																<i class="fas fa-star text-primary"></i>
																<i class="fas fa-star text-primary"></i>
																<i class="fas fa-star text-primary"></i>
																<i class="fas fa-star text-muted"></i>
															</td>
															<td>
																JAVA
															</td>
															<td class="text-end text-nowrap">
																<a href="javascript:void(0);" class=" btn btn-approve text-white me-2">Approve</a>
																<a href="javascript:void(0);" class="btn btn-disable">Enable</a>
															</td>
														</tr>
														<tr>
															<td>
																<div class="form-check custom-checkbox">
																  <input type="checkbox" class="form-check-input" id="customCheck7">
																  <label class="form-check-label" for="customCheck7"></label>
																</div>
															</td>
															<td>
																<h2 class="table-avatar">
																	<a href="profile.html"><img class="avatar-img rounded-circle me-2" src="assets/img/profiles/avatar-02.jpg" alt="User Image">
																		Bess Twishes
																	</a>
																</h2>
															</td>
															<td>
																Designer
															</td>
															<td>
																<div class="desc-info">
																	Lorem ipsum dolor sit amet, consectetur adipiscing elit. Volutpat orci enim, mattis nibh aliquam dui, nibh faucibus aenean. Eget volutpat
																</div>
															</td>
															<td class="text-nowrap">
																<i class="fas fa-star text-primary"></i>
																<i class="fas fa-star text-primary"></i>
																<i class="fas fa-star text-primary"></i>
																<i class="fas fa-star text-primary"></i>
																<i class="fas fa-star text-muted"></i>
															</td>
															<td>
																.NET
															</td>
															<td class="text-end text-nowrap">
																<a href="javascript:void(0);" class=" btn btn-approve text-white me-2">Approve</a>
																<a href="javascript:void(0);" class="btn btn-disable">Enable</a>
															</td>
														</tr>
														<tr>
															<td>
																<div class="form-check custom-checkbox">
																  <input type="checkbox" class="form-check-input" id="customCheck8">
																  <label class="form-check-label" for="customCheck8"></label>
																</div>
															</td>
															<td>
																<h2 class="table-avatar">
																	<a href="profile.html"><img class="avatar-img rounded-circle me-2" src="assets/img/profiles/avatar-05.jpg" alt="User Image">
																		Rayan Lester
																	</a>
																</h2>
															</td>
															<td>
																Technial Manager
															</td>
															<td>
																<div class="desc-info">
																	Lorem ipsum dolor sit amet, consectetur adipiscing elit. Volutpat orci enim, mattis nibh aliquam dui, nibh faucibus aenean. Eget volutpat
																</div>
															</td>
															<td class="text-nowrap">
																<i class="fas fa-star text-primary"></i>
																<i class="fas fa-star text-primary"></i>
																<i class="fas fa-star text-primary"></i>
																<i class="fas fa-star text-primary"></i>
																<i class="fas fa-star text-muted"></i>
															</td>
															<td>
																Python
															</td>
															<td class="text-end text-nowrap">
																<a href="javascript:void(0);" class=" btn btn-approve text-white me-2">Approve</a>
																<a href="javascript:void(0);" class="btn btn-disable">Enable</a>
															</td>
														</tr>
														<tr>
															<td>
																<div class="form-check custom-checkbox">
																  <input type="checkbox" class="form-check-input" id="customCheck9">
																  <label class="form-check-label" for="customCheck9"></label>
																</div>
															</td>
															<td>
																<h2 class="table-avatar">
																	<a href="profile.html"><img class="avatar-img rounded-circle me-2" src="assets/img/profiles/avatar-06.jpg" alt="User Image">
																		Sarah Alexander
																	</a>
																</h2>
															</td>
															<td>
																Designer
															</td>
															<td>
																<div class="desc-info">
																	Lorem ipsum dolor sit amet, consectetur adipiscing elit. Volutpat orci enim, mattis nibh aliquam dui, nibh faucibus aenean. Eget volutpat
																</div>
															</td>
															<td class="text-nowrap">
																<i class="fas fa-star text-primary"></i>
																<i class="fas fa-star text-primary"></i>
																<i class="fas fa-star text-primary"></i>
																<i class="fas fa-star text-primary"></i>
																<i class="fas fa-star text-muted"></i>
															</td>
															<td>
																Golang
															</td>
															<td class="text-end text-nowrap">
																<a href="javascript:void(0);" class=" btn btn-approve text-white me-2">Approve</a>
																<a href="javascript:void(0);" class="btn btn-disable">Enable</a>
															</td>
														</tr>
													
													</tbody>
												</table>
											</div>
										</div>
										<div role="tabpanel" id="tab-5" class="tab-pane fade">
											<div class="table-responsive">
												<table class="table table-center table-bordered table-hover datatable">
													<thead>
														<tr>
															<th></th>
															<th>Profile</th>
															<th>Designation</th>	
															<th>comments</th>	
															<th>Stars</th>	
															<th>Category</th>
															<th class="text-end">Actions</th>
														</tr>
													</thead>
													<tbody>
														<tr>
															<td>
																<div class="form-check custom-checkbox">
																  <input type="checkbox" class="form-check-input" id="customCheck11">
																  <label class="form-check-label" for="customCheck11"></label>
																</div>
															</td>
															<td>
																<h2 class="table-avatar">
																	<a href="profile.html"><img class="avatar-img rounded-circle me-2" src="assets/img/profiles/avatar-04.jpg" alt="User Image">
																		Deboarah
																	</a>
																</h2>
															</td>
															<td>
																Associate Engineer
															</td>
															<td>
																<div class="desc-info">
																	Lorem ipsum dolor sit amet, consectetur adipiscing elit. Volutpat orci enim, mattis nibh aliquam dui, nibh faucibus aenean. Eget volutpat
																</div>
															</td>
															<td class="text-nowrap">
																<i class="fas fa-star text-primary"></i>
																<i class="fas fa-star text-primary"></i>
																<i class="fas fa-star text-primary"></i>
																<i class="fas fa-star text-primary"></i>
																<i class="fas fa-star text-muted"></i>
															</td>
															<td>
																React
															</td>
															<td class="text-end text-nowrap">
																<a href="javascript:void(0);" class=" btn btn-approve text-white me-2">Approve</a>
																<a href="javascript:void(0);" class="btn btn-disable">Enable</a>
															</td>
														</tr>
														<tr>
															<td>
																<div class="form-check custom-checkbox">
																  <input type="checkbox" class="form-check-input" id="customCheck12">
																  <label class="form-check-label" for="customCheck12"></label>
																</div>
															</td>
															<td>
																<h2 class="table-avatar">
																	<a href="profile.html"><img class="avatar-img rounded-circle me-2" src="assets/img/profiles/avatar-11.jpg" alt="User Image">
																		Sofia Briant
																	</a>
																</h2>
															</td>
															<td>
																Technial Manager
															</td>
															<td>
																<div class="desc-info">
																	Lorem ipsum dolor sit amet, consectetur adipiscing elit. Volutpat orci enim, mattis nibh aliquam dui, nibh faucibus aenean. Eget volutpat
																</div>
															</td>
															<td class="text-nowrap">
																<i class="fas fa-star text-primary"></i>
																<i class="fas fa-star text-primary"></i>
																<i class="fas fa-star text-primary"></i>
																<i class="fas fa-star text-primary"></i>
																<i class="fas fa-star text-muted"></i>
															</td>
															<td>
																JAVA
															</td>
															<td class="text-end text-nowrap">
																<a href="javascript:void(0);" class=" btn btn-approve text-white me-2">Approve</a>
																<a href="javascript:void(0);" class="btn btn-disable">Enable</a>
															</td>
														</tr>
														<tr>
															<td>
																<div class="form-check custom-checkbox">
																  <input type="checkbox" class="form-check-input" id="customCheck13">
																  <label class="form-check-label" for="customCheck13"></label>
																</div>
															</td>
															<td>
																<h2 class="table-avatar">
																	<a href="profile.html"><img class="avatar-img rounded-circle me-2" src="assets/img/profiles/avatar-02.jpg" alt="User Image">
																		Bess Twishes
																	</a>
																</h2>
															</td>
															<td>
																Designer
															</td>
															<td>
																<div class="desc-info">
																	Lorem ipsum dolor sit amet, consectetur adipiscing elit. Volutpat orci enim, mattis nibh aliquam dui, nibh faucibus aenean. Eget volutpat
																</div>
															</td>
															<td class="text-nowrap">
																<i class="fas fa-star text-primary"></i>
																<i class="fas fa-star text-primary"></i>
																<i class="fas fa-star text-primary"></i>
																<i class="fas fa-star text-primary"></i>
																<i class="fas fa-star text-muted"></i>
															</td>
															<td>
																.NET
															</td>
															<td class="text-end text-nowrap">
																<a href="javascript:void(0);" class=" btn btn-approve text-white me-2">Approve</a>
																<a href="javascript:void(0);" class="btn btn-disable">Enable</a>
															</td>
														</tr>
														<tr>
															<td>
																<div class="form-check custom-checkbox">
																  <input type="checkbox" class="form-check-input" id="customCheck14">
																  <label class="form-check-label" for="customCheck14"></label>
																</div>
															</td>
															<td>
																<h2 class="table-avatar">
																	<a href="profile.html"><img class="avatar-img rounded-circle me-2" src="assets/img/profiles/avatar-05.jpg" alt="User Image">
																		Rayan Lester
																	</a>
																</h2>
															</td>
															<td>
																Technial Manager
															</td>
															<td>
																<div class="desc-info">
																	Lorem ipsum dolor sit amet, consectetur adipiscing elit. Volutpat orci enim, mattis nibh aliquam dui, nibh faucibus aenean. Eget volutpat
																</div>
															</td>
															<td class="text-nowrap">
																<i class="fas fa-star text-primary"></i>
																<i class="fas fa-star text-primary"></i>
																<i class="fas fa-star text-primary"></i>
																<i class="fas fa-star text-primary"></i>
																<i class="fas fa-star text-muted"></i>
															</td>
															<td>
																Python
															</td>
															<td class="text-end text-nowrap">
																<a href="javascript:void(0);" class=" btn btn-approve text-white me-2">Approve</a>
																<a href="javascript:void(0);" class="btn btn-disable">Enable</a>
															</td>
														</tr>
														<tr>
															<td>
																<div class="form-check custom-checkbox">
																  <input type="checkbox" class="form-check-input" id="customCheck15">
																  <label class="form-check-label" for="customCheck15"></label>
																</div>
															</td>
															<td>
																<h2 class="table-avatar">
																	<a href="profile.html"><img class="avatar-img rounded-circle me-2" src="assets/img/profiles/avatar-06.jpg" alt="User Image">
																		Sarah Alexander
																	</a>
																</h2>
															</td>
															<td>
																Designer
															</td>
															<td>
																<div class="desc-info">
																	Lorem ipsum dolor sit amet, consectetur adipiscing elit. Volutpat orci enim, mattis nibh aliquam dui, nibh faucibus aenean. Eget volutpat
																</div>
															</td>
															<td class="text-nowrap">
																<i class="fas fa-star text-primary"></i>
																<i class="fas fa-star text-primary"></i>
																<i class="fas fa-star text-primary"></i>
																<i class="fas fa-star text-primary"></i>
																<i class="fas fa-star text-muted"></i>
															</td>
															<td>
																Golang
															</td>
															<td class="text-end text-nowrap">
																<a href="javascript:void(0);" class=" btn btn-approve text-white me-2">Approve</a>
																<a href="javascript:void(0);" class="btn btn-disable">Enable</a>
															</td>
														</tr>
														<tr>
															<td>
																<div class="form-check custom-checkbox">
																  <input type="checkbox" class="form-check-input" id="customCheck16">
																  <label class="form-check-label" for="customCheck16"></label>
																</div>
															</td>
															<td>
																<h2 class="table-avatar">
																	<a href="profile.html"><img class="avatar-img rounded-circle me-2" src="assets/img/profiles/avatar-14.jpg" alt="User Image">
																	Janet Paden
																	</a>
																</h2>
															</td>
															<td>
																CEO
															</td>
															<td>
																<div class="desc-info">
																	Lorem ipsum dolor sit amet, consectetur adipiscing elit. Volutpat orci enim, mattis nibh aliquam dui, nibh faucibus aenean. Eget volutpat
																</div>
															</td>
															<td>
																<i class="fas fa-star text-primary"></i>
																<i class="fas fa-star text-primary"></i>
																<i class="fas fa-star text-primary"></i>
																<i class="fas fa-star text-primary"></i>
																<i class="fas fa-star text-muted"></i>
															</td>
															<td>
																Angular
															</td>
															
															<td class="text-end text-nowrap">
																<a href="javascript:void(0);" class=" btn btn-approve text-white me-2">Approve</a>
																<a href="javascript:void(0);" class="btn btn-disable">Enable</a>
															</td>
														</tr>
														<tr>
															<td>
																<div class="form-check custom-checkbox">
																  <input type="checkbox" class="form-check-input" id="customCheck17">
																  <label class="form-check-label" for="customCheck17"></label>
																</div>
															</td>
															<td>
																<h2 class="table-avatar">
																	<a href="profile.html"><img class="avatar-img rounded-circle me-2" src="assets/img/profiles/avatar-01.jpg" alt="User Image">
																		George Wells
																	</a>
																</h2>
															</td>
															<td>
																Tech Lead
															</td>
															<td>
																<div class="desc-info">
																	Lorem ipsum dolor sit amet, consectetur adipiscing elit. Volutpat orci enim, mattis nibh aliquam dui, nibh faucibus aenean. Eget volutpat
																</div>
															</td>
															<td class="text-nowrap">
																<i class="fas fa-star text-primary"></i>
																<i class="fas fa-star text-primary"></i>
																<i class="fas fa-star text-primary"></i>
																<i class="fas fa-star text-primary"></i>
																<i class="fas fa-star text-muted"></i>
															</td>
															<td>
																Node
															</td>
															
															<td class="text-end text-nowrap">
																<a href="javascript:void(0);" class=" btn btn-approve text-white me-2">Approve</a>
																<a href="javascript:void(0);" class="btn btn-disable">Enable</a>
															</td>
														</tr>
														<tr>
															<td>
																<div class="form-check custom-checkbox">
																  <input type="checkbox" class="form-check-input" id="customCheck18">
																  <label class="form-check-label" for="customCheck18"></label>
																</div>
															</td>
															<td>
																<h2 class="table-avatar">
																	<a href="profile.html"><img class="avatar-img rounded-circle me-2" src="assets/img/profiles/avatar-15.jpg" alt="User Image">
																		Timothy Smith
																	</a>
																</h2>
															</td>
															<td>
																Technial Manager
															</td>
															<td>
																<div class="desc-info">
																	Lorem ipsum dolor sit amet, consectetur adipiscing elit. Volutpat orci enim, mattis nibh aliquam dui, nibh faucibus aenean. Eget volutpat
																</div>
															</td>
															<td class="text-nowrap">
																<i class="fas fa-star text-primary"></i>
																<i class="fas fa-star text-primary"></i>
																<i class="fas fa-star text-primary"></i>
																<i class="fas fa-star text-primary"></i>
																<i class="fas fa-star text-muted"></i>
															</td>
															<td>
																Angular
															</td>
															<td class="text-end text-nowrap">
																<a href="javascript:void(0);" class=" btn btn-approve text-white me-2">Approve</a>
																<a href="javascript:void(0);" class="btn btn-disable">Enable</a>
															</td>
														</tr>											
													</tbody>
												</table>
											</div>
										</div>
										<div role="tabpanel" id="tab-6" class="tab-pane fade">
											<div class="table-responsive">
												<table class="table table-bordered table-hover datatable">
													<thead>
														<tr>
															<th></th>
															<th>Profile</th>	
															<th>Designation</th>	
															<th>comments</th>	
															<th>Stars</th>	
															<th>Category</th>
															<th class="text-end">Actions</th>
														</tr>
													</thead>
													<tbody>
														<tr>
															<td>
																<div class="form-check custom-checkbox">
																  <input type="checkbox" class="form-check-input" id="customCheck21">
																  <label class="form-check-label" for="customCheck21"></label>
																</div>
															</td>
															<td>
																<h2 class="table-avatar">
																	<a href="profile.html"><img class="avatar-img rounded-circle me-2" src="assets/img/profiles/avatar-05.jpg" alt="User Image">
																		Albert Boone
																	</a>
																</h2>
															</td>
															<td>
																CEO
															</td>
															<td>
																<div class="desc-info">
																	Lorem ipsum dolor sit amet, consectetur adipiscing elit. Volutpat orci enim, mattis nibh aliquam dui, nibh faucibus aenean. Eget volutpat
																</div>
															</td>
															<td class="text-nowrap">
																<i class="fas fa-star text-primary"></i>
																<i class="fas fa-star text-primary"></i>
																<i class="fas fa-star text-primary"></i>
																<i class="fas fa-star text-primary"></i>
																<i class="fas fa-star text-muted"></i>
															</td>
															<td>
																React
															</td>
															<td class="text-end text-nowrap">
																<a href="javascript:void(0);" class=" btn btn-approve text-white me-2">Approve</a>
																<a href="javascript:void(0);" class="btn btn-disable">Enable</a>
															</td>
														</tr>
														<tr>
															<td>
																<div class="form-check custom-checkbox">
																  <input type="checkbox" class="form-check-input" id="customCheck22">
																  <label class="form-check-label" for="customCheck22"></label>
																</div>
															</td>
															<td>
																<h2 class="table-avatar">
																	<a href="profile.html"><img class="avatar-img rounded-circle me-2" src="assets/img/profiles/avatar-14.jpg" alt="User Image">
																	Janet Paden
																	</a>
																</h2>
															</td>
															<td>
																CEO
															</td>
															<td>
																<div class="desc-info">
																	Lorem ipsum dolor sit amet, consectetur adipiscing elit. Volutpat orci enim, mattis nibh aliquam dui, nibh faucibus aenean. Eget volutpat
																</div>
															</td>
															<td>
																<i class="fas fa-star text-primary"></i>
																<i class="fas fa-star text-primary"></i>
																<i class="fas fa-star text-primary"></i>
																<i class="fas fa-star text-primary"></i>
																<i class="fas fa-star text-muted"></i>
															</td>
															<td>
																Angular
															</td>
															
															<td class="text-end text-nowrap">
																<a href="javascript:void(0);" class=" btn btn-approve text-white me-2">Approve</a>
																<a href="javascript:void(0);" class="btn btn-disable">Enable</a>
															</td>
														</tr>
														<tr>
															<td>
																<div class="form-check custom-checkbox">
																  <input type="checkbox" class="form-check-input" id="customCheck23">
																  <label class="form-check-label" for="customCheck23"></label>
																</div>
															</td>
															<td>
																<h2 class="table-avatar">
																	<a href="profile.html"><img class="avatar-img rounded-circle me-2" src="assets/img/profiles/avatar-01.jpg" alt="User Image">
																		George Wells
																	</a>
																</h2>
															</td>
															<td>
																Tech Lead
															</td>
															<td>
																<div class="desc-info">
																	Lorem ipsum dolor sit amet, consectetur adipiscing elit. Volutpat orci enim, mattis nibh aliquam dui, nibh faucibus aenean. Eget volutpat
																</div>
															</td>
															<td class="text-nowrap">
																<i class="fas fa-star text-primary"></i>
																<i class="fas fa-star text-primary"></i>
																<i class="fas fa-star text-primary"></i>
																<i class="fas fa-star text-primary"></i>
																<i class="fas fa-star text-muted"></i>
															</td>
															<td>
																Node
															</td>
															
															<td class="text-end text-nowrap">
																<a href="javascript:void(0);" class=" btn btn-approve text-white me-2">Approve</a>
																<a href="javascript:void(0);" class="btn btn-disable">Enable</a>
															</td>
														</tr>
														<tr>
															<td>
																<div class="form-check custom-checkbox">
																  <input type="checkbox" class="form-check-input" id="customCheck24">
																  <label class="form-check-label" for="customCheck24"></label>
																</div>
															</td>
															<td>
																<h2 class="table-avatar">
																	<a href="profile.html"><img class="avatar-img rounded-circle me-2" src="assets/img/profiles/avatar-15.jpg" alt="User Image">
																		Timothy Smith
																	</a>
																</h2>
															</td>
															<td>
																Technial Manager
															</td>
															<td>
																<div class="desc-info">
																	Lorem ipsum dolor sit amet, consectetur adipiscing elit. Volutpat orci enim, mattis nibh aliquam dui, nibh faucibus aenean. Eget volutpat
																</div>
															</td>
															<td class="text-nowrap">
																<i class="fas fa-star text-primary"></i>
																<i class="fas fa-star text-primary"></i>
																<i class="fas fa-star text-primary"></i>
																<i class="fas fa-star text-primary"></i>
																<i class="fas fa-star text-muted"></i>
															</td>
															<td>
																Angular
															</td>
															<td class="text-end text-nowrap">
																<a href="javascript:void(0);" class=" btn btn-approve text-white me-2">Approve</a>
																<a href="javascript:void(0);" class="btn btn-disable">Enable</a>
															</td>
														</tr>
														<tr>
															<td>
																<div class="form-check custom-checkbox">
																  <input type="checkbox" class="form-check-input" id="customCheck25">
																  <label class="form-check-label" for="customCheck25"></label>
																</div>
															</td>
															<td>
																<h2 class="table-avatar">
																	<a href="profile.html"><img class="avatar-img rounded-circle me-2" src="assets/img/profiles/avatar-06.jpg" alt="User Image">
																		Jessie Montoya
																	</a>
																</h2>
															</td>
															<td>
																PROJECT LEAD
															</td>
															<td>
																<div class="desc-info">
																	Lorem ipsum dolor sit amet, consectetur adipiscing elit. Volutpat orci enim, mattis nibh aliquam dui, nibh faucibus aenean. Eget volutpat
																</div>
															</td>
															<td class="text-nowrap">
																<i class="fas fa-star text-primary"></i>
																<i class="fas fa-star text-primary"></i>
																<i class="fas fa-star text-primary"></i>
																<i class="fas fa-star text-primary"></i>
																<i class="fas fa-star text-muted"></i>
															</td>
															<td>
																Node
															</td>
															<td class="text-end text-nowrap">
																<a href="javascript:void(0);" class=" btn btn-approve text-white me-2">Approve</a>
																<a href="javascript:void(0);" class="btn btn-disable">Enable</a>
															</td>
														</tr>
														<tr>
															<td>
																<div class="form-check custom-checkbox">
																  <input type="checkbox" class="form-check-input" id="customCheck26">
																  <label class="form-check-label" for="customCheck26"></label>
																</div>
															</td>
															<td>
																<h2 class="table-avatar">
																	<a href="profile.html"><img class="avatar-img rounded-circle me-2" src="assets/img/profiles/avatar-10.jpg" alt="User Image">
																		Gary Green
																	</a>
																</h2>
															</td>
															<td>
																TEAM LEAD
															</td>
															<td>
																<div class="desc-info">
																	Lorem ipsum dolor sit amet, consectetur adipiscing elit. Volutpat orci enim, mattis nibh aliquam dui, nibh faucibus aenean. Eget volutpat
																</div>
															</td>
															<td class="text-nowrap">
																<i class="fas fa-star text-primary"></i>
																<i class="fas fa-star text-primary"></i>
																<i class="fas fa-star text-primary"></i>
																<i class="fas fa-star text-primary"></i>
																<i class="fas fa-star text-muted"></i>
															</td>
															<td>
																Angular
															</td>
															<td class="text-end text-nowrap">
																<a href="javascript:void(0);" class=" btn btn-approve text-white me-2">Approve</a>
																<a href="javascript:void(0);" class="btn btn-disable">Enable</a>
															</td>
														</tr>
														<tr>
															<td>
																<div class="form-check custom-checkbox">
																  <input type="checkbox" class="form-check-input" id="customCheck27">
																  <label class="form-check-label" for="customCheck27"></label>
																</div>
															</td>
															<td>
																<h2 class="table-avatar">
																	<a href="profile.html"><img class="avatar-img rounded-circle me-2" src="assets/img/profiles/avatar-11.jpg" alt="User Image">
																		Sofia Briant
																	</a>
																</h2>
															</td>
															<td>
																Technial Manager
															</td>
															<td>
																<div class="desc-info">
																	Lorem ipsum dolor sit amet, consectetur adipiscing elit. Volutpat orci enim, mattis nibh aliquam dui, nibh faucibus aenean. Eget volutpat
																</div>
															</td>
															<td class="text-nowrap">
																<i class="fas fa-star text-primary"></i>
																<i class="fas fa-star text-primary"></i>
																<i class="fas fa-star text-primary"></i>
																<i class="fas fa-star text-primary"></i>
																<i class="fas fa-star text-muted"></i>
															</td>
															<td>
																JAVA
															</td>
															<td class="text-end text-nowrap">
																<a href="javascript:void(0);" class=" btn btn-approve text-white me-2">Approve</a>
																<a href="javascript:void(0);" class="btn btn-disable">Enable</a>
															</td>
														</tr>
														<tr>
															<td>
																<div class="form-check custom-checkbox">
																  <input type="checkbox" class="form-check-input" id="customCheck28">
																  <label class="form-check-label" for="customCheck28"></label>
																</div>
															</td>
															<td>
																<h2 class="table-avatar">
																	<a href="profile.html"><img class="avatar-img rounded-circle me-2" src="assets/img/profiles/avatar-02.jpg" alt="User Image">
																		Bess Twishes
																	</a>
																</h2>
															</td>
															<td>
																Designer
															</td>
															<td>
																<div class="desc-info">
																	Lorem ipsum dolor sit amet, consectetur adipiscing elit. Volutpat orci enim, mattis nibh aliquam dui, nibh faucibus aenean. Eget volutpat
																</div>
															</td>
															<td class="text-nowrap">
																<i class="fas fa-star text-primary"></i>
																<i class="fas fa-star text-primary"></i>
																<i class="fas fa-star text-primary"></i>
																<i class="fas fa-star text-primary"></i>
																<i class="fas fa-star text-muted"></i>
															</td>
															<td>
																.NET
															</td>
															<td class="text-end text-nowrap">
																<a href="javascript:void(0);" class=" btn btn-approve text-white me-2">Approve</a>
																<a href="javascript:void(0);" class="btn btn-disable">Enable</a>
															</td>
														</tr>
														<tr>
															<td>
																<div class="form-check custom-checkbox">
																  <input type="checkbox" class="form-check-input" id="customCheck29">
																  <label class="form-check-label" for="customCheck29"></label>
																</div>
															</td>
															<td>
																<h2 class="table-avatar">
																	<a href="profile.html"><img class="avatar-img rounded-circle me-2" src="assets/img/profiles/avatar-05.jpg" alt="User Image">
																		Rayan Lester
																	</a>
																</h2>
															</td>
															<td>
																Technial Manager
															</td>
															<td>
																<div class="desc-info">
																	Lorem ipsum dolor sit amet, consectetur adipiscing elit. Volutpat orci enim, mattis nibh aliquam dui, nibh faucibus aenean. Eget volutpat
																</div>
															</td>
															<td class="text-nowrap">
																<i class="fas fa-star text-primary"></i>
																<i class="fas fa-star text-primary"></i>
																<i class="fas fa-star text-primary"></i>
																<i class="fas fa-star text-primary"></i>
																<i class="fas fa-star text-muted"></i>
															</td>
															<td>
																Python
															</td>
															<td class="text-end text-nowrap">
																<a href="javascript:void(0);" class=" btn btn-approve text-white me-2">Approve</a>
																<a href="javascript:void(0);" class="btn btn-disable">Enable</a>
															</td>
														</tr>
														<tr>
															<td>
																<div class="form-check custom-checkbox">
																  <input type="checkbox" class="form-check-input" id="customCheck30">
																  <label class="form-check-label" for="customCheck30"></label>
																</div>
															</td>
															<td>
																<h2 class="table-avatar">
																	<a href="profile.html"><img class="avatar-img rounded-circle me-2" src="assets/img/profiles/avatar-06.jpg" alt="User Image">
																		Sarah Alexander
																	</a>
																</h2>
															</td>
															<td>
																Designer
															</td>
															<td>
																<div class="desc-info">
																	Lorem ipsum dolor sit amet, consectetur adipiscing elit. Volutpat orci enim, mattis nibh aliquam dui, nibh faucibus aenean. Eget volutpat
																</div>
															</td>
															<td class="text-nowrap">
																<i class="fas fa-star text-primary"></i>
																<i class="fas fa-star text-primary"></i>
																<i class="fas fa-star text-primary"></i>
																<i class="fas fa-star text-primary"></i>
																<i class="fas fa-star text-muted"></i>
															</td>
															<td>
																Golang
															</td>
															<td class="text-end text-nowrap">
																<a href="javascript:void(0);" class=" btn btn-approve text-white me-2">Approve</a>
																<a href="javascript:void(0);" class="btn btn-disable">Enable</a>
															</td>
														</tr>
													
													</tbody>
												</table>
											</div>
										</div>
										<div role="tabpanel" id="tab-7" class="tab-pane fade">
											<div class="table-responsive">
												<table class="table table-bordered table-hover datatable">
													<thead>
														<tr>
															<th></th>
															<th>Profile</th>
															<th>Designation</th>	
															<th>comments</th>	
															<th>Stars</th>	
															<th>Category</th>
															<th class="text-end">Actions</th>
														</tr>
													</thead>
												</table>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

					</div>
				</div>
			<!-- /Page Wrapper -->
		
        	</div>
		<!-- /Main Wrapper -->
		</div>
	
		<!-- jQuery -->
		<script src="assets/js/jquery-3.7.1.min.js"></script>
		
		<!-- Bootstrap Core JS -->
		<script src="assets/js/bootstrap.bundle.min.js"></script>
		
		<!-- Feather Icon JS -->
		<script src="assets/js/feather.min.js"></script>
		
		<!-- Slimscroll JS -->
		<script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
		
		<!-- Select2 JS -->
		<script src="assets/plugins/select2/js/select2.min.js"></script>
		
		<!-- Datatables JS -->
		<script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
		<script src="assets/plugins/datatables/datatables.min.js"></script>
		
		<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

		<!-- Custom JS -->
		<script src="assets/js/script.js"></script>

	</body>
</html>