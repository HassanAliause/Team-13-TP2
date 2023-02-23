<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" href="productspage.css">
    <link rel="stylesheet" href="homepage1.css">
</head>

<body>

    <!-- header -->
    <?php include_once "header.php"?>

    <div class="slideshow-container">



        <div class="mySlides fade">

            <a href=""><img src="images/heroimage1.jpg" style="width:100%;"></a>
        </div>

        <div class="mySlides fade">
            <a href=""><img src="images/heroimage2.jpg" style="width:100%;"></a>

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




    <div class="departments">

        <div class="dept-box">
            <H2>LAPTOPS</H2>
        </div>
        <div class="dept-box">
            <H2>CAMERAS</H2>
        </div>
        <div class="dept-box">
            <H2>SPEAKERS</H2>
        </div>
        <div class="dept-box">
            <H2>HEADPHONES</H2>
        </div>
        <div class="dept-box">
            <H2>ACCESORIES</H2>
        </div>
    </div>




</body>

</html>