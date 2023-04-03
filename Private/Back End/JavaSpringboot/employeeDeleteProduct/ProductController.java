
import org.springframework.jdbc.core.JdbcTemplate;
import org.springframework.stereotype.Controller;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.RequestParam;
import org.springframework.web.bind.annotation.ResponseBody;

@Controller
public class ProductController {

    private final JdbcTemplate jdbcTemplate;

    public ProductController(JdbcTemplate jdbcTemplate) {
        this.jdbcTemplate = jdbcTemplate;
    }

    @GetMapping("/deleteProduct")
    @ResponseBody
    public String deleteProduct(@RequestParam("productID_Delete") int productId) {
        String sql = "DELETE FROM products WHERE id = ?";
        int result = jdbcTemplate.update(sql, productId);

        if (result > 0) {
            return "Product record deleted successfully";
        } else {
            return "Error deleting product record";
        }
    }
}
