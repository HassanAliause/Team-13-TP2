<?php

    include("databaseConnect.php");
    
    if(isset($_GET['customerID_Delete'])) {
        $id = $_GET['customerID_Delete'];

        $sql = "DELETE FROM `customer_details` WHERE id = $id";
        $result = mysqli_query($con, $sql);

        if($result) {
            header('location:employeeSubPageCustomer.php');
        } else {
            die(mysqli_error($con));
        };
     

    };

?>
