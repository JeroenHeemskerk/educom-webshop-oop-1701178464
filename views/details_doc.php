<?php

require_once "product_doc.php";

class DetailsDoc extends ProductDoc{
  protected function showTitle(){
    echo '<title>Details</title>';
  }

  protected function showHeader(){
    echo '<h1 class="Details">Shop</h1>';
  }

  protected function showProductInfo($product, $page = 'details'){
    $this -> showPicture($product['imageName'], 400, 600);
    $this -> showProductName($product['name'], 'h2');
    $this -> showProductDescription($product['description'], 'h3');
    $this -> showPrice($product, 'h3');
    $this -> showAvgStars($product);
    if ($this -> model -> isLoggedIn){
      $this -> showMyStars($product);
    }
    $this -> showShopLink('details', $product['id'], true, 'In mandje');
    echo '<br><br>';
  }

  protected function showContent(){
    $this -> showShopList();
  }
}

?>