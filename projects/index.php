<!---header---->
<?php
include("../global/header.php");
if (!isset($_SESSION['login_user'])) {
    header("Location: /pms/login.php");
}
include("../global/connection.php");
$Sql = " SELECT project.id,project.name,project.project_name,project.email,status.sname,status.color
 FROM project
 INNER JOIN status
 ON project.status_id = status.id";
$projects = $conn->query($Sql);
?>
<?php if (isset($_SESSION['login_user'])) { ?>
    <!----container---->
    <div>
        <div class="container py-3">
            <div class="row d-flex justify-content-space-between">
            <div class="col">
                <h3>List Of Projects</h3> </div>
                <?php if (isset($_GET['updated'])) {
                    $updated = $_GET['updated']; ?>
                    <?php if ($updated) { ?>
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>Success!</strong> Your changes are saved.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php  } ?>
                <?php } ?>
                <div class="col text-end"><a class="btn btn-primary" href="create.php" role="button">Create Project</a></div>
                </div>
                <!-------table---------->
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">id</th>
                            <th scope="col">Name</th>
                            <th scope="col">Project Name</th>
                            <th scope="col">Email address</th>
                            <th scope="col">Status</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        <?php while ($project = $projects->fetch_assoc()) {
                            $id = $project['id'] ?>
                            <tr>
                                <td><span class="badge text-bg-dark"><?php echo $project['id'] ?></span></td>
                                <td><?php echo $project['name'] ?></td>
                                <td><?php echo $project['project_name'] ?></td>
                                <td><?php echo $project['email'] ?></td>
                                <td> <span class="badge text-bg-<?php echo $project['color'] ?>"><?php echo $project['sname'] ?></span></td>
                                <!-- <td><span class="badge text-bg-primary">Active</span></td> -->
                                <td><a class="btn btn-primary btn-sm" href="view.php?id=<?php echo $id ?>" role="button">View</a>
                                    <a class="btn btn-success btn-sm" href="edit.php?id=<?php echo $id ?>" role="button">Modify</a>
                                    <a class="btn btn-danger btn-sm" href="delete.php?id=<?php echo $id ?>" role="button">Delete</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">Next</a></li>
                </ul>
            </nav>
            </div>
        </div>
    </div>
<?php } ?>
<!------footer--->
<?php include("../global/footer.php"); ?>