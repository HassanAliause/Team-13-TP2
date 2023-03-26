<?php

    function adminLogin($con) {
        if (isset($_SESSION['id'])) {

            $id = $_SESSION['id'];
            $query = "SELECT * from `admin` where id = '$id' limit 1";

            $result = mysqli_query($con, $query);
            if ($result && mysqli_num_rows($result)>0) {
                $admin_data = mysqli_fetch_assoc($result);
                return $admin_data;
            }
        }

        // will take user back to log in 
        header("Location: login.php");
        die;
    }

    function userLogin($con) {

        if (isset($_SESSION['id'])) {

            $id = $_SESSION['id'];
            $query = "SELECT * from `login_info` where id = '$id' limit 1";

            $result = mysqli_query($con, $query);
            if ($result && mysqli_num_rows($result)>0) {
                $admin_data = mysqli_fetch_assoc($result);
                return $admin_data;
            }
        }
        
        // will take user back to log in
        header("Location: login.php");
        die;
    }

    if (!isset($_SESSION['id'])){
        header('Location:Public\Front End\PHP\login.html');
    }    

?>