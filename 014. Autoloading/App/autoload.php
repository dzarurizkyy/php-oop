<?php  
  // Autoload
  spl_autoload_register(function($class){
    require  __DIR__ . "/Product/" . $class . ".php";
  })
?>