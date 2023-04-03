@Controller
public class EmployeeController {

    @Autowired
    private CustomerService customerService;

    @GetMapping("/employee")
    public String employee(Model model) {
        List<Customer> customers = customerService.getAllCustomers();
        model.addAttribute("customers", customers);
        return "employee";
    }
}
