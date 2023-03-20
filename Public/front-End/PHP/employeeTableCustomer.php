<?php
include("databaseConnect.php");
// include("checkLogin.php");
// if (!isset$_SESSION['id']){
//     header('Location:Public\Front End\PHP\login.html');
// }    
?>
<!DOCTYPE HTML>
<html lang="en">

    <head>
        <meta charset="UTF-8">
       
        <!-- will make the webpage mobile friendly -->
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        
        <!-- link to icons -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
        
        <!-- link to fonts -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- link to css file -->
        <link rel="stylesheet" href="../CSS/employee.css">
        
    </head>

    <body>

        <div class="customers">

            <div class="customer-table">

                <h2 class="customer-title">
                    Customer Table
                </h2>

                <table>

                    <thead>

                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Password</th>
                            <th scope="col">Date of Birth</th>
                            <th scope="col">House No.</th>
                            <th scope="col">Street Name</th>
                            <th scope="col">Town</th>
                            <th scope="col">Postcode</th>
                        </tr>

                    </thead>

                    <tbody>

                        <?php
                            $sql = "SELECT * from `customer_details`";
                            $result = mysqli_query($con, $sql);
                            if ($result) {
                                while ($row = mysqli_fetch_assoc($result)){
                                    $id = $row['id'];
                                    $name = $row['name'];
                                    $email = $row['email'];
                                    $password = $row['password'];
                                    $birth = $row['birth'];
                                    $housenumber = $row['housenumber'];
                                    $street = $row['streetname'];
                                    $town = $row['townname'];
                                    $postcode = $row['postcode'];
                                    echo ' 
                                    <tr>
                                        <th scope="row">' . $id . '</th>
                                        <td>' . $name . '</td>
                                        <td>' . $email . '</td>
                                        <td>' . $password . '</td>
                                        <td>' . $birth . '</td>
                                        <td>' . $housenumber . '</td>
                                        <td>' . $street . '</td>
                                        <td>' . $town . '</td>
                                        <td>' . $postcode .'</td>
                                    </tr>'
                                    
                                    ;
                                }
                            }
                        ?>

                    </tbody>

                </table>
                
            </div>

        </div>

    </body>

</html>
