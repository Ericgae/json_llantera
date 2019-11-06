<?php
/**
 * Obtiene el detalle de una meta especificada por
 * su identificador "idMeta"
 */

require 'funciones_paparazzi.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    if (isset($_GET['fk_evento'])) {

        // Obtener parámetro idMeta
        $parametro = $_GET['fk_evento'];

        // Tratar retorno
        $retorno = funciones_paparazzi::getById($parametro);


        if ($retorno) {

            $foto["estado"] = 1;
            $foto["fto"] = $foto;
            // Enviar objeto json de la meta
            print json_encode($foto);
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

