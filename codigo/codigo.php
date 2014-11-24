<?php

function extraer_html($categoria){
//INICIAMOS UNA SESIÓN CURL
    $curl_categoria = curl_init("http://www.mercadillodelagricultor.com/precios/Precios".$categoria.".htm");
//CREAMOS EL FICHERO DONDE GUARDAREMOS EL CODIGO DE LA PAGINA
    switch($categoria){
        case "A":
            $fichero = fopen("../Aromaticas.txt", "w");            
            break;
        case "B";
            $fichero = fopen("../Fruta.txt", "w");
            break;
        case "D":
            $fichero = fopen("../Verduras.txt", "w");
            break;
        case "P":
            $fichero = fopen("../Papas.txt", "w");
            break;
    }

    //ESTABLECEMOS LAS OPCIONES PARA LA TRANSEFERENCIA DE LOS DATOS
    curl_setopt($curl_categoria, CURLOPT_FILE, $fichero);
    curl_setopt($curl_categoria, CURLOPT_HEADER, 0);
    curl_exec($curl_categoria);
    //CERRAMOS LA SESIÓN CURL Y EL FICHERO.
    curl_close($curl_categoria);
    fclose($fichero);
}

?>