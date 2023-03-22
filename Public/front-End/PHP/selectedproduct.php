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
                        $query="SELECT  * FROM  `product_images` WHERE `product_id` = '$productid'";
                        $rows =  $db->query($query);
                            
                        if ( $rows && $rows->rowCount()> 0) {
                            while  ($row =  $rows->fetch())	{
                                ?>
                                <div class="product-image">
                                <?php
                                    echo '<img id ="productimg" src ="' . $row['image_1'] . '">';
                                ?>
                                <div class="controls">
                                    <span onclick="img1()" class="imagebtn"><i class="fa fa-circle-o" aria-hidden="true" ></i></span>
                                    <span onclick="img2()" class="imagebtn"><i class="fa fa-circle-o" aria-hidden="true" ></i></span>
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
                                
                                $selectedquantity = 1;

                                if (isset($_POST['quantity'])) {
                                    $selectedquantity = $_POST['quantity'];
                                }
                                ?>

                                <form method="post" action="">
                                    <label for="quantity-select">Quantity: </label>
                                    <select id="quantity-select" name="quantity" onchange="this.form.submit()">
                                    <option value="1" <?php if(isset($_POST['quantity']) && $_POST['quantity'] == '1') {echo 'selected';} ?>>1</option>
                                    <option value="2" <?php if(isset($_POST['quantity']) && $_POST['quantity'] == '2') {echo 'selected';} ?>>2</option>
                                    <option value="3" <?php if(isset($_POST['quantity']) && $_POST['quantity'] == '3') {echo 'selected';} ?>>3</option>
                                    <option value="4" <?php if(isset($_POST['quantity']) && $_POST['quantity'] == '4') {echo 'selected';} ?>>4</option>
                                    <option value="5" <?php if(isset($_POST['quantity']) && $_POST['quantity'] == '5') {echo 'selected';} ?>>5</option>
                                    </select> 
                                </form>
                                <?php

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
                                  
                                }else{
                                    echo '<form action="addtocart.php" method="POST">';
                                    echo '<input type="hidden" name="product_id" value="' . $row['id'] . '">';
                                    echo '<input type="hidden" name="quantity" value="' .  $selectedquantity . '">';
                                    echo '<button class="addtocartBtn" name="addtocartBtn" ><i class="fa fa-plus" aria-hidden="true"></i> Add to Cart</button>';
                                    echo '</form>';
                                }
                                 ?>
                                 
                                

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
<?php
    if(isset($_POST['addtocart.php']))
        
        // Check connection
 
                    $db_host = 'localhost';
                    $db_name = '13_bits';
                    $username = 'root';

                try {
                    $db = new PDO("mysql:dbname=$db_name;host=$db_host", $username); 
                    #$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $sql = "INSERT INTO customer_orders (id, productID, customerID)
                    VALUES ('', $productid, '1')";
                    
                } catch(PDOException $ex) {
                    echo("Failed to connect to the database.<br>");
                    echo($ex->getMessage());
                    exit;
                }
?>


 
    

<script>
    let productimg = document.getElementById("productimg");
    let imagebtn = document.getElementsByClassName("imagebtn");
    function img1(){
        <?php
            $query="SELECT  * FROM  `product_images` WHERE `product_id` = '$productid'";
            $rows =  $db->query($query);
                
            if ( $rows && $rows->rowCount()> 0) {
                while  ($row =  $rows->fetch())	{
                    if($row['image_1'] != null){
                        echo 'productimg.src ="' . $row['image_1'] . '"';
                    }
                }
            }
            else {
                echo  "<p>No record in the list.</p>\n";
            }
        ?>
    }
    function img2(){
        <?php
            $query="SELECT  * FROM  `product_images` WHERE `product_id` = '$productid'";
            $rows =  $db->query($query);
                
            if ( $rows && $rows->rowCount()> 0) {
                while  ($row =  $rows->fetch())	{
                    if($row['image_2'] != null){
                        echo 'productimg.src ="' . $row['image_2'] . '"';
                    }
                }
            }
            else {
                echo  "<p>No record in the list.</p>\n";
            }
        ?>
    }
    function img3(){
        <?php
            $query="SELECT  * FROM  `product_images` WHERE `product_id` = '$productid'";
            $rows =  $db->query($query);
                
            if ( $rows && $rows->rowCount()> 0) {
                while  ($row =  $rows->fetch())	{
                    if($row['image_3'] != null){
                        echo 'productimg.src ="' . $row['image_3'] . '"';
                    }
                }
            }
            else {
                echo  "<p>No record in the list.</p>\n";
            }
        ?>
    }
</script>

</body>
<!-- footer -->
<?php include_once "footer.php"?>

</html>