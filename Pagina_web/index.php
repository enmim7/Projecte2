<?php

include('php/user/database_connection.php');

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <title>Gimnàs - DAM</title>
    <meta name="gf" content="gimnas">
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, user-scalable=yes">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="css/style.css" />
    <script src="js/jquery.min.js"></script>
    <script src="js/script.js"></script>

</head>

<body>

    <!-- header start-->

    <header class="header">

        <div class="nav">
            <div class="navbar" id="nav_button">
                <a href="index" class="active">Inici</a>
                <a href="php/User/activitats">Activitats</a>
                <a href="curses">Curses</a>

                <div class="dreta">
                    <?php session_start();
                    if (!empty($_SESSION['auth'])) :

                    ?>


                        <?php

                        $query = "select clients.nom, clients.cognom from clients where clients.login = '$_SESSION[user]'";
                        $statement = $connect->prepare($query);
                        $statement->execute();
                        $result = $statement->fetchAll();
                        foreach ($result as $row) {
                        ?>
                            <a href ="php/User/user.php"><?php echo $row['nom']; ?> <?php echo $row['cognom']; ?></a>

                        <?php
                        }

                        ?>


                    <?php endif; ?>


                    <a href="php/User/login">Iniciar sessio</a>
                </div>
                <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                    <i class="fa fa-bars"></i>
                </a>
            </div>
        </div>

        <!-- slider-->

        <div id="slideshow">
            <div>
                <img src="img/cycling.jpg" />
            </div>
            <div>
                <img src="img/running.jpg" />
            </div>
            <div>
                <img src="img/piscina.jpg" />
            </div>
        </div>

        <!-- slider end-->

        <!-- header end -->

        <div class="bug">

            <h1>HOLA</h1>
        </div>
    </header>


</body>





</html>