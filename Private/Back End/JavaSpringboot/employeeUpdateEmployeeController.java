@Controller
public class EmployeeController {

    @Autowired
    private JdbcTemplate jdbcTemplate;

    @Autowired
    private AdminRepository adminRepository;

    @GetMapping("/employee")
    public String showEmployeePage(Model model) {
        // code to display employee page
        return "employee";
    }

    @GetMapping("/employee/update/{id}")
    public String showUpdateEmployeePage(@PathVariable Long id, Model model) {
        Optional<Admin> adminOptional = adminRepository.findById(id);
        if (adminOptional.isPresent()) {
            Admin admin = adminOptional.get();
            model.addAttribute("id", admin.getId());
            model.addAttribute("username", admin.getUsername());
            model.addAttribute("password", admin.getPassword());
            model.addAttribute("adminkey", admin.getAdminkey());
            return "update_employee";
        } else {
            return "redirect:/employee";
        }
    }

    @PostMapping("/employee/update/{id}")
    public String updateEmployee(@PathVariable Long id, @RequestParam String username, @RequestParam String password, @RequestParam int adminkey) {
        Optional<Admin> adminOptional = adminRepository.findById(id);
        if (adminOptional.isPresent()) {
            Admin admin = adminOptional.get();
            admin.setUsername(username);
            admin.setPassword(password);
            admin.setAdminkey(adminkey);
            adminRepository.save(admin);
        }
        return "redirect:/employee";
    }

}


