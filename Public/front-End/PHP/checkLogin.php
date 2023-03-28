<?php

    //this function will check if an admin has logged in  
    function adminLogin($con) {
        if (isset($_SESSION['id'])) {

            $id = $_SESSION['id'];
            $query = "SELECT * from `admin` where id = '$id' limit 1";

            $result = mysqli_query($con, $query);
            if ($result && mysqli_num_rows($result)>0) {
                $admin_login = mysqli_fetch_assoc($result);
                return $admin_login;
            }
        }

        // will take user back to log in 
        header("Location: login.php");
        die;
    }

    // this function will check if a user has logged in

    function userLogin($con) {

        if (isset($_SESSION['id'])) {

            $id = $_SESSION['id'];
            $query = "SELECT * from `login_info` where id = '$id' limit 1";

            $result = mysqli_query($con, $query);
            if ($result && mysqli_num_rows($result)>0) {
                $customer_login = mysqli_fetch_assoc($result);
                return $customer_login;
            }
        }
        
        // will take user back to log in
        header("Location: login.php");
        die;
    }


    // this will check if the user has logged 
    // if they havent they will be directed back to the login page 
    if (!isset($_SESSION['id'])){
        header('Location:Public\Front End\PHP\login.html');
    }    

?>