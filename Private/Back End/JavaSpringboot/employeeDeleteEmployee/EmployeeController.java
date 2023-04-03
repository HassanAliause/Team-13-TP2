

import org.springframework.jdbc.core.JdbcTemplate;
import org.springframework.stereotype.Controller;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.RequestParam;
import org.springframework.web.bind.annotation.ResponseBody;

@Controller
public class EmployeeController {

    private final JdbcTemplate jdbcTemplate;

    public EmployeeController(JdbcTemplate jdbcTemplate) {
        this.jdbcTemplate = jdbcTemplate;
    }

    @GetMapping("/deleteEmployee")
    @ResponseBody
    public String deleteEmployee(@RequestParam("employeeID_Delete") int employeeId) {
        String sql = "DELETE FROM admin WHERE id = ?";
        int result = jdbcTemplate.update(sql, employeeId);

        if (result > 0) {
            return "Employee record deleted successfully";
        } else {
            return "Error deleting employee record";
        }
    }
}
