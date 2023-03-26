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
       
        <!-- title of page -->
        <title>Employee - Customers</title>
        
        <!-- link to icons -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
        
        <!-- link to fonts -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- link to css file -->
        <link rel="stylesheet" href="../CSS/employee.css">
        
    </head>

    <body>

        <div class="customerOrders">

            <div class="customerOrders-table">

                <h2 class="customerOrders-title">
                    Customer Orders
                </h2>

                <table>
                        
                    <thead>

                        <tr>
                            <th scope="col">Order ID</th>
                            <th scope="col">User ID</th>
                            <th scope="col">Total</th>
                        </tr>

                    </thead>

                    <tbody> 

                        <?php
                            $sql = "SELECT * from `customer_orders`";
                            $result = mysqli_query($con, $sql);
                            if ($result) {
                                while ($row = mysqli_fetch_assoc($result)){
                                    $id = $row['id'];
                                    $userid = $row['user_id'];
                                    $total = $row['total'];
                                    echo ' 
                                    <tr>
                                        <th scope="row">' . $id . '</th>
                                        <td>' . $userid . '</td>
                                        <td>' . $total . '</td>
                                    </tr>'
                                    
                                    ;
                                }
                            }
                        ?>

                    </tbody>

                </table>

            </div>

        </div>

    </body>

</html>
