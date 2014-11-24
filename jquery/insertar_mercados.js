$(document).ready(inicializarEvento);

function inicializarEvento(){
    $("#Boton2").click(buscar_mercados);
}

    function actualizar_vista_1(){
         $(".hero-unit").html("<div> <center>  <h2>INSERCION DE LA INFORMACION</h2>\n\
                               <img src='../jquery/loading.gif'/> \n\
                                <p> Cargando los datos correspondientes... </br> Espere, por favor</p></center></div>");       
    }
    
    function actualizar_vista_2(){
         $(".hero-unit").html("<div> <center> <h2>INSERCION DE LA INFORMACION</h2>\n\
                                <p> Carga de los datos completada.</br> Vaya a la seccion de Visualizacion para verlos.</p></center></div>");
    }

    function buscar_mercados(){
        actualizar_vista_1();
        $.post('../bbdd/bbdd2.php', {accion: "insertar_mercados"}, function(datos){
            $(".hero-unit").append(datos);
        }).done(function(){
                actualizar_vista_2();
            });  
    }