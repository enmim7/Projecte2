<!DOCTYPE html>
<html lang="es">

<head>
  <title>Cambiar dades</title>
</head>


<?php
session_start();
include ("database_connection.php");

$comunicacio = $_POST['comunicacio'];
$telefon = $_POST['telefon'];
$correu = $_POST['correu'];
$condicio = $_POST['condicio'];
$IBAN = $_POST['IBAN'];

$insert = "update clients set IBAN = :IBAN, comunicacio = :comunicacio, telefon = :telefon, correu = :correu, condicio = :condicio where login = '$_SESSION[user]';";

$result = $connect->prepare($insert);
$exec=$result->execute(array(":comunicacio"=>$comunicacio, ":telefon"=>$telefon , ":correu" => $correu, ":condicio"=>$condicio, ":IBAN"=>$IBAN,));

if ($exec) {
    header ("Location: modify_user.php");
} else {
    echo "error";
}
?>
