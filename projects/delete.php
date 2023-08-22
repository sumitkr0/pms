<?php
include("../global/connection.php");
if ($_GET['id']) {
    $id = $_GET['id'];
    $sql = "DELETE FROM project WHERE id = '$id'";
    $del_prjct = $conn->query($sql);
    if ($del_prjct) {
        header("Location: /pms/projects/index.php");
    }
}
