<?php
include("global/header.php");
include("global/connection.php");
?>
<!----------------container------------------------>
<div class="container my-4 col-6">
    <form action="auth.php" method="POST">
        <div class="mb-3">
            <label for="exampleInputEmail" class="form-label">Email address</label>
            <input type="email" class="form-control" name="email" id="exampleInputEmail" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.
            <span id="email" class="text-danger"></span>
            </div>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword"  class="form-label">Password</label>
            <input type="password" class="form-control" name="psswrd" id="exampleInputPassword">
            <span id="password" class="text-danger"></span>
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Remember me</label>
            
        </div>
        <button type="submit" class="btn btn-primary" onclick="validation">Log In</button>
    </form>
</div>
<!-------------footer included------------------->
<?php
include("global/footer.php");
?>

