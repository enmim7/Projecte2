<!DOCTYPE html>
<html lang="es">

<head>
    <title>User</title>
    <meta name="gf" content="gimnas">
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, user-scalable=yes">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="../../css/style.css"/>
    <script src="../../js/jquery.min.js"></script>
    <script src="../../js/script.js"></script>
</head>

<?php

include('database_connection.php');

?>
<?php session_start(); if (!empty($_SESSION['auth'])): ?>

<body>

    <!-- header start-->

    <header class="header">

        <div class="nav">
            <div class="navbar" id="nav_button">
                <a href="../../index" class="active">Inici</a>
                <a href="../../xml/curses.xml">Participacio curses</a>
                <a href="reserve_act">Reserva activitats</a>
                <a href="history">Historial</a>
                <div class="dreta">
                <a href="modify_user">Canviar dades</a>
                
                
                <a><i class="fa fa-user fa-lg fa-fw" aria-hidden="true"></i
                
                ><?php

$query = "select clients.nom, clients.cognom,clients.dni from clients where clients.login = '$_SESSION[user]'";
$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
foreach ($result as $row) {
?>
<?php echo $row['nom']; ?> <?php echo $row['cognom']; 
$_SESSION['dni'] = $row['dni'];
?>
<?php
}

?></a>
                <a href="logout.php"><i class="fa fa-sign-out  fa-lg fa-fw" aria-hidden="true"></i></a>    

            </div>
                <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                    <i class="fa fa-bars"></i>
                </a>
            </div>
        </div>

    </header>

    <?php else: ?>
	<p>No estas autoritzat</p>
<?php endif; ?>
    
</body></html>



