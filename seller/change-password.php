<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0">
		<title>KofeJob</title>

        <?php include_once '../includes/icon.php' ?>;
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
												<a href="freelancer-dashboard.html" class="nav-link ">
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
												<a href="freelancer-payout.html" class="nav-link ">
													<img src="../assets/img/icon/sidebar-icon-08.svg" alt="Img"> Payout
												</a>
											</li>
											<li class="nav-item">
												<a href="freelancer-statement.html" class="nav-link">
													<img src="../assets/img/icon/sidebar-icon-09.svg" alt="Img"> Statement
												</a>
											</li>
											<li class="nav-item submenu">
												<a href="freelancer-profile-settings.html" class="nav-link active">
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
														<a  href="freelancer-verify-identity.html">Verify Identity</a>
													</li>
													<li>
														<a class="active" href="freelancer-change-password.html">Changes Password</a>
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
							<div class="dashboard-sec payout-section freelancer-statements">
								<div class="page-title portfolio-title">
									<h3 class="mb-0">Change Password</h3>
								</div>
								<div class="row">
									
									<div class="col-md-12">
										<div class="input-block">
											<label class="focus-label">Old Password </label>
											<div class="position-relative">
												<input type="password" class="form-control floating pass-input">
												<div class="password-icon ">
													<span class="fas toggle-password fa-eye-slash"></span>
												</div>
											</div>
										</div>
									</div>
									<div class="col-lg-12">
										<div class="input-block">
											<label class="focus-label">New Password </label>
											<div class="position-relative">
												<input type="password" class="form-control floating pass-input1">
												<div class="password-icon ">
													<span class="fas toggle-password1 fa-eye-slash"></span>
												</div>
											</div>
										</div>
									</div>
									<div class="col-lg-12">
										<div class="input-block">
											<label class="focus-label">Confirm Password </label>
											<div class="position-relative">
												<input type="password" class="form-control floating pass-inputs">
												<div class="password-icon ">
													<span class="fas toggle-passwords fa-eye-slash"></span>
												</div>
											</div>
										</div>
									</div>
									<div class="col-lg-12">
										<div class="d-flex doc-btn">
											<a href="javascript:void(0);" class="btn btn-gray">Cancel</a>
											<a href="#password-changed" data-bs-toggle="modal" class="btn btn-primary">Update</a>
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
            <?php include_once '../includes/footer.php' ?>;
			<!-- /Footer -->
            <div class="modal fade" id="payout_modal">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4>Payout Setting</h4>
                            <span class="modal-close"><a href="javascript:void(0);" data-bs-dismiss="modal" aria-label="Close"><i class="fa fa-times orange-text"></i></a></span>
                        </div>
                        <div class="modal-body">
                            <div class="modal-info">
                                <h5>Payout Methods</h5>
                                <div class="payout-method-option">
                                    <div class="d-flex align-items-center">
                                        <div class="payout-icon">
                                            <img src="../assets/img/icon/bank-line.svg" alt="icon">
                                        </div>
                                        <div class="payout-method-content">
                                            <h5>Bank Transfer</h5>
                                            <p class="mb-0">Connect your bank account</p>
                                        </div>
                                    </div>
                                    <a class="badge badge-paid"><span>Connect</span></a>
                                </div>
                                <div class="payout-method-option">
                                    <div class="d-flex align-items-center">
                                        <div class="payout-icon">
                                            <img src="../assets/img/icon/paypal-line.svg" alt="icon">
                                        </div>
                                        <div class="payout-method-content">
                                            <h5>Paypal</h5>
                                            <p class="mb-0">Connect your Paypal account</p>
                                        </div>
                                    </div>
                                    <a class="badge badge-paid"><span>Connect</span></a>
                                </div>
                            </div>
                            <form action="freelancer-portfolio.html">
                                <div class="submit-section text-end">
                                    <a data-bs-dismiss="modal"  class="btn btn-cancel submit-btn">Cancel</a>
                                    <button type="submit" data-bs-dismiss="modal" class="btn btn-primary submit-btn">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
			</div>

			<!-- The Modal -->
			<div class="modal fade success-modal hire-modal" id="password-changed">
				<div class="modal-dialog modal-dialog-centered modal-md">
					<div class="modal-content">
						<div class="modal-body pt-4">	
							<div class="success-msg-content text-center">
								<h4>Password  Changed!!! </h4>
								<p>Your Password Changed successfully,<br>
									Please login to Continue</p>
								<a href="javascript:void(0);" data-bs-dismiss="modal" class="btn btn-primary mt-3">Okay</a>
							</div>	
						</div>
					</div>
				</div>
			</div>
			<!-- /The Modal -->
		</div>
		<!-- /Main Wrapper -->
	  
        <?php include_once '../includes/scripts.php' ?>;
		
		
	</body>
</html>