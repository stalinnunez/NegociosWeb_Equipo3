<?php

  require_once("libs/template_engine.php");

  function run(){
    if (mw_estaLogueado()){
      renderizar("contactanos",array(),'loggedLayout.view.tpl');
      }
    
    else{
      renderizar("contactanos",array());
    }
  }
  run();
?>
