<!DOCTYPE html>

<html lang="en">
  <head>
    <script type="text/javascript" src="../jquery/jquery.js"></script>
    <script type="text/javascript" src="../jquery/insertar_coordenadas.js"></script> 
    <script type="text/javascript" src="../jquery/mostrar_coordenadas.js"></script> 
    <script type="text/javascript" src="https://maps.google.com/maps/api/js?sensor=false"> </script>   
    
      
    <meta charset ="utf-8">
    <title>PFG Extraccion</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="../bootstrap/css/bootstrap.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
      .sidebar-nav {
        padding: 9px 0;
      }
    </style>
    <link href="../bootstrap/css/bootstrap-responsive.css" rel="stylesheet">

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
            <ul class="nav">
              <li class="active"><a href="../index.php">Inicio</a></li> <!--/.lista de los botones de la parte superior de la pantalla -->
         </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
    <div class="container-fluid">
      <div class="row-fluid">
      <div class="span3">
          <div class="well sidebar-nav">
             <ul class="nav nav-list">
              <li class="nav-header">INSERTAR DATOS</li>
              <li id="Boton1" class="active"><a href="#">Pulsa aqui...</a></li>
              
              <li class="nav-header">VISUALIZAR DATOS</li>
              <li id="Boton3"><a href="#">Pulsa aqui...</a> </li>
            </ul>
          </div>
        </div><!--/span-->
      

      
        <div class="span9">
          <div id="contenedor" class="hero-unit">
           <center>
            <h1> GEOLOCALIZACION</h1>
            <p>El modulo de <i> Geolocalizacion </i> se encarga de calcular las posiciones geograficas de los diferentes mercados a traves de su direccion. Tambien se calculan las posiciones geograficas de las Islas Canarias, y las Provincias de España. </br> Se podra tanto insertar como visualizar dichos datos.</p>
            </center>
          </div>
            <div id="errors"> </div>
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

