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

  // Object
  $product[0] = new Product("Atomic Habits", "James Clear", "Gramedia Pustaka Utama", 102400);
  $product[1] = new Product("5 Second Rule", "Mel Robbins", "Gemilang", 62100);

  // Print
  foreach($product as $index => $data) {
    echo "<b>Book " . ++$index . "</b> : " . $data->getLabel();
    echo "<br />";
  };
?>  