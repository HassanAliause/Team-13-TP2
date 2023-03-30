<?php
    // variables for connection
    $serverName = "localhost";
    $username = "root";
    $password = "";
    $dbName = "13_bits"; 

    // will connect the the database with the correct variables 
    $con = new mysqli($serverName,$username,$password,$dbName);

    // if there is an error 
    if(!$con)
    {
        die("There was an error connecting to the Database: " . mysqli_error($con));
    }

?>