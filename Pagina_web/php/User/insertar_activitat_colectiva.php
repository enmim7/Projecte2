<!DOCTYPE html>
<html lang="es">

<head>
  <title>Inserta colectiva</title>
</head>

<?php
session_start();
include ("database_connection.php");

$id = $_POST['id'];
// echo $_SESSION['dni'];
$query = "call reserva_act_colectiva('$_SESSION[dni]',$id)";
$statement = $connect->prepare($query);
// $statement->bindParam(':dni', '123122x', PDO::PARAM_STR);
$statement->execute();
$result = $statement->fetchAll();

// echo $result[0];

foreach ($result as $row) {
    echo"<script> alert('$row[0]'); window.location.href='reserve_act'; </script>"; 
}

?>

