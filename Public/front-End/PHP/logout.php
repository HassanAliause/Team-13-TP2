<?php
    session_start();    
    session_destroy();
    
    // Redirect to login page
    header("Location: homepage1.php");
    exit;
?>
