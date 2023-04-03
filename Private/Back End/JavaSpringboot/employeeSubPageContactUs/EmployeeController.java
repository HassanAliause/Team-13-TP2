@Controller
public class EmployeeController {

    @Autowired
    private EmployeeHeaderRepository employeeHeaderRepository;

    @Autowired
    private EmployeeSidebarRepository employeeSidebarRepository;

    @Autowired
    private EmployeeTableContactUsRepository employeeTableContactUsRepository;

    @GetMapping("/employee")
    public String employeePage(Model model) {
        // get header content from database
        String header = employeeHeaderRepository.getHeader();

        // get sidebar content from database
        String sidebar = employeeSidebarRepository.getSidebar();

        // get contact us table content from database
        List<ContactUs> contactUsList = employeeTableContactUsRepository.getContactUsList();

        model.addAttribute("header", header);
        model.addAttribute("sidebar", sidebar);
        model.addAttribute("contactUsList", contactUsList);

        return "employeePage";
    }
}
