<?php

  require_once("libs/template_engine.php");
  require_once("models/usuarios.model.php");

  function run(){


    $txtNombre = "";
    $txtMail = "";


    if(isset($_SESSION["SsNombre"])){
      $txtNombre = $_SESSION["SsNombre"];
      $txtMail = $_SESSION["SsEmail"];
    }

     $arrData = array();
    if(isset($_POST["btnGuardar"]))
    {
      $txtMail = $_POST["txtMail"];
      $txtNombre = $_POST["txtNombre"];
      $txtPswd = $_POST["txtPswd"];
      $txtPswdConf = $_POST["txtPswdConf"];
      if($txtNombre == "" || $txtMail == "" || $txtPswd == "" || $txtPswdConf == "")
      {
        $_SESSION["SsNombre"]=$txtNombre;
        $_SESSION["SsEmail"]=$txtMail;
        redirectWithMessage("Llenar todos los campos","index.php?page=crear");
      }
      else
      {
        if(usuarioExiste($txtMail) > 0)
        {$_SESSION["SsNombre"]=$txtNombre;
        $_SESSION["SsEmail"]="";
        redirectWithMessage("Email ya existe","index.php?page=crear");
        }
        else
        {
          if( $txtPswd != $txtPswdConf ){
            $_SESSION["SsNombre"]=$txtNombre;
            $_SESSION["SsEmail"]=$txtMail;
            redirectWithMessage("Las contraseñas no son iguales","index.php?page=crear");
          }
          else
          {
            $arrData = array(
              "usuario_nombre" => $txtNombre,
              "usuario_email" => $txtMail,
              "usuario_pswd" => $txtPswd,
              "usuario_pswd_cnf" => $txtPswdConf
            );
            if(registrarUsuario($arrData))
            {
              session_destroy();
              redirectWithMessage("Ingresado Satisfactoriamente.","index.php?page=crear");
            }
          }
        }
      }
    }
    $data = array("txtNombre" => $txtNombre,
                  "txtMail" => $txtMail,
                  );
    renderizar("crear",$data);
  }
  run();
?>
