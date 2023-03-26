<?php 
// connects to database
include('databaseConnect.php');
// starts session
session_start();
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- custom css -->
        <link rel="stylesheet" href="../CSS/productspage.css">
        <!-- exernal font and css files -->
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;600&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>

    <div class="logo-header">
        <a href="homepage1.php"><img src="images/logogif4.gif" class="logo" width = 75% alt=""></a>
    <div>
    <nav>

        <input type="checkbox" id="box">
        <label for="box" class="boxbtn">
            <i class="fa fa-bars"></i>
        </label>

        <ul>  
            <!-- contains the links across the site -->
            <li><a href="homepage1.php">Home</a></li>
            <li><a href="productspage.php">Products</a></li>
            <li><a href="contactus.php">Contact Us</a></li>
            <li><a href="aboutUs.php">About US</a></li>
            <?php
                if(isset($_SESSION['username'])){
                    echo '<li><a href="myOrders.php">My Orders</a></li>';
                    echo '<li><a href="logout.php">Logout</a></li>';
                }else{
                    echo '<li><a href="login.php">Log in</a></li>';
                }

                // if(isset($_SESSION[admin.'id'])) {

                // }
            ?>
            <li><a href="wishlist.php"><i class="fa fa-heart-o" style="font-size:25px"></i></a></li>
            <li><a href="addtocart.php"><i class="fa fa-shopping-cart" style="font-size:25px"></i></a></li>
        </ul>   
        
    </nav>
        

</html>