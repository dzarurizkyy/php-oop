<?php  
  // Class
  class Product {
    // Property
    public $title,
           $author,
           $publisher,
           $price,
           $type;

    // Constructor
    public function __construct($type, $title, $author, $publisher, $price) {
      $this->type       = $type;
      $this->title      = $title;
      $this->author     = $author;
      $this->publisher  = $publisher;
      $this->price      = $price;
    }

    // Method
    public function getLabel() {
      return "$this->title, $this->author";
    }

    public function getInfo() {
      $price = number_format($this->price, 0, ",", ".");
      $text  = "<b>Type</b>      : {$this->type} <br />";
      $text .= "<b>Product</b>   : {$this->getLabel()} <br />";
      $text .= "<b>Publisher</b> : {$this->publisher} <br />";
      $text .= "<b>Price</b>     : Rp{$price} <br />";

      return $text;
    }
  }

  // Inheritance
  class Book extends Product {
    public $total_page;
    
    // Overriding
    public function __construct($type, $title, $author, $publisher, $price, $total_page) {
      parent::__construct($type, $title, $author, $publisher, $price);
      $this->total_page = $total_page;
    }

    public function getInfo() {
      $text  = parent::getInfo();
      $text .= "<b>Total Page</b> : {$this->total_page} pages <br />";
      return $text;
    }
  }

  class Game extends Product {
    public $total_hour;
    
    // Overriding
    public function __construct($type, $title, $author, $publisher, $price, $total_hour) {
      parent::__construct($type, $title, $author, $publisher, $price);
      $this->total_hour = $total_hour;
    }

    public function getInfo() {
      $text  = parent::getInfo();
      $text .= "<b>Total Hour</b> : {$this->total_hour} hours <br />";
      return $text;
    }
  }

  // Object
  $product[0] = new Book("Book", "Atomic Habits", "James Clear", "Gramedia Pustaka Utama", 102400, 356);
  $product[1] = new Game("Game", "Only Up", "MoreMoto Games", "MoreMoto Games", 47499, 3);

  // Print
  foreach($product as $index => $data) {
    echo "<b>List</b> : " . ++$index . "<br />";
    echo "{$data->getInfo()} <br />";
  }
?>  