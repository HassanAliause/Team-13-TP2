package employeeAddProduct;

import com.example.demo.model.Product;
import com.example.demo.repository.ProductRepository;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestParam;
import org.springframework.web.multipart.MultipartFile;

import java.io.IOException;

@Controller
public class EmployeeController {

    @Autowired
    private ProductRepository productRepository;

    @GetMapping("/employeeSubPageProducts")
    public String showProducts(Model model) {
        model.addAttribute("products", productRepository.findAll());
        return "employeeSubPageProducts";
    }

    @GetMapping("/addProduct")
    public String addProductForm() {
        return "addProduct";
    }

    @PostMapping("/addProduct")
    public String addProduct(@RequestParam("productName") String name,
                             @RequestParam("productQuantity") int quantity,
                             @RequestParam("productTotal") double total,
                             @RequestParam("productPrice") double price,
                             @RequestParam("productKeyValue") String keyValue,
                             @RequestParam("productImage") MultipartFile image,
                             @RequestParam("productDescription") String description) throws IOException {

        Product product = new Product();
        product.setName(name);
        product.setQuantity(quantity);
        product.setTotal(total);
        product.setPrice(price);
        product.setKeyValue(keyValue);
        product.setDescription(description);
        product.setImage(image.getBytes());

        productRepository.save(product);

        return "redirect:/employeeSubPageProducts";
    }
}
