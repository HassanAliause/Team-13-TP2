import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestParam;

import java.sql.ResultSet;
import java.sql.SQLException;

@Controller
public class CustomerController {

    @Autowired
    private DatabaseConnect databaseConnect;

    @GetMapping("/customer/{id}")
    public String getCustomer(@PathVariable String id, Model model) throws SQLException {
        String sql = "SELECT * FROM `customer_details` WHERE id = '" + id + "'";
        ResultSet result = databaseConnect.executeQuery(sql);

        if (result.next()) {
            model.addAttribute("id", id);
            model.addAttribute("name", result.getString("name"));
            model.addAttribute("email", result.getString("email"));
            model.addAttribute("password", result.getString("password"));
            model.addAttribute("birth", result.getString("birth"));
            model.addAttribute("houseNumber", result.getString("housenumber"));
            model.addAttribute("street", result.getString("streetname"));
            model.addAttribute("town", result.getString("townname"));
            model.addAttribute("postcode", result.getString("postcode"));
        }

        return "update-customer";
    }

    @PostMapping("/customer/{id}")
    public String updateCustomer(@PathVariable String id, @RequestParam String customerName,
                                  @RequestParam String customerEmail, @RequestParam String customerPassword,
                                  @RequestParam String customerBirth, @RequestParam String customerHouseNumber,
                                  @RequestParam String customerStreet, @RequestParam String customerTown,
                                  @RequestParam String customerPostcode) throws SQLException {
        String sql = "UPDATE `customer_details` SET name='" + customerName + "', email='" + customerEmail +
                "', birth='" + customerBirth + "', housenumber='" + customerHouseNumber + "', streetname='" + customerStreet +
                "', townname='" + customerTown + "', postcode='" + customerPostcode + "' WHERE `customer_details`.`id`='" + id + "'";
        boolean result = databaseConnect.executeUpdate(sql);

        if (result) {
            return "redirect:/employee-sub-page-customer";
        } else {
            throw new SQLException("Failed to update customer record.");
        }
    }
}
