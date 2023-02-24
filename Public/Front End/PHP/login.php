<?php include("databaseConnect.php")?>
<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Log in</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="../CSS/login.css">
    </head>

    <body>

    <!-- put in home page button/logo -->

        <div class="formBox">
            <form action="" method="post" class="form signin">
                <h2>Sign In</h2>
                <div class="Inp">
                    <input type="text" required = "required">
                    <i class="fa-regular fa-user"></i>
                    <span>Username</span>
                </div>
                <div class="Inp">
                    <input type="password" required = "required">
                    <i class="fa-solid fa-lock"></i>
                    <span> Passsword</span>
                </div>
                <div class="Inp">
                    <input type="submit" value="Login">
                </div>
                <p> Don't have a account? <a  href="signup.php"
                class="btn">Sign Up</a></p>

            </form>

        </div>

    </body>

</html>