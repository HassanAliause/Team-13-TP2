<?php
    // establihes the conenction to the database
    include("databaseConnect.php");
    
    
    //will delete a record of code 
    // will get the id and delete the record that matches the id
    if(isset($_GET['employeeID_Delete'])) {
        $id = $_GET['employeeID_Delete'];

         // this will delete from teh admin table       
        $sql = "DELETE FROM `admin` WHERE id = $id";
        $result = mysqli_query($con, $sql);

        // once deleted it will direct the employee back to the employee page       
        if($result) {
            header('location:employeeSubPageEmployees.php');
        } else {
            // if there is an error the connection is cut and the error is displayed
            die(mysqli_error($con));
        };
     

    };

?>
