<?php
    include("databaseConnect.php");
    // include("checkLogin.php");

    // code will run when submit button is clicked 
    if (isset($_POST['submitButton'])) {
        //variables for the customer 
        $name = $_POST['customerName'];
        $email = $_POST['customerEmail'];
        $password = $_POST['customerPassword'];
        $birth = $_POST['customerBirth'];
        $houseNumber = $_POST['customerHouseNumber'];
        $street = $_POST['customerStreet'];
        $town = $_POST['customerTown'];
        $postcode = $_POST['customerPostcode'];

        //sql statement that will add the data into the database
        $sql = "INSERT into `customer_details` (name, email, password, birth, housenumber, streetname, townname, postcode) 
        values('$name', '$email', '$password', '$birth', '$houseNumber', '$street', '$town', '$postcode')";

        
        if(mysqli_query($con, $sql)){
            // if there are no errors it will redirect the employee to the customer page 
            header('location:employeeSubPageCustomer.php');
        } else {
            // it will cut the connection if there is an user and display the error 
            die(mysqli_error($con));
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
       
       <!-- will make the webpage mobile friendly -->
       <meta name="viewport" content="width=device-width,initial-scale=1.0">
      
       <!-- title of page -->
       <title>Employee Page - Add Customer</title>
       
       <!-- link to icons -->
       <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
       
       <!-- link to fonts -->
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
       <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

       <!-- link to css file -->
       <link rel="stylesheet" href="css/employee.css">
       
    </head>

    <body>
            
        <div class="grid-container">
            <!-- header -->
            <?php include_once "employeeHeader.php"?>

            <!-- sidebar -->
            <?php include_once "employeeSidebar.php"?>

            <main class="main-container">
                <!-- this will be the input form box that will create a new customer account -->
                <div class="addBox">
                
                <!-- title of page -->
                <div class="main-title">
                    <h2>Create New Customer:</h2>
                </div>

                    <form class="box-input" method="POST">
                        
                        <!-- customer Username -->
                        <div class="customerName">
                            <h2>New Customer Name:</h2>
                            <input type="text" class="formInput" name="customerName" autocomplete="off" placeholder="Enter Customer Name" required>
                        </div>


                        <!-- customer email -->
                        <div class="customerEmail">
                            <h2>New Customer Email: </h2>
                            <input type="email" class="formInput" name="customerEmail" autocomplete="off" placeholder="Enter Customer Email" required>
                        </div>


                        <!-- customer password -->
                        <div class="customerPassword">
                            <h2>New Customer Password:</h2>
                            <input type="password" class="formInput"  name="customerPassword" autocomplete="off" placeholder="Enter Customer Password" required>
                        </div>

                        <!-- customer birth -->
                        <div class="customerBirth">
                            <h2>New Customer Date of Birth:</h2>
                            <input type="date" class="formInput"  name="customerBirth" autocomplete="off" placeholder="Enter Customer Date Of Birth" required>
                        </div>

                        <!-- customer house number  -->
                        <div class="customerHouseNumber">
                            <h2>New Customer House Number: </h2>
                            <input type="number" class="formInput" name="customerHouseNumber" autocomplete="off" placeholder="Enter Customer House Number" required>
                        </div>

                        <!-- customer street -->
                        <div class="customerStreet">
                            <h2>New Customer Street Name: </h2>
                            <input type="text" class="formInput" name="customerStreet" autocomplete="off" placeholder="Enter Customer Street Name" required>
                        </div>

                        <!-- customer town -->
                        <div class="customerTown">
                            <h2>New Customer Town: </h2>
                            <input type="text" class="formInput" name="customerTown" autocomplete="off" placeholder="Enter Customer Town" required>
                        </div>

                        <!-- customer postcode -->
                        <div class="customerPostcode">
                            <h2>New Customer Post Code (L00 0LL): </h2>
                            <input type="postcode" pattern="[A-Za-z]{1,2}[0-9Rr][0-9A-Za-z]? [0-9][A-Za-z]{2}" class="formInput" name="customerPostcode" autocomplete="off" placeholder="Enter Customer Post Code"  required >
                        </div>

                        <!-- submit button -->

                        <button type="submit" class="formButton" name="submitButton">Create New Customer</button>

                    </form>

                </div>

            </main>

        </div>


    </body>

</html>
