<?php
//middleware de verificación
require_once("libs/utilities.php");


    function mw_estaLogueado(){
        if( isset($_SESSION["userLogged"]) && $_SESSION["userLogged"] == true){
          addToContext("usuario_email", $_SESSION["userName"]);
          /*soloMensaje("eSTAS LOGEDO");*/
          return true;
        }else{
          $_SESSION["userLogged"] = false;
          $_SESSION["userName"] = "";
          /*soloMensaje("NO ESTAS LOGEDO");*/
          return false;
        }
    }
    function mw_setEstaLogueado($usuario, $logueado){
        if($logueado){
            $_SESSION["userLogged"] = true;
            $_SESSION["userName"] = $usuario;
        }else{
            $_SESSION["userLogged"] = false;
            $_SESSION["userName"] = "";
        }
    }


    function llamarEstaLogueado()
    {
      $usuarioLogueado="";
      if( isset($_SESSION["userLogged"]) && $_SESSION["userLogged"] == true)
      {
            $_SESSION["userLogged"] = true;
            $usuarioLogueado=$_SESSION["userName"];
        }
        else
        {
          $_SESSION["userLogged"] = false;
          $_SESSION["userName"] = "";
          $usuarioLogueado="";
        }
          return $usuarioLogueado;
    }


    function mw_redirectToLogin($to){
        $loginstring = urlencode("?".$to);
        $url = "index.php?page=login&returnUrl=".$loginstring;
        header("Location:" . $url);
        die();
    }



?>
