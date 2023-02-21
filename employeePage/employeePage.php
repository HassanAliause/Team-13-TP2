<?php
session_start();
include("databaseConnect.php");
// include("checkLogin.php");
// if (!isset$_SESSION['id']){
//     header('Location:Public\Front End\PHP\login.html');

// }    
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
       
        <!-- will make the webpage mobile friendly -->
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
       
        <!-- title of page -->
        <title>Employee Page</title>
        
        <!-- link to icons -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
        
        <!-- link to fonts -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- link to css file -->
        <link rel="stylesheet" href="css/employee.css">
        
    </head>

    <body>


        <div class="grid-container">
            <!-- header -->
            <header class="header">

                <div class="header-left">
                    <img src="images\logo.png" alt="Logo" class="logo" width="50%">


                </div>
                
                <div href="productspage.html" class="header-right" >
                    <span class="material-symbols-outlined" href="/productspage.html">
                        home 
                    </span>
                </div>
            </header>

            <!-- sidebar -->
            <aside id="sidebar">
                <div class="sidebar-title">
                    <div class="sidebar-brand"> 
                        Contents:
                    </div>
                </div>

                <ul class="sidebar-list">
                    <li class="sidebar-list-item" http-equiv="refresh" content="10">
                        <span class="material-symbols-outlined" >
                            dashboard
                        </span>
                        Dashboard
                    </li>

                    <li class="sidebar-list-item">
                        <span class="material-symbols-outlined">
                            monitoring
                            </span>
                        Charts
                    </li>
                    
                    <li class="sidebar-list-item">
                        <span class="material-symbols-outlined">
                            groups
                        </span>
                        Customers
                    </li>

                    <li class="sidebar-list-item">
                        <span class="material-symbols-outlined">
                            manage_accounts
                        </span>
                        Administrators
                    </li>

                    <li class="sidebar-list-item">
                        <span class="material-symbols-outlined">
                            production_quantity_limits
                        </span>
                        Stock
                    </li>

                    
                    <li class="sidebar-list-item">
                        <span class="material-symbols-outlined">
                            inventory_2
                        </span>
                        Products
                    </li>

                    <li class="sidebar-list-item">
                        <span class="material-symbols-outlined">
                            contact_page
                        </span>
                        Contact Us
                    </li>
                    
                </ul>

            </aside>

            <!-- main -->
            <main class="main-container">
                <!-- title of page -->
                <div class="main-title">
                    <h2>Employee Dashboard</h2>
                </div>

                <div class="main-cards">

                    <div class="card">
                        <div class="card-inner">
                            <h3>Products</h3>
                            <span class="material-symbols-outlined">
                                inventory
                            </span>
                        </div>
                        <h1>100</h1>
                    </div>

                    <div class="card">
                        <div class="card-inner">
                            <h3>Categories</h3>
                            <span class="material-symbols-outlined">
                                category
                            </span>
                        </div>
                        <h1>5</h1>
                    </div>

                    <div class="card">
                        <div class="card-inner">
                            <h3>Customers</h3>
                            <span class="material-symbols-outlined">
                                groups
                            </span>
                        </div>
                        <h1>2870</h1>
                    </div>

                    
                    <div class="card">
                        <div class="card-inner">
                            <h3>Administrators</h3>
                            <span class="material-symbols-outlined">
                                manage_accounts
                            </span>
                        </div>
                        <h1>6</h1>
                    </div>

                </div>


                
                <div class="charts">
                    <div class="chart-card">
                        <h2 class="chart-title">Stock of Keyboards</h2>
                        <div id="bar-chart">

                        </div>
                    </div>
                </div>

                <d class="main-tables">

                    <div class="customers">
                        <d class="customer-table">
                            <h3 class="customer-title">
                                Customer Table
                            </h3>

                        </d>
                    </div>

                    <d class="admin">
                        <d class="admin-table">
                            <h3 class="admin-title">
                                Administrator Table
                            </h3>

                        </d>
                    </d>

                    <d class="stock">
                        <d class="stock-table">
                            <h3 class="admin-title">
                                Stock Table
                            </h3>

                        </d>
                    </d>

                    <d class="product">
                        <d class="product-table">
                            <h3 class="product-title">
                                Product Table
                            </h3>

                        </d>
                    </d>

                    <d class="contactUs">
                        <d class="contactUs-table">
                            <h3 class="contactUs-title">
                                Contact Us Queries
                            </h3>

                        </d>
                    </d>
                </d>
            </main>
                
        </div>

        <!-- Apex Charts -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.37.0/apexcharts.min.js" ></script>

        <!-- link to java script file -->
        <!-- place at the bottom to allow html to load first-->
        <script src="js/employee.js"></script>
    </body>
</html>
