<?php
    session_start();

    // Database info
    $DB_HOST = 'localhost';
    $DB_USER = 'root';
    $DB_PASS = '';
    $DB_NAME = '13_bits';
// trying to connect to DB
    $conn = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
    if ( mysqli_connect_errno() ) {
        // If there is an error with the connection
        //  stop the script and display the error.
        exit('Failed to connect to MySQL: ' . mysqli_connect_error());
    }


