<!DOCTYPE html>
<html lang="es">

<head>
    <title>Benvingut al sistema</title>
</head>


<?php session_start(); if (!empty($_SESSION['auth'])): ?>

    <body>
        Hola! <?php echo $_SESSION["user"]; ?><br>
        <br>
        <a href="../../index.html">Accedir a la pagina</a>
    </body>
    </html>
	
	<?php else: ?>
	<p>No estas autoritzat</p>
<?php endif; ?>