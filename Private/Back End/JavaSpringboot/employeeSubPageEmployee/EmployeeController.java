import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.GetMapping;

import java.sql.SQLException;

@Controller
public class EmployeeController {
    @GetMapping("/employee")
    public String employee(Model model) throws SQLException {
        model.addAttribute("header", EmployeeHeader.getHeader());
        model.addAttribute("sidebar", EmployeeSidebar.getSidebar());
        model.addAttribute("employeeTable", EmployeeTableEmployees.getEmployeeTable());
        return "employee";
    }
}
