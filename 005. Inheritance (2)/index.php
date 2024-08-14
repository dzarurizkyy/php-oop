<?php  
  // Class
  class Product {
    // Property
    public $title,
           $author,
           $publisher,
           $price,
           $total_page,
           $total_hour,
           $type;

    // Constructor
    public function __construct($title, $author, $publisher, $price, $total_page, $total_hour) {
      $this->title      = $title;
      $this->author     = $author;
      $this->publisher  = $publisher;
      $this->price      = $price;
      $this->total_page = $total_page;
      $this->total_hour = $total_hour;

      if ($total_page !== 0 && $total_hour === 0) {
        $this->type = "Book";
      }

      if ($total_page === 0 && $total_hour !== 0) {
        $this->type = "Game";
      } 

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
    public function getInfo() {
      $price = number_format($this->price, 0, ",", ".");
      $text  = "<b>Type</b>         : {$this->type} <br />";
      $text .= "<b>Product</b>      : {$this->getLabel()} <br />";
      $text .= "<b>Publisher</b>    : {$this->publisher} <br />";
      $text .= "<b>Price</b>        : Rp{$price} <br />";
      $text .= "<b>Total Page</b>   : {$this->total_page} pages <br />";

      return $text;
    }
  }

  class Game extends Product {
    public function getInfo() {
      $price = number_format($this->price, 0, ",", ".");
      $text  = "<b>Type</b>         : {$this->type} <br />";
      $text .= "<b>Product</b>      : {$this->getLabel()} <br />";
      $text .= "<b>Publisher</b>    : {$this->publisher} <br />";
      $text .= "<b>Price</b>        : Rp{$price} <br />";
      $text .= "<b>Total Hour</b>   : {$this->total_hour} hours <br />";

      return $text;
    }
  }

  // Object
  $product[0] = new Book("Atomic Habits", "James Clear", "Gramedia Pustaka Utama", 102400, 356, 0);
  $product[1] = new Game("Only Up", "MoreMoto Games", "MoreMoto Games", 47499, 0, 3);

  // Print
  foreach($product as $index => $data) {
    echo "<b>List</b> : " . ++$index . "<br />";
    echo "{$data->getInfo()} <br />";
  }
?>  