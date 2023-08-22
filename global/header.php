<?php session_start();
$url = "http://localhost/pms/"; ?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>ADMIN PORTAL</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  <link rel="stylesheet" href="<?php echo $url ?>assets/css/style.css">
  <script src="<?php echo $url ?>script.js"></script>
</head>

<body>
  <div style="background-color:#E4D6A7" class="sticky-top">
    <div class="container">
      <nav class="navbar navbar-expand-lg ">
        <div class="container">
          <a class="navbar-brand" href="#">iCoder</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <?php if (isset($_SESSION['login_user'])) { ?>
              <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="<?php echo $url ?>">Dashboard</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link active" href="<?php echo $url ?>users">Users</a>
                </li>

                <li class="nav-item">
                  <a class="nav-link active" href="<?php echo $url ?>projects">Projects</a>
                </li>
              </ul>
            <?php } ?>
          </div>
          <div>
            <ul class="navbar-nav mb-2  mb-lg-0">
              <li>
                <h5 class="me-3 mt-1"><?php echo "Hello " . $_SESSION['login_user'] ?></h5>
              </li>
              <li class="nav-item ">
                <?php if (!isset($_SESSION['login_user'])) { ?>
                  <a class="btn btn-primary" href="<?php echo $url ?>login.php" role="button">Log In</a>
                <?php } else { ?>
                  <a class="btn btn-danger" href="<?php echo $url ?>logout.php" role="button">Log Out</a>
                <?php } ?>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </div>
  </div>