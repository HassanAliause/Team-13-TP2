<?php
    include('databaseConnect.php');
    // include('checkLogin.php');

    
    // will get infomation from teh specified record on teh table 
    // depening on the record that was clicked on the table depends on teh infomation dispalyed 
    $id = $_GET['employeeID_Update'];
    $sql = "SELECT * FROM `admin` WHERE id = '$id'";

    // these are the variabels that will show the currect infomation in the database
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);
    $username = $row['username'];
    $password = $row['password'];
    $key = $row['adminkey'];

    // this code will run when teh submit button is clicked 
    if (isset($_POST['submitButton'])) {

        // variabels for updating infomation
        $username = $_POST['eName'];
        $password = $_POST['ePassword'];
        $key = $_POST['eKey'];

        // sql line for updating infomation
        $sql = "UPDATE `admin` SET username='$username', password='$password', adminkey='$key' WHERE id='$id'";

        $result = mysqli_query($con, $sql);
        if($result) {
            // will direct user back to page
            header('location:employeeSubPageEmployees.php');

        } else {
            // will dispaly error if infomation cannot be updated
            die(mysqli_error($con));
        }

    }

?>

<!DOCTYPE HTML>
<HTML lang="en">
    <head>
        <meta charset="UTF-8">
       
        <!-- will make the webpage mobile friendly -->
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
    
        <title>Employee Page - Update Employee</title>
        
        <!-- link to icons -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
        
        <!-- link to fonts -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- link to css file -->
        <link rel="stylesheet" href="../CSS/employee.css">
        
    </head>

    <div class="grid-container">
            <!-- header -->
            <?php include_once "employeeHeader.php"?>

            <!-- sidebar -->
            <?php include_once "employeeSidebar.php"?>

            <main class="main-container">
                <!-- this will be the input form box that will create a new product -->
                <div class="addBox">
                
                <!-- title of page -->
                <div class="main-title">
                    <h2>Udpate Employee:</h2>
                </div>

                    <form class="box-input" method="POST">
                        
                        <h2> ID Number: <?php echo $id?></h2>

                        <!-- Employee Username -->
                        <div>
                            <h2>Employee User Name:</h2>
                            <input type="text" class="formInput" id="eName" name="eName" autocomplete="off" value="<?php echo $username?>" placeholder="Enter Employee Username" required>
                        </div>

                        <!-- Employee key -->
                        <div>
                            <h2>Employee Key:</h2>
                            <input type="number" class="formInput" id="eKey"  name="eKey" autocomplete="off"value="<?php echo $key?>" placeholder="Enter Employee Key" required>
                        </div>

                        <!-- Employee password -->
                        <div>
                            <h2>Employee Password:</h2>
                            <input type="password" class="formInput" id="ePassword"  name="ePassword" autocomplete="off" value="<?php echo $password?>" placeholder="Enter Employee Password" required>
                        </div>                        
 
                        <!-- submit button -->
                        <button type="submit" class="formButton" id="submitButton" name="submitButton">Update Employee </button>

                    </form>

                </div>

            </main>

        </div>


    </body>

</HTML>