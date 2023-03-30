<php ini_set('display_errors', 1); error_reporting(E_ALL); <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/x-icon" href="">

        <title>Products Page</title>
        <!-- Fonts -->
        <link rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <!-- Styles -->
        <link rel="stylesheet" href="../CSS/productspage.css">
    </head>

    <body>

        <!-- header -->
        <?php include_once "header.php" ?>

        <div class="departments-header">
            <h2>Wishlist Items</h2>
        </div>

        <div class="cart-container">
            <?php
            if (isset($_POST['product_id'])) {
                $product_id = $_POST['product_id'];
                $user_id = '1';
                $db_host = 'localhost';
                $db_name = '13_bits';
                $username = 'root';

                try {
                    $db = new PDO("mysql:dbname=$db_name;host=$db_host", $username);
                    $stmt = $db->prepare("INSERT INTO wishlist (user_id, product_id) VALUES (?, ?)");
                    $stmt->bindValue(1, $user_id);
                    $stmt->bindValue(2, $product_id);
                    $stmt->execute();
                } catch (PDOException $ex) {
                    echo ("Failed to connect to the database.<br>");
                    echo ($ex->getMessage());
                    exit;
                }
            }

            try {
                $db_host = 'localhost';
                $db_name = '13_bits';
                $username = 'root';

                $db = new PDO("mysql:dbname=$db_name;host=$db_host", $username);
                $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $stmt = $db->prepare("SELECT w.id, w.product_id, p.name, p.price, p.image_file FROM wishlist w INNER JOIN products p ON p.id = w.product_id WHERE w.user_id = ? ");

                $user_id = '1';
                $stmt->bindValue(1, $user_id);

                $stmt->execute();
                $error = $stmt->errorInfo();
                if (isset($error[2])) {
                    echo "Error: " . $error[2];
                }

                if ($stmt->rowCount() == 0) {
                    echo "<p>Your wishlist is empty.</p>";
                } else {
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        $id = $row['id'];
                        $name = $row['name'];
                        $price = $row['price'];
                        $image_file = $row['image_file'];

                        echo "<div class='product-container'>";
                        echo "<img src='$image_file'>";
                        echo "<p class='product-name'>$name</p>";
                        echo "<p class='product-price'>£$price</p>";
                        echo "<form action='removefromwishlist.php' method='POST'>";
                        echo "<input type='hidden' name='id' value='" . $id . "'>";
                        echo "<button class='removeBtn' name='removeBtn'><i class='fa fa-trash'></i></button>";
                        echo "</form>";
                        echo "</div>";
                    }
                }

            } catch (PDOException $ex) {
                echo "Failed to display";
            }
            ?>
    </body>



    <!-- footer -->
    <?php include_once "footer.php" ?>

    </html>