<?php
    require_once("libs/dao.php");
    function nuevoCarrito($useremail,$productocod){
        global $conexion;
        $sqlinstr="INSERT INTO carrito_prod (usuario_email,productocod,productocant) VALUES ('%s',%d,1);";



        ejecutarNonQuery(sprintf($sqlinstr,$useremail,$productocod));
       // return getLastInserId($conexion);
    }


    function obtenerCantidadProductos($useremail,$productocod){
        //global $conexion;
        $sqlStr = "select * from carrito_prod where usuario_email = '%s' and productocod = %d;";
        $numLinea = obtenerUnRegistro(
                    sprintf($sqlStr,$useremail,$productocod));
        return $numLinea;
    }


    function ObtenerListadoProductosCarrito($useremail){
        //global $conexion;
        $sqlStr = "select * from carrito_prod where usuario_email = '%s';";

        $myregister = array();

        $myregister = obtenerRegistros($conexion,sprintf($sqlStr,$useremail));
       // soloMensaje("adsadsadas");
        return $myregister;
    }

    function AgregarMasCarrito($useremail,$productocod){
        global $conexion;
        $sqlupt ="update carrito_prod SET productocant = productocant + 1 where usuario_email = '%s' and productocod = %d;";
        ejecutarNonQuery(sprintf($sqlinstr,$useremail,$productocod));
    }

    function CrearVenta($useremail){
        $totalMoney;
        $codactual;
        global $conexion;

        $tempList = ObtenerListadoProductosCarrito($useremail);

        foreach($tempList as $productoActual){
            $codactual = $productoActual["productocod"];
            $totalMoney += ObtenerProdPrecio($productoActual["productocod"]);
        }

        $sqlStr = "INSERT INTO ventas (usuario_email,totalcant) VALUES('%s',%d);";
        ejecutarNonQuery(sprintf($sqlStr,$useremail,$totalMoney));

    }

    function LimpiarCarrito($useremail){
        global $conexion;

        $sqlstr = "DELETE FROM carrito_prod where usuario_email = '%s';";
        ejecutarNonQuery(sprintf($sqlstr,$useremail));
    }

    function EliminarProductoCarrito($carritocod,$useremail){
        global $conexion;

        $sqlstr = "DELETE FROM carrito_prod where usuario_email = '%s' and productocod = %d;";
        ejecutarNonQuery(sprintf($sqlstr,$useremail,$carritocod));
    }
    /*function CarritoExiste($useremail,$productocod){
        global $conexion;
        $sqlstr = "Select * from carrito_prod where usuario_email = %s and productocod = %d";

        $existe = array();
        $existe = obtenerUnRegistro(sprintf($sqlstr,$useremail,$productocod));
        
        soloMensaje("Este es la cantidad de existencia".$existe["productocant"]);

        return $existe;
    }*/

    function CrearOActualizar($useremail,$productocod,$productoimg,$productdsc,$productoprc){
        global $conexion;
        $sqlstr = "INSERT INTO carrito_prod (usuario_email,productocod,productocant,productoimg,productodsc,productoprc) VALUES ('%s',%d,1,'%s','%s','%d') ON DUPLICATE KEY UPDATE productocant=productocant+1;";

        ejecutarNonQuery(sprintf($sqlstr,$useremail,$productocod,$productoimg,$productdsc,$productoprc));
    }








/*















    function guardarLinea($carretillaID, $linea, $productoID){
        global $conexion;
        $sqlInsert = "INSERT INTO carretilla_d (carretillaid, carretillaln, productoid, carrCtd, carrPrc, carrIva) select %d, %d, %d, 1, prodPrc, prodIva from productos where productoid = %d;";
        return ejecutarNoQuery($conexion,
                        sprintf($sqlInsert,$carretillaID,$linea,$productoID,$productoID)
                        );
    }
    function obtenerCtdProducto($carretillaId){
        global $conexion;
        $sqlstr = "select count(*) as productos from carretilla_d where carretillaid = %d;";
        return obtenerRegistro($conexion,sprintf($sqlstr, $carretillaId))["productos"];
    }


    function obtenerProductosCarretillaXId($carretillaId){
        global $conexion;
        $sqlstr = "SELECT a.carretillaid, a.carretillaln,  a.productoid, b.producto, a.carrCtd, a.CarrPrc, a.carrIva FROM carretilla_d a inner join productos b on a.productoid = b.productoid where carretillaid = %d order by a.carretillaln;";
        return obtenerRegistros($conexion,sprintf($sqlstr, $carretillaId));
    }

    function eliminarProductoDeCarrito($CarritoID,$ProductId){
      global $conexion;
      $sqlstr = "delete from carrito_prod where carrito_id = %d and productocod = %d ;";
      $resultado = ejecutarNoQuery($conexion,sprintf($sqlstr,valstr($txtln)));
      return $resultado;
    }

/*
    function obtenerLineaDeCarretillaEstatica($txtln){
      global $conn;
      $numln=0;
      $sqlstr = "select carretillaln as carretillaln from carretilla_d where carretillaln = %d;";
      $numln = obtenerRegistro($conn,sprintf($sqlstr,$txtln))["carretillaln"];
      return $numln;
    }

    function obtenerLineaDeCarretillaEstatica($txtln){
      global $conexion;
      $sqlstr = "select carretillaln from carretilla_d where carretillaln = %d;";
      return obtenerRegistro($conexion,sprintf($sqlstr,$txtln))["carretillaln"];
    }

    function limpiarCarretilla(){
    global $conexion;
    $sqlstr = "delete from carretilla_d;";
    $resultado = ejecutarNoQuery($conexion,$sqlstr);
    return $resultado;
    }*/

?>
