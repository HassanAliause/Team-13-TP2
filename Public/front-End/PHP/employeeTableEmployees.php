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

        <div class="admin">

            <div class="admin-table">

                <h2 class="admin-title">
                    Employee's Table
                </h2>

                <table>
                        
                    <thead>

                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Admin Key</th>
                            <th scope="col">Password</th>

                        </tr>

                    </thead>

                    <tbody>

                        <?php
                            $sql = "SELECT * from `admin`";
                            $result = mysqli_query($con, $sql);
                            if ($result) {
                                while ($row = mysqli_fetch_assoc($result)){
                                    $id = $row['id'];
                                    $username = $row['username'];
                                    $adminkey = $row['adminkey'];
                                    $password = $row['password'];
                                    echo ' 
                                    <tr>
                                        <th scope="row">' . $id . '</th>
                                        <td>' . $username . '</td>
                                        <td>' . $adminkey . '</td>
                                        <td>' . $password . '</td>
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
