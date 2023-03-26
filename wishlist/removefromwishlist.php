<?php
// Start session
session_start();

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

// Connect to database
$db_host = 'localhost';
$db_name = '13_bits';
$username = 'root';
$password = '';
$db = new PDO("mysql:host=$db_host;dbname=$db_name;charset=utf8", $username, $password);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Check if product ID is provided
if (!isset($_POST['product_id'])) {
    header('Location: wishlist.php');
    exit();
}

// Get user ID and product ID
$user_id = $_SESSION['user_id'];
$product_id = $_POST['product_id'];

// Delete product from wishlist
$query = "DELETE FROM wishlist WHERE user_id = :user_id AND product_id = :product_id";
$stmt = $db->prepare($query);
$stmt->bindParam(':user_id', $user_id);
$stmt->bindParam(':product_id', $product_id);
$stmt->execute();

// Redirect to wishlist page
header('Location: wishlist.php');
exit();
?>
