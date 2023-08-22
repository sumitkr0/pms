<!----header----->
<?php
include("../global/header.php");
if (!isset($_SESSION['login_user'])) {
    header("Location: /pms/login.php");
}
include("../global/connection.php");
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $userquery = "SELECT * from users where id=$id";
    $user = $conn->query($userquery);
    $userdata = $user->fetch_assoc();
}
$usertypequery = "SELECT * from usertype";
$result = $conn->query($usertypequery);
if (isset($_POST["fusername"]) && isset($_POST["fuseremail"]) && isset($_POST["gender"]) && isset($_POST["usertype"])) {
    $fusername = $_POST["fusername"];
    $fuseremail = $_POST["fuseremail"];
    $gender = $_POST["gender"];
    $usertype = $_POST["usertype"];
    $userupdate = "UPDATE users SET fname='$fusername',email='$fuseremail',gender='$gender',usertype_id='$usertype' WHERE id=$id";
    $updated = $conn->query($userupdate);
    if ($updated)
        header("Location: /pms/users/index.php?updated=1");
}
?>
<!---container---->
<?php if (isset($_SESSION['login_user'])) { ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-6">
                <form method="post" onsubmit="return validation()">
                    <div class="my-3">
                        <h3>Edit User</h3>
                    </div>
                    <!----user name--->
                    <div class="mb-3">
                        <label for="username" class="form-label">Enter User's Name</label>
                        <input type="text" class="form-control" id="username" name="fusername"  value="<?php echo $userdata['fname']?>" aria-describedby="nameHelp">
                        <span id="usererr" class="text-danger"></span>
                    </div>
                    <!----user email--->
                    <div class="mb-3">
                        <label for="useremail" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="useremail" name="fuseremail" value="<?php echo  $userdata['email'];?>" aria-describedby="emailHelp">
                        <span id="emailerr" class="text-danger"></span>
                    </div>
                    <!----user gender--->
                    <div>
                        <p>Please specify gender</p>
                    </div>
                    <span id="err_gender" class="text-danger"></span>
                    <div class="form-check  text-dark col-3 mb-3">
                        <input class="form-check-input" type="radio" name="gender" id="male" value="male" <?php if ($userdata['gender'] == "male") echo 'checked' ?>>
                        <label class="form-check-label" for="male">Male</label>
                    </div>
                    <div class="form-check  text-dark col-3 mb-3">
                        <input class="form-check-input" type="radio" name="gender" id="female" value="female" <?php if ($userdata['gender'] == "female") echo 'checked' ?>>
                        <label class="form-check-label" for="female">Female</label>
                    </div>
                    <!---------user type------------------>
                    <select class="form-select my-3" name="usertype" aria-label="Default select example">
                        <option disabled>User Type</option>
                        <?php while ($row = $result->fetch_assoc()) { ?>
                            <option value="<?php echo $row['id'] ?>" <?php if ($userdata['usertype_id'] == $row['id']) echo 'selected' ?>><?php echo $row['user_type'] ?> </option>
                        <?php }
                        ?>
                    </select>
                    <!-----create button------>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
    </div>
<?php } ?>
<!----footer------>
<?php include("../global/footer.php"); ?>