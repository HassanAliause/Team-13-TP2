package com.example.myapp;

import org.springframework.boot.SpringApplication;
import org.springframework.boot.autoconfigure.SpringBootApplication;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.GetMapping;

@Controller
@SpringBootApplication
public class MyApp {

    public static void main(String[] args) {
        SpringApplication.run(MyApp.class, args);
    }

    @GetMapping("/")
    public String index(Model model) {
        // Add any necessary data to the model
        return "index";
    }

    @GetMapping("/employee")
    public String employee(Model model) {
        // Add any necessary data to the model
        return "employee";
    }

}
