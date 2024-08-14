<?php  
  // Class
  class Product {
    // Property
    public $title,
           $author,
           $publisher,
           $price;

    // Method
    public function getLabel() {
      return "$this->title, $this->author";
    }
  }

  // Object
  for($i = 0; $i < 2; $i++) {
    $product[$i] = new Product();
  }

  $product[0]->title      = "Atomic Habits";
  $product[0]->author     = "James Clear";
  $product[0]->publisher  = "Gramedia Pustaka Utama";
  $product[0]->price      = 102400;

  $product[1]->title      = "5 Second Rule";
  $product[1]->author     = "Mel Robbins";
  $product[1]->publisher  = "Gemilang";
  $product[1]->price      = 62100;

  // Print
  foreach($product as $index => $data) {
    echo "<b>Book " . ++$index . "</b> : " . $data->getLabel();
    echo "<br />";
  };
?>  