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
        var provincias = new Array("Alava, Espa�a", "Albacete, Espa�a", "Alicante, Espa�a", "Almer�a, Espa�a", "Asturias, Espa�a", "Avila, Espa�a", "Badajoz, Espa�a", "Barcelona, Espa�a", "Burgos, Espa�a", "C�ceres, Espa�a", "C�diz, Espa�a", "Cantabria, Espa�a", "Castell�n, Espa�a", "Ceuta, Espa�a", "Ciudad Real, Espa�a", "C�rdoba, Espa�a", "Cuenca, Espa�a", "Gerona, Espa�a", "Granada, Espa�a", "Guadalajara, Espa�a", "Guip�zcoa, Espa�a", "Huelva, Espa�a", "Huesca, Espa�a", "Islas Baleares, Espa�a", "Ja�n, Espa�a", "La Coru�a, Espa�a", "La Rioja, Espa�a", "Las Palmas de Gran Canaria, Espa�a", "Le�n, Espa�a", "L�rida, Espa�a", "Lugo, Espa�a", "Madrid, Espa�a", "M�laga, Espa�a", "Melilla, Espa�a", "Murcia, Espa�a", "Navarra, Espa�a", "Orense, Espa�a", "Palencia, Espa�a", "Pontevedra, Espa�a", "Santa Cruz de Tenerife, Espa�a", "Salamanca, Espa�a", "Segovia, Espa�a", "Sevilla, Espa�a", "Soria, Espa�a", "Tarragona, Espa�a", "Teruel, Espa�a", "Toledo, Espa�a", "Valencia, Espa�a", "Valladolid, Espa�a", "Vizcaya, Espa�a", "Zamora, Espa�a", "Zaragoza, Espa�a");
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