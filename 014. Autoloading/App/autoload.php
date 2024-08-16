<?php  
  // Autoload
  spl_autoload_register(function($class){
    require_once  __DIR__ . "/Product/" . $class . ".php";
  })
?>