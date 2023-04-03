import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestParam;
import org.springframework.web.servlet.ModelAndView;

import java.util.Optional;

@Controller
public class CustomerController {

    @Autowired
    private CustomerRepository customerRepository;

    @PostMapping("/addCustomer")
    public ModelAndView addCustomer(@RequestParam("customerName") String name,
                                     @RequestParam("customerEmail") String email,
                                     @RequestParam("customerPassword") String password,
                                     @RequestParam("customerBirth") String birth,
                                     @RequestParam("customerHouseNumber") String houseNumber,
                                     @RequestParam("customerStreet") String street,
                                     @RequestParam("customerTown") String town,
                                     @RequestParam("customerPostcode") String postcode) {
        Customer customer = new Customer();
        customer.setName(name);
        customer.setEmail(email);
        customer.setPassword(password);
        customer.setBirth(birth);
        customer.setHouseNumber(houseNumber);
        customer.setStreet(street);
        customer.setTown(town);
        customer.setPostcode(postcode);
        customerRepository.save(customer);

        ModelAndView modelAndView = new ModelAndView();
        modelAndView.setViewName("employeeSubPageCustomer");
        return modelAndView;
    }
}

