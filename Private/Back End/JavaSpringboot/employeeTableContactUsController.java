import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.GetMapping;

import com.example.demo.repository.MessageRepository;

@Controller
public class ContactUsController {

    @Autowired
    private MessageRepository messageRepo;
    
    @GetMapping("/contactus")
    public String viewContactUs(Model model) {
        model.addAttribute("messages", messageRepo.findAll());
        return "contactus";
    }
}
