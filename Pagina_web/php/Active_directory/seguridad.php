<!DOCTYPE html>
<html lang="es">

<head>
    <title>Secure</title>
</head>

<?php
@session_start();
if($_SESSION["autentica"] != "SIP"){
    header("Location: index.php");
    exit();
}
?>