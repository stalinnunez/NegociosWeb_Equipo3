<?php

function obtenerCarretillaCliente(){
    if(isset($_COOKIE["crtid"])){
        return $_COOKIE["crtid"];
    }else{
        require_once("models/carretilla.php");
        $carretillaID = nuevaCarretilla();
        setcookie("crtid", $carretillaID);
        return $carretillaID;
    }
}


if(mw_estaLogueado()){
  require_once("models/carretilla.php");
  addToContext("ctdcarretilla",obtenerCtdProducto(obtenerCarretillaCliente()));
}


/*
if($method == "get"){
  require_once("models/carretilla.php");
  setData("ctdcarretilla",obtenerCtdProducto(obtenerCarretillaCliente()));
}
*/





/*
    $app_errores = array();
    if(isset($_SESSION["app_errores"])){
        $app_errores = $_SESSION["app_errores"];
    }

    function agregarError($cod, $error){
        global $app_errores;
        $app_errores[] = array("codigo"=>$cod,"error"=>$error);
        $_SESSION["app_errores"] = $app_errores;
    }

    function limpiarErrors(){
        global $app_errores;
        $app_errores = array();
        $_SESSION["app_errores"] = $app_errores;
    }

    function obtenerErrores(){
        global $app_errores;
        return $app_errores;
    }
*/
/*
    function obtenerCarretillaCliente(){
        if(isset($_COOKIE["crtid"])){
            return $_COOKIE["crtid"];
        }else{
            //crear la cabecera de carretilla
            //obtener el id del carretilla
            require_once("models/carretilla.php");
            $carretillaID = nuevaCarretilla();
            setcookie("crtid", $carretillaID);
            return $carretillaID;
        }
    }
*/
/*
function obtenerCarretillaCliente(){
    if(isset($_COOKIE["crtid"])){
        return $_COOKIE["crtid"];
    }else{
        //crear la cabecera de carretilla
        //obtener el id del carretilla
        require_once("models/carretilla.php");
        $carretillaID = nuevaCarretilla();
        setcookie("crtid", $carretillaID);
        return $carretillaID;
    }
}

    if($method == "get"){
      require_once("models/carretilla.php");
      setData("ctdcarretilla",obtenerCtdProducto(obtenerCarretillaCliente()));
    }
    */
/*
    //security midleware
    function loguear($id){
        $_SESSION["userid"] = $id;
    }
    function logout(){
        $_SESSION["userid"] = "";
        unset($_SESSION["userid"]);
    }

    function estaLogueado(){
        if(isset($_SESSION["userid"])){
            return $_SESSION["userid"] && true;
        }
        return false;
    }

    if(estaLogueado()){
        setData("security",array(array("userid"=>$_SESSION["userid"])));
    }else{
        setData("isnotlogged",array(array("nl"=>true)));
    }
    */







?>
