<?php
    require_once('includes/includes.php');
    logout();
    header("Location: login.php?logout");
    exit;
?>