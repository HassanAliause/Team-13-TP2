<?php include("databaseConnect.php")?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in/ Sign up</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../CSS/login.css">

</head>
<body>

    <!-- put in a home page button/logo-->

    <div class="formBox">
        <form class="form Signup" action="" method="post">
            <h2>Sign Up</h2>
            <div class="Inp">
                <input type="text" required = "required">
                <i class="fa-regular fa-user"></i>
                <span>Username</span>
            </div>
            <div class="Inp">
                <input type="text" required = "required">
                <i class="fa-regular fa-envelope"></i>
                <span>Email address</span>
            </div>
            <div class="Inp">
                <input type="password" required = "required">
                <i class="fa-solid fa-lock"></i>
                <span>Create Passsword</span>
            </div>
            <div class="Inp">
                <input type="password" required = "required">
                <i class="fa-solid fa-lock"></i>
                <span>Confirm Passsword</span>
            </div>
            <div class="Inp">
                <input type="submit" value="Create Account">

            </div>
            <p> Already have a account? <a href="login.php" class="btn">Login</a></p>
        </form>
        

        </div>
    </div>


</body>
</html>