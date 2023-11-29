<?php

require_once "product_doc.php";

class CartDoc extends ProductDoc{
  protected function showTitle(){
    echo '<title>Cart</title>';
  }

  protected function showHeader(){
    echo '<h1 class="title">Cart</h1>';
  }

  protected function showTotal($total){
    echo '<h3 class="productInfo">Totaal: '.$total.'</h3><br><br>';
  }

  protected function showContent(){
    $this -> showShopList($this -> $data);
    $this -> showTotal($this -> data['total']);
  }
}

?>