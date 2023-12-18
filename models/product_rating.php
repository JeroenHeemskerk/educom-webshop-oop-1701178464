<?php

class ProductRating{
  public $productId;

  public $rating;

  public function __construct($productId, $rating){
    $this -> productId = $productId;
    $this -> rating = $rating;
  }
}


?>