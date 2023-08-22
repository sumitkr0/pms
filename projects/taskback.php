<?php
include("../global/header.php");
include("../global/connection.php");
if (!isset($_SESSION['login_user'])) {
    header("Location: /pms/login.php");
}
if(isset($_GET['projectid']))
$project_id=$_GET['projectid']; ?>
<html>
<head>
    <title>Show Modal on Load</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Include Bootstrap JavaScript and jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
    <!-- The modal -->
    <div class="modal fade" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Hurray!</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <h2> Your Task has been Added.</h2> <br>Press the Go Back button to go to the Main Menu .
                </div>
                
                    <div class="modal-footer">
                       <a href="index.php"> <button type="button" class="btn btn-secondary" data-dismiss="modal">Go Back</button></a>
                    </div>
            </div>
        </div>
    </div>
    <!-- Show the modal automatically when the page loads -->
    <script>
        $(document).ready(function() {
            $('#myModal').modal('show');
        });
    </script>
</body>
</html>
<?php include("../global/footer.php"); ?>