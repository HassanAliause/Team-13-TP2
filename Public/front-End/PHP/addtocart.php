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

            if (isset($_POST['addtocartBtn'])) {
                $selectedproduct_id = $_POST['product_id'];
                $selectedquantity = $_POST['quantity'];

                $db_host = 'localhost';
                $db_name = '13_bits';
                $username = 'root';

                try {
                    $db = new PDO("mysql:dbname=$db_name;host=$db_host", $username); 

                    $stmt =  $db->prepare("SELECT * FROM cart WHERE product_id = '$selectedproduct_id' AND user_id = '1'");
                    $stmt->execute();

                    if($stmt->rowCount() > 0){   
                        $sql = $db->prepare("UPDATE cart SET quantity = quantity + 1 WHERE product_id = '$selectedproduct_id' AND user_id = '1'");
                        $sql->execute();
                    } else {
                        
                        try {
                            $stmt = $db->prepare("INSERT INTO cart (user_id, product_id, quantity) VALUES (?, ?, ?)");
        
                            $user_id = '1';
                            $product_id = $selectedproduct_id;
                            $quantity = $selectedquantity;

        
                            $stmt->bindValue(1, $user_id);
                            $stmt->bindValue(2, $product_id);
                            $stmt->bindValue(3, $quantity);

                            $stmt->execute();
                                
                        }
                        catch (PDOexception $ex){
                            echo "Sorry, a database error occurred! <br>";
                            echo "Error details: <em>". $ex->getMessage()."</em>";
                        }
                   }
                } catch(PDOException $ex) {
                    echo("Failed to connect to the database.<br>");
                    echo($ex->getMessage());
                    exit;
                }
        }

        ?>

        <div class="departments-header">
            <h2>CART ITEMS</h2>
        </div>

        <?php
            try {
                $db_host = 'localhost';
                $db_name = '13_bits';
                $username = 'root';

                $db = new PDO("mysql:dbname=$db_name;host=$db_host", $username); 
                $stmt = $db->prepare("SELECT p.price, c.quantity FROM products p INNER JOIN cart c ON p.id = c.product_id WHERE c.user_id = ? ");
                
                $user_id = '1';
                $stmt->bindValue(1, $user_id);

                $total_price = 0;
                $stmt->execute();

                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $price = $row['price'];
                    $quantity = $row['quantity'];
                    $total_price += $price * $quantity;
                }

            } catch(PDOException $ex) {
                echo "Failed to connect to the database.<br>";
                echo $ex->getMessage();
                exit;
            }
        ?>

        <div class="total-header">
            <?php
                echo "<h2> Total Price: £" . number_format($total_price, 2) . "</h2>";
            ?>
            <form action="checkout.php" method="POST">
                <button class="checkoutBtn" name="checkoutBtn" >Proceed to Checkout  <i class="fa fa-credit-card-alt" aria-hidden="true"></i></button>
                <input type="hidden" name="total_price" value="<?php echo $total_price;?>">
            </form>
         </div>

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
                        JOIN cart c ON p.id = c.product_id
                        WHERE c.user_id = ?");

                        $user_id = '1';
                        $stmt->bindValue(1, $user_id);

                        $stmt->execute();

                        if($stmt->rowCount() > 0){   
                             while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            
                                echo '<div class = "cart-item"><div class = "cart-image"><a href="selectedproduct.php?productid=' . $row['id'] . '"><img src ="' . $row['image_file'] . '" width= 250px height = 250px></a></div>';
                                echo '<div class = "cart-productinfo"><h1>' . $row['name'] . '</h1>';
                                echo '<h2>Quantity: ' . $row['quantity'] . '</h2>';
                                echo '<h2>£' . $row['price'] * $row['quantity'] . '</h2></div></div>';
                                echo '<form action="removefromcart.php" method="POST">';
                                echo '<input type="hidden" name="product_id" value="' . $row['id'] . '">';
                                echo '<button class="removeBtn" name="removeBtn" ><i class="fa fa-trash"  aria-hidden="true"></i></button>';
                                echo '</form>';
                            
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