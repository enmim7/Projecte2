import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.SQLException;

public class ConnexioBD {

    private static Connection connexioBD = null;

    public void connexio() {

        String servidor = "192.168.17.100/";
        String usuari = "dam";
        String passwd = "Fat/3232";
        String bbdd = "projecte2DAM";

        try {
            connexioBD = DriverManager.getConnection(servidor + bbdd, usuari, passwd);
            System.out.println("Connexió amb èxit");

        } catch (SQLException e) {
            System.out.println("no funciona");
            e.printStackTrace();
        }
    }

    public static Connection getConnexioBD() {
        return connexioBD;
    }

    static void tancarConnexioBD() throws SQLException {
        connexioBD.close();
    }

}
