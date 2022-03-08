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
    <meta name="viewport" content="width-device-width, initial-scale=1.0">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="../../css/style.css" />
    <script src="../../js/jquery.min.js"></script>
    <script src="../../js/script.js"></script>
  </head>

  <body>

    <header class="header">

      <div class="nav">
        <div class="navbar" id="nav_button">
          <a href="../../index" class="active">Inici</a>
          <a href="activitats">Activitats</a>
          <a href="curses">Curses</a>
          <div class="dreta">
            <a><i class="fa fa-user fa-lg fa-fw" aria-hidden="true"></i><?php

                                                                        $query = "select clients.nom, clients.cognom from clients where clients.login = '$_SESSION[user]'";
                                                                        $statement = $connect->prepare($query);
                                                                        $statement->execute();
                                                                        $result = $statement->fetchAll();
                                                                        foreach ($result as $row) {
                                                                        ?>
                <?php echo $row['nom']; ?> <?php echo $row['cognom']; ?>

              <?php
                                                                        }

              ?></a>
          </div>
          <a href="javascript:void(0);" class="icon" onclick="myFunction()">
            <i class="fa fa-bars"></i>
          </a>
        </div>
      </div>
    </header>




    <section class="section">


      <div class="modal">
        <div class="modal__container">
          <div class="modal__featured">
            <button type="button" class="button--transparent button--close">
            </button>
            <div class="modal__circle"></div>
          </div>
          <div class="modal__content">
            <h2>Canvia dades</h2>

            <form action="cambiar_dades.php" method="POST">

              <?php

              $query = "select clients.telefon, clients.IBAN,clients.condicio, clients.comunicacio, clients.correu from clients where clients.login = '$_SESSION[user]'";
              $statement = $connect->prepare($query);
              $statement->execute();
              $result = $statement->fetchAll();
              foreach ($result as $row) {
              ?>

                <li class="form-list__row">
                  <label>Vols rebre comunicació?</label>
                  <input class="input-user" type="text" name="comunicacio" required="" value="<?php echo $row['comunicacio']; ?>" />
                </li>


                <li class="form-list__row">
                  <label>Fica el teu telefon</label>
                  <input class="input-user" type="text" name="telefon" required="" value="<?php echo $row['telefon']; ?>" />
                </li>


                <li class="form-list__row">
                  <label>El teu correu electronic</label>
                  <input class="input-user" type="text" required="" name="correu" value="<?php echo $row['correu']; ?>" />
                </li>


                <li class="form-list__row">
                  <label>Fica condició</label>
                  <input class="input-user" type="text" name="condicio" value="<?php echo $row['condicio']; ?>" />
                </li>
                <li class="form-list__row">
                  <label>Fica el IBAN</label>
                  <input class="input-user" type="text" name="IBAN" required="" value="<?php echo $row['IBAN']; ?>" />
                </li>


              <?php
              }

              ?>




              <li>
                <button type="submit" name="insert" class="button">CAMBIAR DADES</button>
              </li>
            </form>
          </div>
        </div>
      </div>


      <div class="modal">
        <div class="modal__container">
          <div class="modal__featured">
            <button type="button" class="button--transparent button--close">
            </button>
            <div class="modal__circle"></div>
          </div>
          <div class="modal__content">
            <h2>Canvia contrasenya</h2>

            <form action="cambiar_contAD.php" method="POST">



              <ul class="form-list">
                <li class="form-list__row">
                  <label>Contrasenya nova</label>
                  <input class="input-user" type="text" name="cont" required="" />
                </li>
                <li>
                  <button type="submit" name="insert" class="button">CAMBIAR CONTRASENYA</button>
                </li>
              </ul>
            </form>
          </div>
        </div>
      </div>
    </section>



  </body>

</html>
<?php else :
  header("Location: login.php");
?>
<?php endif; ?>