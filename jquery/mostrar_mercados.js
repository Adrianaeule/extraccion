$(document).ready(inicializarEvento);

function inicializarEvento(){
    $("#Boton4").click(mostrar_datos_mercados);
}

function mostrar_datos_mercados(){
        $(".hero-unit").html("<div class='well sidebar-nav'>\n\
                                    <ul class='nav nav-list'>\n\
                                        <li class='nav-header'>MOSTRAR DATOS DE PRODUCTOS</li>\n\
                                        <li id='BotonProductos' class='active'><a href='#'>Pulsa aqui...</a> </li>\n\
                                        <li class='nav-header'>MOSTRAR DATOS DE PRODUCTOS CANARIOS</li>\n\
                                        <li id = 'BotonCanarios'> <a href='#'>Pulsa aqui...</a> </li>\n\
                                        <li class='nav-header'>MOSTRAR DATOS DE CADENAS DE MERCADOS</li>\n\
                                        <li id = 'BotonCadenas'><a href='#'>Pulsa aqui...</a> </li>\n\
                                        <li class='nav-header'>MOSTRAR DATOS DE CATEGORIAS DE MERCADOS</li>\n\
                                        <li id = 'BotonCategorias'><a href='#'>Pulsa aqui...</a> </li>\n\
                                    </ul>\n\
                              </div>");
    
        $("#BotonProductos").click(mostrar_productos);
        $("#BotonCanarios").click(mostrar_productos_canarios);
        $("#BotonCadenas").click(mostrar_cadenas);
        $("#BotonCategorias").click(mostrar_categorias);
}

function mostrar_productos(){
    $.post('../bbdd/bbdd2.php', {accion:"mostrar_mercados", tipo:"producto"}, function(datos){  
        $(".hero-unit").html("<center> <h2>DATOS DE PRODUCTOS</h2></center></br>");
        $(".hero-unit").append(datos);
        }
    ); 
}
    

function mostrar_productos_canarios(){
    $.post('../bbdd/bbdd2.php', {accion:"mostrar_mercados", tipo:"canario"}, function(datos){  
        $(".hero-unit").html("<center> <h2>DATOS DE PRODUCTOS CANARIOS</h2></center></br>");
        $(".hero-unit").append(datos);
        }
    );     
}

function mostrar_cadenas(){
    $.post('../bbdd/bbdd2.php', {accion:"mostrar_mercados", tipo:"cadena"}, function(datos){  
        $(".hero-unit").html("<center> <h2> DATOS DE CADENAS DE MERCADOS</h2></center> </br>");
        $(".hero-unit").append(datos);
        }
    );     
}

function mostrar_categorias(){
    $.post('../bbdd/bbdd2.php', {accion:"mostrar_mercados", tipo:"categoria"}, function(datos){  
        $(".hero-unit").html("<center> <h2> DATOS DE CATEGORIAS</h2><center> </br>");
        $(".hero-unit").append(datos);
        }
    );     
}