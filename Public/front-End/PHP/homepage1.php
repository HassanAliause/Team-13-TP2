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
    <title>Home Page</title>
    <!-- custom css -->
    <link rel="stylesheet" href="../CSS/productspage.css">
    <link rel="stylesheet" href="../CSS/homepage1.css">
</head>

<body>

    <!-- header -->
    <?php include_once "header.php"?>

    <div class="slideshow-container">


    <div class="mySlides fade">
            <a href="productdept.php?dept=11&name=computers-laptops"><img src="images/heroimage2.jpg" style="width:100%;height:500px;"></a>

        </div>

        <div class="mySlides fade">

            <a href="productdept.php?dept=22&name=keyboards-mice"><img src="images/acessories1.jpg" style="width:100%;height:500px;"></a>
        </div>


        <a class="prev" onclick="plusSlides(-1)">❮</a>
        <a class="next" onclick="plusSlides(1)">❯</a>

    </div>
    <br>

    <div style="text-align:center">
        <span class="dot" onclick="currentSlide(1)"></span>
        <span class="dot" onclick="currentSlide(2)"></span>

    </div>

    <script>
        let slideIndex = 1;
        showSlides(slideIndex);

        function plusSlides(n) {
            showSlides(slideIndex += n);
        }

        function currentSlide(n) {
            showSlides(slideIndex = n);
        }

        function showSlides(n) {
            let i;
            let slides = document.getElementsByClassName("mySlides");
            let dots = document.getElementsByClassName("dot");
            if (n > slides.length) { slideIndex = 1 }
            if (n < 1) { slideIndex = slides.length }
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
            }
            slides[slideIndex - 1].style.display = "block";
            dots[slideIndex - 1].className += " active";
        }
    </script>




<div class="departments-header">
        <h2>DEPARTMENTS</h2>
    </div>

        <div class = "dept-container">
            <div class ="dept">
            <a href="productdept.php?dept=11&name=computers-laptops"><h3>COMPUTERS/LAPTOPS</h3><img src="images\laptop2-1.png" alt="computer/laptops" width= 250px height = 250px></a>
            </div>
            <div class ="dept">
                <a href="productdept.php?dept=22&name=keyboards-mice"><h3>KEYBOARDS/MICE</h3><img src="images\keyboard1-1.jfif" alt="keyboard/mice"  width= 250px height = 250px></a>
            </div>
            <div class ="dept">
                <a href="productdept.php?dept=33&name=headsets-mics"><h3>HEADSETS/MICS</h3><img src="images\headset2-1.jfif" alt="headsets/mics"  width= 250px height = 250px></a>
            </div>
            <div class ="dept">
                <a href="productdept.php?dept=44&name=speakers"><h3>SPEAKERS</h3><img src="images\speaker3-1.jfif" alt="speakers"  width= 250px height = 250px></a>
            </div>
            <div class ="dept">
                <a href="productdept.php?dept=55&name=webcams"><h3>WEBCAMS</h3><img src="images\webcam5-1.jfif" alt="webcams" width= 250px height = 250px></a>
            </div>
        </div>
 




</body>

<!-- footer -->
<?php include_once "footer.php"?>

</html>