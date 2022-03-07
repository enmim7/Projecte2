import java.sql.SQLException;
import com.mysql.jdbc.Driver;

public class GimnasAplicacio {
    public static void main(String[] args) throws SQLException {
        Gimnas g = new Gimnas();
        ConnexioBD connexio = new ConnexioBD();
        connexio.connexio();
        g.gestioGimnas();
        
    }
}
