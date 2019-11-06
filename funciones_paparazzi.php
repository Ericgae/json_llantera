<?php

/**
 * Representa el la estructura de las metas
 * almacenadas en la base de datos
 */
require 'Database.php';

class funciones_paparazzi
{
    function __construct()
    {
    }

    /**
     * Retorna en la fila especificada de la tabla 'meta'
     *
     * @param $idMeta Identificador del registro
     * @return array Datos del registro
     */
    public static function getAll()
    {
    
        $consulta = "SELECT * FROM articulo";
        

        try 
        {

        // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute();

            return $comando->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            return false;
        }
    }
    /**
     * Retorna en la fila especificada de la tabla 'meta'
     *
     * @param $idMeta Identificador del registro
     * @return array Datos del registro
     */
    public static function getfoto()
    {
    
        $consulta = "SELECT imagen FROM foto_evento";
        

        try 
        {

        // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute();

            return $comando->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            return false;
        }
    }


    /**
     * Obtiene los campos de una meta con un identificador
     * determinado
     *
     * @param $idMeta Identificador de la meta
     * @return mixed
     */
    public static function getById($fk_evento)
    {
        // Consulta de la meta
        $consulta = "SELECT foto 
                            FROM foto_evento,Descripcion
                             WHERE fk_evento= ?";

        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute(array($fk_evento));
            // Capturar primera fila del resultado
            $row = $comando->fetch(PDO::FETCH_ASSOC);
            return $row;

        } catch (PDOException $e) {
            // Aquí puedes clasificar el error dependiendo de la excepción
            // para presentarlo en la respuesta Json
            return -1;
        }
    }
     /**
     * Insertar un nuevo Alumno
     *@param $n_evento
     * @param $lugar      nombre del nuevo registro
     * @param $fecha dirección del nuevo registro
     *@param $hora
     *@param $codigo
     *@param $fk_usuario
     *@param $fotoEvento
     * @return PDOStatement
     */
    public static function insert(
        $n_evento,
        $lugar,
        $fecha,
        $hora,
        $codigo,
        $fk_usuario
        
    
    )
    {
        // Sentencia INSERT
        $comando = "INSERT INTO eventos( " .
            "n_evento," .
            " lugar," .
            " fecha," .
            " hora," .
            " codigo," .
            " fk_usuario)" .
             " VALUES(?,?,?,?,?,?)";
           

        // Preparar la sentencia
        $sentencia = Database::getInstance()->getDb()->prepare($comando);

        return $sentencia->execute(
            array(
                $n_evento,
                $lugar,
                $fecha,
                $hora,
                $codigo,
                $fk_usuario
                
        )
        );

    }
    /**
     * Insertar un nuevo Usuario
     *@param $n_usuario
     *
     * @param $correo dirección del nuevo registro
     *@param $password
     *
     * @return PDOStatement
     */
    public static function insert2(
        $nitrogeno,
        $tipo_poliza,
        $alineacion,
        $balatas,
        $suspencion,
        $llantas,
        $baterias,
        $pulido_faro,
        $rotacion,
        $llanta_desecha,
        $especificacion,
        $fkVenta
        
    )
    {
        // Sentencia INSERT
        $comando = "INSERT INTO multipuntos( " .
            "nitrogeno," .
            " tipo_poliza," .
             "alineacion," .
            " balatas," .
             "suspencion," .
            " llantas," .
             "baterias," .
            " pulido_faro," .
             "rotacion," .
            " llanta_desecha," .
            "especificacion," .
            " fkVenta)" .
             " VALUES( ?,?,?,?,?,?,?,?,?,?,?,?)";
           

        // Preparar la sentencia
        $sentencia = Database::getInstance()->getDb()->prepare($comando);

        return $sentencia->execute(
            array(
                $nitrogeno,
        $tipo_poliza,
        $alineacion,
        $balatas,
        $suspencion,
        $llantas,
        $baterias,
        $pulido_faro,
        $rotacion,
        $llanta_desecha,
        $especificacion,
        $fkVenta

            )
        );

    }

 public static function insert3(

 $imagen,
 $fk_evento,
 $Descripcion
    )
    {
        // Sentencia INSERT
        $comando = "INSERT INTO foto_evento( " .
            "imagen," .
            "fk_evento,".
            "Descripcion)" .
             " VALUES( ?,?,?)";
           

        // Preparar la sentencia
        $sentencia = Database::getInstance()->getDb()->prepare($comando);

        return $sentencia->execute(
            array(
                $imagen,
                $fk_evento,
                $Descripcion

            )
        );

}



    /**
     * Insertar un nuevo Usuario
     *@param $usuario
     * @param $pasw      nombre del nuevo registro
    *
     *
     * @return PDOStatement
     */
    public static function login(
        $usuario,
        $password

   
    )
    {
          // Consulta de la meta
        $consulta = "SELECT COUNT(*),idEmpleado FROM empleado WHERE usuario=? AND password=?";

        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute(array($usuario,$password));
            // Capturar primera fila del resultado
            $row = $comando->fetch(PDO::FETCH_ASSOC);
            return $row;

        } catch (PDOException $e) {
            // Aquí puedes clasificar el error dependiendo de la excepción
            // para presentarlo en la respuesta Json
            return -1;
        }
    
    }
 public static function servicio(
        $numero_cotizacion
        

   
    )
    {
          // Consulta de la meta
        $consulta = "SELECT COUNT(*),cotizaciones_demo2.numero_cotizacion, articulo.nombre, detalle_cotizacion_demo2.cantidad FROM cotizaciones_demo2,articulo,detalle_cotizacion_demo2 WHERE articulo.idarticulo=detalle_cotizacion_demo2.id_producto AND cotizaciones_demo2.numero_cotizacion=?";

        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute(array($numero_cotizacion));
            // Capturar primera fila del resultado
            $row = $comando->fetch(PDO::FETCH_ASSOC);
            return $row;

        } catch (PDOException $e) {
            // Aquí puedes clasificar el error dependiendo de la excepción
            // para presentarlo en la respuesta Json
            return -1;
        }
    
    }
   
    
    public static function eventoId(
        $numero_cotizacion

   
    )
    {
          // Consulta de la meta
        $consulta = "SELECT * FROM cotizaciones_demo2, cliente,automovil,empleado,persona, detalle_cotizacion_demo2, articulo WHERE cliente.idcliente= cotizaciones_demo2.fkcliente AND persona.idpersona=cliente.fkPersona AND cliente.idcliente= automovil.fkCliente AND cotizaciones_demo2.id_cotizacion= detalle_cotizacion_demo2.numero_cotizacion AND articulo.idarticulo= detalle_cotizacion_demo2.id_producto AND cotizaciones_demo2.numero_cotizacion=?";

        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute(array($numero_cotizacion)); 
            // Capturar primera fila del resultado
            $row = $comando->fetch(PDO::FETCH_ASSOC);
            return $row;

        } catch (PDOException $e) {
            // Aquí puedes clasificar el error dependiendo de la excepción
            // para presentarlo en la respuesta Json
            return -1;
        }
    
    }
}

    