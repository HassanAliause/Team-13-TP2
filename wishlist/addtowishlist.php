


<?php
session_start(); // Start the session to get the user id

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
} else {
    // handle the case when the user id is not set
    echo 'User ID not found!';
    exit;
}

$product_id = $_POST['product_id'];
$date_added = date('Y-m-d H:i:s'); // Get the current date and time

// Connect to the database
$db_host = 'localhost';
$db_name = '13_bits';
$username = 'root';
$password = '';
$db = new PDO("mysql:host=$db_host;dbname=$db_name", $username, $password);

// Insert the product into the wishlist table
$stmt = $db->prepare("INSERT INTO wishlist (user_id, product_id, date_added) VALUES (?, ?, ?)");
$stmt->execute([$user_id, $product_id, $date_added]);

echo 'Product added to wishlist!';
?>