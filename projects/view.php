<?php
include("../global/header.php");
if (!isset($_SESSION['login_user'])) {
    header("Location: /pms/login.php");
}
include("../global/connection.php");
// getting the details of the project
if (isset($_GET['id']))
    $id = $_GET['id'];
$query = "SELECT project.id,project.name,project.project_name,project.email,project.description,status.sname,status.color
FROM project
INNER JOIN status
ON project.status_id = status.id WHERE project.id='$id'";
$projects = $conn->query($query);
// getting users in dropdown 
$sstatus = "SELECT * from users";
$run = $conn->query($sstatus);
// getting the details from the database on our tasks table
$show = "SELECT tasks.id,tasks.taskname,tasks.taskdetails,users.fname
FROM tasks
INNER JOIN users  
ON tasks.user_id = users.id";
$tasks = $conn->query($show);
?>
<head>
    <title>Your Project</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Include Bootstrap JavaScript and jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<div class="container col-6 py-3">
    <div class="row">
        <div class="col-12">
            <?php while ($project = $projects->fetch_assoc()) { ?>
                <div class="card mb-4">
                    <div class="card-header  text-black" style="background-color: #E4D6A7;" >
                       <strong> Project:</strong> <?php echo $project['project_name'] ?>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h6 class="card-title">Details:</h6>
                                <ul class="list-unstyled">
                                    <li><strong>Email:</strong> <?php echo $project['email'] ?></li>
                                    <li><strong>Status:</strong> <span class="badge bg-<?php echo $project['color'] ?>"><?php echo $project['sname'] ?></span></li>
                                    <li><strong>Created By:</strong> <?php echo $project['name'] ?></li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <h6 class="card-title">Description:</h6>
                                <p><?php echo $project['description'] ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
<div class="container py-3">
    <div class="card">
        <div class="card-header" style="background-color:#E4D6A7">
            <div class="row d-flex justify-content-space-between">
                <div class="col">
                    <h2>Tasks</h2>
                </div>
                <div class="col text-end">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Add Task</button>
                </div>
                <div class="modal fade" id="myModal">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Add Task </h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                                <form action="task.php" method="post">
                                    <div class="form-group">
                                        <label for="inputField">Task Name</label>
                                        <input type="text" class="form-control" name="taskname" id="inputField" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="hidden" class="form-control" name="project_id" id="project_id" value="<?php echo $id ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputField">Task Details</label>
                                        <textarea type="text" class="form-control" name="taskdetails" id="inputField" required></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputField">Assign To</label>
                                        <select class="form-control" name="assignedto" id="inputField" required>
                                            <option value="" selected disabled>Select a User</option>
                                            <?php while ($row = $run->fetch_assoc()) { ?>
                                                <option value="<?php echo $row['id'] ?>"><?php echo $row['fname'] ?> </option>
                                            <?php }
                                            ?>
                                        </select>
                                    </div>
                                    <!-- Add more form fields if needed -->
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Task Name</th>
                        <th scope="col">Task Details</th>
                        <th scope="col">Assigned To</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($view = $tasks->fetch_assoc()) { ?>
                        <tr>
                            <th scope="row"> <span class="badge text-bg-dark"><?php echo $view['id'] ?></span></th>
                            <td><?php echo $view['taskname'] ?></td>
                            <td><?php echo $view['taskdetails'] ?></td>
                            <td><?php echo $view['fname'] ?></td>
                            <td>
                                <a class="btn btn-success btn-sm " href="#" role="button">Modify</a>
                                <a class="btn btn-danger btn-sm" href="#" role="button">Delete</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php include("../global/footer.php"); ?>