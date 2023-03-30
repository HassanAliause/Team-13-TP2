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
    
    <div class="departments-header">
        <h2>DEPARTMENTS</h2>
    </div>

        <div class = "dept-container">
            <div class ="dept">
            <a href="productdept.php?dept=11&name=computers-laptops"><h3>COMPUTERS/LAPTOPS</h3><img src="images\laptop2-1.png" alt="computer/laptops" width= 250px height = 250px></a>
            </div>
            <div class ="dept">
                <a href="productdept.php?dept=22&name=keyboards-mice"><h3>KEYBOARDS/MICE</h3><img src="images\keyboard1-1.jfif" alt="keyboard/mice"  width= 250px height = 250px></a>
            </div>
            <div class ="dept">
                <a href="productdept.php?dept=33&name=headsets-mics"><h3>HEADSETS/MICS</h3><img src="images\headset2-1.jfif" alt="headsets/mics"  width= 250px height = 250px></a>
            </div>
            <div class ="dept">
                <a href="productdept.php?dept=44&name=speakers"><h3>SPEAKERS</h3><img src="images\speaker3-1.jfif" alt="speakers"  width= 250px height = 250px></a>
            </div>
            <div class ="dept">
                <a href="productdept.php?dept=55&name=webcams"><h3>WEBCAMS</h3><img src="images\webcam5-1.jfif" alt="webcams" width= 250px height = 250px></a>
            </div>
        </div>
 

    <div class="products-header">
        <h2>ALL PRODUCTS</h2>
        </div>

        <div class = "product-container">
        <?php

        $db_host = 'localhost';
        $db_name = '13_bits';
        $username = 'root';

        try {
            $db = new PDO("mysql:dbname=$db_name;host=$db_host", $username); 
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            try {
                $query="SELECT  * FROM  products ";
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
                        
                            echo '<td><span class="product-type">' . $row['key_value'] . '</span></td></tr>';
                            echo '<form action="addtowishlist.php" method="POST">';
                            echo '<input type="hidden" name="product_id" value="'. $row['id'] .'">';
                            echo '<button class="addtowishlistBtn"><i class="fa fa-star-o"></i> Add to Wishlist</button></form>';
                                                    

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
                    echo  "<p>No record in the list.</p>\n";
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