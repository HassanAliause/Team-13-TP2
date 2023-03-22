<?php
include("databaseConnect.php");
// include("checkLogin.php");

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

        <div class="contactUs">

            <div class="contactUs-table">

                <h2 class="contactUs-title">
                    Contact Us Queries
                </h2>

                <table>

                    <thead>

                        <tr>

                            <th scope="col">ID</th>
                            <th scope="col">First Name</th>
                            <th scope="col">Last Name</th>
                            <th scope="col">Phone Number</th>
                            <th scope="col">Email</th>
                            <th scope="col">Subject</th>
                            <th scope="col">Message</th>

                        </tr>

                    </thead>

                    <tbody>

                        <?php

                            $sql = "SELECT * from `message`";
                            $result = mysqli_query($con, $sql);
                            if ($result) {
                                while ($row = mysqli_fetch_assoc($result)){
                                    $id = $row['id'];
                                    $firstName = $row['fName'];
                                    $lastName = $row['lName'];
                                    $phone = $row['phone'];
                                    $email = $row['email'];
                                    $subject = $row['subject'];
                                    $message = $row['message'];

                                    echo ' 
                                    <tr>
                                        <th scope="row">' . $id . '</th>
                                        <td>' . $firstName . '</td>
                                        <td>' . $lastName . '</td>
                                        <td>' . $phone . '</td>
                                        <td>' . $email . '</td>
                                        <td>' . $subject . '</td>
                                        <td>' . $message . '</td>
                                    </tr>'
                                    
                                    ;
                                }
                            }
                        ?>

                    </tbody>
                            
                </div>

            </table>
            
        </div>

    </body>

</html>
