<?php
  // Namespace  
  namespace App\Product;
   
  // Class
  class Printer {
    // Property
    private $products;

    // Methods
    public function addProduct($product) {
      $this->products[] = $product;
    }

    public function printProduct() {
      $text   = "<b>LIST OF PRODUCTS</b> <br />";
      $text  .= "------------------------------------------------------- <br /><br />";
      
      foreach($this->products as $product) {
        $text .= "{$product->getInfoProduct()} <br />";
        $text  .= "------------------------------------------------------- <br /><br />";
      }

      return $text;
    }
  }
?>