<?php
    require_once ('Includes/functions.php');
    session_start();
    session_destroy();
    header('location:index.php');
?>