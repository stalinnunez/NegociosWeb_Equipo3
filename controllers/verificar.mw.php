<?php
//middleware de verificación


    function mw_estaLogueado(){
        if( isset($_SESSION["userLogged"]) && $_SESSION["userLogged"] == true){
          addToContext("usuario_email", $_SESSION["userName"]);
        
          return true;
        }else{
          $_SESSION["userLogged"] = false;
          $_SESSION["userName"] = "";
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


    // IDEA:


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
    // IDEA:

    function mw_redirectToLogin($to){
        $loginstring = urlencode("?".$to);
        $url = "index.php?page=login&returnUrl=".$loginstring;
        header("Location:" . $url);
        die();
    }



?>
