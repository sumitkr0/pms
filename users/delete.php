<?php
include("../global/connection.php");
if ($_GET['id']) {
    $id = $_GET['id'];
    $sql = "DELETE FROM users WHERE id = '$id'";
    $del_user = $conn->query($sql);
    if ($del_user) {
        header("Location: /pms/users/index.php");
    }
}
