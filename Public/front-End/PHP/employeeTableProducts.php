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
        
        <!-- link to icons -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
        
        <!-- link to fonts -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- link to css file -->
        <link rel="stylesheet" href="../CSS/employee.css">
        
    </head>

    <body>

        <div class="product">
            
            <div class="product-table">

                <h2 class="product-title">
                    Product / Stock Table
                </h2>

                <table>
                        
                    <thead>

                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Image</th>
                            <th scope="col">Name</th>
                            <th scope="col">Description</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Total</th>
                            <th scope="col">Key Value</th>
                            <th scope="col">Product Action</th>
                        </tr>

                    </thead>

                    <tbody>

                        <?php
                            $sql = "SELECT * from `products`";
                            $result = mysqli_query($con, $sql);
                            if ($result) {

                                while ($row = mysqli_fetch_assoc($result)){
                                    $id = $row['id'];
                                    $image = $row['image_file'];
                                    $name = $row['name'];
                                    $description = $row['description'];
                                    $price = $row['price']; 
                                    $password = $row['quantity'];
                                    $total = $row['total'];
                                    $keyvalue = $row['key_value'];
                                    echo ' 
                                    <tr>
                                        <th scope="row">' . $id . '</th>
                                        <td> <img src="' . $image . '"width= 50px height = 50px/></td>
                                        <td>' . $name . '</td>
                                        <td>' . $description . '</td>
                                        <td>' . $price . '</td>
                                        <td>' . $password . '</td>
                                        <td>' . $total . '</td>
                                        <td>' . $keyvalue . '</td>  
                                        <td>
                                            <a class="actionButton" href="employeeDeleteProduct.php? productID_Delete= '.$id.'">Delete</a>
                                        </td>                   
                                    </tr>';

                                }
                            }
                        ?>

                    </tbody>
                        
                </table>

            </div>

        </div>

    </body>

</html>
