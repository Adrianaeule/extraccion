<!DOCTYPE html>
<?php
include_once 'bbdd/bbdd.php';
modificar_mercado();
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>PFG Extraccion</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="./bootstrap/css/bootstrap.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
      .sidebar-nav {
        padding: 9px 0;
      }
    </style>
    <link href="./bootstrap/css/bootstrap-responsive.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
    <link rel="shortcut icon" href="../assets/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">
  </head>

  <body>

    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container-fluid">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand">PROYECTO FIN DE GRADO</a>
          <div class="nav-collapse collapse">
            <p class="navbar-text pull-right"></p> 
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
    <div class="container-fluid">
      <div class="row-fluid">
      <div class="span3">
          <div class="well sidebar-nav">
             <ul class="nav nav-list">
              <li class="nav-header">DATOS DE MERCADILLOS</li>
              <li class="active"><a href="./visualizacion/visualizacion_extraccion.php">Acceder</a></li>

              <li class="nav-header">DATOS DE LOCALIZACION</li>
              <li><a href="./visualizacion/visualizacion_posicion.php">Acceder</a> </li>
            </ul>
          </div>
        </div><!--/span-->
      

      
        <div class="span9">
          <div class="hero-unit">
            <center>
            <h2> EXTRACCION, TRATAMIENTO Y VISUALIZACION DE LA INFORMACION </h2>
            <p>La idea general es dar la mejor solucion a los clientes a la hora de realizar su cesta de compra, de manera sencilla e intuitiva, y siguiendo los principios de sostenibilidad para el programa de hogares verdes del Ministerio de Agricultura, Alimentacion y Medio Ambiente. Se trata de extraer de diversas fuentes los precios en la cadena agroalimentaria, generando una aplicacion que permita el tratamiento y visualizacion de la informacion oportuna para la confeccion de la cesta optima para la lista de productos del cliente, segun los criterios que haya definido.</p>
            </center>
          </div>

          </div><!--/row-->
        </div><!--/span-->
      </div><!--/row-->

      <hr>

      <footer>
        <p>&copy; Adriana Eusebio Leon</p>
      </footer>
      

    </div><!--/.fluid-container-->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../assets/js/jquery.js"></script>
    <script src="../assets/js/bootstrap-transition.js"></script>
    <script src="../assets/js/bootstrap-alert.js"></script>
    <script src="../assets/js/bootstrap-modal.js"></script>
    <script src="../assets/js/bootstrap-dropdown.js"></script>
    <script src="../assets/js/bootstrap-scrollspy.js"></script>
    <script src="../assets/js/bootstrap-tab.js"></script>
    <script src="../assets/js/bootstrap-tooltip.js"></script>
    <script src="../assets/js/bootstrap-popover.js"></script>
    <script src="../assets/js/bootstrap-button.js"></script>
    <script src="../assets/js/bootstrap-collapse.js"></script>
    <script src="../assets/js/bootstrap-carousel.js"></script>
    <script src="../assets/js/bootstrap-typeahead.js"></script>
    
  </body>
</html>


