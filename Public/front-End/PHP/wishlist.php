



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wishlist</title>
    <link rel="stylesheet" href="productpage.css">
    <link rel="stylesheet" href="homepage1.css">
    <link rel="stylesheet" href="wishlist.css">
</head>
<body>
<div class="logo-header">
        <a href=""><img src="/Homepage/images/logo.png" class="logo" width=75% alt=""></a>
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
                    <li><a href="wishlist"><i class="fa fa-star-o" style="font-size:25px"></i></a></li>
                    <li><a href="cartmenu"><i class="fa fa-shopping-cart" style="font-size:25px"></i></a></li>

                </ul>

            </nav>
<?php
// Connect to database
$db_host = 'localhost';
$db_name = '13_bits';
$username = 'root';
$password = '';
$db = new PDO("mysql:host=$db_host;dbname=$db_name", $username, $password);

// Retrieve wishlist items for the current user
$user_id = $_SESSION['user_id']; // or however you get the current user's ID
$query = "SELECT products.id, products.name, products.image_file, products.price FROM wishlist
          JOIN products ON wishlist.product_id = products.id
          WHERE wishlist.user_id = :user_id";
$stmt = $db->prepare($query);
$stmt->bindParam(':user_id', $user_id);
$stmt->execute();
$wishlist_items = $stmt->fetchAll();

// Display the wishlist items
if (count($wishlist_items) > 0) {
  foreach ($wishlist_items as $item) {
    ?>
    <div class="wishlist-item">
      <img src="<?php echo $item['image_file']; ?>" alt="<?php echo $item['name']; ?>" />
      <h3><?php echo $item['name']; ?></h3>
      <p>Price: <?php echo $item['price']; ?></p>
      <form action="removefromwishlist.php" method="POST">
        <input type="hidden" name="product_id" value="<?php echo $item['id']; ?>">
        <button class="removeBtn"><i class="fa fa-trash-o"></i> Remove from Wishlist</button>
      </form>
    </div>
    <?php
  }
} else {
  echo '<p>Your wishlist is empty.</p>';
}
?>
 
</body>
</html>