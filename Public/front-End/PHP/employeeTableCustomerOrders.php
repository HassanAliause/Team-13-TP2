<?php
include("databaseConnect.php");
// include("checkLogin.php");
// if (!isset$_SESSION['id']){
//     header('Location:Public\Front End\PHP\login.html');
// }    
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
                            <th scope="col">ID</th>
                            <th scope="col">Order Number</th>
                            <th scope="col">Name</th>
                            <th scope="col">Product</th>
                            <th scope="col">Quantity</th>
                        </tr>

                    </thead>

                    <tbody> 

                        <?php
                            $sql = "SELECT * from `customer_orders`";
                            $result = mysqli_query($con, $sql);
                            if ($result) {
                                while ($row = mysqli_fetch_assoc($result)){
                                    $id = $row['id'];
                                    $username = $row['order_number'];
                                    $adminkey = $row['name'];
                                    $product = $row['product'];
                                    $quantity = $row['quantity'];
                                    echo ' 
                                    <tr>
                                        <th scope="row">' . $id . '</th>
                                        <td>' . $username . '</td>
                                        <td>' . $adminkey . '</td>
                                        <td>' . $product . '</td>
                                        <td>' . $quantity . '</td>
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
