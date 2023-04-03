package com.example.demo;

import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.GetMapping;

import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.ResultSet;
import java.sql.Statement;

@Controller
public class EmployeeController {

    @GetMapping("/employee")
    public String showCustomerOrders(Model model) {
        try {
            Connection con = DriverManager.getConnection("jdbc:mysql://localhost:3306/mydb", "root", "password");
            Statement stmt = con.createStatement();
            ResultSet rs = stmt.executeQuery("SELECT * FROM customer_orders");

            model.addAttribute("customerOrders", rs);
            con.close();
        } catch (Exception e) {
            System.out.println(e);
        }

        return "employee";
    }
}
