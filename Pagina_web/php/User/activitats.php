<?php

include('database_connection.php');

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <title>Gimnàs - DAM</title>
    <meta name="gf" content="gimnas">
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, user-scalable=yes">
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
                <a href="activitats">Activitats</a>
                <a href="../../curses">Curses</a>
                <div class="dreta"><a href="login">Iniciar sessio</a></div>
                <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                    <i class="fa fa-bars"></i>
                </a>
            </div>
        </div>

    </header>

    <!-- header end-->

    <!-- section start-->



    <section class="section">

        <h1 class="t-activitats">Activitats col·lectives</h1>

        <div class="container-activitats">
            <?php
            $query = "SELECT activitats.nom as nom_act, activitats.color, activitats.id, sales.id, activitats.descripcio,
             date_format(activitats.hora_inici,'%H:%i') as hora_inici, date_format(activitats.hora_fi,'%H:%i') as hora_fi,
            activitats.img, monitors.nom,monitors.cognom
            FROM activitats, colectives,sales,monitors where activitats.id_sala = sales.id and sales.id = monitors.id_sala and
            colectives.id = activitats.id";
            $statement = $connect->prepare($query);
            $statement->execute();
            $result = $statement->fetchAll();
            foreach ($result as $row) {
            ?>

                <div class="card" style="box-shadow: <?php echo $row ['color']; ?> 0px 30px 60px -12px inset, rgba(0, 0, 0, 0.3) 0px 18px 36px -18px inset; ">
                    <img src="<?php echo $row['img']; ?>" alt="activitat">
                    <p name="asd">Nom: <?php echo $row['nom_act']; ?> </p>
                    <p>Aforament 80%</p>
                    <p>Hora: <?php echo $row["hora_inici"]; ?>-<?php echo $row["hora_fi"]; ?></p>
                    <p>Entrenador: <?php echo $row['nom']; ?> <?php echo $row['cognom']; ?></p>
                    <p>Sala: <?php echo $row['id']; ?></p>


                    <p> Dies:
                        <?php
                        $query = "select dies.nom_dia from dies,activitats,es_fa where es_fa.id_activitat = activitats.id and es_fa.id_dia = dies.id and activitats.id = $row[id]";
                        $statement = $connect->prepare($query);
                        $statement->execute();
                        $result = $statement->fetchAll();
                        foreach ($result as $row) {
                        ?>
                            <?php echo $row['nom_dia']; ?>

                        <?php
                        }

                        ?>

                    </p>

                </div>
            <?php
            }

            ?>



        </div>

        <div>

            <h1 class="t-activitats">Activitats lliures</h1>

            <div class="container-activitats">


                <?php
                $query = "SELECT activitats.nom as nom_act, activitats.id, activitats.color,sales.id, activitats.descripcio, date_format(activitats.hora_inici,'%H:%i') as hora_inici, date_format(activitats.hora_fi,'%H:%i') as hora_fi, activitats.img, monitors.nom,monitors.cognom
                FROM activitats, individuals,sales,monitors where activitats.id_sala = sales.id and sales.id = monitors.id_sala and individuals.id = activitats.id";
                $statement = $connect->prepare($query);
                $statement->execute();
                $result = $statement->fetchAll();
                foreach ($result as $row) {
                ?>


                    <div class="card" style="box-shadow: <?php echo $row['color']; ?> 0px 30px 60px -12px inset, rgba(0, 0, 0, 0.3) 0px 18px 36px -18px inset; ">
                        <img src="<?php echo $row['img']; ?>" alt="activitat">
                        <p>Nom: <?php echo $row['nom_act']; ?> </p>
                        <p>Aforament 80%</p>
                        <p>Hora: <?php echo $row["hora_inici"]; ?>-<?php echo $row["hora_fi"]; ?></p>
                        <p>Entrenador: <?php echo $row['nom']; ?> <?php echo $row['cognom']; ?></p>
                        <p>Sala: <?php echo $row['id']; ?></p>



                        <p> Dies:
                            <?php
                            $query = "select dies.nom_dia from dies,activitats,es_fa where es_fa.id_activitat = activitats.id and es_fa.id_dia = dies.id and activitats.id = $row[id]";
                            $statement = $connect->prepare($query);
                            $statement->execute();
                            $result = $statement->fetchAll();
                            foreach ($result as $row) {
                            ?>
                                <?php echo $row['nom_dia']; ?>

                            <?php
                            }

                            ?>

                        </p>

                    </div>
                <?php
                }

                ?>
            </div>
        </div>

    </section>

    <!-- section end-->

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
    </div>

    <!-- footer end-->




</body>

</html>