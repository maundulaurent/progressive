<?php 
session_start();
require_once '../includes/db.php'; 

// Fetch industries from the database
$query = "SELECT * FROM industry ORDER BY id ASC";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Quotations | Industry</title>
    
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
                            <h3 class="page-title">Industry</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="breadcrumb-item active">Industry</li>
                            </ul>
                        </div>
                        <div class="col-auto">
                            <a href="javascript:void(0);" class="btn add-button me-2" data-bs-toggle="modal" data-bs-target="#add-industry">
                                <i class="fas fa-plus"></i>
                            </a>
                            <a class="btn filter-btn" href="javascript:void(0);" id="filter_search">
                                <i class="fas fa-filter"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- /Page Header -->

                <!-- Industry Table -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-center table-hover mb-0 datatable">
                                        <thead>
                                            <tr>
                                                <th>S.No</th>
                                                <th>Industry Name</th>    
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
                                                            <a href="javascript:void(0);" class="btn btn-sm btn-secondary me-2" data-bs-toggle="modal" data-bs-target="#edit-industry" data-id="<?php echo $row['id']; ?>" data-name="<?php echo htmlspecialchars($row['name']); ?>"><i class="far fa-edit"></i></a> 
                                                            <a href="javascript:void(0);" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#delete_industry" data-id="<?php echo $row['id']; ?>"><i class="far fa-trash-alt"></i></a>
                                                        </td>
                                                    </tr>
                                                <?php endwhile; ?>
                                            <?php else: ?>
                                                <tr>
                                                    <td colspan="3" class="text-center">No Industries found</td>
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
    
    <!-- Add Industry Modal -->
    <div class="modal fade custom-modal" id="add-industry">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add Industry</h4>
                    <button type="button" class="close" data-bs-dismiss="modal"><span>&times;</span></button>
                </div>
                <div class="modal-body">
                    <form action="add_industry.php" method="POST">
                        <div class="form-group">
                            <label>Industry Name</label>
                            <input type="text" name="industry_name" class="form-control" placeholder="Enter Industry Name" required>
                        </div>
                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary btn-block">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /Add Industry Modal -->

    <!-- Edit Industry Modal -->
    <div class="modal fade custom-modal" id="edit-industry">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Industry</h4>
                    <button type="button" class="close" data-bs-dismiss="modal"><span>&times;</span></button>
                </div>
                <div class="modal-body">
                    <form action="edit_industry.php" method="POST">
                        <input type="hidden" name="industry_id" id="edit-industry-id">
                        <div class="form-group">
                            <label>Industry Name</label>
                            <input type="text" name="industry_name" id="edit-industry-name" class="form-control" required>
                        </div>
                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary btn-block">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /Edit Industry Modal -->

    <!-- Delete Industry Modal -->
    <div class="modal custom-modal fade" id="delete_industry" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="form-header">
                        <h3>Delete Industry</h3>
                        <p>Are you sure you want to delete this industry?</p>
                    </div>
                    <div class="modal-btn delete-action">
                        <form action="delete_industry.php" method="POST">
                            <input type="hidden" name="industry_id" id="delete-industry-id">
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
    <!-- /Delete Industry Modal -->

    <!-- jQuery -->
    <?php include_once '../includes/scripts.php' ?>

    <!-- Additional JavaScript -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            $('#edit-industry').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget);
                var industryId = button.data('id');
                var industryName = button.data('name');

                var modal = $(this);
                modal.find('#edit-industry-id').val(industryId);
                modal.find('#edit-industry-name').val(industryName);
            });

            $('#delete_industry').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget);
                var industryId = button.data('id');

                var modal = $(this);
                modal.find('#delete-industry-id').val(industryId);
            });
        });
    </script>

</body>
</html>
