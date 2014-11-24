<?php
    require_once("../bbdd/bbdd.php");
    require_once("../codigo/codigo.php");
    if(isset($_POST['accion']) && !empty($_POST['accion'])){
        $accion = $_POST['accion'];    
        //Insertar puntos
        if ($accion == "insertar_puntos"){
            $tipo = $_POST['tipo'];
            $latitud = $_POST['lat']; 
            $longitud = $_POST['lng'];
            $punto = $_POST['dir'];
            
            switch ($tipo){
                case "isla":
                    insertar_islas($latitud, $longitud, $punto);    
                    break;
                case "provincia":
                    insertar_provincias($latitud, $longitud, $punto);
                    break;
                case "mercado":
                    insertar_mercados($latitud, $longitud, $punto);
                    break;      
            }
        }
        else if ($accion == "insertar_mercados"){
            extraer_html("A");       
            extraer_html("B");
            extraer_html("P");
            extraer_html("D");
            insertar_datos_mercados();
        }
        else if ($accion == "mostrar_mercados"){
            $tipo = $_POST['tipo'];
             switch ($tipo){
                case "producto":
                    mostrar_productos();    
                    break;
                case "canario":
                    mostrar_productos_mercadillos();
                    break;
                case "cadena":
                    mostrar_cadenas();
                    break;      
                case "categoria":
                    mostrar_categorias();
                    break;
            }           
        }
    }
?>