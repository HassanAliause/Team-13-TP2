package com.example.demo;

import org.springframework.stereotype.Controller;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestParam;
import org.springframework.web.servlet.ModelAndView;

import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.PreparedStatement;
import java.sql.SQLException;

@Controller
public class CustomerController{
    
    // this method displays the add customer form
    @GetMapping("/addCustomer")
    public ModelAndView showAddCustomerForm() {
        ModelAndView modelAndView = new ModelAndView();
        modelAndView.setViewName("addCustomer");
        return modelAndView;
    }
    
    // this method processes the add customer form submission
    @PostMapping("/addCustomer")
    public ModelAndView addCustomer(@RequestParam("customerName") String name,
                                     @RequestParam("customerEmail") String email,
                                     @RequestParam("customerPassword") String password,
                                     @RequestParam("customerBirth") String birth,
                                     @RequestParam("customerHouseNumber") String houseNumber,
                                     @RequestParam("customerStreet") String street,
                                     @RequestParam("customerTown") String town,
                                     @RequestParam("customerPostcode") String postcode) {

        ModelAndView modelAndView = new ModelAndView();

        // create a new customer object
        Customer customer = new Customer(name, email, password, birth, houseNumber, street, town, postcode);

        // insert the customer into the database
        boolean success = insertCustomer(customer);

        if (success) {
            modelAndView.setViewName("redirect:/employeeSubPageCustomer");
        } else {
            modelAndView.addObject("error", "Failed to add customer. Please try again.");
            modelAndView.setViewName("addCustomer");
        }

        return modelAndView;
    }
    
    // this method inserts a customer into the database
    private boolean insertCustomer(Customer customer) {
        String url = "jdbc:mysql://localhost:3306/customer_db";
        String username = "root";
        String password = "password";

        String sql = "INSERT into customer_details (name, email, password, birth, housenumber, streetname, townname, postcode) " +
                "values(?, ?, ?, ?, ?, ?, ?, ?)";

        try (Connection conn = DriverManager.getConnection(url, username, password);
             PreparedStatement statement = conn.prepareStatement(sql)) {

            statement.setString(1, customer.getName());
            statement.setString(2, customer.getEmail());
            statement.setString(3, customer.getPassword());
            statement.setString(4, customer.getBirth());
            statement.setString(5, customer.getHouseNumber());
            statement.setString(6, customer.getStreet());
            statement.setString(7, customer.getTown());
            statement.setString(8, customer.getPostcode());

            int rowsInserted = statement.executeUpdate();

            if (rowsInserted > 0) {
                return true;
            }

        } catch (SQLException e) {
            e.printStackTrace();
        }

        return false;
    }
}

