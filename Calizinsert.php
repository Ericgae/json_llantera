<?php
/**
 * Insertar  en la base de datos
 */

require 'funciones_paparazzi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Decodificando formato Json
    $body = json_decode(file_get_contents("php://input"), true);

    // Insertar pizza
    $retorno = funciones_paparazzi::insert3(
        $body['imagen'],
        $body['fk_evento'],
        $body['Descripcion']);

    if ($retorno) {
        $json_string = json_encode(array("estado" => 1,"mensaje" => "Creacion correcta"));
		echo $json_string;
    } else {
        $json_string = json_encode(array("estado" => 2,"mensaje" => "No se creo el registro"));
		echo $json_string;
    }
}

?>