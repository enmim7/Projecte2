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
                        <a><i class="fa fa-user fa-lg fa-fw" aria-hidden="true"></i>


                            <?php

                            $query = "select clients.nom, clients.cognom from clients where clients.login = '$_SESSION[user]'";
                            $statement = $connect->prepare($query);
                            $statement->execute();
                            $result = $statement->fetchAll();
                            foreach ($result as $row) {
                            ?>
                                <?php echo $row['nom']; ?> <?php echo $row['cognom']; ?>

                            <?php
                            }

                            ?>


                        </a>
                    </div>
                    <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                        <i class="fa fa-bars"></i>
                    </a>
                </div>
            </div>


        </header>

        <!-- section start-->

        <section class="section">

            <h1 class="t-activitats">Activitats col·lectives</h1>

            <div class="container-activitats">
                <?php
                $query = "SELECT dies.nom_dia as dia,activitats.nom as nom_act, activitats.color, activitats.id, sales.id as sales_id, activitats.descripcio, date_format(activitats.hora_inici,'%H:%i') as hora_inici, date_format(activitats.hora_fi,'%H:%i') as hora_fi, activitats.img, monitors.nom,monitors.cognom
                FROM dies,activitats, colectives,sales,monitors,es_fa where  es_fa.id_activitat = activitats.id and es_fa.id_dia = dies.id and activitats.id_sala = sales.id and sales.id = monitors.id_sala and colectives.id = activitats.id group by activitats.id";
                $statement = $connect->prepare($query);
                $statement->execute();
                $result = $statement->fetchAll();
                foreach ($result as $row) {
                ?>



                    <div class="card" style="box-shadow: <?php echo $row['color']; ?> 0px 30px 60px -12px inset, rgba(0, 0, 0, 0.3) 0px 18px 36px -18px inset; ">
                        <img src="<?php echo $row['img']; ?>" alt="reserva">
                        <p name="asd">Nom: <?php echo $row['nom_act']; ?> </p>
                        <p>Aforament



                            <?php
                            $query = "SELECT FORMAT(100-((100/sales.aforament)* count(registrencolect.id_activitat)),0) as _aforament from registrencolect, clients, sales,activitats 
where clients.dni = registrencolect.dni and registrencolect.id_activitat = activitats.id and activitats.id = $row[id]
and sales.id = activitats.id_sala and registrencolect.data_act = (curdate()) group by activitats.id";
                            $statement = $connect->prepare($query);
                            $statement->execute();
                            $result3 = $statement->fetchAll();

                            if ($result3 == null) {
                                echo '100';
                            } else {
                                foreach ($result3 as $row3)
                                    echo $row3['_aforament'];
                            }

                            // foreach ($result3 as $row3)
                            ?>
                            %</p>
                        <p>Hora: <?php echo $row["hora_inici"]; ?>-<?php echo $row["hora_fi"]; ?></p>
                        <p>Entrenador: <?php echo $row['nom']; ?> <?php echo $row['cognom']; ?></p>
                        <p>Sala: <?php echo $row['sales_id']; ?></p>


                        <p> Dia: <?php echo $row['dia']; ?>


                        </p>

                        <?php
                        $query = "select count(*) from registrencolect where registrencolect.dni = '$_SESSION[dni]' and registrencolect.id_activitat = $row[id] and data_act = curdate()";
                        $statement = $connect->prepare($query);
                        $statement->execute();
                        $result2 = $statement->fetchAll();
                        foreach ($result2 as $row2)



                            if ($row2['count(*)'] == 0) {
                        ?>
                            <form style="padding: 0px 0px 25px 0px" action="insertar_activitat_colectiva.php" method="POST">
                                <input style="display: none;" type="text" name="id" required="" value="<?php echo $row['id']; ?>" />
                                <button type="submit" name="insert" class="button-4" role="button">Reservar</button>
                            </form>
                        <?php
                            } else {

                        ?>
                            <form style="padding: 0px 0px 25px 0px" action="anular_activitat_colectiva.php" method="POST">
                                <input style="display: none;" type="text" name="id" required="" value="<?php echo $row['id']; ?>" />
                                <button type="submit" name="insert" class="button-3" role="button">Anular</button>
                            </form>
                        <?php
                            }
                        ?>

                    </div>
                <?php
                }

                ?>
            </div>

            <h1 class="t-activitats">Activitats lliures</h1>

            <div class="container-activitats">
                <?php
                $query = "SELECT dies.nom_dia as dia,activitats.nom as nom_act, activitats.color, activitats.id, sales.id as sales_id, activitats.descripcio, date_format(activitats.hora_inici,'%H:%i') as hora_inici, date_format(activitats.hora_fi,'%H:%i') as hora_fi, activitats.img, monitors.nom,monitors.cognom
                FROM dies,activitats, individuals,sales,monitors,es_fa where  es_fa.id_activitat = activitats.id and es_fa.id_dia = dies.id and activitats.id_sala = sales.id and sales.id = monitors.id_sala and individuals.id = activitats.id group by activitats.id";
                $statement = $connect->prepare($query);
                $statement->execute();
                $result = $statement->fetchAll();
                foreach ($result as $row) {
                ?>



                    <div class="card" style="box-shadow: <?php echo $row['color']; ?> 0px 30px 60px -12px inset, rgba(0, 0, 0, 0.3) 0px 18px 36px -18px inset; ">
                        <img src="<?php echo $row['img']; ?>" alt="reserva">
                        <p name="asd">Nom: <?php echo $row['nom_act']; ?> </p>



                        <p>Aforament



                            <?php
                            $query = "SELECT FORMAT(100-((100/sales.aforament)* count(registrenindv.id_activitat)),0) as _aforament from registrenindv, clients, sales,activitats 
                where clients.dni = registrenindv.dni and registrenindv.id_activitat = activitats.id and activitats.id = $row[id]
                and sales.id = activitats.id_sala and registrenindv.data_act = (curdate()) group by activitats.id";
                            $statement = $connect->prepare($query);
                            $statement->execute();
                            $result3 = $statement->fetchAll();

                            if ($result3 == null) {
                                echo '100';
                            } else {
                                foreach ($result3 as $row3)
                                    echo $row3['_aforament'];
                            }

                            // foreach ($result3 as $row3)
                            ?>
                            %</p>





                        <p>Hora: <?php echo $row["hora_inici"]; ?>-<?php echo $row["hora_fi"]; ?></p>
                        <p>Entrenador: <?php echo $row['nom']; ?> <?php echo $row['cognom']; ?></p>
                        <p>Sala: <?php echo $row['sales_id']; ?></p>


                        <p> Dia: <?php echo $row['dia']; ?>


                        </p>

                        <?php
                        $query = "select count(*) from registrenindv where registrenindv.dni = '$_SESSION[dni]' and registrenindv.id_activitat = $row[id] and data_act = curdate()";
                        $statement = $connect->prepare($query);
                        $statement->execute();
                        $result2 = $statement->fetchAll();
                        foreach ($result2 as $row2)



                            if ($row2['count(*)'] == 0) {
                        ?>
                            <form style="padding: 0px 0px 25px 0px" action="insertar_activitat_individual.php" method="POST">
                                <input style="display: none;" type="text" name="id" required="" value="<?php echo $row['id']; ?>" />
                                <button type="submit" name="insert" class="button-4" role="button">Reservar</button>
                            </form>
                        <?php
                            } else {

                        ?>
                            <form style="padding: 0px 0px 25px 0px" action="anular_activitat_individual.php" method="POST">
                                <input style="display: none;" type="text" name="id" required="" value="<?php echo $row['id']; ?>" />
                                <button type="submit" name="insert" class="button-3" role="button">Anular</button>
                            </form>
                        <?php
                            }
                        ?>

                    </div>
                <?php
                }

                ?>

            </div>
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
    </div>

    <!-- footer end-->

    </body>

</html>