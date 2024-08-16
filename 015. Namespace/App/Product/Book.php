<?php  
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
      $text = "<b>List</b>       : " . parent::$number++ . "<br />";
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
?>