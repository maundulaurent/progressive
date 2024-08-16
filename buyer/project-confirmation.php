<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0">
		<title>Project Confirmation</title>
		
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
										<li class="breadcrumb-item"><a href="index.html">Home</a></li>
										<li class="breadcrumb-item" aria-current="page">Post a Project</li>
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
												<h5>Create desktop applications with source PHP</h5>
												<ul>
													<li>
														<a href="#"><i class="feather-edit me-2"></i>Edit this job</a>
													</li>
													<li>
														<a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#post-sucess">Post a Job</a>
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
														<h5>Category : <span>Web development </span></h5>
													</li>
													<li>
														<h5>Project Duration :  <span> 3 Month </span></h5>
													</li>
													<li>
														<h5>Freelancer Type :   <span>Full Time</span></h5>
													</li>
													<li>
														<h5>Freelancer Level :   <span>Intermediate</span></h5>
													</li>
												</ul>
												<div class="freelance-tags">
													<h6>Tags :</h6>
													<a href="javascript:void(0);"><span class="badge badge-pill badge-design">Web Design</span></a>
													<a href="javascript:void(0);"><span class="badge badge-pill badge-design">UI Design</span></a>
													<a href="javascript:void(0);"><span class="badge badge-pill badge-design">Node Js</span></a>
												</div>
											</div>
										</div>
										<div class="col-lg-12">
											<h4 class="detailshead">Skills</h4>
										</div>
										<div class="col-lg-12 col-md-12">
											<div class="catergyset">
												<div class="freelance-tags">
													<a href="javascript:void(0);"><span class="badge badge-pill badge-design">Website Mockup</span></a>
													<a href="javascript:void(0);"><span class="badge badge-pill badge-design"> Design</span></a>
													<a href="javascript:void(0);"><span class="badge badge-pill badge-design">Figma</span></a>
													<a href="javascript:void(0);"><span class="badge badge-pill badge-design">Sketch</span></a>
												</div>
											</div>
										</div>
										<div class="col-lg-12">
											<h4 class="detailshead">Budget</h4>
										</div>
										<div class="col-lg-12 col-md-12">
											<div class="catergyset  freelance-tags">
												<ul class="m-0">
													<li>
														<h5>Type : <span>Fixed </span></h5>
													</li>
													<li>
														<h5>Amount :  <span>  $200</span></h5>
													</li>
												</ul>
											</div>
										</div>
										<div class="col-lg-12">
											<h4 class="detailshead">Attachment</h4>
										</div>
										<div class="col-lg-12 col-md-12">
											<div class="catergyset  freelance-tags">
												<ul class="m-0">
													<li>
														<h5>No of Files :  <span>5 </span></h5>
													</li>
												</ul>
											</div>
										</div>
										<div class="col-lg-12">
											<h4 class="detailshead">Other</h4>
										</div>
										<div class="col-lg-12 col-md-12">
											<div class="catergyset ">
												<ul class="m-0">
													<li>
														<h5>Languages : <span>English, Arabic </span></h5>
													</li>
													<li>
														<h5>Fluency : <span>Intermediate </span></h5>
													</li>
												</ul>
											</div>
											<div class="category-para">
												<p>Please provide details such as the topic or subject of the project, the goals and objectives, any specific requirements, and any other relevant information you would like to include in the project description. The more details you provide, the better I can assist you in crafting an accurate and compelling project description.</p>
											</div>
										</div>
									<!-- /Skills Content -->
									</div>
								</div>
								<!-- Project Title -->
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