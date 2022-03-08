<!DOCTYPE html>

<?php @session_start(); ?>
<html lang="es">

<head>
    <title>Gimnàs</title>
    <meta name="gf" content="gimnas">
    <meta charset="utf-8" />
    <meta name="viewport" content="width-device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="../../css/style.css">
</head>

<body class="login-background">

    <!-- section start-->

    <section id="pantalla-dividida">

        <div class="left">

        </div>

        <div class="rigth">
            <div class="login">
                <h1>Iniciar sessió</h1>
                <form method="post" action="../Active_directory/connect.php"><br>
                    <input type="text" name="usuario" id="usuario" placeholder="Usuari" required="required" />
                    <input type="password" name="clave" id="clave" placeholder="Contrasenya" required="required" />
                    <button type="submit" class="btn btn-primary btn-block btn-large">Iniciar sessió</button>
                </form>
            </div>
        </div>
    </section>
    
    <!-- section end-->
</body>

</html>

<?php exit(); ?>