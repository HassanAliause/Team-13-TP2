
<?php
    include('databaseConnect.php');
    // include('checkLogin.php');

    $id = $_GET['customerID_Update'];
    $sql = "SELECT * FROM `customer_details` WHERE id = '$id'";

    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);
    $name = $row['name'];
    $email = $row['email'];
    $password = $row['password'];
    $birth = $row['birth'];
    $housenumber = $row['housenumber'];
    $street = $row['streetname'];
    $town = $row['townname'];
    $postcode = $row['postcode'];

    if (isset($_POST['submitButton'])) {

        $name = $_POST['customerName'];
        $email = $_POST['customerEmail'];
        $password = $_POST['customerPassword'];
        $birth = $_POST['customerBirth'];
        $houseNumber = $_POST['customerHouseNumber'];
        $street = $_POST['customerStreet'];
        $town = $_POST['customerTown'];
        $postcode = $_POST['customerPostcode'];


        $sql = "UPDATE `customer_details` SET name='$name', email='$email', birth='$birth', housenumber='$housenumber', streetname='$street', townname='$town', postcode='$postcode' WHERE `customer_details`.`id`='$id'";
        $result = mysqli_query($con, $sql);
        if ($result) {
            header('location:employeeSubPageCustomer.php');
        } else {
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
    
        <title>Employee Page - Update Customer</title>
        
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
                    <h2>Udpate Customer:</h2>
                </div>

                    <form class="box-input" method="POST">
                        
                        <h2> ID Number: <?php echo $id?></h2>

                        <!-- customer Username -->
                        <div class="customerName">
                            <h2>Customer Name:</h2>
                            <input type="text" class="formInput" id="customerName" name="customerName" autocomplete="off" value="<?php echo $name ?>" placeholder="Enter Customer Name" required>
                        </div>


                        <!-- customer email -->
                        <div class="customerEmail">
                            <h2>Customer Email: </h2>
                            <input type="email" class="formInput" id="customerEmail" name="customerEmail" autocomplete="off" value="<?php echo $email ?>" placeholder="Enter Customer Email" required>
                        </div>


                        <!-- customer password -->
                        <div class="customerPassword">
                            <h2>Customer Password:</h2>
                            <input type="password" class="formInput" id="customerPassword" name="customerPassword" autocomplete="off" value="<?php echo $password ?>" placeholder="Enter Customer Password" required>
                        </div>

                        <!-- customer birth -->
                        <div class="customerBirth">
                            <h2>Customer Date of Birth:</h2>
                            <input type="date" class="formInput" id="customerBirth" name="customerBirth" autocomplete="off" value="<?php echo $birth ?>" placeholder="Enter Customer Date Of Birth" required>
                        </div>

                        <!-- customer house number  -->
                        <div class="customerHouseNumber">
                            <h2>Customer House Number: </h2>
                            <input type="number" class="formInput"id="customerHouseNumber" name="customerHouseNumber" autocomplete="off" value="<?php echo $housenumber ?>"  placeholder="Enter Customer House Number" required>
                        </div>

                        <!-- customer street -->
                        <div class="customerStreet">
                            <h2>Customer Street Name: </h2>
                            <input type="text" class="formInput"id="customerStreet" name="customerStreet" autocomplete="off" value="<?php echo $street ?>"placeholder="Enter Customer Street Name" required>
                        </div>

                        <!-- customer town -->
                        <div class="customerTown">
                            <h2>Customer Town: </h2>
                            <input type="text" class="formInput" id="customerTown" name="customerTown" autocomplete="off" value="<?php echo $town ?>" placeholder="Enter Customer Town" required>
                        </div>

                        <!-- customer postcode -->
                        <div class="customerPostcode"> 
                            <h2>Customer Post Code (L00 0LL): </h2>
                            <input type="postcode"  id="customerPostcode" pattern="[A-Za-z]{1,2}[0-9Rr][0-9A-Za-z]? [0-9][A-Za-z]{2}" class="formInput"  value="<?php echo $postcode ?>"name="customerPostcode" autocomplete="off" placeholder="Enter Customer Post Code"  required >
                        </div>

    
                        <!-- submit button -->
                        <button type="submit" class="formButton" id="submitButton" name="submitButton">Update Customer</button>

                    </form>

                </div>

            </main>

        </div>


    </body>

</HTML>