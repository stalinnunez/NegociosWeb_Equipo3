<?php
   require_once("libs/parameters.php");

   $conexion = new mysqli($server, $user, $pswd ,
                          $database, $port);

   if($conexion->connect_errno){
        //die();
        die($conexion->connect_error);
   }

   
   function obtenerRegistros_prod($sqlstr, &$conexion = null){
        if (!$conexion) {
            global $conexion;
        } 
        $result = $conexion->query($sqlstr);
        if ($conexion->connect_errno ) {
            error_log($conexion->connect_error);
        } 
        $resultArray = array();

        if (isset($result) && $result != '' ) {
            foreach ($result as $registro ) {
                $resultArray[] = $registro;
            }
            $result->free();
        }
        return $resultArray;
   }


/**
 * Obtener Registros
 *
 * @param string $sqlstr   Cadena SQL a ejecutar
 * @param object $conexion Objecto de Conexión por Referencia
 * 
 * @return array
 */
function obtenerRegistros(&$conexion = null , $sqlstr)
{
    if (!$conexion) {
        global $conexion;
    } 
    $result = $conexion->query($sqlstr);
    if ($conexion->connect_errno ) {
        error_log($conexion->connect_error);
    } 
    $resultArray = array();

    if (isset($result) && $result != '' ) {
        foreach ($result as $registro ) {
            $resultArray[] = $registro;
        }
        $result->free();
    }
    return $resultArray;
}




   function obtenerRegistrosD($sqlstr, &$conexion = null){
        if(!$conexion) global $conexion;
        $result = $conexion->query($sqlstr);
        $resultArray = array();
        foreach($result as $registro){
            $resultArray[] = $registro;
        }
        return $resultArray;
   }
/**
 * Obtener Registro
 *
 * @param string $sqlstr   Cadena SQL a ejecutar
 * @param object $conexion Objecto de Conexión por Referencia
 * 
 * @return array
 */
function obtenerUnRegistro($sqlstr, &$conexion = null ) 
{
    if (!$conexion) {
        global $conexion;
    }
    $result = $conexion->query($sqlstr);
    if ($conexion->errno ) {
        error_log($conexion->error);
    }
    $resultArray = array();
    $resultArray = $result->fetch_assoc();
    $result->free();
    return $resultArray;
}

 /**
 * Ejecuta query sin resultado Update, Insert o Delete
 *
 * @param string $sqlstr   Cadena SQL a ejecutar
 * @param object $conexion Objecto de Conexión por Referencia
 * 
 * @return integer Número de Registro Afectados
 */
function ejecutarNonQuery($sqlstr, &$conexion = null)
{
    if (!$conexion ) {
        global $conexion;
    } 
    $result = $conexion->query($sqlstr);
    if ($conexion->errno ) {
        error_log($conexion->error);
    }
    return $conexion->affected_rows >= 0; 
}


/**
 * Convierta Cadenas de Texto Peligrosas en Sanas para Queries
 *
 * @param string $str      Cadena de Texto a sanear
 * @param object $conexion Objecto de Conexión por Referencia 
 * 
 * @return string
 */
function valstr($str, &$conexion = null)
{
    if (!$conexion ) {
        global $conexion;
    } 
    return $conexion->escape_string($str);
}

/**
 * Obtiene el Último Autonumérico generado
 *
 * @param object $conexion Objecto de Conexión por Referencia 
 * 
 * @return integer
 */
function getLastInserId(&$conexion = null) 
{
    if (!$conexion ) {
        global $conexion;
    } 
    return $conexion->insert_id;
}

/**
 * Termina la Transacción en Mysql
 *
 * @param boolean $commit   Verdadero Confirma los Cambios en la Base de Datos
 * @param object  $conexion Objecto de Conexión por Referencia
 * 
 * @return void
 */
function terminarTransaccion($commit=true,&$conexion = null)
{
    if (!$conexion) {
        global $conexion;
    } 
    if ($commit && true ) {
        $conexion->commit();
        if ($conexion->errno ) {
            error_log($conexion->error);
        }
    } else {
        $conexion->rollback();
        if ($conexion->errno ) {
            error_log($conexion->error);
        }
    }
}

/**
 * Inicia la Transacción en Mysql
 *
 * @param object $conexion Objecto de Conexión por Referencia
 * 
 * @return void
 */
function iniciarTransaccion(&$conexion = null ) 
{
    if (!$conexion) {
        global $conexion;
    } 
    $conexion->begin_transaction(MYSQLI_TRANS_START_READ_WRITE);
    if ($conexion->errno ) {
        error_log($conexion->error);
    }
}



       function obtenerRegistro(&$conexion, $sqlstr){
           $resultado = array();
           if($conexion){
               $cursor = $conexion->query($sqlstr);
               if($cursor){
                   foreach($cursor as $registro){
                       $resultado = $registro;
                       break;
                   }
               }
           }
           return $resultado;
       }


?>
