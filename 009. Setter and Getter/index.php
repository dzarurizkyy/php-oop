<?php  
  // Class
  class Product {
    // Property
    private $title,
            $author,
            $publisher,
            $type,
            $discount;

    protected $price;

    // Constructor
    public function __construct($type, $title, $author, $publisher, $price, $discount = 0) {
      $this->type       = $type;
      $this->title      = $title;
      $this->author     = $author;
      $this->publisher  = $publisher;
      $this->discount   = $discount;
      $this->price      = $price - ($price * $discount / 100);
    }

    // Setter
    protected function setType($type) {
      $this->type = $type;
    }

    protected function setTitle($title) {
      $this->title = $title;
    }

    protected function setAuthor($author) {
      $this->author = $author;
    }

    protected function setPublisher($publisher) {
      $this->publisher = $publisher;
    }

    protected function setPrice($price) {
      $this->price = $price;
    }

    protected function setDiscount($discount) {
      $this->discount = $discount;
    }

    // Getter
    public function getType() {
      return $this->type;
    }

    public function getTitle() {
      return $this->title;
    }

    public function getAuthor() {
      return $this->author;
    }

    public function getPublisher() {
      return $this->publisher;
    }

    public function getPrice() {
      $price = number_format($this->price, 0, ",", ".");
      return "Rp{$price}";
    }

    public function getDiscount() {
      return "$this->discount%";
    }

    // Method
    public function getLabel() {
      return "$this->title, $this->author";
    }

    public function getInfo() {
      $text  = "<b>Type</b>       : {$this->type} <br />";
      $text .= "<b>Product</b>    : {$this->getLabel()} <br />";
      $text .= "<b>Publisher</b>  : {$this->publisher} <br />";
      $text .= "<b>Discount</b>   : {$this->getDiscount()} <br />";
      $text .= "<b>Price</b>      : {$this->getPrice()} <br />";
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
    private $total_hour;

    // Overriding
    public function __construct($title, $author, $publisher, $price, $total_hour, $discount) {
      parent::__construct("Game", $title, $author, $publisher, $price, $discount);
      $this->total_hour =  $total_hour;
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