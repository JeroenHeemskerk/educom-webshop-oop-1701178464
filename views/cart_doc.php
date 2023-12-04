<?php

require_once "product_doc.php";

class CartDoc extends ProductDoc{
  protected function showTitle(){
    echo '<title>Cart</title>';
  }

  protected function showHeader(){
    echo '<h1 class="title">Cart</h1>';
  }
  
  protected function showPrice($product, $size){
    $id = $product['id'];
    if (isset($this -> data['cart'][$id]) && $this -> data['cart'][$id] > 0){
      echo '<'.$size.' class="productInfo">€'.$product['price'].' x '.$this -> data['cart'][$id].' = €'.
      $product['price'] * $this -> data['cart'][$id].'<'.$size.'><br>';
    }
  }

  private function showTotal($total){
    echo '<h3 class="productInfo">Totaal: '.$total.'</h3><br><br>';
  }

  private function showCheckoutButton(){
    echo '<h3><a class="button" href="index.php?page=cart&checkout='.true.'">Afrekenenen</a></h3>';
  }

  protected function showContent(){
    $this -> showShopList();
    $this -> showTotal($this -> data['total']);
    if (isset($_SESSION['user'])){
      $this -> showCheckoutButton();
    }
  }
}

?>