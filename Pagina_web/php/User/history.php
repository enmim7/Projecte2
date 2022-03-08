<?php

include('database_connection.php');

?>
<!DOCTYPE html>
<html lang="es">
<?php session_start();
if (!empty($_SESSION['auth'])) : ?>

    <head>
        <title>Gimnàs - DAM</title>
        <meta name="gf" content="gimnas">
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, user-scalable=yes">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
        <link rel="stylesheet" href="../../css/style.css" />
        <script src="../../js/jquery.min.js"></script>
        <script src="../../js/script.js"></script>
    </head>

    <body>

        <!-- header start-->

        <header class="header">

            <div class="nav">
                <div class="navbar" id="nav_button">
                    <a href="../../index" class="active">Inici</a>
                    <a href="../../xml/curses.xml">Participacio curses</a>
                    <a href="reserve_act">Reserva activitats</a>
                    <a href="history">Historial</a>
                    <div class="dreta"><a href="modify_user">Canviar dades</a>
                        <a><i class="fa fa-user fa-lg fa-fw" aria-hidden="true"></i><?php echo $_SESSION["user"]; ?></a>
                    </div>
                    <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                        <i class="fa fa-bars"></i>
                    </a>
                </div>
            </div>

        </header>

        <!-- header end-->

        <!-- section start-->


        <section class="section">

            <div class="table-wrapper">
                <table class="fl-table">



                    <div class="table-wrapper">
                        <table class="fl-table">
                            <thead>
                                <tr>
                                    <th>Data activitat</th>
                                    <th>Data registre</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>

                                </tr>
                                <tr>

                                    <?php
                                    $query = "select *  from  (
                    select activitats.nom, registrenindv.data_reg from activitats, registrenindv, clients where registrenindv.dni = clients.dni and activitats.id = registrenindv.id_activitat
                    union
                    select activitats.nom, registrencolect.data_reg from activitats, registrencolect, clients where registrencolect.dni = clients.dni and activitats.id = registrencolect.id_activitat
                     )a";
                                    $statement = $connect->prepare($query);
                                    $statement->execute();
                                    $result = $statement->fetchAll();
                                    foreach ($result as $row) {
                                    ?>


                                <tr>

                                    <td><?php echo $row['nom']; ?></td>
                                    <td><?php echo $row['data_reg']; ?></td>
                                </tr>

                    </div>

                <?php
                                    }
                ?>
                </table>
        </section>

        <!-- section end-->




    <?php else :
    header("Location: login.php");
    ?>

    <?php endif; ?>

    <!-- footer start-->

    <footer>

        <div class="foot1">
            <h2>GIM-DAM</h2>
            <p>Som una empresa que sorgeix amb el propòsit de brindar no sols un millor estat de salut i benestar corporal, sinó de motivació, excel·lència i millora contínua.
            </p>
            <div class="social">
                <a href="https://es-es.facebook.com/" title="Facebook" target="_blank"><i class="fa fa-facebook"></i></a>
                <a href="https://twitter.com/?lang=es" title="Twitter" target="_blank"><i class="fa fa-twitter"></i></a>
                <a href="https://www.google.com/intl/es/gmail/about/" title="Google+" target="_blank"><i class="fa fa-google-plus"></i></a>
            </div>
        </div>

        <div class="foot2">
            <div>
                <h2>Activitats</h2>
                <p><a href="">Body combat</a></p>
                <p><a href="">Zumba</a></p>
                <p><a href="">Pilates</a></p>
                <p><a href="">Yoga</a></p>
            </div>

            <div>
                <h2>Curses</h2>
                <p><a href="" target="blank">Ciclisme</a></p>
                <p><a href="" target="blank">Natació</a></p>
                <p><a href="" target="blank">Running</a></p>
                <p><a href="" target="blank">Triatló</a></p>
            </div>

            <div>
                <h2>Altres</h2>
                <p><a href="https://web.gencat.cat/es/activem/restriccions-territorials/catalunya/" target="blank">Covid-19</a></p>
                <p><a href="https://google.com" target="blank">Contacte</a></p>
            </div>
        </div>

    </footer>



    <div class="end">
        <hr>
        <span>Copyright 2022 - All rights reserved </span>
        <hr>

        <!-- footer end-->

    </body>

</html>