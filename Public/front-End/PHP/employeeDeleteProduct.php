<?php

    include("databaseConnect.php");

    //will delete a record of code 
    // will get the id and delete the record that matches the id
    if(isset($_GET['productID_Delete'])) {
        $id = $_GET['productID_Delete'];

        // this will delete from teh peoducts table
        $sql = "DELETE FROM `products` WHERE id = $id";
        $result = mysqli_query($con, $sql);

        if($result) {
            // once deleted it will direct the employee back to the prodcuts page
            header('location:employeeSubPageProducts.php');
        } else {
            // if there is an error the connection is cut and the error is displayed
            die(mysqli_error($con));
        };
     

    };

?>
