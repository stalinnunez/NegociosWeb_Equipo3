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
      redirectWithMessage($_POST["usuario_email"].email.$_POST["usuario_pswd"],"index.php?page=Inicio");

      }
      else{
        $returnurl = (isset($_POST["returnurl"]))? (urldecode($_POST["returnurl"])||"index.php"):"index.php";
        mw_setEstaLogueado($_POST["usuario_email"],true);       
        $_SESSION["email"] = $_POST["usuario_email"];
        header('Location: index.php?page=Inicio');
      }
    }
    $arrayForLogin["returnurl"] = (isset($_GET["returnUrl"]))?$_GET["returnUrl"]:"";

    renderizar("login",$arrayForLogin);
  }


  run();
?>
