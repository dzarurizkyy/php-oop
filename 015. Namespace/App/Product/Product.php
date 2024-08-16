<?php  
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
?>