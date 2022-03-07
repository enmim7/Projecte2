<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0">
  <xsl:template match="/">
    <html>
      <head>
        <title>Prova XSL</title>
        <link rel="stylesheet" href="css/style.css"/>
      </head>
      <body>
          <header class="header">

        <div class="nav">
            <div class="navbar" id="nav_button">
                <a href="../../index" class="active">Inici</a>
                <a href="../../xml/bookstore.xml">Participacio curses</a>
                <a href="../php/User/reserve_act">Reserva activitats</a>
                <a href="../php/User/history">Historial</a>
                <div class="dreta"><a href="modify_user">Canviar dades</a>
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
        <div id="llibreria">
        
          <xsl:for-each select ="bookstore/book">
          <xsl:sort select="title"></xsl:sort>
         
            <div class="llibre">
              <h3>Titol: <span><xsl:value-of select="title"/></span></h3>
              <h4>Autor: <span><xsl:value-of select="author"/></span></h4>
              <h4>Any: <span><xsl:value-of select="year"/></span></h4>
              <h4>Preu: <span><xsl:value-of select="price"/></span></h4>
              <img src="img/{portada}" alt="portada"/>
              <input type="button" value="inscriu-te" id="boto"/>
            </div>
          </xsl:for-each>
        </div>
        
        <script src="js/funcions.js"></script>
      </body>
    </html>
  </xsl:template>
</xsl:stylesheet>
