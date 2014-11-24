$(document).ready(inicializarEvento);

function inicializarEvento(){
    $("#Boton3").click(mostrar_coordenadas);
}


function mostrar_coordenadas(){
    $.post('../bbdd/bbdd2.php', function(datos){
        
        $(".hero-unit").html("<div class='well sidebar-nav'>\n\
                                    <ul class='nav nav-list'>\n\
                                        <li class='nav-header'>MOSTRAR COORDENADAS DE ISLAS CANARIAS</li>\n\
                                        <li id='BotonIslas' class='active'><a href='#'>Pulsa aqui...</a> </li>\n\
                                        <li class='nav-header'>MOSTRAR COORDENADAS DE PROVINCIAS DE ESPAÑA</li>\n\
                                        <li id = 'BotonProvincias'> <a href='#'>Pulsa aqui...</a> </li>\n\
                                        <li class='nav-header'>MOSTRAR COORDENADAS DE MERCADOS</li>\n\
                                        <li id = 'BotonMercados'><a href='#'>Pulsa aqui...</a> </li>\n\
                                    </ul>\n\
                              </div>");
        $("#BotonIslas").click(mostrar_mapa_islas);
        $("#BotonProvincias").click(mostrar_mapa_espana);
        $("#BotonMercados").click(mostrar_mapa_mercados);
            }
        ); 
}

function mostrar_mapa_islas(){
    window.location.replace("../mapa/mapa.php?lugar=canarias");
}

function mostrar_mapa_espana(){
    window.location.replace("../mapa/mapa.php?lugar=espana");
}

function mostrar_mapa_mercados(){
    window.location.replace("../mapa/mapa.php?lugar=mercado");    
}
