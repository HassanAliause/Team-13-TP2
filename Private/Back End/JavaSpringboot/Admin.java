@Entity
public class Admin {
    
    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    private Long id;
    
    private String username;
    
    private String password;
    
    private int adminkey;
    
    public Admin() {
    }
    
    public Admin(String username, String password, int adminkey) {
        this.username = username;
        this.password = password;
        this.adminkey = adminkey;
    }
    
    // getters and setters
    
}
