<?php

  require_once("libs/template_engine.php");
  require_once("models/prods.model.php");
  require_once("models/carrito.model.php");



  function runy(){
    $viewData = array();

    $productocod = $_GET['productocod'];

   
    

    if(isset($productocod)) {


        $Productoinstance = array();
        $productocod = filter_var($productocod, FILTER_SANITIZE_NUMBER_INT);
       // soloMensaje("Este es el user email: ".$productocod);

        $Productoinstance = obtenerCantidadProductos($_SESSION["email"],$productocod);

        EliminarProductoCarrito($productocod,$_SESSION["email"]);
        RestaurarExistencia($productocod,$Productoinstance['productocant']);
    }


    
    $TempProductos = ObtenerListadoProductosCarrito($_SESSION["email"]);
    foreach($TempProductos as $producto){
       /* $producto["productoest"] = $estados[$producto["productoest"]];*/
        $viewData["productos"][] = $producto;
    }


    renderizar("carrito",$viewData,'loggedLayout.view.tpl');
  }

  runy();
?>
