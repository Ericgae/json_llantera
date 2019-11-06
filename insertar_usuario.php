<?php
/**
 * Insertar un nuevo alumno en la base de datos
 */

require 'funciones_paparazzi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Decodificando formato Json
    $body = json_decode(file_get_contents("php://input"), true);

    // Insertar pizza
    $retorno = funciones_paparazzi::insert2(
        $body['nitrogeno'],
        $body['tipo_poliza'],
        $body['alineacion'],
        $body['balatas'],
        $body['suspencion'],
        $body['llantas'],
        $body['baterias'],
        $body['pulido_faro'], 
        $body['rotacion'],
        $body['llanta_desecha'], 
        $body['especificacion'], 
        $body['fkVenta']);

    if ($retorno) {
        $json_string = json_encode(array("estado" => 1,"mensaje" => "Creacion correcta"));
		echo $json_string;
    } else {
        $json_string = json_encode(array("estado" => 2,"mensaje" => "No se creo el registro"));
		echo $json_string;
    }
}

?>