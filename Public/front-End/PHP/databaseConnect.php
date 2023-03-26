<?php
    // variables for connection
    $serverName = "localhost";
    $username = "root";
    $password = "";
    $dbName = "13_bits"; 

    $con = new mysqli($serverName,$username,$password,$dbName);

    if(!$con)
    {
        die("There was an error connecting to the Database: " . mysqli_error($con));
    }

?>