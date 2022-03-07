<!DOCTYPE html>
<html lang="es">
<?php session_start(); if (!empty($_SESSION['auth'])): ?>
<head>
<title>Gimnàs - DAM</title>
    <meta name="gf" content="gimnas">
    <meta charset="utf-8" />
    <meta name="viewport" content="width-device-width, initial-scale=1.0">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="../../css/style.css"/>
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
                <a><i class="fa fa-user fa-lg fa-fw" aria-hidden="true"></i><?php echo $_SESSION["user"]; ?></a>
            </div>
                <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                    <i class="fa fa-bars"></i>
                </a>
            </div>
        </div>
        <header>
        <?php else: ?>
	<p>No estas autoritzat</p>
<?php endif; ?>

<div class="modal">
    <div class="modal__container">
      <div class="modal__featured">
        <button type="button" class="button--transparent button--close">
        </button>
        <div class="modal__circle"></div>
      </div>
      <div class="modal__content">
        <h2>Canvia dades</h2>

        <form>
          <ul class="form-list">
            <li class="form-list__row">
              <label>Vols rebre comunicació?</label>
              <input type="text" name="" required="" />
            </li>

            <ul class="form-list">
            <li class="form-list__row">
              <label>Fica el teu telefon</label>
              <input type="text" name="" required="" />
            </li>

            <ul class="form-list">
            <li class="form-list__row">
              <label>El teu correu electronic</label>
              <input type="text" name="" value="nazar@gmail.com" required="" />
            </li>

            <ul class="form-list">
            <li class="form-list__row">
              <label>Fica condició</label>
              <input type="text" name="" required="" />
            </li>
           
           
           
            <li>
              <button type="submit" class="button">CAMBIAR DADES</button>
            </li>
          </ul>
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

        <form>
          <ul class="form-list">
            <li class="form-list__row">
              <label>Contrasenya anterior</label>
              <input type="text" name="" required="" />
            </li>

            <ul class="form-list">
            <li class="form-list__row">
              <label>Contrasenya nova</label>
              <input type="text" name="" required="" />
            </li>
            <li>
              <button type="submit" class="button">CAMBIAR CONTRASENYA</button>
            </li>
          </ul>
        </form>
      </div> 
    </div> 
  </div>


</body></html>