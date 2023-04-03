// EmployeeController.java

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.RequestParam;

@Controller
public class EmployeeController {

    @Autowired
    private CustomerService customerService;

    @GetMapping("/employee")
    public String showEmployeePage(Model model) {
        model.addAttribute("customers", customerService.getAllCustomers());
        return "employee";
    }

    @GetMapping("/employeeDeleteCustomer")
    public String deleteCustomer(@RequestParam("customerID_Delete") Long customerId) {
        customerService.deleteCustomer(customerId);
        return "redirect:/employee";
    }

    @GetMapping("/employeeUpdateCustomer")
    public String showUpdateCustomerPage(@RequestParam("customerID_Update") Long customerId, Model model) {
        model
