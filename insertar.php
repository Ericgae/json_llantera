<?php
/**
 * Insertar un nuevo alumno en la base de datos
 */

require 'funciones_paparazzi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Decodificando formato Json
    $body = json_decode(file_get_contents("php://input"), true);

    // Insertar pizza
    $retorno = funciones_paparazzi::insert(
        $body['n_evento'],
        $body['lugar'],
        $body['fecha'],
        $body['hora'],
        $body['codigo'],
        $body['fk_usuario']);
    

    if ($retorno) {
        $json_string = json_encode(array("estado" => 1,"mensaje" => "Creacion correcta"));
		echo $json_string;
    } else {
        $json_string = json_encode(array("estado" => 2,"mensaje" => "No se creo el registro"));
		echo $json_string;
    }
}

?>   
