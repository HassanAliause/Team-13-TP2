<?php
// variables for connection
// variable for the database name

$serverName = "localhost";
$username = "root";
$password = " ";
$dbName = "13_bits"; 

// insert code to connect to database

$con = new mysqli($serverName,$username,$password,$dbName);

// check the connection to the database
if(!$con)
{
    die("There was an error connecting to the Database: " . mysqli_error($con));
}

?>