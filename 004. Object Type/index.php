<?php  
  // Class
  class Product {
    // Property
    public $title,
           $author,
           $publisher,
           $price;

    // Constructor
    public function __construct($title, $author, $publisher, $price) {
      $this->title      = $title;
      $this->author     = $author;
      $this->publisher  = $publisher;
      $this->price      = $price;
    }

    // Method
    public function getLabel() {
      return "$this->title, $this->author";
    }
  }

  class PrintProduct {
    // Object Type
    public function print(Product $product) {
      $text  = "<b>Book</b>      : "   . $product->getLabel() . "<br>";
      $text .= "<b>Publisher</b> : "   . $product->publisher . "<br>";
      $text .= "<b>Price</b>     : Rp" . number_format($product->price, 0, ",", ".") . "<br>";
      return $text;
    }
  }

  // Object
  $product[0] = new Product("Atomic Habits", "James Clear", "Gramedia Pustaka Utama", 102400);
  $product[1] = new Product("5 Second Rule", "Mel Robbins", "Gemilang", 62100);
  $print      = new PrintProduct();

  // Print
  foreach($product as $data) {
    echo $print->print($data) . "<br>";
  }
?>  