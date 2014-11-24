    $(document).ready(inicializarEvento);
    llamadas = 0;
    puntos = 0;
    function inicializarEvento(){
        $("#Boton1").click(buscar_coordenadas_puntos);
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
    
    function buscar_coordenadas_puntos(){   
        var islas = new Array("El Hierro","La Gomera","La Palma","Tenerife","Gran Canaria","Fuerteventura","Lanzarote");
        var provincias = new Array("Alava, España", "Albacete, España", "Alicante, España", "Almería, España", "Asturias, España", "Avila, España", "Badajoz, España", "Barcelona, España", "Burgos, España", "Cáceres, España", "Cádiz, España", "Cantabria, España", "Castellón, España", "Ceuta, España", "Ciudad Real, España", "Córdoba, España", "Cuenca, España", "Gerona, España", "Granada, España", "Guadalajara, España", "Guipúzcoa, España", "Huelva, España", "Huesca, España", "Islas Baleares, España", "Jaén, España", "La Coruña, España", "La Rioja, España", "Las Palmas de Gran Canaria, España", "León, España", "Lérida, España", "Lugo, España", "Madrid, España", "Málaga, España", "Melilla, España", "Murcia, España", "Navarra, España", "Orense, España", "Palencia, España", "Pontevedra, España", "Santa Cruz de Tenerife, España", "Salamanca, España", "Segovia, España", "Sevilla, España", "Soria, España", "Tarragona, España", "Teruel, España", "Toledo, España", "Valencia, España", "Valladolid, España", "Vizcaya, España", "Zamora, España", "Zaragoza, España");
        var dir_mercado = "Carretera Tacoronte-Tejina, Tacoronte";
        puntos = islas.length + provincias.length + 1;
  
        actualizar_vista_1();

        for (i=0; i < islas.length; i++){
            buscar_coordenadas(islas[i], "isla");
        }
        for (i=0; i < provincias.length; i++){
            buscar_coordenadas(provincias[i], "provincia");
        }

        buscar_coordenadas(dir_mercado, "mercado");


    }



    function buscar_coordenadas(direccion_resolver, tipo_punto){
                geocoder = new google.maps.Geocoder();
                var direccion = direccion_resolver;
                geocoder.geocode({'address': direccion}, function(results, status) {
                    var latitud;
                    var longitud;
                    if (status == google.maps.GeocoderStatus.OK) {
                        latitud = results[0].geometry.location.lat();
                        longitud = results[0].geometry.location.lng();
                        $.post('../bbdd/bbdd2.php', {lat: latitud, lng: longitud, dir:direccion, accion:"insertar_puntos", tipo:tipo_punto}, function(datos){
                                $(".hero-unit").append(''); }
                                ).done(function(){       
                                    llamadas++;
                                    if (llamadas == puntos){ //puntos es el numero de direcciones que tenemos para resolver
                                        actualizar_vista_2();
                                    }
                                }); 
                    } 
                    else if (status === google.maps.GeocoderStatus.OVER_QUERY_LIMIT) {  
                        setTimeout(function() {
                            buscar_coordenadas(direccion_resolver, tipo_punto);
                        }, 400);
                    }
                    else {
                        llamadas++;
                       // $("#errors").append("Error, no se puede resolver la siguiente direccion: " + direccion + " Status"+status+"</br>");
                    }
                });
    }