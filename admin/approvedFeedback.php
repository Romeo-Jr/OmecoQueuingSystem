<?php
    require_once "checkRole.php";
    require_once "../database/connection.php";

    $id = $_GET["id"];

    $updateStatus = mysqli_query($con, "UPDATE feedback SET status = '1' WHERE id = '$id'");

    echo "<script> window.location.href = 'feedback'</script>"

?>