import com.example.demo.database.DatabaseConnect;
import com.example.demo.model.Product;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.PostMapping;

import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;

@Controller
public class ProductController {

    // GET method to get product information from the database and display it in the update form
    @GetMapping("/update/{id}")
    public String updateProduct(@PathVariable("id") int id, Model model) {
        try {
            Connection con = DatabaseConnect.getConnection();

            String sql = "SELECT * FROM products WHERE id = ?";

            PreparedStatement stmt = con.prepareStatement(sql);
            stmt.setInt(1, id);
            ResultSet rs = stmt.executeQuery();

            if (rs.next()) {
                Product product = new Product();
                product.setId(rs.getInt("id"));
                product.setName(rs.getString("name"));
                product.setDescription(rs.getString("description"));
                product.setPrice(rs.getDouble("price"));
                product.setQuantity(rs.getInt("quantity"));
                product.setTotal(rs.getDouble("total"));
                product.setKeyValue(rs.getInt("key_value"));
                product.setImageFile(rs.getString("image_file"));

                model.addAttribute("product", product);
            }

            con.close();

        } catch (SQLException e) {
            e.printStackTrace();
        }

        return "updateProduct";
    }

    // POST method to update the product information in the database
    @PostMapping("/update/{id}")
    public String updateProduct(@PathVariable("id") int id, Product product) {
        try {
            Connection con = DatabaseConnect.getConnection();

            String sql = "UPDATE products SET name=?, description=?, price=?, quantity=?, total=?, key_value=? WHERE id=?";

            PreparedStatement stmt = con.prepareStatement(sql);
            stmt.setString(1, product.getName());
            stmt.setString(2, product.getDescription());
            stmt.setDouble(3, product.getPrice());
            stmt.setInt(4, product.getQuantity());
            stmt.setDouble(5, product.getTotal());
            stmt.setInt(6, product.getKeyValue());
            stmt.setInt(7, id);

            int result = stmt.executeUpdate();

            con.close();

            if (result == 1) {
                return "redirect:/employeeSubPageProducts";
            }

        } catch (SQLException e) {
            e.printStackTrace();
        }

        return "error";
    }
}
