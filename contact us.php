<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Contact Us</title>
        <link rel="stylesheet" href="contactus.css">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;600&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
<<<<<<<< HEAD:contactus.php
        <div class="logo-header">
            <a href=""><img src="images\logogif4.gif"  class="logo" width=75% alt=""></a>
        </div>
            <nav>
                <ul>
                    <li><a href="">Home</a></li>
                    <li><a href="productspage.php">Products</a></li>
                    <li><a href="contactus.php">Contact Us</a></li>
                    <li><a href="">Logout</a></li>
                    <li><a href="">My Orders</a></li>
                    <li><a href="wishlist"><i class="fa fa-heart-o" style="font-size:25px"></i></a></li>
                    <li><a href="cartmenu"><i class="fa fa-shopping-cart" style="font-size:25px"></i></a></li>
                </ul>
            </nav>
========
        
        <!-- navbar -->
        <?php include_once "header.php"?>

>>>>>>>> eba9748a48a1c55c2a1c62442b23fa823ce943bf:contact us.php
        <div class="contact-header">
            <h2>CONTACT US</h2>
        </div>
        <div class="container">
            <?php

                $db_host = 'localhost';
                $db_name = '13_bits';
                $username = 'root';
            ?>
            <div class="container-box">
            <form class="form input">
                <div class="titleh3">
                    <h3>For any queries, please fill out this form and we will contact you back within 24 hours.</h3>
                </div>
                <label>First Name</label>
                <input type="text" name="name" placeholder="First name" required>
                <label>Last Name</label>
                <input type="text" name="lname" placeholder="Last name" required>
                <label>Phone Number</label>
                <input type="text" name="phone" placeholder="Phone Number" required>
                <label>Email Address</label>
                <input type="text" name="email" placeholder="Enter a valid email address" required>
                <label>Subject</label>
                <input type="text" name="subject" placeholder="Subject" required>
                <label>Message</label>
                <textarea rows="10" placeholder="Write your message"></textarea>
                <div class="center">
                    <button type="submit">Submit</button>
                </div>
            </form>
           </div>
        </div>
        <h2 style="text-align:center; padding:30px;">ABOUT US</h2>
        <div class="row">
            <div class="column">
                <div class="card">
                    <div class="container-about">
                    <p style="text-align:center">We are the founders of TH13TEENBIT, we sell a variety of technology products, like computers, 
                laptops, keyboards, headsets, speakers and webcams.
                <br>Our team is always ready and available to help our customers, we are open 24/7. We offer good quality products, good services at an affordable price.
                <br>We provide great deals for both new and existing customers.</p>
                    </div>
                </div>
            </div>
    </body>
    <footer class="footer">
        <div class="footerlogo">
        <a href=""><img src="images\logojumping2.gif" width = 250px height=250px></a>
        </div>

        <div class="footernav">
            <h2>Navigation</h2>
            <ul class="links">
                <li> <a href="#">Home</a></li>
                <li> <a href="productspage.php">Products</a></li>
                <li> <a href="#">Contact Us</a></li>
            </ul>
        </div>

        <div class="socials">
            <h2>Our Socials</h2>
            <ul class="links">
                <li> <a href="#"><i class="fa fa-github" aria-hidden="true"></i> Github</a></li>
                <li> <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i>   Facebook</a></li>
                <li> <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i> Twitter</a></li>
            </ul>
        </div>
    </footer>
</html>