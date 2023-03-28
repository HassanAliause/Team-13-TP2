<?php
    include('databaseConnect.php');
    // include('checkLogin.php');

    // will get infomation from teh specified record on teh table 
    // depening on the record that was clicked on the table depends on teh infomation dispalyed 
    $id = $_GET['productID_Update'];
    $sql = "SELECT * FROM `products` WHERE id = '$id'";

    // these are the variabels that will show the currect infomation in the database
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);
    $image = $row['image_file'];
    $name = $row['name'];
    $description = $row['description'];
    $price = $row['price']; 
    $quantity = $row['quantity'];
    $total = $row['total'];
    $keyvalue = $row['key_value'];

    // this code will run when teh submit button is clicked 
    if (isset($_POST['submitButton'])) {

        // variabels for updating infomation
        $name = $_POST['productName'];
        $description = $_POST['productDescription'];
        $price = $_POST['productPrice'];
        $quantity = $_POST['productQuantity'];
        $total = $_POST['productTotal'];
        $keyvalue = $_POST['productKeyValue'];

        // sql line for updating infomation
        $sql = "UPDATE `products` SET name='$name', description='$description', price='$price', quantity='$quantity', total='$total', key_value='$keyvalue' WHERE id='$id'";
        $result = mysqli_query($con, $sql);

        if($result) {
            // will direct user back to page
            header('location:employeeSubPageProducts.php');

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
    
        <title>Employee Page - Update Product</title>
        
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
                    <h2>Udpate Product:</h2>
                </div>

                    <form class="box-input" method="POST">
                        
                        <h2> ID Number: <?php echo $id?></h2>

                        <!-- product name -->
                        <div class="pName">
                            <h2>Product Name:</h2>
                            <input type="text" class="formInput" name="productName" id="productName"  value="<?php echo $name ?>" autocomplete="off"  required>
                        </div>

                        <!-- product total -->
                        <div class ="pKeyValue">
                            <h2>Product Key Value:</h2>
                            <input type="number" class="formInput"  name="productKeyValue" id="productKeyValue" value="<?php echo $keyvalue?>" autocomplete="off">
                            
                        </div>


                        <!-- quantity -->
                        <div class="pQuantity">
                            <h2>Product Quantity:</h2>
                            <input type="number" class="formInput"  name="productQuantity" id="productQuantity" value="<?php echo $quantity ?>" autocomplete="off" required>
                        </div>
                        
                        <!-- product infomation -->
                        <div class="pInfo">
                            <h2>Product Description: </h2>
                            <textarea type="text" class="formInput" name="productDescription" id="productDescription" autocomplete="off" required><?php echo $description ?></textarea>
                        </div>

                        <!-- product total -->
                        <div class ="pTotal">
                            <h2>Product Total:</h2>
                            <input type="number" class="formInput"  name="productTotal" id="productTotal" value="<?php echo $total ?>" autocomplete="off" required>
                        </div>

                        <!-- product price -->
                        <div class ="pPrice">
                            <h2>Product Price:</h2>
                            <input type="number" class="formInput"  name="productPrice" id="productPrice" value="<?php echo $price ?>" autocomplete="off" required>
                        </div>

                        <?php echo '<td> <img src="' . $image . '"width= 70% height = 70%/></td>' ?>

                        <br>
                        <br>

                        <!-- image for product -->
                        <input type="file" class="formImageInput" name="productImage" id="productImage">

                        <!-- submit button -->
                        <button type="submit" class="formButton" id="submitButton" name="submitButton">Update Product</button>

                    </form>

                </div>

            </main>

        </div>


    </body>

</HTML>