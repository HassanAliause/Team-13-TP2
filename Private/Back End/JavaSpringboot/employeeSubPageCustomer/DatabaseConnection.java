@Repository
public class DatabaseConnection {

    @Autowired
    private JdbcTemplate jdbcTemplate;

    public List<Customer> getAllCustomers() {
        String sql = "SELECT * FROM customers";
        List<Customer> customers = jdbcTemplate.query(sql, new CustomerRowMapper());
        return customers;
    }
}
