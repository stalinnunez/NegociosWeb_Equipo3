<?php

require_once("libs/template_engine.php");
require_once 'models/productos.model.php';

function run(){
    $viewData = array();
    $viewData["mode"] = "INS";
    $isPost = false;
    $modeDesc = array(
        "INS"=>"Nuevo",
        "UPD"=>"Edición",
        "DEL"=>"Eliminar",
        "DSP"=>""
      );

    if (isset($_POST["btnAgregar"]) ) {
        $viewData["mode"] = "INS";
        $viewData["title"] = " Producto";
        $isPost = true;
        $tmpLastID = lastID();
        $viewData["productoid"] = $tmpLastID["productoid"] + 1; 
    }
    if (isset($_POST["btnEditar"])) {
        $viewData["mode"] = "UPD";
        $isPost = true;
    }

    if (isset($_POST["btnGuardar"])) {
        $viewData["mode"] = $_POST["mode"];
        $isPost = true;

        $viewData["productoid"] = $_POST["codigo-producto-input"];
        $viewData["productobarra"] = $_POST["codigo-barra-input"];
        $viewData["productodsc"] = $_POST["descripcion-producto-input"];
        $viewData["productoest"] = $_POST["estado-producto-select"];
        $viewData["productocant"] = $_POST["cantidad-producto-input"];

        switch($viewData["mode"]){
            case "INS":
                productos_insert(
                    $viewData["productoid"],
                    $viewData["productobarra"],
                    $viewData["productodsc"],
                    $viewData["productoest"],
                    $viewData["productocant"]
                );

                //soloMensaje("Este el id ".$viewData["productoid"]);
                redirectWithMessage(
                    "Producto Guardado  BIEN Satisfactoriamente",
                    "index.php?page=Mantenimiento"
                );
                break;
            case "UPD":
                productos_update(
                    $viewData["productoid"],
                    $viewData["productodsc"],
                    $viewData["productobarra"],
                    $viewData["productocant"],
                    $viewData["productoest"]
                );
                redirectWithMessage(
                    "Producto Guardado BIEN1 Satisfactoriamente",
                    "index.php?page=Mantenimiento"
                );
                break;
        }
    }
    $viewData["modedsc"] = $modeDesc[$viewData["mode"]];
    if ($isPost) {
        if ($viewData["mode"] !== "INS") {
            $tmpProducto = productos_obtenerPorId($_POST["codigo-producto-input"]);
            $viewData["productoid"] = $_POST["codigo-producto-input"];
            $viewData["productobarra"] = $tmpProducto["productobarra"];
            $viewData["productodsc"] = $tmpProducto["productodsc"];
            $viewData["productoest"] = $tmpProducto["productoest"];
            $viewData["productocant"] = $tmpProducto["productocant"];
        }
        renderizar('editar_productos', $viewData,'employee.view.tpl');
    } else {
        redirectWithMessage("Error de conexión", "index.php?page=Mantenimiento");
    }
}

run();
?>