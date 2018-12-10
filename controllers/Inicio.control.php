<?php

  require_once("libs/template_engine.php");

  function run(){
    if (mw_estaLogueado()){
      renderizar("Inicio",array(),'loggedLayout.view.tpl');
    }else{
      renderizar("Inicio",array());
    }
  }


  run();
?>
