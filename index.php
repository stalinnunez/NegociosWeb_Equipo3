<?php

    session_start();
     date_default_timezone_set("America/Tegucigalpa");

    require_once("libs/utilities.php");

    $pageRequest = "Inicio";

    if(isset($_GET["page"])){
      $pageRequest = $_GET["page"];
    }

    require_once("controllers/verificar.mw.php");
    require_once("controllers/site.mw.php");

    $method = "get";
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $method="post";
        }
        
     require_once("controllers/middleware.php");

    //Este switch se encarga de todo el enrutamiento
    switch($pageRequest){
        case "Inicio":
            //llamar al controlador
            require_once("controllers/Inicio.control.php");
            break;
            case "login":
              require_once("controllers/login.control.php");
              break;
            case "productos":
            require_once("controllers/productos.control.php");
            break;
            case "productosSinLogin":
            require_once("controllers/productosSinLogin.control.php");
            break;
            case "addCrt":
            require_once("controllers/carretilla.control.php");
            break;
            case "vision":
            require_once("controllers/vision.control.php");
            break;
            case "responsabilidad":
            require_once("controllers/responsabilidad.control.php");
            break;
            case "misionValores":
            require_once("controllers/misionValores.control.php");
            break;
            case "soporte":
            require_once("controllers/soporte.control.php");
            break;
            case "contactenos":
            require_once("controllers/contactenos.control.php");
            break;
            case "sugerencias":
            require_once("controllers/sugerencias.control.php");
            break;
            case "carretilla":
            require_once("controllers/carretilla.control.php");
            break;
        case "logout":
           mw_setEstaLogueado("",false);
           redirectWithMessage("Ha cerrado sesión satisfactoriamente!");
          //soloMensaje("¿Desea cerrar sesión?");
            break;
            case "usuario":
            require_once("controllers/usuario.control.php");
            break;
        default:
            require_once("controllers/error.control.php");
    }
?>