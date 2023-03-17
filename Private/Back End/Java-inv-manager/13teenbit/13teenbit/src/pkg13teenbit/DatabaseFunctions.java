/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package pkg13teenbit;

/**
 *
 * @author aliau
 */
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;

public class DatabaseFunctions {

    // Fields
    private Connection connection;

    // Constructor
    public DatabaseFunctions() {
        try {
            connection = DriverManager.getConnection("jdbc:mysql://localhost:3306/inventory", "root", "password");
        } catch (SQLException e) {
            e.printStackTrace();
        }
    }

    // Inventory alert system
    public void inventoryAlert() {
        String query = "SELECT * FROM products WHERE stock_level < ?";
        try {
            PreparedStatement statement = connection.prepareStatement(query);
            statement.setInt(1, 10); // Set threshold value
            ResultSet rs = statement.executeQuery();
            while (rs.next()) {
                String productName = rs.getString("name");
                int stockLevel = rs.getInt("stock_level");
                System.out.println(productName + " is low in stock. Current stock level: " + stockLevel);
            }
        } catch (SQLException e) {
            e.printStackTrace();
        }
    }

    // Generate real-time reports
    public void generateReports() {
        String query = "SELECT * FROM products";
        try {
            PreparedStatement statement = connection.prepareStatement(query);
            ResultSet rs = statement.executeQuery();
            while (rs.next()) {
                String productName = rs.getString("name");
                int stockLevel = rs.getInt("stock_level");
                double price = rs.getDouble("price");
                String description = rs.getString("description");
                String status;
                if (stockLevel > 50) {
                    status = "In stock";
                } else if (stockLevel > 10) {
                    status = "Low stock";
                } else {
                    status = "Out of stock";
                }
                String report = productName + " | Price: " + price + " | Description: " + description +
                        " | Stock level: " + stockLevel + " (" + status + ")";
                System.out.println(report);
            }
        } catch (SQLException e) {
            e.printStackTrace();
        }
    }

    // Search and filter products/orders
    public void searchFilter() {
        // Implement search and filter functionality based on user input
    }

    // Process incoming orders
    public void processOrder(String productName, int quantity) {
        try {
            String query = "SELECT stock_level FROM products WHERE name = ?";
            PreparedStatement statement = connection.prepareStatement(query);
            statement.setString(1, productName);
            ResultSet rs = statement.executeQuery();
            if (rs.next()) {
                int stockLevel = rs.getInt("stock_level");
                if (stockLevel >= quantity) {
                    query = "UPDATE products SET stock_level = stock_level - ? WHERE name = ?";
                    statement = connection.prepareStatement(query);
                    statement.setInt(1, quantity);
                    statement.setString(2, productName);
                    statement.executeUpdate();
                    System.out.println(quantity + " units of " + productName + " have been sold.");
                } else {
                    System.out.println("Insufficient stock for " + productName);
                }
            } else {
                System.out.println(productName + " not found in the inventory.");
            }
        } catch (SQLException e) {
            e.printStackTrace();
        }
    }
}

