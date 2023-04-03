package employeeDeleteCustomer;

import org.springframework.web.bind.annotation.*;

@RestController
public class CustomerController {

    private final DatabaseService databaseService;

    public CustomerController(DatabaseService databaseService) {
        this.databaseService = databaseService;
    }

    @GetMapping("/customer/delete/{id}")
    public void deleteCustomer(@PathVariable("id") int id) {
        // this will delete from the customer details table
        String sql = "DELETE FROM `customer_details` WHERE id = " + id;
        int result = databaseService.executeUpdate(sql);

        // once deleted it will direct the employee back to the customer page
        if(result > 0) {
            // you can return some response back to the client, such as a success message
            return;
        } else {
            // if there is an error the connection is cut and the error is displayed 
            throw new RuntimeException("Failed to delete customer with id " + id);
        }
    }

}
