<?php

require_once("libs/template_engine.php");
require_once "models/productos.model.php";

/*function run(){
      $viewData = array();
      $tmpProductos = obtenerProductos();
      $estados = obtenerEstados();
      foreach($tmpProductos as $producto){
          $producto["productoest"] = $estados[$producto["productoest"]];
          $viewData["productos"][] = $producto;
      }
      renderizar("catalogo", $viewData);
}
  run();
*/
function run(){
    $viewData = array();
    $tmpProductos = productos_obtenerTodos();
    foreach($tmpProductos as $producto){
        $viewData["productos"][] = $producto;
    }
    renderizar("m_prods", $viewData,'employee.view.tpl');
}

run();
?>