<?php session_start(); if (!empty($_SESSION['auth'])): ?>

    <html>
    <head>
        <title>Bienvenido al sistema</title>
    </head>
    <body>
        Hola! <?php echo $_SESSION["user"]; ?><br>
        <br>
        <a href="../../index.html">Accedir a la pagina</a>
    </body>
    </html>
	
	<?php else: ?>
	<p>No estas autoritzat</p>
<?php endif; ?>