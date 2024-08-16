<?php  
  // Inheritance
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
?>