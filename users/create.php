<!----header----->
<?php
include("../global/header.php");
include("../global/connection.php");
$sstatus = "SELECT * from usertype";
$run = $conn->query($sstatus);
if (isset($_POST["fusername"]) && isset($_POST["fuseremail"]) && isset($_POST["fuserpswrd"]) && isset($_POST["gender"]) && isset($_POST["usertype"])) {
    $fusername = $_POST["fusername"];
    $fuseremail = $_POST["fuseremail"];
    $fuserpswrd = $_POST["fuserpswrd"];
    $gender = $_POST["gender"];
    $usertype = $_POST["usertype"];
    $HASHED = password_hash($fuserpswrd, PASSWORD_DEFAULT);
    $myqry = "INSERT INTO users (fname,email,password,gender,usertype_id) values ('$fusername','$fuseremail','$HASHED','$gender','$usertype')";
    // echo $myqry;
    $add = $conn->query($myqry);
    if ($add) {
        header("Location: /pms/users/index.php");
    }
}
?>
 <!---container---->
<?php if (isset($_SESSION['login_user'])) { ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-6">
                <form method="post" onsubmit="return validation()">
                    <div class="my-3">
                        <h3>Create User</h3>
                    </div>
                    <!----user name--->
                    <div class="mb-3">
                        <label for="username" class="form-label">Enter User's Name</label>
                        <input type="text" class="form-control" id="username" name="fusername" aria-describedby="nameHelp">
                        <span id="usererr" class="text-danger"></span>
                    </div>
                    <!----user email--->
                    <div class="mb-3">
                        <label for="useremail" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="useremail" name="fuseremail" aria-describedby="emailHelp">
                        <span id="emailerr" class="text-danger"></span>
                    </div>
                    <!----user password--->
                    <div class="mb-3">
                        <label for="userpswrd" class="form-label">Password</label>
                        <input type="password" class="form-control" id="userpswrd" name="fuserpswrd">
                        <span id="pswrderr" class="text-danger"></span>
                    </div>
                    <!----user gender--->
                    <div>
                        <p>Please specify gender</p>
                    </div>
                    <span id="err_gender" class="text-danger"></span>
                    <div class="form-check  text-dark col-3 mb-3">
                        <input class="form-check-input" type="radio" name="gender" id="male" value="male">
                        <label class="form-check-label" for="male">Male</label>
                    </div>
                    <div class="form-check  text-dark col-3 mb-3">
                        <input class="form-check-input" type="radio" name="gender" id="female" value="female">
                        <label class="form-check-label" for="female">Female</label>
                    </div>
                    <!---------user type------------------>
                    <select class="form-select my-3" name="usertype" aria-label="Default select example">
                        <option disabled>User Type</option>
                        <?php while ($row = $run->fetch_assoc()) { ?>
                            <option value="<?php echo $row['id'] ?>"><?php echo $row['user_type'] ?> </option>
                        <?php }
                        ?>
                    </select>
                    <!-----create button------>
                    <button type="submit" class="btn btn-primary">Create</button>
                </form>
            </div>
        </div>
    </div>
    </div>
<?php } ?>
<!----footer------>
<?php if (!isset($_SESSION['login_user'])) {
    header("Location: /pms/login.php");
}
include("../global/footer.php");
?>