<?php
require_once "libs/dao.php";
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