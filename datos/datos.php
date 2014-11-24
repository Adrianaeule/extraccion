<?php
    function buscar_datos($nombre_fichero){
       $etiqueta = "COLOR=#000000>";
       $contenido_fichero = file_get_contents("../".$nombre_fichero);
       $valores_tabla = explode($etiqueta,$contenido_fichero);
       
       $fecha = recoger_fecha($valores_tabla);    
       $categoria = recoger_categoria($nombre_fichero);

        
       $valores_tabla = array_slice($valores_tabla, 4);
       for ($i = 0; $i < count($valores_tabla); $i++){
           $valores_tabla[$i] = eliminar_tags($valores_tabla[$i]);
       }
       $valores_tabla = eliminar_categorias($valores_tabla, $categoria); 
       array_push($valores_tabla, $categoria);       
       array_push($valores_tabla, $fecha);

       return $valores_tabla;
    }
    
    function eliminar_tags($valores_tabla){
        $valores_finales = '';
        $claves = preg_split(".<[^>]+>.", $valores_tabla); //eliminamos tags
        for ($j = 0; $j < count($claves); $j++){
            if (preg_match("/^[a-zñÑA-Z0-9]/", $claves[$j])){ //eliminamos valores sobrantes     

                   $valores_finales = $valores_finales.$claves[$j]; 
            }
        }
        
        return $valores_finales;
    }
    
    function eliminar_categorias($valores_tabla, $categoria){
        $pos_inicial= strpos($valores_tabla[0],$categoria) + strlen($categoria);
        $valores_tabla[0] = substr_replace($valores_tabla[0],'',0,$pos_inicial);
        
        $tamano = count($valores_tabla) - 1;
        $pos_final = strrpos($valores_tabla[$tamano],'€') + 1;
        $pos_fin = strlen($valores_tabla[$tamano]) - $pos_final;        
        $valores_tabla[$tamano] = substr_replace($valores_tabla[$tamano],'',$pos_final, $pos_fin);
        
        $valores_tabla = eliminar_euro($valores_tabla);
        

        
        return $valores_tabla;
    }
    
    function eliminar_euro($valores_tabla){
           for ($i = 0; $i < count($valores_tabla); $i++){
            $pos_euro = strpos($valores_tabla[$i],'€');
            if ($pos_euro !== false){ //si encuentras el euro lo eliminas         
                $resto = explode('€',$valores_tabla[$i]);
                $pos_coma = strpos($resto[0],',');
                $resto[0] = substr_replace($resto[0],'.', $pos_coma,1);
                $valores_tabla[$i] = $resto[0];
               
                if(strlen($resto[1]) > 0){ //si hay resto lo metes en otra posicion del array
                    $j = count($valores_tabla);
                    $ultimo_valor =  end($valores_tabla);
                    array_push($valores_tabla,$ultimo_valor);
                    while ($j > $i){
                        $valores_tabla[$j] = $valores_tabla[$j - 1];
                        $j--;
                    }
                    $valores_tabla[$i+1] = $resto[1];
                }
                $valores_tabla[$i] = substr_replace($valores_tabla[$i],'',$pos_euro,1);
            }
        }
        return $valores_tabla;
    }
    

    function recoger_fecha($valores_tabla){
        
        $valores_tabla[3] = eliminar_tags($valores_tabla[3]);
        $pos_final = strrpos($valores_tabla[3],'A');
        $pos_fin = strlen($valores_tabla[3]) - $pos_final;        
        $valores_tabla[3] = substr_replace($valores_tabla[3],'',$pos_final, $pos_fin);
        
        $valores_tabla[3] = str_replace('/', '-', $valores_tabla[3]);        
        $valores_tabla[3] = date("Y-m-d", strtotime($valores_tabla[3])); //cambiamos el formato para que lo acepta sql server
        
        return $valores_tabla[3];
    }
    
    function recoger_categoria($nombre_fichero){
        $pos_punto = strpos($nombre_fichero,'.');
        $nombre_fichero = substr_replace($nombre_fichero,'',$pos_punto, strlen($nombre_fichero));
        return $nombre_fichero;
    }
    

?>

