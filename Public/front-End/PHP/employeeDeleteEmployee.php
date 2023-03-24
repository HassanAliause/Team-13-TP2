<?php

    include("databaseConnect.php");
    
    if(isset($_GET['employeeID_Delete'])) {
        $id = $_GET['employeeID_Delete'];

        $sql = "DELETE FROM `admin` WHERE id = $id";
        $result = mysqli_query($con, $sql);

        if($result) {
            header('location:employeeSubPageEmployees.php');
        } else {
            die(mysqli_error($con));
        };
     

    };

?>
