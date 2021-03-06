<?php
/**
 * PHP Version 5
 * Application Router
 *
 * @category Router
 * @package  Router
 * @author   Orlando J Betancourth <orlando.betancourth@gmail.com>
 * @author   Luis Fernando Gomez Figueroa <lgomezf16@gmail.com>
 * @license  Comercial http://
 *
 * @version 1.0.0
 *
 * @link http://url.com
 */
session_start();
require_once "libs/utilities.php";
$pageRequest = "Inicio";
if (isset($_GET["page"])) {
    $pageRequest = $_GET["page"];
}
//Incorporando los midlewares son codigos que se deben ejecutar
//Siempre
require_once "controllers/mw/verificar.mw.php";
require_once "controllers/mw/site.mw.php";
// aqui no se toca jajaja la funcion de este index es
// llamar al controlador adecuado para manejar el
// index.php?page=modulo
    //Este switch se encarga de todo el enrutamiento público
switch ($pageRequest) {
    //Accesos Publicos
case "Inicio":
    //llamar al controlador
    include_once "controllers/Inicio.control.php";
    die();
case "contactanos":
    include_once "controllers/contactanos.control.php";
    die();
case "productos":
    include_once "controllers/productos.control.php";
    die();
case "nosotros":
    include_once "controllers/nosotros.control.php";
    die();
case "soporte":
    include_once "controllers/soporte.control.php";
    die();
case "login":
    include_once "controllers/login.control.php";
    die();
case "crear":
    include_once "controllers/crear.control.php";
    die();
case "logout":
    mw_setEstaLogueado("",false);
    redirectWithMessage("Ha cerrado su sesion!");
    //remove PHPSESSID from browser
    if ( isset( $_COOKIE[session_name()] ) )
    setcookie( session_name(), “”, time()-3600, “/” );
    //clear session from globals
    $_SESSION = array();
    //clear session from disk
    session_destroy();
    die();
case "mantenimiento":
    if($global_context["usuario_email"]='admin@admin.com') {
        include_once "controllers/m_prods.control.php";
    }       
    die();
case "catalogo":
    $logged = mw_estaLogueado();
    if($logged){
        include_once "controllers/catalogo.control.php";
    }
    die();
case "carrito":
    $logged = mw_estaLogueado();
    if($logged){
        include_once "controllers/carrito.control.php";
    }
case "Mantenimiento":
    include_once "controllers/m_prods.control.php";
    die();    
case "Editar":
    include_once "controllers/editar_productos.control.php";
    die();
}


//Este switch se encarga de todo el enrutamiento que ocupa login
/*
if ($logged) {
    addToContext("layoutFile", "verified_layout");
    include_once 'controllers/mw/autorizar.mw.php';
    if (!isAuthorized($pageRequest, $_SESSION["userCode"])) {
        include_once"controllers/notauth.control.php";
        die();
    }
    generarMenu($_SESSION["userCode"]);
}
require_once "controllers/mw/support.mw.php";
switch ($pageRequest) {
case "dashboard":
    ($logged)?
      include_once "controllers/dashboard.control.php":
      mw_redirectToLogin($_SERVER["QUERY_STRING"]);
    die();
case "users":
    ($logged)?
      include_once "controllers/security/users.control.php":
      mw_redirectToLogin($_SERVER["QUERY_STRING"]);
    die();
case "user":
    ($logged)?
      include_once "controllers/security/user.control.php":
      mw_redirectToLogin($_SERVER["QUERY_STRING"]);
    die();
case "roles":
    ($logged)?
      include_once "controllers/security/roles.control.php":
      mw_redirectToLogin($_SERVER["QUERY_STRING"]);
    die();
case "rol":
    ($logged)?
      include_once "controllers/security/rol.control.php":
      mw_redirectToLogin($_SERVER["QUERY_STRING"]);
    die();
case "programas":
    ($logged)?
      include_once "controllers/security/programas.control.php":
      mw_redirectToLogin($_SERVER["QUERY_STRING"]);
    die();
case "programa":
    ($logged)?
      include_once "controllers/security/programa.control.php":
      mw_redirectToLogin($_SERVER["QUERY_STRING"]);
    die();
}*/
addToContext("pageRequest", $pageRequest);
require_once "controllers/error.control.php";