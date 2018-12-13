<?php

require_once("libs/template_engine.php");


function run(){
  if (mw_estaLogueado()){
    renderizar("soporte",array(),'loggedLayout.view.tpl');
    }
  
  else{
    renderizar("soporte",array());
  }
}
run();
?>