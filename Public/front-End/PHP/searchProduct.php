<?php
    include 'databaseConnect.php';

    session_start();

    if(isset($_SESSION['user_id'])){
    $user_id = $_SESSION['user_id'];
    }else{
    $user_id = '';
    header('location:login.php');
    };

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="">

    <title>Products Page</title>
    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <!-- Styles -->
    <link rel="stylesheet" href="../CSS/productspage.css">
</head>
<body>

    <!-- header -->
    <?php include_once "header.php"?>
    
    <?php
        $search = $_GET['search'];
    ?>
    <form action="searchProduct.php" method="GET">
        <div class="wrap">
            <div class="search">
                <input type="text" class="searchTerm" id="search" placeholder="Search for products..." name="search">
                <button type="submit" class="searchButton">
                    <i class="fa fa-search"></i>
                </button>
            </div>
        </div>
    </form>

    <div class="products-header">
        <?php
            $productHeader = str_replace('-', ' & ', $search); 
            echo "<h2>Results for '" . $productHeader . "'</h2>";
        ?>
    </div>
 
    <div class = "product-container">

        <?php

            $db_host = 'localhost';
            $db_name = '13_bits';
            $username = 'root';

            try {
                $db = new PDO("mysql:dbname=$db_name;host=$db_host", $username); 
                try {
                    $query="SELECT  * FROM  `products` WHERE `name` LIKE '%$search%'";
                    $rows =  $db->query($query);
                        
                    if ( $rows && $rows->rowCount()> 0) {
                        while  ($row =  $rows->fetch())	{
                            ?>
                            <div class = "product-item">
                            <?php
                                echo '<tr><td><a href="selectedproduct.php?productid=' . $row['id'] . '"><img src ="' . $row['image_file'] . '" width= 250px height = 250px></a></td>';
                                echo '<td><span class="product-name">' . $row['name'] . '</span></td>';
                                echo '<td><div class="price">£' . $row['price'] . '</div></td>';
                                if($row['quantity'] > 10){
                                    echo '<div class = "in-stock" style="color:green;"> <i class="fa fa-check-circle-o" aria-hidden="true"></i> IN STOCK </div>';
                                }
                                else if($row['quantity'] <= 10 && !($row['quantity'] <= 0)){
                                    echo '<div class = "in-stock" style="color:#c85e01;"> <i class="fa fa-circle-o-notch" aria-hidden="true"></i> LOW STOCK </div>';
                                }
                                else{
                                    echo '<div class = "in-stock" style="color:red;"> <i class="fa fa-times-circle-o" aria-hidden="true"></i> OUT OF STOCK </div>';
                                }
                            
                                echo '<td><span class="product-type">' . $row['key_value'] . '</span></td></tr>';
                                echo '<form action="addtowishlist.php" method="POST">';
                                echo '<input type="hidden" name="product_id" value="'. $row['id'] .'">';
                                echo '<button class="addBtn"><i class="fa fa-star-o"></i> Add to Wishlist</button></form>';
                                                        

                                if( $row['quantity'] <= 0 ){
                                    echo '<button class="addtocartBtn" style="visibility:hidden; name="addtocartBtn" ><i class="fa fa-plus" aria-hidden="true"></i> Add to Cart</button>';
                                }else{
                                    echo '<form action="addtocart.php" method="POST">';
                                    echo '<input type="hidden" name="product_id" value="' . $row['id'] . '">';
                                    echo '<input type="hidden" name="quantity" value="1">';
                                    echo '<button class="addtocartBtn" name="addtocartBtn" ><i class="fa fa-plus" aria-hidden="true"></i> Add to Cart</button>';
                                    echo '</form>';
                                }
                            ?>
                            </div>
                        <?php
                        }
                    }
                    else {
                        echo  "<h3>Sorry, there are no products matching your search!</h3>\n";
                    }
                }
                catch (PDOexception $ex){
                    echo "Sorry, a database error occurred! <br>";
                    echo "Error details: <em>". $ex->getMessage()."</em>";
                }
            } catch(PDOException $ex) {
                echo("Failed to connect to the database.<br>");
                echo($ex->getMessage());
                exit;
            }
        ?>
    
    </div>
</body>

<!-- footer -->
<?php include_once "footer.php"?>

</html>