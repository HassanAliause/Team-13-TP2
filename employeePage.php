<?php
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



                <div class="main-tables">

                    <div class="customers">
                        <div class="customer-table">
                            <h2 class="customer-title">
                                Customer Table
                            </h2>
                            <table>

                                <thead>

                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Password</th>
                                        <th scope="col">Date of Birth</th>
                                        <th scope="col">House No.</th>
                                        <th scope="col">Street Name</th>
                                        <th scope="col">Town</th>
                                        <th scope="col">Postcode</th>
                                    </tr>

                                </thead>

                                <tbody>
                                    <?php
                                    $sql = "SELECT * from `customer_details`";
                                    $result = mysqli_query($con, $sql);
                                    if ($result) {
                                        while ($row = mysqli_fetch_assoc($result)){
                                            $id = $row['id'];
                                            $name = $row['name'];
                                            $email = $row['email'];
                                            $password = $row['password'];
                                            $birth = $row['birth'];
                                            $housenumber = $row['housenumber'];
                                            $street = $row['streetname'];
                                            $town = $row['townname'];
                                            $postcode = $row['postcode'];
                                            echo ' 
                                            <tr>
                                                <th scope="row">' . $id . '</th>
                                                <td>' . $name . '</td>
                                                <td>' . $email . '</td>
                                                <td>' . $password . '</td>
                                                <td>' . $birth . '</td>
                                                <td>' . $housenumber . '</td>
                                                <td>' . $street . '</td>
                                                <td>' . $town . '</td>
                                                <td>' . $postcode .'</td>
                                            </tr>'
                                            
                                            ;
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="customerOrders">
                        <div class="customerOrders-table">
                            <h2 class="customerOrders-title">
                                Contact Us Queries
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
                                </table>
                        </div>
                    </div>

                    <d class="admin">
                        <d class="admin-table">
                            <h2 class="admin-title">
                                Employee's Table
                            </h2>

                            <table>
                                    
                                <thead>

                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Admin Key</th>
                                        <th scope="col">Password</th>

                                    </tr>

                                </thead>

                                <?php
                                    $sql = "SELECT * from `admin`";
                                    $result = mysqli_query($con, $sql);
                                    if ($result) {
                                        while ($row = mysqli_fetch_assoc($result)){
                                            $id = $row['id'];
                                            $username = $row['username'];
                                            $adminkey = $row['adminkey'];
                                            $password = $row['password'];
                                            echo ' 
                                            <tr>
                                                <th scope="row">' . $id . '</th>
                                                <td>' . $username . '</td>
                                                <td>' . $adminkey . '</td>
                                                <td>' . $password . '</td>
                                            </tr>'
                                            
                                            ;
                                        }
                                    }
                                ?>
                            </table>
                        </d>
                    </d>

                    <d class="product">
                        <d class="product-table">
                            <h2 class="product-title">
                                Product / Stock Table
                            </h2>
                            <table>
                                    
                                <thead>

                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Product Code</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Total</th>
                                        <th scope="col">Key Value</th>


                                    </tr>

                                </thead>

                                <?php
                                    $sql = "SELECT * from `products`";
                                    $result = mysqli_query($con, $sql);
                                    if ($result) {
                                        while ($row = mysqli_fetch_assoc($result)){
                                            $id = $row['id'];
                                            $image = $row['image_file'];
                                            $name = $row['name'];
                                            $productcode = $row['product_code'];
                                            $price = $row['price'];
                                            $password = $row['quantity'];
                                            $total = $row['total'];
                                            $keyvalue = $row['key_value'];
                                            echo ' 
                                            <tr>
                                                <th scope="row">' . $id . '</th>
                                                <td> <img src="images/' . $image . '"/></td>
                                                <td>' . $name . '</td>
                                                <td>' . $productcode . '</td>
                                                <td>' . $price . '</td>
                                                <td>' . $password . '</td>
                                                <td>' . $total . '</td>
                                                <td>' . $keyvalue . '</td>
                                            </tr>'
                                            
                                            ;
                                        }
                                    }
                                ?>
                            </table>
                        </d>
                    </d>

                    <div class="contactUs">
                        <div class="contactUs-table">
                            <h2 class="contactUs-title">
                                Contact Us Queries
                            </h2>
                                    
                        </div>
                    </div>
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
