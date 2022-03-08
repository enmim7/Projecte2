<!DOCTYPE html>
<html lang="es">

<head>
  <title>Cambiar contrasenya</title>
</head>


<?PHP
session_start();

$cont = $_POST['cont'];




$output = shell_exec(sprintf('powershell -ExecutionPolicy ByPass -File ./script.ps1 "%s" "%s"', $_SESSION['user'], $cont));
echo "<script> alert('Contraseña cambiada'); window.location.href='modify_user'; </script>";

?>