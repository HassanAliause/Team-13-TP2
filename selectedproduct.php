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
            <li><a href="">Products</a></li>
            <li><a href="">Contact Us</a></li>  
            <li><a href="">Logout</a></li>
            <li><a href="">My Orders</a></li>   
            <li><a href="wishlist"><img src="images\heart2.png" alt="computer/laptops" width= 30px height = 30px></a></li>
            <li><a href="cartmenu"><img src="images\basket.png" alt="computer/laptops" width= 30px height = 30px></a></li>
            <!-- <li><a href="wishlist"><i class="fa fa-heart-o" style="font-size:25px"></i></a></li>
            <li><a href="cartmenu"><i class="fa fa-shopping-cart" style="font-size:25px"></i></a></li> -->
        
        </ul>
        
    </nav>
    
    <?php
        $productid = $_GET['productid'];
    ?>

    <div class="product-container">
        <div class = "image-container"> 
            <?php
                    
                    $db_host = 'localhost';
                    $db_name = '13_bits';
                    $username = 'root';

                try {
                    $db = new PDO("mysql:dbname=$db_name;host=$db_host", $username); 
                    #$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    try {
                        $query="SELECT  * FROM  `images` WHERE `productsid` = '$productid'";
                        $rows =  $db->query($query);
                            
                        if ( $rows && $rows->rowCount()> 0) {
                            while  ($row =  $rows->fetch())	{
                                ?>
                                <div class="product-image">
                                <?php
                                    echo '<img id ="productimg" src ="' . $row['Image1'] . '">';
                                ?>
                                <div class="controls">
                                    <span onclick="img1()" class="imagebtn"><i class="fa fa-search-plus" aria-hidden="true" style= "padding-left:5px; padding-top:2px"></i></span>
                                    <span onclick="img2()" class="imagebtn"><i class="fa fa-search-plus" aria-hidden="true" style= "padding-left:5px; padding-top:2px"></i></span>
                                    <span onclick="img3()" class="imagebtn"><i class="fa fa-search-plus" aria-hidden="true" style= "padding-left:5px; padding-top:2px"></i></span>
                                </div>
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


 
        <div class = "info-container">
        <?php
                try {
                    $query="SELECT  * FROM  `products` WHERE `id` = '$productid'";
                    $rows =  $db->query($query);
                        
                    if ( $rows && $rows->rowCount()> 0) {
                        while  ($row =  $rows->fetch())	{
                           
                                echo '<h1>' . $row['name'] . '</h1>';
                                echo '<h2>£' . $row['price'] . '</h2>';
                                echo '<p>' . $row['description'] . '</p>';
                                ?>
                                <form action="/add_to_cart" method="POST">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $row['id'] }}">
                                <button class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i> Add to Cart</button>
                                </form>
                                <form action="/add_to_wish" method="POST">
                                 @csrf
                                 <input type="hidden" name="product_id" value="{{ $row['id'] }}">
                                 <button class="btn btn-primary" style="margin-top:10px"><i class="fa fa-star-o"></i> Add to Wishlist</button>
                                </form>
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
            ?>
        </div>

    </div>


<script>
    let productimg = document.getElementById("productimg");
    let imagebtn = document.getElementsByClassName("imagebtn");
    function img1(){
        <?php
            $query="SELECT  * FROM  `images` WHERE `productsid` = '$productid'";
            $rows =  $db->query($query);
                
            if ( $rows && $rows->rowCount()> 0) {
                while  ($row =  $rows->fetch())	{
                    echo 'productimg.src ="' . $row['Image1'] . '"';
                }
            }
            else {
                echo  "<p>No record in the list.</p>\n";
            }
        ?>
    }
    function img2(){
        <?php
            $query="SELECT  * FROM  `images` WHERE `productsid` = '$productid'";
            $rows =  $db->query($query);
                
            if ( $rows && $rows->rowCount()> 0) {
                while  ($row =  $rows->fetch())	{
                    echo 'productimg.src ="' . $row['Image2'] . '"';
                }
            }
            else {
                echo  "<p>No record in the list.</p>\n";
            }
        ?>
    }
    function img3(){
        <?php
            $query="SELECT  * FROM  `images` WHERE `productsid` = '$productid'";
            $rows =  $db->query($query);
                
            if ( $rows && $rows->rowCount()> 0) {
                while  ($row =  $rows->fetch())	{
                    echo 'productimg.src ="' . $row['Image3'] . '"';
                }
            }
            else {
                echo  "<p>No record in the list.</p>\n";
            }
        ?>
    }
</script>

</body>
</html>