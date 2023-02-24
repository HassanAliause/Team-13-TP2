<?php
    // inculding the config file for connecting and checking database connection


    // including the config file for connecting and checking database connection
    require_once "config.php";

    $username = $password = $confirm_password = $email = "";
    $errors = [];

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = trim($_POST["username"]);
        $password = trim($_POST["password"]);
        $confirm_password = trim($_POST["c_password"]);
        $email = trim($_POST["email"]);

        // Validate username
        if (empty($username)) {
            $errors["username"] = "Please enter a username";
        } elseif (!preg_match('/^[a-zA-Z0-9_]+$/', $username)) {
            $errors["username"] = "Username can only contain letters, numbers, and underscores!";
        } else {
            $sql = "SELECT id FROM login_info WHERE username = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $username);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $errors["username"] = "This username is already taken!";
            }

            $stmt->close();
        }
        // Validate email
        // Validate email
        if (empty($email)) {
          $errors["email"] = "Please enter an email address";
          } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors["email"] = "Invalid email address";
          } else {
            $sql = "SELECT id FROM login_info WHERE email = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $errors["email"] = "This email address is already registered!";
        }

        $stmt->close();
        }
        // Validate password
        if (empty($password)) {
            $errors["password"] = "Please enter a password";
        } elseif (!preg_match("/^(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,20}$/", $password)) {
          $errors["password"] = "Password must have:<br> at least 8 characters<br> one capital letter,<br> and one number, and no special characters!";
      }

        

        // Validate confirm password
        if (empty($confirm_password)) {
            $errors["c_password"] = "Please confirm your password";
        } elseif ($password != $confirm_password) {
            $errors["c_password"] = "Passwords do not match";
        }

        // If no errors, insert data into database
        if (count($errors) == 0) {
            $sql = "INSERT INTO login_info (username, email, password) VALUES (?, ?, ?)";
            $stmt = $conn->prepare($sql);
            // Hash the password
            $hashed_password = password_hash($confirm_password, PASSWORD_DEFAULT);
            $stmt->bind_param("sss", $username, $email, $hashed_password);

            if ($stmt->execute()) {
                header("location: login.php");
                exit();
            } else {
                $errors["db_error"] = "Oops! Something went wrong. Please try again later.";
            }

            $stmt->close();
        }
    }

    $conn->close();
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign in/ Sign up <form action=""></form></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../CSS/login.css">

</head>
<body>
    <div class="formBox">
        <form class="form Signup" action="" method="post">
            <h2>Sign Up</h2>
            <div class="Inp">
                <input type="text" name="username" required = "required">
                <i class="fa-regular fa-user"></i>
                <span class="labels">Username</span>
                

            </div>
            <div class="Inp">
                <input type="text" name="email" required = "required">
                <i class="fa-regular fa-envelope"></i>
                <span class="labels">Email address</span>
                

            </div>
            <div class="Inp">
                <input type="password" name="password" required = "required">
                <i class="fa-solid fa-lock"></i>
                <span class="labels">Create Passsword</span>
               

            </div>
            <div class="Inp">
                <input type="password" name="c_password" required = "required">
                <i class="fa-solid fa-lock"></i>
                <span class="labels">Confirm Passsword</span>
                

            </div>
            <div class="Inp">
                <input type="submit" value="Create Account">

            </div>
            <div class="error-box">
              <?php
                foreach($errors as $error) {
                  echo '<p class="error"  >' . $error . '</p><br>';
                }
              ?>
            </div>
            <p> Already have a account? <a href="login.php" class="btn">Login</a></p>
        
        </div>

    </form>
    </div>
    


</body>
</html>