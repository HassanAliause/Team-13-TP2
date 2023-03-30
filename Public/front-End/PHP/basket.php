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
        <link rel="stylesheet" href="../CSS/basket.css">

    </head>

    </body>
        
        <?php include_once('header.php')?>
        
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
    </body>
 </html>