<?php
    //require_once("../datos/datos.php");
    
    function insertar_datos_mercados(){
        $ODBC = "enlace_bbdd_php";
        $conn = odbc_connect($ODBC,"", "");
    
        $array = array("Aromaticas.txt", "Fruta.txt", "Papas.txt", "Verduras.txt");
        insertar_cadena();
        foreach($array as $valor){
            $datos = buscar_datos($valor);
            $tamano_datos = count($datos);
            insertar_categoria( $datos[$tamano_datos - 2]);
        }
        foreach($array as $valor){
            $datos = buscar_datos($valor);
            $tamano_datos = count($datos);
            $i = 0;
            while ($i <= $tamano_datos - 4){
                insertar_productos($datos[$i], $datos[$i + 1], $datos[$i +2], $datos[$tamano_datos - 2], end($datos));
                insertar_productos_mercadillos($datos[$i], $datos[$i+1] , $datos[$i+2] , $datos[$tamano_datos - 2], end($datos));
                $i = $i +3;
            }           
        }
        odbc_close($conn);
    }
    
    function insertar_productos($producto, $precio_min, $precio_max, $categoria, $fecha){
        $ODBC = "enlace_bbdd_php";
        $conn = odbc_connect($ODBC,"", "");
        $id_cadena = "MT";
        $id_categoria = strtoupper(substr($categoria, 0, 3));
        $id = $id_cadena.$id_categoria.$producto;
        $precio_medio = ($precio_min + $precio_max)/2;
        $URL = "www.mercadillodelagricultor.com";
        $sql = "IF NOT EXISTS (SELECT * FROM producto WHERE (Id_producto='".$id."')) INSERT INTO producto(Id_producto, Nombre_web, Marca, Precio, Categoria, Cadena, Nombre_producto, Cantidad, Medida, Producto_canario, Activo, Fecha_modificacion) VALUES ('".$id."', '".$URL."',null, ".$precio_medio.", '".$id_categoria."', '".$id_cadena."','".$producto."',null,null,1,1, '".$fecha."') ELSE UPDATE producto SET Precio = ".$precio_medio.", Fecha_modificacion= '".$fecha."' WHERE Id_producto='".$id."';";      
        odbc_exec($conn, $sql) or die("<p>".odbc_errormsg());  
        odbc_close($conn);
    }
    
    function mostrar_productos(){
        $ODBC = "enlace_bbdd_php";
        $conn = odbc_connect($ODBC,"", ""); 
        $sql = "SELECT * FROM producto;";
        $resultado = odbc_exec($conn, $sql) or die("<p>".odbc_errormsg());

        echo "<table border=5 align = center>";
        echo "<tr> <th>NOMBRE</th> <th>PRECIO MEDIO</th> <th>FECHA MODIFICACION</th> <th>CADENA</th> <th>CATEGORIA</th> <th>CANARIO</th> <th> ACTIVO</th></tr>";      
        while (odbc_fetch_array($resultado)) {
            $id = utf8_encode(odbc_result($resultado,"Id_producto"));
            $web = odbc_result($resultado,"Nombre_web");
            $prec = odbc_result($resultado,"Precio");
            $cat = odbc_result($resultado,"Categoria");
            $cad = odbc_result($resultado,"Cadena");
            $nom = utf8_encode(odbc_result($resultado,"Nombre_producto"));
            $can = odbc_result($resultado,"Producto_canario");
            $act = odbc_result($resultado,"Activo");   
            $fec = odbc_result($resultado,"Fecha_modificacion");
            $prec_r = round($prec, 2);
            if ($can == 1)
                $can = 'si';
            else
                $can = 'no';
            if ($act == 1)
                $act = 'si';
            else
                $act = 'no';
            
            echo " <td align = center>".$nom." </td> <td align = center>".$prec_r." </td> <td align = center>".$fec."</td> <td align = center>".$cad." </td> <td align = center>".$cat." </td> <td align = center>".$can." </td> <td align = center>".$act." </td>";
            echo "</tr>";
        }
        echo "</table>"; 
        odbc_close($conn);
    }
    
    function insertar_productos_mercadillos($producto, $precio_min, $precio_max, $categoria, $fecha){
        $ODBC = "enlace_bbdd_php";
        $conn = odbc_connect($ODBC,"", "");
        $id_cadena = "MT";   
        $id_categoria = strtoupper(substr($categoria, 0, 3));
        $id = $id_cadena.$id_categoria.$producto;
        $sql = "IF NOT EXISTS (SELECT * FROM producto_mercadillo WHERE (Id_producto='".$id."') AND (fecha='".$fecha."'))INSERT INTO producto_mercadillo(Id_producto, Fecha, Precio_minimo, Precio_maximo) VALUES ('".$id."', '".$fecha."',".$precio_min.", ".$precio_max.");";
        odbc_exec($conn, $sql) or die("<p>".odbc_errormsg());
        odbc_close($conn);
    }

    function mostrar_productos_mercadillos(){
        $ODBC = "enlace_bbdd_php";
        $conn = odbc_connect($ODBC,"", ""); 
        $sql = "SELECT * FROM producto_mercadillo;";
        $resultado = odbc_exec($conn, $sql) or die("<p>".odbc_errormsg());  
        echo "<table border=5  align = center>";
        echo "<tr> <th>ID</th> <th>FECHA</th> <th>PRECIO MINIMO</th> <th>PRECIO MAXIMO</th> </tr>";
        while (odbc_fetch_array($resultado)) {
            $id =utf8_encode(odbc_result($resultado,"Id_producto"));
            $fec =odbc_result($resultado,"Fecha");
            $prec_1 =odbc_result($resultado,"Precio_minimo");
            $prec_2 =odbc_result($resultado,"Precio_maximo");
            $prec_min = round($prec_1, 2);
            $prec_max = round($prec_2, 2);
            
            echo " <td align = center>".$id."</td> <td align = center>".$fec." </td> <td align = center>".$prec_min." </td> <td align = center>".$prec_max." </td>";
            echo "</tr>";
        }
        echo "</table>";        
        odbc_close($conn);
    }    
    
    function insertar_cadena(){
        $ODBC = "enlace_bbdd_php";
        $conn = odbc_connect($ODBC,"", "");
        $id_cadena = "MT";
        $URL = "www.mercadillodelagricultor.com";
        $sql = "IF NOT EXISTS (SELECT * FROM cadena WHERE (Id_sigla='".$id_cadena."')) INSERT INTO cadena(Id_sigla, URL, Nombre, Mercadillo) VALUES ('".$id_cadena."', '".$URL."','Mercadillo del Agricultor', 1)";
        odbc_exec($conn, $sql) or die("<p>".odbc_errormsg());
        odbc_close($conn);
    }
    
    function mostrar_cadenas(){
        $ODBC = "enlace_bbdd_php";
        $conn = odbc_connect($ODBC,"", ""); 
        $sql = "SELECT * FROM cadena;";
        $resultado = odbc_exec($conn, $sql) or die("<p>".odbc_errormsg());
        echo "<table border=5 align = center>";
        echo "<tr> <th>ID</th> <th>URL</th> <th>NOMBRE</th> <th>MERCADILLO</th> </tr>";
        while (odbc_fetch_array($resultado)) {
            $id = utf8_encode(odbc_result($resultado,"Id_sigla"));
            $url = odbc_result($resultado,"URL");
            $nom = utf8_encode(odbc_result($resultado,"Nombre"));
            $mer = odbc_result($resultado,"Mercadillo");
            if ($mer == 1)
                $mer = 'si';
            else
                $mer = 'no';

            echo " <td align = center>".$id."</td> <td align = center>".$url." </td> <td align = center>".$nom." </td> <td align = center>".$mer." </td>";
            echo "</tr>";
        }
        echo "</table>";   
        odbc_close($conn);     
    }
    
    function insertar_categoria($categoria){
        $ODBC = "enlace_bbdd_php";
        $conn = odbc_connect($ODBC,"", "");
        $id_categoria = strtoupper(substr($categoria, 0, 3));
        $id_cadena = "MT";
        $sql = "IF NOT EXISTS (SELECT * FROM categoria_cadena WHERE (Id_categoria='".$id_categoria."')AND (Cadena='".$id_cadena."')) INSERT INTO categoria_cadena(Id_categoria, Nombre, Cadena, Nivel, Categoria_padre, Cadena_padre, Categoria_propia) VALUES ('".$id_categoria."', '".$categoria."','".$id_cadena."',1 , '".$id_categoria."','".$id_cadena."',null)";
        odbc_exec($conn, $sql) or die("<p>".odbc_errormsg());
        odbc_close($conn);
        
    }
    
    function mostrar_categorias(){
        $ODBC = "enlace_bbdd_php";
        $conn = odbc_connect($ODBC,"", ""); 
        $sql = "SELECT * FROM categoria_cadena;";
        $resultado = odbc_exec($conn, $sql) or die("<p>".odbc_errormsg());  
        echo "<table border=5  align = center>";
        echo "<tr> <th>ID</th> <th>NOMBRE</th> <th>CADENA</th> <th>NIVEL</th> <th>CADENA PADRE</th> <th>CATEGORIA PADRE</th> </tr>";
        while (odbc_fetch_array($resultado)) {
            echo "<tr>";
            $id = utf8_encode(odbc_result($resultado,"Id_categoria"));
            $nom = utf8_encode(odbc_result($resultado,"Nombre"));
            $cad = odbc_result($resultado,"Cadena");
            $niv = odbc_result($resultado,"Nivel");
            $nivp = odbc_result($resultado,"Categoria_padre");
            $cadp = odbc_result($resultado,"Cadena_padre");  
            
            echo " <td align = center>".$id."</td> <td align = center>".$nom." </td> <td align = center>".$cad." </td> <td align = center>".$niv." </td> <td align = center>".$cadp." </td> <td align = center>".$nivp." </td>";
            echo "</tr>";
        }
        echo "</table>";
        
        odbc_close($conn);
    }
     
    function insertar_mercados($latitud, $longitud, $direccion){ //MIRAR COMO SACAR LA DIRECCION DE LA PÁGINA WEB =)
        echo "ESTOY INTENTANDO INSERTAR EN EL MERCADO";
        $ODBC = "enlace_bbdd_php";
        $conn = odbc_connect($ODBC,"", "");
        $id_cadena = "MT";
        $id_mercado = "MercadilloAgricultor"; //PREGUNTARLE A VICKY COMO QUIERE QUE SEA EL ID DE SUPERMERCADOS ;)
        $sql = "IF NOT EXISTS (SELECT * FROM mercado WHERE (Id_mercado='".$id_mercado."')) INSERT INTO mercado(Id_mercado, Nombre, Direccion, Provincia, Longitud, Latitud, Cadena, Isla) VALUES ('".$id_mercado."', 'Mercadillo del Agricultor','".$direccion."','SAN','".$longitud."','".$latitud."','".$id_cadena."' ,'TEN')";
        odbc_exec($conn, $sql) or die("<p>".odbc_errormsg());
        odbc_close($conn);        
    }
    
    function modificar_mercado(){
        $ODBC = "enlace_bbdd_php";
        $conn = odbc_connect($ODBC,"", "");
        $sql = "UPDATE mercado SET Direccion= 'Carretera Tacoronte Tejina'";
        odbc_exec($conn, $sql) or die("<p>".odbc_errormsg());
        odbc_close($conn);          
    }
    
    function mostrar_puntos_mercados(){
        $ODBC = "enlace_bbdd_php";
        $conn = odbc_connect($ODBC,"", ""); 
        $sql = "SELECT * FROM mercado;";
        $resultado = odbc_exec($conn, $sql) or die("<p>".odbc_errormsg());  
        $valores_finales = array();
        while (odbc_fetch_array($resultado)) {
            $punto =odbc_result($resultado,"Nombre");
            $dir = odbc_result($resultado, "Direccion");
            $punto_dir = $punto." - ".$dir;
            array_push($valores_finales, $punto_dir);
            $lng =odbc_result($resultado,"Longitud");
            array_push($valores_finales, $lng);            
            $lat =odbc_result($resultado,"Latitud");
            array_push($valores_finales, $lat);
        } 
        odbc_close($conn);
        return $valores_finales;
    }
    
    function insertar_islas($latitud, $longitud, $isla){
        $codigo_isla = '';
        $resto = strstr($isla, ' ');
        if ($resto){
            $codigo_isla = strtoupper(substr($resto, 1, 3));
        }
        else{
            $codigo_isla = strtoupper(substr($isla, 0, 3));            
        }
        
        $ODBC = "enlace_bbdd_php";
        $conn = odbc_connect($ODBC,"", "");
        $sql = "";
        if (($isla == 'Tenerife') || ($isla == 'El Hierro') || ($isla == 'La Gomera') || ($isla == 'La Palma'))
            $sql = "IF NOT EXISTS (SELECT * FROM islas WHERE Codigo_isla = '".$codigo_isla."')INSERT INTO islas(Codigo_isla, Nombre, Provincia, Longitud, Latitud) VALUES ('".$codigo_isla."','".$isla."','SAN',".$longitud.",".$latitud.")";
        else if(($isla == 'Gran Canaria') || ($isla == 'Fuerteventura') || ($isla == 'Lanzarote'))
            $sql = "IF NOT EXISTS (SELECT * FROM islas WHERE Codigo_isla = '".$codigo_isla."')INSERT INTO islas(Codigo_isla, Nombre, Provincia, Longitud, Latitud) VALUES ('".$codigo_isla."','".$isla."','LAS',".$longitud.",".$latitud.")";
        else    
            echo "No existe la isla seleccionada";
        
        echo "SQL:" . $sql;
        odbc_exec($conn, $sql) or die("<p>".odbc_errormsg());    
        odbc_close($conn);
    }
    
    function mostrar_puntos_islas(){
        $ODBC = "enlace_bbdd_php";
        $conn = odbc_connect($ODBC,"", ""); 
        $sql = "SELECT * FROM islas;";
        $resultado = odbc_exec($conn, $sql) or die("<p>".odbc_errormsg()); 
        $valores_finales = array();
        while (odbc_fetch_array($resultado)) {
            $punto =odbc_result($resultado,"Nombre");
            array_push($valores_finales, $punto);
            $lng =odbc_result($resultado,"Longitud");
            array_push($valores_finales, $lng);            
            $lat =odbc_result($resultado,"Latitud");
            array_push($valores_finales, $lat);
        } 
        odbc_close($conn);
        return $valores_finales;
    }
    
    
    function insertar_provincias($latitud, $longitud, $provincia){
        $codigo_provincia = strtoupper(substr($provincia, 0, 3));
        $coma = strpos($provincia, ',');
        $provincia_final = substr_replace($provincia,'', $coma);
        ECHO "ESTOY ENTRANDO a bbdd";
        $ODBC = "enlace_bbdd_php";
        $conn = odbc_connect($ODBC,"", "");
        $sql = "IF NOT EXISTS (SELECT * FROM provincias WHERE Codigo_provincia = '".$codigo_provincia."')INSERT INTO provincias(Codigo_provincia, Nombre, Longitud, Latitud) VALUES ('".$codigo_provincia."','".$provincia_final."',".$longitud.",".$latitud.")";
        odbc_exec($conn, $sql) or die("<p>".odbc_errormsg());    
        odbc_close($conn);
    }    
    
    function mostrar_puntos_provincias(){
        $ODBC = "enlace_bbdd_php";
        $conn = odbc_connect($ODBC,"", ""); 
        $sql = "SELECT * FROM provincias;";
        $resultado = odbc_exec($conn, $sql) or die("<p>".odbc_errormsg());        
        $valores_finales = array();
        while (odbc_fetch_array($resultado)) {
            $punto =odbc_result($resultado,"Nombre");
            array_push($valores_finales, $punto);
            $lng =odbc_result($resultado,"Longitud");
            array_push($valores_finales, $lng);            
            $lat =odbc_result($resultado,"Latitud");
            array_push($valores_finales, $lat);
        } 
        odbc_close($conn);
        return $valores_finales;
    }
    
?>