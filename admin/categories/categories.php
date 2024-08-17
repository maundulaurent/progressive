<?php 
session_start();
require_once '../includes/db.php'; // Include your database connection

// Fetch categories from the database
$query = "SELECT * FROM categories ORDER BY id ASC";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
		<title>Quotations | Categories</title>
		
		<!-- Favicon -->
		<?php include_once '../includes/icon.php' ?>
		
		<?php include_once '../includes/links.php' ?>
		
    </head>
    <body>
	
		<!-- Main Wrapper -->
        <div class="main-wrapper">
		
			<!-- Header -->
			<?php include_once '../includes/header.php' ?>
			<!-- /Header -->

			<!-- Sidebar -->
			<?php include_once '../includes/sidebar.php' ?>
			<!-- /Sidebar -->
			
			
			<!-- Page Wrapper -->
            <div class="page-wrapper">
                <div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header">
						<div class="row align-items-center">
							<div class="col">
								    <!-- Alert for actions (Add, Edit, Delete) -->
								<?php if (isset($_SESSION['success'])): ?>
									<div class="alert alert-success alert-dismissible fade show" role="alert">
										<?php echo $_SESSION['success']; unset($_SESSION['success']); ?>
										<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
									</div>
								<?php endif; ?>
								<?php if (isset($_SESSION['error'])): ?>
									<div class="alert alert-danger alert-dismissible fade show" role="alert">
										<?php echo $_SESSION['error']; unset($_SESSION['error']); ?>
										<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
									</div>
								<?php endif; ?>
									<!-- End Alerts -->
								<h3 class="page-title">Categories</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.html">Home</a>
									</li>
									<li class="breadcrumb-item active">Categories</li>
								</ul>
							</div>
							<div class="col-auto">
								<a href="javascript:void(0);" class="btn add-button me-2" data-bs-toggle="modal" data-bs-target="#add-category">
									<i class="fas fa-plus"></i>
								</a>
								<a class="btn filter-btn" href="javascript:void(0);" id="filter_search">
									<i class="fas fa-filter"></i>
								</a>
							</div>
						</div>
					</div>
					<!-- /Page Header -->

					<!-- Search Filter -->
					<div class="card filter-card" id="filter_inputs">
						<div class="card-body pb-0">
							<form action="#" method="post">
								<div class="row filter-row">
									<div class="col-sm-6 col-md-3">
										<div class="form-group">
											<label>Add Categories</label>
											<input class="form-control" type="text">
										</div>
									</div>
									<div class="col-sm-6 col-md-3">
										<div class="form-group">
											<label>From Date</label>
											<div class="cal-icon">
												<input class="form-control datetimepicker" type="text">
											</div>
										</div>
									</div>
									<div class="col-sm-6 col-md-3">
										<div class="form-group">
											<label>To Date</label>
											<div class="cal-icon">
												<input class="form-control datetimepicker" type="text">
											</div>
										</div>
									</div>
									<div class="col-sm-6 col-md-3">
										<div class="form-group">
											<button class="btn btn-primary btn-block" type="submit">Submit</button>
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
					<!-- /Search Filter -->

					<div class="row">
						<div class="col-sm-12">
							<div class="card">
								<div class="card-body">
									<div class="table-responsive">
										<table class="table table-center table-hover mb-0 datatable">
											<thead>
												<tr>
													<th>S.No</th>
													<th>Category Name</th>    
													<th class="text-end">Actions</th>
												</tr>
											</thead>
											<tbody>
												<?php if ($result->num_rows > 0): ?>
													<?php $s_no = 1; while ($row = $result->fetch_assoc()): ?>
														<tr>
															<td><?php echo $s_no++; ?></td>
															<td><?php echo htmlspecialchars($row['name']); ?></td>
															<td class="text-end">
																<a href="javascript:void(0);" class="btn btn-sm btn-secondary me-2" data-bs-toggle="modal" data-bs-target="#edit-category" data-id="<?php echo $row['id']; ?>" data-name="<?php echo htmlspecialchars($row['name']); ?>"><i class="far fa-edit"></i></a> 
																<a href="javascript:void(0);" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#delete_category" data-id="<?php echo $row['id']; ?>"><i class="far fa-trash-alt"></i></a>
															</td>
														</tr>
													<?php endwhile; ?>
												<?php else: ?>
													<tr>
														<td colspan="3" class="text-center">No categories found</td>
													</tr>
												<?php endif; ?>
											</tbody>
										</table>
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
		
		<!-- The Modal -->
<!-- Add Category Modal -->
<div class="modal fade custom-modal" id="add-category">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Category</h4>
                <button type="button" class="close" data-bs-dismiss="modal"><span>&times;</span></button>
            </div>
            <div class="modal-body">
                <form action="add.php" method="POST">
                    <div class="form-group">
                        <label>Category Name</label>
                        <input type="text" name="category_name" class="form-control" placeholder="Enter Category Name" required>
                    </div>
                    <div class="mt-4">
                        <button type="submit" class="btn btn-primary btn-block">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /Add Category Modal -->

<!-- Edit Category Modal -->
<div class="modal fade custom-modal" id="edit-category">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Category</h4>
                <button type="button" class="close" data-bs-dismiss="modal"><span>&times;</span></button>
            </div>
            <div class="modal-body">
                <form action="edit.php" method="POST">
                    <input type="hidden" name="category_id" id="edit-category-id">
                    <div class="form-group">
                        <label>Category Name</label>
                        <input type="text" name="category_name" id="edit-category-name" class="form-control" required>
                    </div>
                    <div class="mt-4">
                        <button type="submit" class="btn btn-primary btn-block">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /Edit Category Modal -->

<!-- Delete Category Modal -->
<div class="modal custom-modal fade" id="delete_category" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <div class="form-header">
                    <h3>Delete Category</h3>
                    <p>Are you sure you want to delete this category?</p>
                </div>
                <div class="modal-btn delete-action">
                    <form action="delete.php" method="POST">
                        <input type="hidden" name="category_id" id="delete-category-id">
                        <div class="row">
                            <div class="col-6">
                                <button type="submit" class="btn btn-primary continue-btn">Delete</button>
                            </div>
                            <div class="col-6">
                                <button type="button" class="btn btn-primary cancel-btn" data-bs-dismiss="modal">Cancel</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /Delete Category Modal -->

<!-- Rest of the categories.php file remains the same -->



		<!-- jQuery -->
		<?php include_once '../includes/scripts.php' ?>

		<!-- Additional js -->

		<script>
			document.addEventListener('DOMContentLoaded', function () {
				$('#edit-category').on('show.bs.modal', function (event) {
					var button = $(event.relatedTarget);
					var categoryId = button.data('id');
					var categoryName = button.data('name');

					var modal = $(this);
					modal.find('#edit-category-id').val(categoryId);
					modal.find('#edit-category-name').val(categoryName);
				});

				$('#delete_category').on('show.bs.modal', function (event) {
					var button = $(event.relatedTarget);
					var categoryId = button.data('id');

					var modal = $(this);
					modal.find('#delete-category-id').val(categoryId);
				});
			});
		</script>

	</body>
</html>