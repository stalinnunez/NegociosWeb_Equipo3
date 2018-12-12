<?php

  require_once("libs/utilities.php");
  require_once("libs/template_engine.php");

  function run(){
    if (mw_estaLogueado()){

      
      if($_SESSION["email"] == 'admin@admin.com'){

        renderizar("Inicio",array(),'employee.view.tpl');
      }
      else{
      renderizar("Inicio",array(),'loggedLayout.view.tpl');
      }
    }
    else{
      renderizar("Inicio",array());
    }
  }


  run();
?>
