package com.example.demo;

import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.GetMapping;

import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;

@Controller
public class AdminController {

    private static final String DB_NAME = "database_name";
    private static final String DB_HOST = "localhost";
    private static final String USERNAME = "username";
    private static final String PASSWORD = "password";

    @GetMapping("/admin")
    public String showAdminPage(Model model) {

        try (Connection conn = DriverManager.getConnection("jdbc:mysql://" + DB_HOST + "/" + DB_NAME, USERNAME, PASSWORD)) {

            PreparedStatement stmt = conn.prepareStatement("SELECT p.price, c.quantity FROM products p INNER JOIN cart c ON p.id = c.product_id WHERE c.user_id = ?");
            stmt.setInt(1, 1); // Replace 1 with actual user ID

            int totalOrdered = 0;
            double totalRevenue = 0.0;
            ResultSet rs = stmt.executeQuery();

            while (rs.next()) {
                double price = rs.getDouble("price");
                int quantity = rs.getInt("quantity");
                totalOrdered += quantity;
                totalRevenue += price * quantity;
            }

            model.addAttribute("totalOrdered", totalOrdered);
            model.addAttribute("totalRevenue", totalRevenue);

        } catch (SQLException e) {
            e.printStackTrace();
        }

        return "adminPage";
    }

}
