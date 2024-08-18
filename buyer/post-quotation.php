

<?php
session_start();
require_once '../admin/includes/db.php';

// Fetch industries from the database
$industryQuery = "SELECT id, name FROM industry ORDER BY name ASC";
$industryResult = $conn->query($industryQuery);

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Store form details in session
    $_SESSION['quotation'] = [
        'title' => $_POST['title'],
        'industry_id' => $_POST['industry_id'],
        'category_id' => $_POST['category_id'],
        'deadline' => $_POST['deadline'],
        'tags' => $_POST['tags'],
        'items' => json_decode($_POST['items'], true), // JSON-encoded items array
        'county' => $_POST['county'],
        'town' => $_POST['town'],
        'delivery_location' => $_POST['delivery_location'],
        'preferred_delivery_day' => $_POST['preferred_delivery_day'],
        'description' => $_POST['description']
    ];

    // Handle file upload
    if (isset($_FILES['written_quote']) && $_FILES['written_quote']['error'] === UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['written_quote']['tmp_name'];
        $fileName = $_FILES['written_quote']['name'];
        $filePath = '../uploads/' . $fileName;
        move_uploaded_file($fileTmpPath, $filePath);
        $_SESSION['quotation']['written_quote'] = $filePath;
    }

    // Redirect to the next page
    header('Location: project-confirmation.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0">
    <title>Post Quotation</title>
    <?php include_once '../includes/icon.php' ?>
    		<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
	
	<!-- Fontawesome CSS -->
	<link rel="stylesheet" href="../assets/plugins/fontawesome/css/fontawesome.min.css">
	<link rel="stylesheet" href="../assets/plugins/fontawesome/css/all.min.css">
	
	<!-- Bootstrap Tag CSS -->
	<link rel="stylesheet" href="../assets/plugins/bootstrap-tagsinput/css/bootstrap-tagsinput.css">
	
	<!-- Datetimepicker CSS -->
	<link rel="stylesheet" href="../assets/css/bootstrap-datetimepicker.min.css">
	
	<!-- Select2 CSS -->
	<link rel="stylesheet" href="../assets/plugins/select2/css/select2.min.css">
	
	<!-- Summernote CSS -->
	<link rel="stylesheet" href="../assets/plugins/summernote/dist/summernote-lite.css">
	
	<!-- Main CSS -->
	<link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <div class="main-wrapper">
        <?php include_once '../includes/header.php' ?>

        <div class="bread-crumb-bar">
            <!-- Breadcrumb content -->
        </div>
                        
        <div class="content">    
            <div class="container">
                <div class="row">        
                    <div class="col-md-12">        
                        <div class="select-project mb-4">        
                            <form action="post-quotation.php" method="POST" enctype="multipart/form-data">    
                                <div class="title-box widget-box">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <h4>Basic Details</h4>
                                        </div>
                                        <div class="col-lg-12 col-md-12">
                                            <div class="mb-3">
                                                <label class="focus-label">Quotation Title</label>
                                                <input type="text" name="title" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-12">
                                            <div class="mb-3">
                                                <label class="focus-label">Quotation Industry</label>
                                                <select name="industry_id" id="industry_id" class="form-control select" required>
                                                    <option value="">Select Industry</option>
                                                    <?php while ($row = $industryResult->fetch_assoc()): ?>
                                                        <option value="<?= $row['id'] ?>"><?= htmlspecialchars($row['name']) ?></option>
                                                    <?php endwhile; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-12">
                                            <div class="mb-3">
                                                <label class="focus-label">Quotation Category</label>
                                                <select name="category_id" id="category_id" class="form-control select" required>
                                                    <option value="">Select Category</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 ">
                                            <div class="mb-3">
                                                <label class="focus-label">Deadline Date</label>
                                                <div class="cal-icon">
                                                    <input type="text" name="deadline" class="form-control datetimepicker" placeholder="Choose" required>
                                                </div>    
                                            </div>
                                        </div>                                    
                                        
                                        <div class="col-lg-12 col-md-12">
                                            <div class="mb-3">
                                                <label class="focus-label">Tags</label>
                                                <input type="text" name="tags" class="form-control" required>
                                            </div>
                                        </div>
                                        
                                        <div class="col-lg-12 my-3">
                                            <h4>Add Items</h4>
                                        </div>
                                        <div class="hours-rates">
                                            <div class="row">
                                                <div class="col-lg-3 col-md-12">
                                                    <div class="mb-3">
                                                        <label class="focus-label">Item Name</label>
                                                        <input type="text" name="item_name[]" class="form-control" placeholder="Enter Name of Item" required>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-md-6 ">
                                                    <div class="mb-3">
                                                        <label class="focus-label">Quantity</label>
                                                        <input type="number" name="item_quantity[]" class="form-control" placeholder="Enter Number of Items" required>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-md-6 ">
                                                    <div class="mb-3">
                                                        <label class="focus-label">Budget (Kes)</label>
                                                        <input type="number" name="item_budget[]" class="form-control" placeholder="Estimated Budget" required>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-md-6 ">
                                                    <div class="mb-3 btn-item">
                                                        <button type="button" class="btn next-btn add-item">Add</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="table-top-section">
                                                    <div class="table-header">
                                                        <h5 class="mb-0">Added Items</h5>
                                                    </div>
                                                </div>
                                                <div class="table-responsive">
                                                    <div class="col-lg-9 col-md-12 ">
                                                        <table class="table" id="items_table">
                                                            <thead>
                                                                <tr>
                                                                    <th>No</th>
                                                                    <th>Item Name</th>
                                                                    <th>Quantity</th>
                                                                    <th>Budget</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody id="items_body">
                                                                <!-- Items will be dynamically added here -->
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-lg-12 my-4">
                                            <h4>Attachment</h4>
                                            <p>Add a written quote. You can attach up to 10 files. The size of each document should be below 2MB.</p>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="attach-file">
                                                <i class="fa fa-pdf"></i>
                                                Attach a written receipt
                                                <input type="file" name="written_quote" accept=".pdf,.doc,.docx" required>
                                            </div>
                                            <div class="filename">
                                                <ul id="file_list">
                                                    <!-- Attached files will be listed here -->
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 my-3">
                                            <h4>Other Details</h4>
                                        </div>
                                        <div class="col-lg-6 col-md-12">
                                            <div class="mb-3">
                                                <label class="focus-label">County</label>
                                                <input type="text" name="county" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-12">
                                            <div class="mb-3">
                                                <label class="focus-label">Town</label>
                                                <input type="text" name="town" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-12">
                                            <div class="mb-3">
                                                <label class="focus-label">Delivery location</label>
                                                <input type="text" name="delivery_location" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-12">
                                            <div class="mb-3">
                                                <label class="focus-label">Preferred Delivery Day</label>
                                                <input type="text" name="preferred_delivery_day" class="form-control" required>
                                            </div>
                                        </div>
                                        
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label class="focus-label">Write Description of Quotation</label>
                                                <textarea name="description" class="form-control" required></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 text-end">
                                            <div class="btn-item">
                                                <button type="reset" class="btn reset-btn">Reset</button>
                                                <button type="submit" class="btn next-btn">Post a Job</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>                    
                            </div>                    
                        </div>                    
                    </div>                    
                </div>                    
            </div>                    
        </div>
   
        <?php include_once '../includes/footer.php' ?>
    </div>

    <!-- jQuery -->
    <script src="../assets/js/jquery-3.7.1.min.js"></script>
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/plugins/select2/js/select2.min.js"></script>
    <script src="../assets/plugins/bootstrap-tagsinput/js/bootstrap-tagsinput.js"></script>
    <script src="../assets/js/moment.min.js"></script>
    <script src="../assets/js/bootstrap-datetimepicker.min.js"></script>
    <script src="../assets/plugins/summernote/dist/summernote-lite.min.js"></script>
    <script src="../assets/js/script.js"></script>   

    <script>
        $(document).ready(function() {
            // Load categories based on the selected industry
            $('#industry_id').change(function() {
                var industry_id = $(this).val();
                if (industry_id) {
                    $.ajax({
                        url: 'fetch_categories.php',
                        type: 'POST',
                        data: {industry_id: industry_id},
                        success: function(data) {
                            $('#category_id').html(data);
                        }
                    });
                } else {
                    $('#category_id').html('<option value="">Select Category</option>');
                }
            });

            // Handle adding items to the table
            $('.add-item').click(function(e) {
                e.preventDefault();
                var item_name = $('input[name="item_name[]"]').val();
                var item_quantity = $('input[name="item_quantity[]"]').val();
                var item_budget = $('input[name="item_budget[]"]').val();

                if (item_name && item_quantity && item_budget) {
                    var row = '<tr>' +
                                '<td></td>' +
                                '<td>' + item_name + '</td>' +
                                '<td>' + item_quantity + '</td>' +
                                '<td>' + item_budget + '</td>' +
                              '</tr>';
                    $('#items_body').append(row);
                    $('input[name="item_name[]"], input[name="item_quantity[]"], input[name="item_budget[]"]').val('');
                }
            });
        });
    </script>
</body>
</html>
