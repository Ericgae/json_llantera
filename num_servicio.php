<?php
/**
 * 
 */

require 'funciones_paparazzi.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    if (isset($_GET['numero_cotizacion'])) {

        // Obtener parámetro idMeta
        $parametro = $_GET['numero_cotizacion'];
        //$parametro2 = $_GET['password'];

        // Tratar retorno
        $retorno = funciones_paparazzi::servicio($parametro);


        if ($retorno) {

            $ide["estado"] = 1;
            $ide["servicio"] = $retorno;
            // Enviar objeto json de la meta
            print json_encode($ide);
        } else {
            // Enviar respuesta de error general
            print json_encode(
                array(
                    'estado' => '2',
                    'mensaje' => 'No se obtuvo el registro'
                )
            );
        }

    } else {
        // Enviar respuesta de error
        print json_encode(
            array(
                'estado' => '3',
                'mensaje' => 'Se necesita un identificador'
            )
        );
    }
}

