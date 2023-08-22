<?php
include("../global/header.php");
include("../global/connection.php");
if (isset($_POST["taskname"]) && isset($_POST["taskdetails"]) && isset($_POST["assignedto"])) {
     $project_id = $_POST["project_id"];
     $assignedto = $_POST["assignedto"];
     $taskname = $_POST["taskname"];
     $taskdetails = $_POST["taskdetails"];
    
     $insrtqry = "INSERT INTO tasks (project_id,taskname,taskdetails,user_id) values ('$project_id','$taskname','$taskdetails','$assignedto')";
    $projects = $conn->query($insrtqry);
    if ($projects) {
        header("Location: taskback.php?projectid = $project_id");
    }
   
}
