<?php
    // establihes the conenction to the database
    include("databaseConnect.php");

    //will delete a record of code 
    // will get the id and delete the record that matches the id
    if(isset($_GET['customerID_Delete'])) {
        $id = $_GET['customerID_Delete'];

        // this will delete from teh customer details table
        $sql = "DELETE FROM `customer_details` WHERE id = $id";
        $result = mysqli_query($con, $sql);

        // once deleted it will direct the employee back to the custoemr page
        if($result) {
            header('location:employeeSubPageCustomer.php');
        } else {
            // if there is an error the connection is cut and the error is displayed 
            die(mysqli_error($con));
        };
     

    };

?>
