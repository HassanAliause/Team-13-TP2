<?php
session_start();
include("databaseConnect.php");
// include("checkLogin.php");
// if (!isset$_SESSION['id']){
//     header('Location:Public\Front End\PHP\login.html');

// }    
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
       
        <!-- will make the webpage mobile friendly -->
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
       
        <!-- title of page -->
        <title>Employee Page</title>
        
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

            <!-- main -->
            <main class="main-container">
                <!-- title of page -->
                <div class="main-title">
                    <h2>Dashboard</h2>
                </div>

                <div class="main-cards">

                    <div class="card">
                        <div class="card-inner">
                            <h3>Products</h3>
                            <span class="material-symbols-outlined">
                                inventory
                            </span>
                        </div>
                        <h1 class="card-inner-text ">
                            <?php
                                $sql = "SELECT SUM(quantity) AS total_quantity FROM products";
                                $result = mysqli_query($con,$sql);
                                if($result) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $quantity = $row['total_quantity'];
                                        echo $quantity;
                                    }
                                }

                            ?>
                        </h1>
                    </div>

                    <div class="card">
                        <div class="card-inner">
                            <h3>Categories</h3>
                            <span class="material-symbols-outlined">
                                category
                            </span>
                        </div>
                        <h1 class="card-inner-text">
                            <?php
                            $sql = "SELECT MAX(id) AS max_id FROM categories";
                            $result = mysqli_query($con,$sql);
                            if($result) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $maxid = $row['max_id'];
                                    echo $maxid;
                                }
                            }
                            ?>
                        </h1>
                    </div>

                    <div class="card">
                        <div class="card-inner">
                            <h3>Customers</h3>
                            <span class="material-symbols-outlined">
                                groups
                            </span>
                        </div>
                        <h1 class="card-inner-text">
                        <?php
                            $sql = "SELECT MAX(id) AS max_id FROM customer_details";
                            $result = mysqli_query($con,$sql);
                            if($result) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $maxid = $row['max_id'];
                                    echo $maxid;
                                }
                            }
                            ?>
                        </h1>
                    </div>

                    
                    <div class="card">
                        <div class="card-inner">
                            <h3>Administrators</h3>
                            <span class="material-symbols-outlined">
                                manage_accounts
                            </span>
                        </div>
                        <h1 class="card-inner-text">
                        <?php
                            $sql = "SELECT MAX(id) AS max_id FROM admin";
                            $result = mysqli_query($con,$sql);
                            if($result) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $maxid = $row['max_id'];
                                    echo $maxid;
                                }
                            }
                            ?>
                        </h1>
                    </div>

                </div>



                <d class="main-tables">

                    <div class="customers">
                        <d class="customer-table">
                            <h3 class="customer-title">
                                Customer Table
                            </h3>

                        </d>
                    </div>

                    <d class="admin">
                        <d class="admin-table">
                            <h3 class="admin-title">
                                Administrator Table
                            </h3>

                        </d>
                    </d>

                    <d class="stock">
                        <d class="stock-table">
                            <h3 class="admin-title">
                                Stock Table
                            </h3>

                        </d>
                    </d>

                    <d class="product">
                        <d class="product-table">
                            <h3 class="product-title">
                                Product Table
                            </h3>

                        </d>
                    </d>

                    <d class="contactUs">
                        <d class="contactUs-table">
                            <h3 class="contactUs-title">
                                Contact Us Queries
                            </h3>

                        </d>
                    </d>
                </d>
            </main>
                
        </div>

        <!-- Apex Charts -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.37.0/apexcharts.min.js" ></script>

        <!-- link to java script file -->
        <!-- place at the bottom to allow html to load first-->
        <script src="js/employee.js"></script>
    </body>
</html>
