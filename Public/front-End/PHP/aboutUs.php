<?php
include 'databaseConnect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
}
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- custom css -->
        <link rel="stylesheet" href="../CSS/contactus.css">
        <!-- exernal font and css files -->
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;600&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <title>About Us</title>
    </head>


    <body>

        <!-- header -->
        <?php include_once "header.php"?>

        <div class="contact-header">
            <h2>ABOUT US</h2>
        </div>

        <div class="row">
            <div class="column">
                <div class="card">
                    <div class="container" style="padding:20px">
                    <p style="text-align:center">We are the founders of TH13TEENBIT, we sell a variety of technology products. TH13EENBIT only started couple years ago.<br>
Since covid-19 has hit the UK, we have noticed the demand for computers and its accessories has been increased. This was because most of the population started to work/study/play from home.
Therefore we've decided to open an online technology store.<br>
As the store is getting well known by users, we've decided to enlarge our business by selling gaming computers, gaming accessories and and other products for streamers. <br>
Our vision is to sell high-quality technology products at an affordable price, so young adults won't have to spend loads of money. We offer great deals for both new and existing customers.   
We are open 24/7 and always available to help our customers. </p>
                    </div>
                    <h2 style="text-align:center; padding:15px;">OUR TEAM</h2>
                </div>
                
            </div>
        &nbsp;
        <div class="container">
        <li class="name" style="text-align:center">Zain Khel - Admin Page</li>
        &nbsp;
        <li class="name" style="text-align:center">Dievan Chort - Database</li>
        &nbsp;
        <li class="name" style="text-align:center">Hassan Alieuse - Java Application</li>
        &nbsp;
        <li class="name" style="text-align:center">Natasha Dey - Products Page</li>
        &nbsp;
        <li class="name" style="text-align:center">Danial Jamil - Java Applicaiton</li>
        &nbsp;
        <li class="name" style="text-align:center">Arshdeep Kaur - Contact Us & About Us</li>
        &nbsp;
        <li class="name" style="text-align:center">Myles Thaxter - Home Page</li>
        &nbsp;
        <li style="text-align:center">Patrick Byteman - Page Mascot</li>
        &nbsp;
</div>

        <?php include_once "footer.php"?>

    </body>

</html>