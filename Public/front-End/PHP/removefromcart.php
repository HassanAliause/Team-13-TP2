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

            if (isset($_POST['removeBtn'])) {
                $selectedproduct_id = $_POST['product_id'];

                $db_host = 'localhost';
                $db_name = '13_bits';
                $username = 'root';
    
                try {
                    $db = new PDO("mysql:dbname=$db_name;host=$db_host", $username); 
                    try {
                        $stmt = $db->prepare("DELETE FROM cart WHERE product_id = $selectedproduct_id AND user_id = '1'");
                        $stmt->execute();
                            
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
            header('Location: addtocart.php');
            exit();

        ?>

    
</body>

<!-- footer -->
<?php include_once "footer.php"?>

</html>