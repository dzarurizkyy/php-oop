<?php  
  // Import File
  require_once "App/autoload.php";

  // Alias
  use App\Product\Printer as ProductPrinter;
  use App\Service\Printer as ServicePrinter;
  
  // Object
  $product[0] = new Book("Atomic Habits", "James Clear", "Gramedia Pustaka Utama", 102400, 356);
  $product[1] = new Game("Only Up", "MoreMoto Games", "MoreMoto Games", 47499, 3, 50);

  // Print
  $print  = new ProductPrinter();
  $footer = new ServicePrinter();

  foreach($product as $data) {
    $print->addProduct($data);
  }

  echo $print->printProduct();
  echo $footer->display();
?>  