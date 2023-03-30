<?php
include("databaseConnect.php");
// include("checkLogin.php");
  
?>
<!DOCTYPE HTML>
<html lang="en">

    <head>
        <meta charset="UTF-8">
       
        <!-- will make the webpage mobile friendly -->
        <meta name="viewport" content="width=device-width,initial-scale=1.0">

        <title>Admin Page - Customer Orders Report</title>
        
        <!-- link to icons -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
        
        <!-- link to fonts -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- link to css file -->
        <link rel="stylesheet" href="../CSS/employee.css">
        
    </head>
    

    </body>
        <div class="grid-container">
            <!-- header -->
            <?php include_once "employeeHeader.php"?>

            <!-- sidebar -->
            <?php include_once "employeeSidebar.php"?>

            <!-- main -->
            <main class="main-container">

                <!-- title of page -->
                <div class="main-title">
                    <h2>Report</h2>
                </div>

                <?php

                    $db = new PDO("mysql:dbname=$db_name;host=$db_host", $username); 
                    $stmt = $db->prepare("SELECT p.price, c.quantity FROM products p INNER JOIN cart c ON p.id = c.product_id WHERE c.user_id = $user_id ");

                    $total_price = 0;
                    $stmt->execute();
                    if ($stmt->rowCount() == 0) {

                    } else {
                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            $price = $row['price'];
                            $quantity = $row['quantity'];
                            $total_price += $price * $quantity;
                        }
                    }
                ?>


                <div class="report-table">

                <div class="report-table">

                    <thead>

                        <tr>
                            <th scope="col">Total Ordered</th>
                            <th scope="col">Total Revenue</th>
                        </tr>

                    </thead>

                    <tbody>

                        <tr>
                            <td data-label="Total Ordered"> $totalOrdered </td>
                            <td data-label="Total Revenue"> $totalRev </td>
                        </tr>

                    </tbody>

                </div>


            </main>

        </div>
    </body>


</html>