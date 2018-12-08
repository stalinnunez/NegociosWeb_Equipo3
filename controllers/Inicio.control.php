<?php

  require_once("libs/template_engine.php");

  function run(){
       addCssRef("public/css/Base.css");
    if (mw_estaLogueado()){
      renderizar("Inicio",array(),"loggedLayout.view.tpl");
    }else{
      renderizar("Inicio",array());
    }
  }


  run();
?>