<?php
  require_once("libs/dao.php");

  // Obtener Todos los Productos
  function productos_obtenerTodos(){
    $sqlstr = "select * from productos;";
    $productos = array();
    $productos = obtenerRegistros($sqlstr);
    return $productos;
  }
  //Obtener Todos los Productos por Filtro

  function productos_obtenerPorNombre($nombre){
    $sqlstr = "select * from productos where productodsc like '%s';";
    $sqlstr = sprintf($sqlstr,$nombre."%");
    $productos = array();
    $productos = obtenerRegistros($sqlstr);
    return $productos;
  }

  function productos_obtenerPorId($id){
    $sqlstr = "select * from productos where productoid=%d;";
    $sqlstr = sprintf($sqlstr,$id);
    $producto = array();
    $producto = obtenerUnRegistro($sqlstr);
    return $producto;
  }

  function productos_insert($cod,$nom, $barra){
    $sqlstr = "Insert into productos(productocod, productodsc, productobarra) value('%s','%s','%s');";
    $sqlstr = sprintf($sqlstr,$cod,$nom,$barra);
    return ejecutarNonQuery($sqlstr);
  }

  function productos_update($id, $cod, $nom, $barra){
    $sqlstr = "Update productos set productocod = '%s', productodsc='%s', productobarra='%s' where productoid=%d;";
    $sqlstr = sprintf($sqlstr,$cod,$nom,$barra,$id);
    return ejecutarNonQuery($sqlstr);
  }

  function productos_delete($id){
    $sqlstr = "Delete from productos where productoid=%d;";
    $sqlstr = sprintf($sqlstr,$id);
    return ejecutarNonQuery($sqlstr);
  }

  function obtenerProductos(){
    $sqlstr = "select * from productos;";
    return obtenerRegistros($sqlstr);
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
      $productodesccrt,
      $categoriacod,
      $productoest,
      $productotip
  ) {
          $sqlins = "INSERT INTO `productos` (
  `productosbarra`, `productodesc`, `productodesccrt`,
  `categoriacod`, `productoest`, `productotip`)
  VALUES('%s','%s','%s',
  %d,'%s','%s');";
          $result = ejecutarNonQuery(
              sprintf(
                  $sqlins,
                  $productosbarra,
                  $productodesc,
                  $productodesccrt,
                  $categoriacod,
                  $productoest,
                  $productotip
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
      $productodesccrt,
      $categoriacod,
      $productoest,
      $productotip
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
                  $productodesccrt,
                  $categoriacod,
                  $productoest,
                  $productotip,
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