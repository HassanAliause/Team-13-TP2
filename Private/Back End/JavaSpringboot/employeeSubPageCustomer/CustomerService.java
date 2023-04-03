@Service
public class CustomerService {

    @Autowired
    private DatabaseConnection databaseConnection;

    public List<Customer> getAllCustomers() {
        return databaseConnection.getAllCustomers();
    }
}
