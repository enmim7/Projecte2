<?php 
session_start();

define('DOMINIO', 'Tarrega.gim');
define('DN', 'dc=Tarrega,dc=gim');

function mailboxpowerloginrd($user,$pass){ 
     $ldaprdn = trim($user).'@'.DOMINIO;  
     $ldappass = trim($pass);
     $ds = DOMINIO;  
     $dn = DN;   
     $puertoldap = 389;  
     $ldapconn = ldap_connect($ds,$puertoldap); 
       ldap_set_option($ldapconn, LDAP_OPT_PROTOCOL_VERSION,3);  
       ldap_set_option($ldapconn, LDAP_OPT_REFERRALS,0);  
       $ldapbind = @ldap_bind($ldapconn, $ldaprdn, $ldappass);  
       if ($ldapbind){ 
	   
       
		$_SESSION['user'] = $user;
		$_SESSION['auth'] = true;
    header("Location: ../User/user");
		die();
       }else{  
             $array=0; 
       }  
     ldap_close($ldapconn);  
     return $array; 
}  

        header("Content-Type: text/html; charset=utf-8"); 
        $usr = $_POST["usuario"]; 
        $usuario = mailboxpowerloginrd($usr,$_POST["clave"]); 
        if($usuario == "0" || $usuario == ''){ 
            $_SERVER = array(); 
            $_SESSION = array(); 
            echo"<script> alert('Usuari o contrasenya incorrecta. Torneu-ho a provar.'); window.location.href='../User/login.php'; </script>"; 
        }else{ 
            session_start(); 
            $_SESSION["user"] = $usuario; 
            $_SESSION["autentica"] = "SIP"; 
            echo"<script>window.location.href='../User/user.php'; </script>"; 
        } 
?>