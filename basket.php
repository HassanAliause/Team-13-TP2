<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="images/13keys_-_black.png">

    <title>Basket</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Styles -->
    <link rel="stylesheet" href="basket.css">

</head>

<body class="antialiased">
    <div class="logo-header">
        <a href=""><img src="images\logogif4.gif" class="logo" width = 75% alt=""></a>
    <div>
    <nav>
        <input type="checkbox" id="box">
        <label for="box" class="boxbtn">
            <i class="fa fa-bars"></i>
        </label>
        <ul>
            <li><a href="">Home</a></li>
            <li><a href="productspage.php">Products</a></li>
            <li><a href="">Contact Us</a></li>  
            <li><a href="">Logout</a></li>
            <li><a href="">My Orders</a></li>   
            <li><a href="wishlist"><img src="images\heart2.png" alt="computer/laptops" width= 30px height = 30px></a></li>
            <li><a href="cartmenu"><img src="images\basket.png" alt="computer/laptops" width= 30px height = 30px></a></li>
            <!-- <li><a href="wishlist"><i class="fa fa-heart-o" style="font-size:25px"></i></a></li>
            <li><a href="cartmenu"><i class="fa fa-shopping-cart" style="font-size:25px"></i></a></li> -->
       
        </ul>
  
  
    </nav>

</body>



      
            <div class="cart-header">
                <h2>YOUR BASKET ITEMS</h2>
            </div>
            <div class = "orderLink">
                <a href="order" >PROCEED TO CHECKOUT</a>
            </div>
             <div class="cart-container">
                
                <div class="cart-image">
                    <a href="/selectedproduct?productid=" class="">
                <img src="" alt="" class="trending-image" width= 250px height= 350px>
                <div class="">

                </div>
                </a>
                </div>

                
                <div class="cart-info">
               
                 <div class = "name"><h2></h2></div>
                 <div class = "decription"><h3></h3></div>
                 <div class = "price"><h3>£</h3></div>

                </div>
               
                

                <div class="cart-remove">
                    <a href="/remove/{{ $item->cart_id }}"><i class="fa fa-trash" aria-hidden="true"></i></a>
                </div>
                
             </div>
    
    </html>