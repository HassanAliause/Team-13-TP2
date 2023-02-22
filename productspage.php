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
    <link rel="stylesheet" href="productspage.css">
</head>
<body>

    <div class="logo-header">
        <a href=""><img src="images\logogif4.gif" class="logo" width = 75% alt=""></a>
    <div>
    <nav>

        <input type="checkbox" id="box">
        <label for="box" class="boxbtn">
            <i class="fa fa-bars"></i>
        </label>
        <a href=""><img src="" class="logo" alt=""></a>
        <ul>  
            <li><a href="">Home</a></li>
            <li><a href="productspage.php">Products</a></li>
            <li><a href="">Contact Us</a></li>  
            <li><a href="">Logout</a></li>
            <li><a href="">My Orders</a></li>   
            <li><a href="wishlist"><img src="images\heart2.png" alt="computer/laptops" width= 30px height = 30px></a></li>
            <li><a href="cartmenu"><img src="images\basket.png" alt="computer/laptops" width= 30px height = 30px></a></li>
            <!-- <li><a href="wishlist"><i class="fa fa-heart-o" style="font-size:25px"></i></a></li>
            <li><a href="cartmenu"><i class="fa fa-shopping-cart" style="font-size:25px"></i></a></li> -->
        
        </ul>
        
    </nav>
    
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
                            echo '<tr><td><a href="/Team-13-TP2/selectedproduct.php?productid=' . $row['id'] . '"><img src ="' . $row['image_file'] . '" width= 250px height = 250px></a></td>';
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
                        
                        ?>
                         <form action="/add_to_cart" method="POST">
                                 
                                 <input type="hidden" name="product_id" value="{{ $row['id'] }}">
                                 <button class="wishlistBtn"><i class="fa fa-plus" aria-hidden="true"></i> Add to Cart</button>
                             </form>
                             <form action="/add_to_wish" method="POST">
                                  
                                 <input type="hidden" name="product_id" value="{{ $row['id'] }}">
                                 <button class="addBtn"><i class="fa fa-star-o"></i> Add to Wishlist</button>
                                </form>
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
<footer class="footer">
        <div class="footerlogo">
        <a href=""><img src="images\logojumping2.gif" width = 250px height=250px></a>
        </div>

        <div class="footernav">
            <h2>Navigation</h2>
            <ul class="links">
                <li> <a href="#">Home</a></li>
                <li> <a href="productspage.php">Products</a></li>
                <li> <a href="#">Contact Us</a></li>
            </ul>
        </div>

        <div class="socials">
            <h2>Our Socials</h2>
            <ul class="links">
                <li> <a href="#"><i class="fa fa-github" aria-hidden="true"></i> Github</a></li>
                <li> <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i>   Facebook</a></li>
                <li> <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i> Twitter</a></li>
            </ul>
        </div>
    </footer>
</html>