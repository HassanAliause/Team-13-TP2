<?php
    include("databaseConnect.php");
    // include("checkLogin.php");
    // if(!isset($_SESSION['id'])) {
    //     header("Location:Public\Front End\PHP\login.php")
    // }

    if (isset($_POST['SubmitButton'])) {

        $name = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $sql = "INSERT into `login_info` (name, email, password) values('$name, $email, $password')";
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
       <title>Employee Page - Add User</title>
       
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
                    <h2>Add New Product:</h2>
                </div>

                    <form class="box-input" method="POST">
                        
                        <!-- product name -->
                        <div class="pName">
                            <h2>New Product Name:</h2>
                            <input type="text" class="formInput" name="productName" autocomplete="off" placeholder="Enter Product Name">
                        </div>


                        <!-- product infomation -->
                        <div class="pEmail">
                            <h2>New Product Infomation: </h2>
                            <textarea type="text" class="formInput" name="productInfomation" autocomplete="off" placeholder="Enter Product Infomation" ></textarea>
                        </div>


                        <!-- product price -->
                        <div>
                            <h2>New Product Price:</h2>
                            <input type="text" class="formInput"  name="customerPassword" autocomplete="off" placeholder="Enter Customer Password">
                        </div>
 
                        <!-- image for product -->
                        <input type="file" class="formImageInput" name="image">

                        <!-- submit button -->
                        <button type="submit" class="formButton" name="submitButton">Add New Product</button>

                    </form>

                </div>

            </main>

        </div>


    </body>

</html>
