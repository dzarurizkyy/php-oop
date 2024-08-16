<?php  
  // Autoload
  spl_autoload_register(function($class){
    $class = explode("\\", $class);
    $class = end($class);

    require_once  __DIR__ . "/Product/" . $class . ".php";
  });

  spl_autoload_register(function($class){
    $class = explode("\\", $class);
    $class = end($class);
    
    require_once  __DIR__ . "/Service/" . $class . ".php";
  })
?>