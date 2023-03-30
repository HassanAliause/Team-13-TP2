/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package pkg13teenbit;

/**
 *
 * @author aliau
 */
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.SQLException;
import java.util.logging.Level;
import java.util.logging.Logger;

public class DatabaseConnector{
    private static final String DB_URL = "jdbc:mysql://cs2410-web01pvm.aston.ac.uk:3306/u_210142176_db";
    private static final String DB_USERNAME = "u-210142176";
    private static final String DB_PASSWORD = "sKtumlb207EYMQW";

    private static Connection con = null;

    public static Connection connect() throws SQLException {
        if (con == null || con.isClosed()) {
            try {
                Class.forName("com.mysql.jdbc.Driver");
                con = DriverManager.getConnection(DB_URL, DB_USERNAME, DB_PASSWORD);
            } catch (ClassNotFoundException ex) {
                Logger.getLogger(DatabaseConnector.class.getName()).log(Level.SEVERE, null, ex);
            }
        }
        return con;
    }
}

