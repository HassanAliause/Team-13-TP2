<?php
// Initialize the session
session_start();


// Include config file
include "databaseConnect.php";


// Define variables and initialize with empty values
$username = $password = "";

$errors = array();

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $errors["username"] = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }

    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $errors["password"] = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    // check if key is empty
    if(empty(trim($_POST["key"]))){
        $errors["key"] = "Please enter your key.";
    } else{
        $key = trim($_POST["key"]);
    }

    // Validate credentials
    if(empty($errors)){
        // Prepare a select statement
        $sql = "SELECT id, username, adminkey ,password FROM admin WHERE username = ?";

        if($stmt = mysqli_prepare($con, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Set parameters
            $param_username = $username;

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                if(mysqli_stmt_num_rows($stmt) == 1){
                // Check if username exists, if yes then verify password
                mysqli_stmt_bind_result($stmt, $id, $username, $adminkey, $pass);
                    if(mysqli_stmt_fetch($stmt)){
                        if ($password == $pass && $key == $adminkey ) { 
                            // Password is correct, so start a new session
                            session_start();
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["admin_id"] = $id;
                            $_SESSION["username"] = $username;

                            // Redirect user to dashboard page
                            header("location: employeeDashboard.php?id=$id");
                        } else{
                            // Display an error message if password is not valid
                            $errors["generic"] = "Invalid username or password   1.";
                        }
                    }
                } else{
                    // hello
                    // Display an error message if username doesn't exist
                    $errors["generic"] = "Invalid username or password  2.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }

    // Close connection
    mysqli_close($con);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="../CSS/login.css">
</head>
<body>
    <div class="formBox">
        <form action="" method="post" class="form signin">
            <h2>Admin Login</h2>
            <div class="Inp">
                <input type="text" name="username" required = "required">
                <i class="fa-regular fa-user"></i>
                <span>Username</span>

            </div>
            <div class="Inp">
                <input type="password"  name="password" required = "required">
                <i class="fa-solid fa-lock"></i>
                <span> Password</span>
            </div>
            <div class="Inp">
                <input type="password"  name="key" required = "required">
                <i class="fa-solid fa-lock"></i>
                <span> Employee Key</span>
            </div>
            <div class="Inp">
                <input type="submit" value="Login">
            </div>
            <div class="error-box">
              <?php
                foreach($errors as $error) {
                  echo '<p class="error"  >' . $error . '</p><br>';
                }
              ?>
            </div>

            <p> Login as User <a  href="login.php"
            class="btn">User Login</a></p>

        </form>
    </div>
</body>
</html>