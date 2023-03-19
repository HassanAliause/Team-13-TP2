<?php
    include("databaseConnect.php");
    // include("checkLogin.php");
    // if(!isset($_SESSION['id'])) {
    //     header("Location:Public\Front End\PHP\login.php")
    // }

    if (isset($_POST['submitButton'])) {

        $username = $_POST['eName'];
        $password = $_POST['ePassword'];

        $sql = "INSERT into `admin` (username, password) values('$username', '$password')";
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
       <title>Employee Page - Add Employee</title>
       
       <!-- link to icons -->
       <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
       
       <!-- link to fonts -->
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
       <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

       <!-- link to css file -->
       <link rel="stylesheet" href="../CSS/employee.css">
       
    </head>

    <body>
            
        <div class="grid-container">
            <!-- header -->
            <?php include_once "employeeHeader.php"?>

            <!-- sidebar -->
            <?php include_once "employeeSidebar.php"?>

            <main class="main-container">
                <!-- this will be the input form box that will add a new employee -->
                <div class="addBox">
                
                <!-- title of page -->
                <div class="main-title">
                    <h2>Add Employee:</h2>
                </div>

                    <form class="box-input" method="POST">
                        
                        <!-- Employee Username -->
                        <div class="customerName">
                            <h2>Employee User Name:</h2>
                            <input type="text" class="formInput" name="eName" autocomplete="off" placeholder="Enter Employee Username">
                        </div>

                        <!-- Employee password -->
                        <div>
                            <h2>Employee Password:</h2>
                            <input type="text" class="formInput"  name="ePassword" autocomplete="off" placeholder="Enter Employee Password">
                        </div>
 
                        <!-- submit button -->

                        <button type="submit" class="formButton" name="submitButton">Add New Employee</button>

                    </form>

                </div>

            </main>

        </div>


    </body>

</html>
