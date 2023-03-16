<?php

    session_start();
    if($_SESSION["role"] != 1){
        echo "<script> window.location.href = '../404'</script>";
    }

?>