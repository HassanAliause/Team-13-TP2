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
    

        <div class="departments-header">
            <h2>ORDER PLACED</h2>
        </div>

        <?php
         if (isset($_POST['checkoutBtn'])) {
            $totalprice = $_POST['total_price'];
            $user_id = $_POST['user_id'];
        ?>

        <div class="total-header">
            <?php
                echo "<h2>Order Total: £" . $totalprice . "</h2>";
            ?>
        </div>

        <?php
                try {
                    $db_host = 'localhost';
                    $db_name = '13_bits';
                    $username = 'root';
        
                    try {
                        $db = new PDO("mysql:dbname=$db_name;host=$db_host", $username); 
                        $stmt = $db->prepare("SELECT * FROM cart WHERE user_id = $user_id");
                        $stmt->execute();

                        $delete_cart = $db->prepare("DELETE FROM `cart` WHERE user_id = $user_id");
                        $delete_cart->execute();

                        $nat = $db->prepare("INSERT INTO customer_orders(user_id, total) VALUES ($user_id, $totalprice)");
                        $nat->execute();
                        $order_id = $db->lastInsertId();



                        if($stmt->rowCount() > 0){   
                             while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

                                $sql = $db->prepare("INSERT INTO order_items( order_id, product_id, quantity) VALUES (?, ?, ?)");
                                
                                $cart_id = $row['cart_id'];
                                $product_id = $row['product_id'];
                                $quantity = $row['quantity'];
                                
                                $sql->bindValue(1,  $order_id);
                                $sql->bindValue(2, $product_id);
                                $sql->bindValue(3, $quantity);

                                $sql->execute();

                                $updatestock = $db->prepare("UPDATE products SET quantity = quantity - $quantity WHERE id = '$product_id' ");
                                $updatestock->execute();
                            
                            }
                        }else{
                            echo"Your cart is empty!";
                        }
                        $deleteitems = $db->prepare("DELETE FROM cart WHERE user_id = $user_id");
                        $deleteitems->execute();
                            
                           
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
            }
            
            ?>
        <div class = "cart-container">
        <?php
                try {
                    $db_host = 'localhost';
                    $db_name = '13_bits';
                    $username = 'root';
        
                    try {
                        $db = new PDO("mysql:dbname=$db_name;host=$db_host", $username); 

                        $stmt = $db->prepare("SELECT *
                        FROM products p
                        JOIN order_items o ON p.id = o.product_id
                        WHERE o.order_id = $order_id");


                        $stmt->execute();

                        if($stmt->rowCount() > 0){   
                             while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            
                                echo '<div class = "cart-item"><div class = "cart-image"><a href="selectedproduct.php?productid=' . $row['id'] . '"><img src ="' . $row['image_file'] . '" width= 250px height = 250px></a></div>';
                                echo '<div class = "cart-productinfo"><h1>' . $row['name'] . '</h1>';
                                echo '<h2>Quantity: ' . $row['quantity'] . '</h2>';
                                echo '<h2>£' . $row['price'] * $row['quantity'] . '</h2></div></div>';
                            
                            }
                        }else{
                            echo"Your cart is empty!";
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