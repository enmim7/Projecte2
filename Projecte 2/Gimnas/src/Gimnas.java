import java.sql.SQLException;
import java.util.ArrayList;
import java.util.Scanner;

public class Gimnas {

    private static Client cl = new Client();


    private static String nom;
    private static String CIF;
    private static String telefon;
    private static boolean sortir = false;
    private static boolean sortir2 = false;
    private static ArrayList<Client> clients;

    static Scanner sc = new Scanner(System.in);

    public void gestioGimnas() throws SQLException {
        do {
            System.out.println("**************Gimnas*****************");
            System.out.println("1. Gestio client");
            System.out.println("2. Sortir");

            String sa = sc.next();
            char opcio = sa.charAt(0);

            switch (opcio) {
                case '1':
                    subMenuGesioClient();
                    break;
                case '2':
                    System.out.println("sortir");
                    sortir = true;
                    break;
                default:
                    System.out.println("Opcio no valida");
            }
        } while (!sortir);
    }

    private void subMenuGesioClient() throws SQLException {

        do {
            System.out.println("**************Gimnas*****************");
            System.out.println("1. Mostrar tots clients");
            System.out.println("2. Mostrar tots clients amb informacio");
            System.out.println("3. Mostrar un client determinat amb informacio");
            System.out.println("4. Alta de un client");
            System.out.println("5. Baixa de un client");
            System.out.println("6. Modificar dades client");
            System.out.println("7. SUB Sortir");

            String sa1 = sc.next();
            char opcio2 = sa1.charAt(0);

            switch (opcio2) {
                case '1':

                    cl.mostrarTotsClients();
                    sortir2 = false;
                    break;
                case '2':

                    System.out.println("Gestio client");
                    sortir2 = false;
                    break;
                case '3':

                    System.out.println("Mostrar un client determinat amb informacio");
                    cl.consultaClient();
                    sortir2 = false;
                    break;
                case '4':

                    System.out.println("Alta client");
                    cl.altaClient();
                    sortir2 = false;
                    break;
                case '5':

                    System.out.println("Gestio client");
                    sortir2 = false;
                    break;
                case '6':

                    System.out.println("Gestio client");
                    sortir2 = false;
                    break;
                case '7':
                    System.out.println("sortir");
                    sortir2 = true;
                    break;
                default:
                    System.out.println("Opcio no valida");
            }
        } while (!sortir2);


    }

}