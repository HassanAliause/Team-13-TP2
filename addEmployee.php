<?php
    include("databaseConnect.php");
    // include("checkLogin.php");
    // if(!isset($_SESSION['id'])) {
    //     header("Location:Public\Front End\PHP\login.php")
    // }

    if (isset($_POST['formButton'])) {

        $name = $_POST['username'];
        $password = $_POST['password'];

        $sql = "INSERT into `admin` (username, password) values($name, $password)";
        $result = mysqli_query($con,$sql);
        
        if (!$result) {
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
            <?php include_once "adminHeader.php"?>

            <!-- sidebar -->
            <?php include_once "adminSidebar.php"?>

            <main class="main-container">
                <!-- this will be the input form box that will create a new customer account -->
                <div class="addBox">
                
                <!-- title of page -->
                <div class="main-title">
                    <h2>Add Employee:</h2>
                </div>

                    <form class="box-input" method="POST">
                        
                        <!-- customer Username -->
                        <div class="customerName">
                            <h2>Employee User Name:</h2>
                            <input type="text" class="formInput" name="customerName" autocomplete="off" placeholder="Enter Customer Name">
                        </div>

                        <!-- customer password -->
                        <div>
                            <h2>New Customer Password:</h2>
                            <input type="text" class="formInput"  name="customerPassword" autocomplete="off" placeholder="Enter Customer Password">
                        </div>
 
                        <!-- submit button -->

                        <button type="submit" class="formButton" name="submitButton">Add New Employee</button>

                    </form>

                </div>

            </main>

        </div>


    </body>

</html>
