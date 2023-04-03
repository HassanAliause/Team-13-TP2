package employeeDeleteContactUs;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.jdbc.core.JdbcTemplate;
import org.springframework.stereotype.Repository;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.RestController;

@RestController
public class ContactController {

    @Autowired
    private JdbcTemplate jdbcTemplate;

    @GetMapping("/contact/{id}")
    public void deleteContact(@PathVariable int id) {
        String sql = "DELETE FROM message WHERE id = ?";
        int result = jdbcTemplate.update(sql, id);
        if (result == 1) {
            // success, redirect to the employeeSubPageContactUs
        } else {
            // handle error
        }
    }
}
