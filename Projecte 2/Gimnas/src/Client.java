import java.sql.Connection;
import java.sql.Date;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.time.LocalDate;
import java.util.Scanner;

public class Client {

    private static ConnexioBD conn = new ConnexioBD();
    static Scanner sc = new Scanner(System.in);
    private ValidadorDNI dni;
    private String nom;
    private String cognom;
    private LocalDate data_naix;
    private Telefon telefon;
    private String condicio;
    private String correu;
    private String IBAN;
    private String login;
    // private static String contrasenya;
    private String sexe;
    // private static boolean comunicacio;
    static Connection connexioBD;

    public void mostrarTotsClients() throws SQLException {

        this.connexioBD = conn.getConnexioBD();

        String SQL = "SELECT * FROM clients";

        PreparedStatement ps = connexioBD.prepareStatement(SQL);
        ps.executeQuery();
        ResultSet rs = ps.executeQuery();

        while (rs.next()) {
            this.nom = rs.getString("nom");
            this.cognom = rs.getString("cognom");
            this.data_naix = rs.getDate("data_naix").toLocalDate();
            // this.telefon = rs.getString("telefon");
            this.condicio = rs.getString("condicio");
            this.correu = rs.getString("correu");
            this.IBAN = rs.getString("IBAN");
            this.login = rs.getString("login");
            this.sexe = rs.getString("sexe");
            // this.dni = rs.getString("dni");

            System.out.println(toString());
        }
    }

    public void altaClient() {

        ValidadorDNI validadorDni = new ValidadorDNI();
        do {
            System.out.println("Fica el DNI de client");   
            String dni = sc.nextLine();
            validadorDni = new ValidadorDNI(dni);

        } while (!validadorDni.validar());

        Telefon validadorTelefon = new Telefon();
        do {
            System.out.println("Fica el telefon de client"); 
            String telefon = sc.nextLine();
            validadorTelefon = new Telefon(telefon);

        } while (!validadorTelefon.validar());

        // while (dniObj.validarDni(dni));

        // this.dni.setDni(dni);

        System.out.println("Fica el Nom de client");

        System.out.println("Fica el Cognom de client");
        System.out.println("Fica la Data de naixament en format 0000-0-00 de client");
        System.out.println("Fica el telefon de client");
        System.out.println("Fica la condicio");
        System.out.println("Fica el correu");
        System.out.println("Fica el IBAN");
        System.out.println("Fica el Login");
        // comprovar si aquet login ja existeix
        System.out.println("Fica el sexe");

    }

    public void consultaClient() throws SQLException {
        System.out.println("Fica el dni del client");
        String dni = sc.nextLine();

        this.connexioBD = conn.getConnexioBD();

        String SQL = "SELECT * FROM clients where dni = ?";

        PreparedStatement ps = connexioBD.prepareStatement(SQL);
        ps.setString(1, dni);

        ResultSet rs = ps.executeQuery();
        if (rs.next()) {
            // System.out.println(
            // "dni: " + rs.getString("dni") + " nom " + rs.getString("nom") + " cognom " +
            // rs.getString("cognom")
            // + " data_naix " + rs.getString("data_naix") + " telefon " +
            // rs.getString("telefon")
            // + "condicio " + rs.getString("condicio") + "correu" + rs.getString("correu")
            // + "IBAN"
            // + rs.getString("login") + "login" + rs.getString("sexe") + "sexe");

            this.nom = rs.getString("nom");
            this.cognom = rs.getString("cognom");
            this.data_naix = rs.getDate("data_naix").toLocalDate();
            // this.telefon = rs.getString("telefon");
            this.condicio = rs.getString("condicio");
            this.correu = rs.getString("correu");
            this.IBAN = rs.getString("IBAN");
            this.login = rs.getString("login");
            this.sexe = rs.getString("sexe");
            // this.dni = rs.getString("dni");

            System.out.println(toString());
        } else {
            System.out.println("No hi ha cap client amb aquet DNI " + dni);
        }

    }

    @Override
    public String toString() {
        return "Client [DNI=" + dni + ", nom=" + nom + ", cognom=" + cognom + ", login=" + login + ", telefon="
                + telefon + ", sexe=" + sexe + ", data_naix=" + data_naix + ", IBAN=" + IBAN + ", correu=" + correu
                + ",]";
    }

    

    public void setDni(ValidadorDNI dni) {
        this.dni = dni;
    }



    

}