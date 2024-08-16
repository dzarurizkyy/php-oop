<?php  
  // Import File
  require "App/autoload.php";

  // Object
  $product[0] = new Book("Atomic Habits", "James Clear", "Gramedia Pustaka Utama", 102400, 356);
  $product[1] = new Game("Only Up", "MoreMoto Games", "MoreMoto Games", 47499, 3, 50);

  // Print
  $print = new Printer();
  
  foreach($product as $data) {
    $print->addProduct($data);  
  }

  echo $print->printProduct();
?>  