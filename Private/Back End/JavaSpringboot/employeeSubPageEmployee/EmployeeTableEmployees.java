import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;

public class EmployeeTableEmployees {
    public static String getEmployeeTable() throws SQLException {
        StringBuilder tableHtml = new StringBuilder("<table>...");
        Connection conn = DatabaseConnect.getConnection();
        PreparedStatement stmt = conn.prepareStatement("SELECT * FROM employees");
        ResultSet rs = stmt.executeQuery();
        while (rs.next()) {
            // build table rows using the ResultSet data
        }
        rs.close();
        stmt.close();
        conn.close();
        tableHtml.append("</table>");
        return tableHtml.toString();
    }
}
