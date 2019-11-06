<?php
/**
 * Obtiene todas las metas de la base de datos
 */

require 'funciones_paparazzi.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    // Manejar petición GET
    $persona = funciones_paparazzi::getAll();

    if ($persona) {
        
    
       $datos["estado"] = 1;
        $datos["persona"] = $persona;   

        print json_encode($datos);  
    } else {
        print json_encode(array(
            "estado" => 2,
            "mensaje" => "Ha ocurrido un error"
        ));
    }
}


