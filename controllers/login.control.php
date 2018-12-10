<?php

  require_once("libs/template_engine.php");
  require_once("models/usuarios.model.php");
  function run(){
    $arrayForLogin = array(
      "usuario_email" => "",
      "usuario_pswd" => "",
      "returnurl" =>""
    );

    if(isset($_POST["usuario_email"])){
      $errores = autenticarUsuario($_POST);
      if($errores != "")
      {
      redirectWithMessage($errores,"index.php?page=Inicio");

      //if(count($errores)){
        //$arrayForLogin["errores"] = $errores;
      //}
      }
      else{
        //$_SESSION["usuario_email"] = $_POST["usuario_email"];
        $returnurl = (isset($_POST["returnurl"]))? (urldecode($_POST["returnurl"])||"index.php"):"index.php";
        mw_setEstaLogueado($_POST["usuario_email"],true);
        //redirectWithMessage("Credenciales Validadas.",$returnurl);
        //redirectWithMessage("Credenciales Validadas.","index.php?page=home");
        header('Location: index.php?page=Inicio');

      }
    }
    $arrayForLogin["returnurl"] = (isset($_GET["returnUrl"]))?$_GET["returnUrl"]:"";

    renderizar("login",$arrayForLogin);
  }


  run();
?>
