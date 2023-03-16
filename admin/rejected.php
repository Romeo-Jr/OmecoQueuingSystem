<?php
    require_once "checkRole.php";
    require_once "../database/connection.php";

    $id = $_GET["id"];

    $updateStatus = mysqli_query($con, "UPDATE queue SET status = '0' WHERE queue_id = '$id'");

    echo "<script> window.location.href = 'manage_queue'</script>"

?>