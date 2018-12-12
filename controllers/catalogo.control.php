<?php

  require_once("libs/template_engine.php");
  require_once("models/prods.model.php");
  require_once("models/carrito.model.php");



  function runt(){


    $productocod = $_GET['productocod'];

   
    

    if(isset($productocod)) {

        $productocod = filter_var($productocod, FILTER_SANITIZE_NUMBER_INT);
       // soloMensaje("Este es el user email: ".$productocod);

        $productoArray = array();
        $productoArray = obtenerProductoPorID($productocod) ;


        CrearOActualizar($_SESSION["email"],$productocod,$productoArray["productoimg"],$productoArray["productodsc"],$productoArray["productoprc"]);
        DisminuirExistenciaUno($productocod);
    }

    $viewData = array();
    $TempProductos = productos_obtenerTodos();
    foreach($TempProductos as $producto){
       /* $producto["productoest"] = $estados[$producto["productoest"]];*/
        $viewData["productos"][] = $producto;
      }



    renderizar("catalogo",$viewData,'loggedLayout.view.tpl');
  }

  runt();
?>
