<!DOCTYPE html>
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

        <!-- sidebar -->
        <aside id="sidebar">

            <div class="sidebar-title">
                <div class="sidebar-brand"> 

                </div>
            </div>

            <!-- will direct employee back to dashboard on click -->
            <ul class="sidebar-list">
                <li class="sidebar-list-item">
                    <span class="material-symbols-outlined" >
                        dashboard
                    </span>
                    <a href="employeeDashboard.php" class="sidebar-list-text">Dashboard</a>
                </li>

                <!-- will direct employee back to add customer  on click -->
                <li class="sidebar-list-item">
                    <span class="material-symbols-outlined">
                        person_add
                    </span>
                    <a href="employeeAddCustomer.php" class="sidebar-list-text">Add Customer</a>
                </li>

                <!-- will direct employee back to add employee on click -->
                <li class="sidebar-list-item">
                    <span class="material-symbols-outlined">
                        manage_accounts
                    </span>
                    <a href="employeeAddEmployee.php" class="sidebar-list-text">Add Employee</a>
                </li>

                <!-- will direct employee back to add product on click -->
                <li class="sidebar-list-item">
                    <span class="material-symbols-outlined">
                        assignment_add
                    </span>
                    <a href="employeeAddProduct.php" class="sidebar-list-text">Add Product</a>
                </li>

                <!-- will direct employee back to cutsomers on click -->
                <li class="sidebar-list-item">
                    <span class="material-symbols-outlined">
                        person_search
                    </span>
                    <a href="employeeSubPageCustomer.php" class="sidebar-list-text">Customers</a>
                </li>

                <!-- will direct employee back to customer orders on click -->
                <li class="sidebar-list-item">
                    <span class="material-symbols-outlined">
                        order_approve
                    </span>
                    <a href="employeeSubPageCustomerOrders.php" class="sidebar-list-text">Customer Orders</a>
                </li>

                <!-- will direct employee back to employees on click -->
                <li class="sidebar-list-item">
                    <span class="material-symbols-outlined">
                        badge
                    </span>
                    <a href="employeeSubPageEmployees.php" class="sidebar-list-text">Employees</a>
                </li>

                <!-- <li class="sidebar-list-item">
                    <span class="material-symbols-outlined">
                        production_quantity_limits
                    </span>
                    <a href="employeeTableStock.php" class="sidebar-list-text">Stock</a>
                </li> -->

                <!-- will direct employee back to products and stock on click -->
                <li class="sidebar-list-item">
                    <span class="material-symbols-outlined">
                        inventory_2
                    </span>
                    <a href="employeeSubPageProducts.php" class="sidebar-list-text">Products and Stock</a>
                </li>

                <!-- will direct employee back to contact us on click -->
                <li class="sidebar-list-item">
                    <span class="material-symbols-outlined">
                        support_agent
                    </span>
                    <a href="employeeSubPageContactUs.php" class="sidebar-list-text">Contact Us</a>
                </li>

            </ul>

        </aside>

    </body>

</html>
