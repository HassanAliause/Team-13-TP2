<?php

    include("databaseConnect.php");
    
    if(isset($_GET['productID_Delete'])) {
        $id = $_GET['productID_Delete'];

        $sql = "DELETE FROM `products` WHERE id = $id";
        $result = mysqli_query($con, $sql);

        if($result) {
            header('location:employeeSubPageProducts.php');
        } else {
            die(mysqli_error($con));
        };
     

    };

?>
