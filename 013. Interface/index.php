<?php  
  // Interface
  interface ProductInfo {
    public function getInfoProduct();
  }

  // Abstract
  abstract class Product {
    // Property
    private           $title,
                      $author,
                      $publisher,
                      $type,
                      $discount;
    protected static  $number = 1;
    protected         $price;

    // Constructor
    public function __construct($type, $title, $author, $publisher, $price, $discount) {
      $this->type       = $type;
      $this->title      = $title;
      $this->author     = $author;
      $this->publisher  = $publisher;
      $this->discount   = $discount;
      $this->price      = $price - ($price * $discount / 100);
    }

    // Abstract
    protected abstract function getInvoice();

    // Static
    public static function formatRupiah($price) {
      return "Rp" . number_format($price, 0, ",", ".");
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
      return $this->price;
    }

    public function getDiscount() {
      return $this->discount;
    }

    // Method
    public function getLabel() {
      return "$this->title, $this->author";
    }
  }

  // Class
  class Printer {
    private $products;

    public function addProduct(Product $product) {
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

  // Inheritance
  class Book extends Product implements ProductInfo {
    // Visibility
    private $total_page;
    
    // Overriding
    public function __construct($title, $author, $publisher, $price, $total_page, $discount = 0) {
      parent::__construct("Book", $title, $author, $publisher, $price, $discount);
      $this->total_page = $total_page;
    }

    // Method
    public function getInvoice() {
      $text  = "<b>List</b>       : " . parent::$number++ . "<br />";
      $text .= "<b>Type</b>       : {$this->getType()} <br />";
      $text .= "<b>Product</b>    : {$this->getLabel()} <br />";
      $text .= "<b>Publisher</b>  : {$this->getPublisher()} <br />";
      $text .= "<b>Discount</b>   : {$this->getDiscount()}% <br />";
      $text .= "<b>Price</b>      : " . parent::formatRupiah($this->getPrice()) . "<br />";
      $text .= "<b>Total Page</b> : {$this->total_page} pages <br />";
      return $text;
    }

    public function getInfoProduct() {
      return $this->getInvoice();
    }
  }

  class Game extends Product implements ProductInfo {
    // Visibility
    private $total_hour;

    // Overriding
    public function __construct($title, $author, $publisher, $price, $total_hour, $discount = 0) {
      parent::__construct("Game", $title, $author, $publisher, $price, $discount);
      $this->total_hour =  $total_hour;
    }

    // Method
    public function getInvoice() {
      $text  = "<b>List</b>       : " . parent::$number++ . "<br />";
      $text .= "<b>Type</b>       : {$this->getType()} <br />";
      $text .= "<b>Product</b>    : {$this->getLabel()} <br />";
      $text .= "<b>Publisher</b>  : {$this->getPublisher()} <br />";
      $text .= "<b>Discount</b>   : {$this->getDiscount()}% <br />";
      $text .= "<b>Price</b>      : " . parent::formatRupiah($this->getPrice()) . "<br />";
      $text .= "<b>Total Hour</b> : {$this->total_hour} hours <br />";
      return $text;
    }

    public function getInfoProduct() {
      return $this->getInvoice();
    }
  }

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