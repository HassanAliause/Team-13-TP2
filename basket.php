<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="images/13keys_-_black.png">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Styles -->
    <link rel="stylesheet" href="productspage.css">

</head>

<body class="antialiased">
    <nav>

        <input type="checkbox" id="box">
        <label for="box" class="boxbtn">
            <i class="fa fa-bars"></i>
        </label>
        <a href="{{ url('welcome')}}"><img src="13keys-black.png" width="150" height="100" style="margin-left:25px; margin-top:15px;" class="logo" alt=""></a>
        @if(Session::has('user'))
        <ul>
            <li><a href="{{ url('myorders') }}">My Orders</a></li>     
            <li><a href="{{ url('welcome')}}">Home</a></li>
            <li><a href="{{ url('productspage')}}">Products</a></li>
            <li><a href="{{ url('aboutus') }}">Contact Us</a></li>  
            <li><a href="{{ url('logout')}}">Logout</a></li>
            <li><a href="wishlist"><i class="fa fa-star-o" style="font-size:25px">({{ $listAmount }})</i></a></li>
            <li><a href="cartmenu"><i class="fa fa-shopping-cart" style="font-size:25px">({{ $total }})</i></a></li>
            <li><i class="fa fa-moon-o" style="font-size:25px" id="moonicon"></i></li>
         @else
         
         @endif
        </ul>
  
  
    </nav>

</body>



      
            <div class="cart-header">
                <h2>YOUR BASKET ITEMS</h2>
            </div>
            <div class = "orderLink">
                <a href="order" >PROCEED TO CHECKOUT</a>
            </div>
                
         @foreach ($products as $item)
             <div class="cart-container">
                
                <div class="cart-image">
                    <a href="/productselect?productid={{ $item->id }}" class="">
                <img src="{{ $item->Image }}" alt="" class="trending-image" width= 250px height= 350px>
                <div class="">

                </div>
                </a>
                </div>

                
                <div class="cart-info">
               
                 <div class = "name"><h2>{{ $item->Name }}</h2></div>
                 <div class = "desc"><h3>{{ $item->Description }}</h3></div>
                 <div class = "price"><h3>£{{ $item->Price }}</h3></div>

                </div>
               
                

                <div class="cart-remove">
                    <a href="/remove/{{ $item->cart_id }}"><i class="fa fa-trash" aria-hidden="true"></i></a>
                </div>
                
             </div>
         @endforeach
    
    </html>