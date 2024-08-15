<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'admin') {
    header("location: ../login");
    exit;
}
require_once '../includes/db.php';

include '../includes/head.php';
include '../includes/sidebar.php';

// Pagination settings
$itemsPerPage = 5;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $itemsPerPage;

// Fetch users with pagination
$sql_users = "SELECT id, username, role FROM users LIMIT ? OFFSET ?";
$stmt = $conn->prepare($sql_users);
$stmt->bind_param("ii", $itemsPerPage, $offset);
$stmt->execute();
$result_users = $stmt->get_result();

// Get the total number of users for pagination
$sql_total_users = "SELECT COUNT(*) as total FROM users";
$result_total = $conn->query($sql_total_users);
$row_total = $result_total->fetch_assoc();
$totalItems = $row_total['total'];
$totalPages = ceil($totalItems / $itemsPerPage);
?>

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Manage Users</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="../index.php">Admin Dashboard</a></li>
            <li class="breadcrumb-item active">Users</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-6">
          <div class="card">
            <div class="card-header border-0">
              <h3 class="card-title">Users Available</h3>
              <div class="card-tools">
                <a href="#" class="btn btn-tool btn-sm">
                  <i class="fas fa-bars"></i>
                </a>
              </div>
            </div>

            <div class="card-body table-responsive p-0">
            <table class="table table-striped table-valign-middle">
              <thead>
                  <tr>
                      <th>Username</th>
                      <th>Role</th>
                      <th>Delete</th>
                  </tr>
              </thead>
              <tbody>
                  <?php
                  if ($result_users->num_rows > 0) {
                      while ($row = $result_users->fetch_assoc()) {
                          $user_id = $row['id'];
                          echo "<tr>
                                  <td>{$row['username']}</td>
                                  <td>{$row['role']}</td>
                                  <td><a href='create-user.php?delete_user={$user_id}' onclick=\"return confirm('Are you sure you want to delete this user?');\" class='btn btn-danger'>Delete</a></td>
                              </tr>";
                      }
                  } else {
                      echo "<tr><td colspan='3'>No users found.</td></tr>";
                  }
                  ?>
              </tbody>
            </table>

            <div class="text-center mt-3">
              <nav class="justify-content-end">
                <ul class="pagination">
                  <?php if ($page > 1): ?>
                    <li class="page-item">
                      <a class="page-link" href="?page=<?= $page - 1 ?>">Previous</a>
                    </li>
                  <?php endif; ?>

                  <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                    <li class="page-item<?= $i == $page ? ' active' : '' ?>">
                      <a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a>
                    </li>
                  <?php endfor; ?>

                  <?php if ($page < $totalPages): ?>
                    <li class="page-item">
                      <a class="page-link" href="?page=<?= $page + 1 ?>">Next</a>
                    </li>
                  <?php endif; ?>
                </ul>
              </nav>
            </div>

            </div>
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col-md-6 -->
        <div class="col-lg-6">
        <div class="card">
          <div class="card-info">
              <div class="card-header">
                  <h3 class="card-title">Add a new User</h3>
              </div>
              <form class="form-horizontal" action="create-user.php" method="post">
                  <div class="card-body">
                      <div class="form-group row">
                          <label for="username" class="col-sm-2 col-form-label">Username</label>
                          <div class="col-sm-10">
                              <input type="text" name="username" id="username" class="form-control" placeholder="Username" required>
                          </div>
                      </div>
                      <div class="form-group row">
                          <label for="password" class="col-sm-2 col-form-label">Password</label>
                          <div class="col-sm-10">
                              <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
                          </div>
                      </div>
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer">
                      <button type="submit" name="add_user" class="btn btn-info">Add User</button>
                      <button type="reset" class="btn btn-default float-right">Cancel</button>
                  </div>
                  <!-- /.card-footer -->
              </form>
          </div>
         </div>

      </div>
    </div>
  </div>
  <!-- /.content -->
</div>
</div>

<?php
// Handling form submission for adding a new user
if (isset($_POST['add_user'])) {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hashing the password for security
    $role = 'admin'; // Default role

    // Inserting the new user into the database
    $stmt = $conn->prepare("INSERT INTO users (username, password, role) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $password, $role);

    if ($stmt->execute()) {
        echo "<script>alert('User added successfully!'); window.location.href='create-user.php';</script>";
    } else {
        echo "<script>alert('Error adding user. Please try again.'); window.location.href='create-user.php';</script>";
    }

    $stmt->close();
}

// Handling user deletion
if (isset($_GET['delete_user'])) {
    $user_id = $_GET['delete_user'];

    // Deleting the user from the database
    $stmt = $conn->prepare("DELETE FROM users WHERE id = ?");
    $stmt->bind_param("i", $user_id);

    if ($stmt->execute()) {
        echo "<script>alert('User deleted successfully!'); window.location.href='create-user.php';</script>";
    } else {
        echo "<script>alert('Error deleting user. Please try again.'); window.location.href='create-user.php';</script>";
    }

    $stmt->close();
}
?>

<!-- /.content-wrapper -->
<?php
include '../includes/footer.php';
?>
