import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.SQLException;

public class DatabaseConnect {
    public static Connection getConnection() throws SQLException {
        String url = "jdbc:mysql://localhost:3306/employee_db";
        String user = "root";
        String password = "password";
        return DriverManager.getConnection(url, user, password);
    }
}
