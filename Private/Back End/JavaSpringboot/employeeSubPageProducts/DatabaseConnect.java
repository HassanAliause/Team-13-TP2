@Component
public class DatabaseConnect {

    private Connection connection;
    private String url = "jdbc:mysql://localhost:3306/mydatabase";
    private String username = "root";
    private String password = "password";

    public Connection getConnection() throws SQLException {
        if (connection == null || connection.isClosed()) {
            connection = DriverManager.getConnection(url, username, password);
        }
        return connection;
    }
}
