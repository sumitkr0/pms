<?php include("global/header.php");

if (!isset($_SESSION['login_user'])) {
  header("Location: /pms/login.php");
}
include("global/connection.php");

$Sql = " SELECT project.id,project.name,project.project_name,project.email,status.sname,status.color
 FROM project
 INNER JOIN status
 ON project.status_id = status.id";
$projects = $conn->query($Sql);
?>
<?php if (isset($_SESSION['login_user'])) { ?>
  <div class=" bg-img">
    <div class="container text-center">
      <div class="row">
        <div class="col-3 my-5">
          <div class="card">
            <div class="pt-3">
              <img src="assets/img/project.png" width="120" alt="...">
            </div>
<!-----------------dashboard contents----------------->            
            <div class="card-body">
              <h5 class="card-title">Projects</h5>
              <p class="card-text">List of Active projects.</p>
              <a href="projects/index.php" class="btn btn-primary">View Projects <span class="badge bg-light text-dark">5</span></a>
            </div>
          </div>
        </div>
        <div class="col-3 my-5">
          <div class="card">
            <div class="pt-3">
              <img src="assets/img/man.png" width="120" alt="...">
            </div>
            <div class="card-body">
              <h5 class="card-title">Users</h5>
              <p class="card-text">List of Users.</p>
              <a href="users/index.php" class="btn btn-primary">View Users <span class="badge bg-light text-dark">9</a>
            </div>
          </div>
        </div>
        <div class="col-3 my-5">
          <div class="card">
            <div class="pt-3">
              <img src="assets/img/task.png" width="120" alt="...">
            </div>
            <div class="card-body">
              <h5 class="card-title">Tasks</h5>
              <p class="card-text">List of all Tasks.</p>
              <a href="#" class="btn btn-primary">View Tasks <span class="badge bg-light text-dark">3</a>
            </div>
          </div>
        </div>
        <div class="col-3 my-5">
          <div class="card">
            <div class="pt-3">
              <img src="assets/img/handshake.png" width="120" alt="...">
            </div>
            <div class="card-body">
              <h5 class="card-title">Clients</h5>
              <p class="card-text">List of active Clients.</p>
              <a href="#" class="btn btn-primary">View Clients <span class="badge bg-light text-dark">20</a>
            </div>
          </div>
        </div>
<!--------------list of ongoing projects---------------------------->        
        <div class="my-3 col-12 ">
          <h3 class=" p-3 mb-0" style="background-color:#E4D6A7">On-going Projects</h3>
          <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">Project Name</th>
                <th scope="col">Email address</th>
                <th scope="col">Status</th>
              </tr>
            </thead>
            <tbody class="table-group-divider">
              <?php while ($project = $projects->fetch_assoc()) {
                $id = $project['id'] ?>
                <tr>
                  <td><?php echo $project['project_name'] ?></td>
                  <td><?php echo $project['email'] ?></td>
                  <td><span class="badge text-bg-<?php echo $project['color'] ?>"><?php echo $project['sname'] ?></span></td>
                </tr>
              <?php }  ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
<?php } ?>
<!----------footer------------>
<?php include("global/footer.php"); ?>