<!---header---->
<?php
include("../global/header.php");
if (!isset($_SESSION['login_user'])) {
    header("Location: /pms/login.php");
}
include("../global/connection.php");
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $projectresult = "SELECT * from project where id='$id'";
    $data = $conn->query($projectresult);
    $prjctdata = $data->fetch_assoc();
    $prjctdata['id'];
}
$sagar = "SELECT id,sname from status";
$run = $conn->query($sagar);
if (isset($_POST["name"]) && isset($_POST["project_name"]) && isset($_POST["email"]) && isset($_POST["description"]) && isset($_POST["status"])) {
    $name = $_POST["name"];
    $project_name = $_POST["project_name"];
    $email = $_POST["email"];
    $description = $_POST["description"];
    $status = $_POST["status"];
    $sqlqry = "UPDATE project SET name='$name',project_name='$project_name',email='$email',description='$description',status_id='$status' WHERE id=$id";
    $updated = $conn->query($sqlqry);
    if($updated)
    header("Location: /pms/projects/index.php?updated=1");
}
?>
<!--------form------>
<?php if (isset($_SESSION['login_user'])) { ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-6">
                <form method="post">
                <div class="my-3">
                        <h3>Edit User</h3>
                    </div>
                    <!-----name------>
                    <div class="mb-3">
                        <label for="forname" class="form-label">Name</label>
                        <input type="text" class="form-control" id="forname" name="name" value="<?php echo  $prjctdata['name']; ?>" aria-describedby="nameHelp">
                    </div>
                    <!------project name----->
                    <div class="mb-3">
                        <label for="prjctname" class="form-label">Project Name</label>
                        <input type="text" class="form-control" id="prjctname" name="project_name" value="<?php echo  $prjctdata['project_name']; ?>" aria-describedby="prjctlHelp">
                    </div>
                    <!-------email------->
                    <div class="mb-3">
                        <label for="foremail" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="foremail" name="email" value="<?php echo  $prjctdata['email']; ?>" aria-describedby="emailHelp">
                    </div>
                    <!------description---->
                    <div class="form-floating">
                        <textarea class="form-control" placeholder="Leave a comment here" name="description" id="ddescription"> <?php echo  $prjctdata['description']; ?></textarea>
                        <label for="ddescription">Description</label>
                    </div>
                    <!---status dropdown----->
                    <select class="form-select my-3" name="status" aria-label="Default select example">
                        <option disabled selected>Status</option>
                        <?php while ($row = $run->fetch_assoc()) { ?>
                            <option value="<?php echo $row['id'] ?>" <?php if ($prjctdata['status_id'] == $row['id']) echo 'selected' ?>><?php echo $row['sname'] ?> </option>
                        <?php }
                        ?>
                    </select>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <!-----submit btn------->
                </form>
            </div>
        </div>
    </div>
    </div>
<?php } ?>
<!------footer--->
<?php include("../global/footer.php");?>