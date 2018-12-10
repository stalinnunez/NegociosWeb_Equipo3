<?php
   require_once("libs/parameters.php");

   $conexion = new mysqli($server, $user, $pswd ,
                          $database, $port);

   if($conexion->connect_errno){
        //die();
        die($conexion->connect_error);
   }
   function obtenerRegistros(&$conexion, $sqlstr){
       $resultado = array();
       if($conexion){
           $cursor = $conexion->query($sqlstr);
           if($cursor){
               foreach($cursor as $registro){
                   $resultado[] = $registro;
               }
           }
       }
       return $resultado;
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


   function obtenerUnRegistro($sqlstr, &$conexion = null){
        if(!$conexion) global $conexion;
        $result = $conexion->query($sqlstr);
        $resultArray = array();

        $resultArray = $result->fetch_assoc();

        return $resultArray;
   }


   function ejecutarNonQuery($sqlstr, &$conexion = null){
        if(!$conexion) global $conexion;
        $result = $conexion->query($sqlstr);
        return $conexion->affected_rows;
   }


   function valstr($str, &$conexion = null){
      if(!$conexion) global $conexion;
      return $conexion->escape_string($str);
   }



   function getLastInserId(&$conexion = null){
     if(!$conexion) global $conexion;
     return $conexion->insert_id;
   }

   function ejecutarNoQuery(&$conexion, $sqlstr){
       if($conexion){
           //Cuando son updates o Inserts devuelve false si falla el query.
           return $conexion->query($sqlstr);
       }
       return false;
   }
   /*
   function obtenerUltimoID(&$conn){
       return $conn->insert_id;
   }


/*


   $conn = new mysqli($server, $user, $pswd ,
                          $database, $port);


       if($conn->errno!=0){
           die("Error de Conexion a la DB");
       }


       $conn->set_charset('utf8');
/*
       function obtenerRegistros(&$conn, $sqlstr){
           $resultado = array();
           if($conn){
               $cursor = $conn->query($sqlstr);
               if($cursor){
                   foreach($cursor as $registro){
                       $resultado[] = $registro;
                   }
               }
           }
           return $resultado;
       }
  */

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
/*
       function ejecutarNoQuery(&$conn, $sqlstr){
           if($conn){
               //Cuando son updates o Inserts devuelve false si falla el query.
               return $conn->query($sqlstr);
           }
           return false;
       }



       function obtenerUltimoID(&$conn){
           return $conn->insert_id;
       }

/*
       function valstr($str, &$conn = null){
          if(!$conn) global $conn;
          return $conn->escape_string($str);
       }
*/
/*
       function ejecutarNonQuery($sqlstr, &$conn = null){
        if(!$conn) global $conn;
        $result = $conn->query($sqlstr);
        return $conn->affected_rows;
   }

*/

?>
