<!---------header---------->
<?php
include("../global/header.php");
if (!isset($_SESSION['login_user'])) {
    header("Location: http://localhost/pms/login.php");
}
include("../global/connection.php");
$sql = "select users.id, users.fname, users.email, users.gender,usertype.user_type
FROM users
INNER JOIN usertype
ON users.usertype_id  = usertype.id";
$users = $conn->query($sql);
// Pagination variables
$itemsPerPage = 5; // Number of items per page
$totalUsers = $users->num_rows; // Total number of users
$totalPages = ceil($totalUsers / $itemsPerPage); // Calculate total pages
// Get current page from query parameter, default to 1
$current_page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$startIndex = ($current_page - 1) * $itemsPerPage;
// Fetch users with pagination
$sql .= " LIMIT $startIndex, $itemsPerPage";
$users = $conn->query($sql);
?>
<!--container----->
<div class="container py-3">
    <div class="row d-flex justify-content-space-between">
    <div class=" col ">
        <h3>List Of Users</h3></div>
        <div class="col text-end"><a class="btn btn-primary" href="<?php echo $url ?>users/create.php" 
        role="button">Create User</a></div>
        </div>   
        <!----table-------->
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email address</th>
                    <th scope="col">Gender</th>
                    <th scope="col">User Type</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                <?php while ($user = $users->fetch_assoc()) {
                    $id = $user['id'] ?>
                    <tr>
                        <td><span class="badge text-bg-dark"><?php echo $user['id'] ?></td>
                        <td><?php echo $user['fname'] ?></td>
                        <td><?php echo $user['email'] ?></td>
                        <td><?php echo $user['gender'] ?></td>
                        <td><?php echo $user['user_type'] ?></td>
                        <td>
                            <a class="btn btn-success btn-sm" href="edit.php?id=<?php echo $id ?>" role="button">Modify</a>
                            <a class="btn btn-danger btn-sm" href="delete.php?id=<?php echo $id ?>" role="button">Delete</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <nav aria-label="Page navigation example">
    <ul class="pagination">
        <?php if ($current_page > 1) { ?>
            <li class="page-item"><a class="page-link" href="?page=<?php echo $current_page - 1 ?>">Previous</a></li>
        <?php } else { ?>
            <li class="page-item disabled"><a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a></li>
        <?php } ?>
        
        <?php for ($page = 1; $page <= $totalPages; $page++) { ?>
            <li class="page-item <?php echo ($page === $current_page) ? 'active' : ''; ?>">
                <a class="page-link" href="?page=<?php echo $page ?>"><?php echo $page ?></a>
            </li>
        <?php } ?>
        
        <?php if ($current_page < $totalPages) { ?>
            <li class="page-item"><a class="page-link" href="?page=<?php echo $current_page + 1 ?>">Next</a></li>
        <?php } else { ?>
            <li class="page-item disabled"><a class="page-link" href="#" tabindex="-1" aria-disabled="true">Next</a></li>
        <?php } ?>
    </ul>
</nav>
    </div>
</div>
<?php include("../global/footer.php"); ?>