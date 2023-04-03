package employeeDashboard;

import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.GetMapping;

import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.ResultSet;
import java.sql.Statement;

@Controller
public class AdminDashboardController {

    @GetMapping("/admin/dashboard")
    public String dashboard(Model model) {
        try {
            Class.forName("com.mysql.cj.jdbc.Driver");
            Connection con = DriverManager.getConnection("jdbc:mysql://localhost:3306/mydatabase", "username", "password");
            Statement stmt = con.createStatement();

            // how many product entries are in the database
            ResultSet rs = stmt.executeQuery("SELECT COUNT(id) AS id_quantity FROM products");
            int productCount = 0;
            if (rs.next()) {
                productCount = rs.getInt("id_quantity");
            }
            model.addAttribute("productCount", productCount);

            // how many categories have been made
            rs = stmt.executeQuery("SELECT COUNT(id) AS max_id FROM categories");
            int categoryCount = 0;
            if (rs.next()) {
                categoryCount = rs.getInt("max_id");
            }
            model.addAttribute("categoryCount", categoryCount);

            // how many customers there are
            rs = stmt.executeQuery("SELECT COUNT(id) AS max_id FROM customer_details");
            int customerCount = 0;
            if (rs.next()) {
                customerCount = rs.getInt("max_id");
            }
            model.addAttribute("customerCount", customerCount);

            // how many employees there are
            rs = stmt.executeQuery("SELECT COUNT(id) AS max_id FROM admin");
            int adminCount = 0;
            if (rs.next()) {
                adminCount = rs.getInt("max_id");
            }
            model.addAttribute("adminCount", adminCount);

            // how many contact us queries that has been sent by users
            rs = stmt.executeQuery("SELECT COUNT(id) AS max_id FROM message");
            int messageCount = 0;
            if (rs.next()) {
                messageCount = rs.getInt("max_id");
            }
            model.addAttribute("messageCount", messageCount);

            con.close();
        } catch (Exception e) {
            System.out.println(e);
        }
        return "admin-dashboard";
    }

}
