<?php
  require_once("libs/dao.php");

  function salt_password($seed, $rawpswd){
    $saltedPswd = "";
    $seed = intval(substr($seed, -2));
    if($seed%2){
      $saltedPswd = $rawpswd . $seed;
    }else{
      $saltedPswd = $seed . $rawpswd;
    }
    return $saltedPswd;
  }




  function registrarUsuario($arrUserData){
    $userid = 0;

    $usuario_email = $arrUserData["usuario_email"];
    $usuario_nombre = $arrUserData["usuario_nombre"];
    $usuario_pswd = $arrUserData["usuario_pswd"];
    $usuario_pswd_cnf = $arrUserData["usuario_pswd_cnf"];

    if ($usuario_pswd !== $usuario_pswd_cnf) return 0;
    //validaciones

    
    $usuario_fchIng = date('Y-m-d H:i:s');
    $usuario_pswd = md5(salt_password($usuario_fchIng,$usuario_pswd));

    $temp_pswd = md5(salt_password($usuario_fchIng,$arrUserData["usuario_pswd"]));


    $sqlinsert= "INSERT INTO usuarios (`usuario_email`, `usuario_nombre`, `usuario_pswd`, `usuario_est`, `usuario_fchIng`, `usuario_exppwd`, `usuario_pwdfail`, `usuario_lstlgn`) VALUES ( '%s', '%s', '%s', 'ACT', '%s', NOW(), '0', NOW());";
    $sqlinsert = sprintf($sqlinsert,$usuario_email,$usuario_nombre,$usuario_pswd,$usuario_fchIng);
    if(ejecutarNonQuery($sqlinsert)){
      return getLastInserId();
    }
    return 0 ;
  }

  function validarUsuario($userEmail, $validTocken){

    return true; //| false
  }

  function autenticarUsuario($arrUserData){
  $arrErrores = array();
  $errores="";
    $usuario_email = $arrUserData["usuario_email"];
    $usuario_pswd = $arrUserData["usuario_pswd"];

    $sqlstr = "Select usuario_id, usuario_email, usuario_pswd, usuario_est, usuario_fchIng, usuario_pwdfail from usuarios where usuario_email = '%s';";
    $sqlstr = sprintf($sqlstr , $usuario_email);
    $usuario = obtenerUnRegistro($sqlstr);
    if(count($usuario)){
      if ($usuario["usuario_est"] == "ACT"){
          $usuario_pswd_cnf = md5(salt_password($usuario["usuario_fchIng"], $usuario_pswd));
          if($usuario_pswd_cnf == $usuario["usuario_pswd"]){
              $sqlupdate = "update usuarios set usuario_pwdfail=0 , usuario_lstlgn='%s' where usuario_id = %d;";
              $sqlupdate = sprintf($sqlupdate, date('Y-m-d H:i:s'), $usuario["usuario_id"]);
              ejecutarNonQuery($sqlupdate);
          }else{
              $errores = "Credenciales no son Válidas.";
              $usuario_est = $usuario["usuario_est"];
              if($usuario["usuario_pwdfail"] >= 3){
                 $usuario_est = 'BLD';
              }
              $sqlupdate = "update usuarios set usuario_pwdfail=%d, usuario_est='%s' where usuario_id = %d;";
              $sqlupdate = sprintf($sqlupdate, ($usuario["usuario_pwdfail"] + 1),
                                                $usuario_est ,
                                                $usuario["usuario_id"]);
              ejecutarNonQuery($sqlupdate);
          }
      }else{
      $errores = "Usuario no se encuentra Activo";
      }
    }else{
      $errores= "No se pudo encontrar el usuario.";
    }
  return $errores;
  }

  function cambiarContrasenia($arrUserData){

    return true; // false;
  }


  function bloquearUsuario($userid){
      return true; //false
  }


  function usuarioExiste($email){

      $sqlstr="select usuario_email from usuarios where usuario_email "./*COLLATE utf8_bin */ "= '%s';";
      $sqlstr = sprintf($sqlstr,$email);
      $registros = array();
      $registros = obtenerRegistrosD($sqlstr);
      $resultado = count($registros);
      return $resultado;
  }


  function obtenerUsuarios(){
    $usuarios = array();
    $sqlstr = "select * from usuarios;";
    $usuarios = obtenerRegistrosD($sqlstr);
    return $usuarios;
  }

  function ObtenerPassword(){
    $sqlstr = "select usuario_pswd FROM usuarios where usuario_id =;";
  }

  ?>
