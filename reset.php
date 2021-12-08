<?php
    session_start();
    $_SESSION['data'] = [];

    header("Location: lab1.php");
    die();
?>