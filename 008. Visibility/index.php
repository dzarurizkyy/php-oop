<?php  
  // Class
  class Product {
    // Property
    private $title,
            $author,
            $publisher,
            $type;

    protected $price;

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
      $text  = "<b>Type</b>       : {$this->type} <br />";
      $text .= "<b>Product</b>    : {$this->getLabel()} <br />";
      $text .= "<b>Publisher</b>  : {$this->publisher} <br />";
      $text .= "<b>Price</b>      : Rp{$price} <br />";

      return $text;
    }
  }

  // Inheritance
  class Book extends Product {
    // Visibility
    private $total_page;
    
    // Overriding
    public function __construct($title, $author, $publisher, $price, $total_page) {
      parent::__construct("Book", $title, $author, $publisher, $price);
      $this->total_page = $total_page;
    }

    public function getInfo() {
      $text  = parent::getInfo();
      $text .= "<b>Total Page</b> : {$this->total_page} pages <br />";
      return $text;
    }
  }

  class Game extends Product {
    // Visibility
    private $total_hour,
            $discount;
    
    // Overriding
    public function __construct($title, $author, $publisher, $price, $total_hour, $discount) {
      parent::__construct("Game", $title, $author, $publisher, $price);
      $this->total_hour =  $total_hour;
      $this->discount   =  $discount;
      $this->price      -= $price * $discount / 100;
    }

    public function getInfo() {
      $text  = parent::getInfo();
      $text .= "<b>Total Hour</b> : {$this->total_hour} hours <br />";
      return $text;
    }
  }

  // Object
  $product[0] = new Book("Atomic Habits", "James Clear", "Gramedia Pustaka Utama", 102400, 356);
  $product[1] = new Game("Only Up", "MoreMoto Games", "MoreMoto Games", 47499, 3, 50);

  // Print
  foreach($product as $index => $data) {
    echo "<b>List</b> : " . ++$index . "<br />";
    echo $data->getInfo() . "<br />";;
  }
?>  