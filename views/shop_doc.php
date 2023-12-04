<?php

require_once "product_doc.php";

class ShopDoc extends ProductDoc{
  protected function showTitle(){
    echo '<title>Shop</title>';
  }

  protected function showHeader(){
    echo '<h1 class="title">Shop</h1>';
  }

  protected function showContent(){
    $this -> showShopList();
  }
}

?>