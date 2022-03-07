
import java.util.regex.*;

public class Telefon {
    private String telefon;




    
    public Telefon(String telefon) {
        this.telefon = telefon;
    }
    public Telefon() {
        this.telefon = telefon;
    }

    public boolean validar() {

        Pattern p = Pattern.compile("^\\d{9}$");

        Matcher m = p.matcher(telefon);

        return (m.matches());
    }
}
