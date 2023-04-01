<?php
include 'databaseConnect.php';

//start session
session_start();
//check user
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
} else {//not logged in
    $user_id = '';
    header('location:login.php');
}
;


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="">

    <title>Wishlist Page</title>
    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <!-- Styles -->
    <link rel="stylesheet" href="../CSS/productspage.css">
</head>

<body>

    <!-- header -->
    <?php include_once "header.php" ?>

    <?php

    if (isset($_POST['addBtn'])) {
        if ($user_id == '') {
            header('location:login.php');
        } else {
            $user_id = $_SESSION['user_id'];
            $selectedproduct_id = $_POST['product_id'];
            if (isset($_POST['quantity'])) {
                $selectedquantity = $_POST['quantity'];
            } else {
                // handle the case where quantity is not set, for example:
                $selectedquantity = 1; // set a default value
            }
            

            $db_host = 'localhost';
            $db_name = '13_bits';
            $username = 'root';

            try {
                $db = new PDO("mysql:dbname=$db_name;host=$db_host", $username);
                $stmt = $db->prepare("SELECT * FROM wishlist WHERE product_id = '$selectedproduct_id' AND user_id = $user_id");
                $stmt->execute();

                if ($stmt->rowCount() > 0) {
                    $sql = $db->prepare("UPDATE wishlist SET quantity = quantity + $selectedquantity WHERE product_id = '$selectedproduct_id' AND user_id = $user_id");
                    $sql->execute();
                } else {

                    try {
                        $stmt = $db->prepare("INSERT INTO wishlist (user_id, product_id, quantity) VALUES (?, ?, ?)");

                        $u_id = $user_id;
                        $product_id = $selectedproduct_id;
                        $quantity = $selectedquantity;
                        $stmt->bindValue(1, $u_id);
                        $stmt->bindValue(2, $product_id);
                        $stmt->bindValue(3, $quantity);
                        $stmt->execute();

                    } catch (PDOexception $ex) {
                        echo "Sorry, a database error occurred! <br>";
                        echo "Error details: <em>" . $ex->getMessage() . "</em>";
                    }
                }
            } catch (PDOException $ex) {
                echo ("Failed to connect to the database.<br>");
                echo ($ex->getMessage());
                exit;
            }
        }
    }

    ?>

    <div class="departments-header">
        <h2>YOUR WISHLIST</h2>
    </div>

    <?php
    try {
        $db_host = 'localhost';
        $db_name = '13_bits';
        $username = 'root';

        $db = new PDO("mysql:dbname=$db_name;host=$db_host", $username);
        $stmt = $db->prepare("SELECT p.price, w.quantity FROM products p JOIN wishlist w ON p.id = w.product_id WHERE w.user_id = $user_id");

        $total_price = 0;
        $stmt->execute();
        if ($stmt->rowCount() == 0) {
            //wishlist is empty
        } else {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $price = $row['price'];
                $quantity = $row['quantity'];
                $total_price += $price * $quantity;
            }
            ?>
            <div class="total-header">


                <form action="removefromwishlist.php" method="POST">
                    <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
                    <button class="removeAllBtn" name="removeAllBtn">Empty Wishlist <i class="fa fa-trash"
                            aria-hidden="true"></i></button>
                </form>
            </div>
            <?php
        }

    } catch (PDOException $ex) {
        echo "Failed to connect to the database.<br>";
        echo $ex->getMessage();
        exit;
    }

    ?>




    <div class="cart-container">
        <?php
        try {
            $db_host = 'localhost';
            $db_name = '13_bits';
            $username = 'root';

            try {
                $db = new PDO("mysql:dbname=$db_name;host=$db_host", $username);

                $stmt = $db->prepare("SELECT * FROM products p JOIN wishlist w ON p.id = w.product_id WHERE w.user_id = ?");



                $stmt->bindValue(1, $user_id);

                $stmt->execute();

                if ($stmt->rowCount() > 0) {
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

                        echo '<div class = "cart-item"><div class = "cart-image"><a href="selectedproduct.php?productid=' . $row['id'] . '"><img src ="' . $row['image_file'] . '" width= 250px height = 250px></a></div>';
                        echo '<div class = "cart-productinfo"><h1>' . $row['name'] . '</h1>';
                        echo '<h2>Quantity: ' . $row['quantity'] . '</h2>';
                        echo '<h2>£' . $row['price'] * $row['quantity'] . '</h2></div></div>';
                        echo '<form action="removefromwishlist.php" method="POST">';
                        echo '<input type="hidden" name="product_id" value="' . $row['id'] . '">';
                        echo '<input type="hidden" name="user_id" value="' . $user_id . '">';

                        echo '<button class="removeBtn" name="removeBtn" ><i class="fa fa-trash"  aria-hidden="true"></i></button>';

                        echo '</form>';

                    }
                } else {
                    echo "Your WISHLIST is empty!";
                }


            } catch (PDOexception $ex) {
                echo "Sorry, a database error occurred! <br>";
                echo "Error details: <em>" . $ex->getMessage() . "</em>";
            }
        } catch (PDOException $ex) {
            echo ("Failed to connect to the database.<br>");
            echo ($ex->getMessage());
            exit;
        }

        ?>

    </div>


</body>

<!-- footer -->
<?php include_once "footer.php" ?>

</html>