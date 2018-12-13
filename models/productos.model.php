<?php
  require_once("libs/dao.php");

  //Obtener el ultimo id de producto
  function lastID(){
    $sqlstrLast = "select productoid from productos order by productoid desc limit 1;";
    $ID = array();
    $ID = obtenerUnRegistro($sqlstrLast);
    return $ID;
  }

  // Obtener Todos los Productos
  function productos_obtenerTodos(){
    $sqlstr = "select * from productos;";
    $productos = array();
    $productos = obtenerRegistros_prod($sqlstr);
    return $productos;
  }
  //Obtener Todos los Productos por Filtro

  function productos_obtenerPorDescripcion($productodsc){
    $sqlstr = "select * from productos where productodsc like '%s';";
    $sqlstr = sprintf($sqlstr,$productodsc."%s");
    $productos = array();
    $productos = obtenerRegistros_prod($sqlstr);
    return $productos;
  }

  function productos_obtenerPorId($id){
    $sqlstr = "select * from productos where productoid=%d;";
    $sqlstr = sprintf($sqlstr,$id);
    $producto = array();
    $producto = obtenerUnRegistro($sqlstr);
    return $producto;
  }

  function productos_insert($id, $barra, $desc, $estado, $cant){
    $sqlstr = "INSERT INTO productos (productocod, productodsc, productobarra, productocant ,productoest) values(%d,'%s','%s',%d,'%s');";
    $sqlstr = sprintf($sqlstr,$id,$desc,$barra,$cant,$estado);
    return ejecutarNonQuery($sqlstr);
  }

  function productos_update($id, $desc, $barra,$cant,$estado){
    $sqlstr = "Update productos set productodsc='%s', productobarra='%s',productocant=%d,productoest='%s' where productoid=%d;";
    $sqlstr = sprintf($sqlstr,$desc,$barra,$cant,$estado,$id);
    return ejecutarNonQuery($sqlstr);
  }

  function productos_delete($id){
    $sqlstr = "Delete from productos where productoid=%d;";
    $sqlstr = sprintf($sqlstr,$id);
    return ejecutarNonQuery($sqlstr);
  }

  function obtenerProductos(){
    $sqlstr = "select * from productos;";
    return obtenerRegistros_prod($sqlstr);
  }
  function obtenerProductoPorID($productocod)
  {
      $sqlstr = "select * from productos where productocod=%d;";
      return obtenerUnRegistro(sprintf($sqlstr, $productocod));
  }
  function  guardarNuevoProducto(
      $productocod,
      $productosbarra,
      $productodesc,
      $productoest,
      $productocant
      
  ) {
          $sqlins = "INSERT INTO `productos` (
  `productobarra`, `productodsc`, `productoest`,'productocant')
  VALUES('%s','%s','%s',
  %d,'%s');";
          $result = ejecutarNonQuery(
              sprintf(
                  $sqlins,
                  $productobarra,
                  $productodsc,
                  $productoest,
                  $productocant
              )
          );
    if ($result && true) {
        return getLastInserId();
    } else {
        return 0;
    }
  }
  function editarProducto(
      $productocod,
      $productosbarra,
      $productodesc,
      $productocant,
      $productoest
  ) {
          $sqlupd = "UPDATE productos set 
          productosbarra = '%s',
          productodesc = '%s',
          productodesccrt = '%s',
          categoriacod = %d,
          productoest = '%s',
          productotip = '%s'
          where  productocod = %d;";
          $result = ejecutarNonQuery(
              sprintf(
                  $sqlupd,
                  $productosbarra,
                  $productodesc,
                  $categoriacod,
                  $productoest,
                  $productocod
              )
          );
    return ($result && true) ;
  }
  function eliminarProducto(
      $productocod
  ) {
          $sqldel = "DELETE FROM productos
          where  productocod = %d;";
          $result = ejecutarNonQuery(
              sprintf(
                  $sqldel,
                  $productocod
              )
          );
    return ($result && true) ;
  }
  //ACT INA DES RET WRK
  function obtenerEstados(){
    return array(
      "ACT" =>"Activo",
      "INA" =>"Inactivo",
      "DES" => "Descontinuado",
      "RET" => "Retirado",
      "WRK" => "En proceso"
    );
  }
  function obtenerEstadosAssoc(){
    $arrEstado = array();
    foreach(obtenerEstados() as $codigo=>$desc){
      $arrEstado[] = array(
        "codigo" => $codigo,
        "descripcion" => $desc
      );
    }
  }

?>