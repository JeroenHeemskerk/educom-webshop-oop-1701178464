<?php

require_once "basic_doc.php";

abstract class ProductDoc extends BasicDoc{
  protected function showProductName($name, $size){
    echo '<'.$size.' class="productInfo">'.$name.'<'.$size.'><br>';
  }

  protected function showProductDescription($description, $size){
    echo '<'.$size.' class="productInfo">'.$description.'<'.$size.'><br>';
  } 

  protected function showPicture($file, $height, $width){
    echo '<img src="Images/'.$file.'", height = '.$height.', width = '.$width.' ><br>';
  }

  protected function showPrice($product, $size){
    echo '<'.$size.' class="productInfo">'.$product['price'].'<'.$size.'><br>';
  }

  protected function showShopLink($page, $id, $inCart, $message){
    echo '<a class="button" href="index.php?page='.$page.'&id='.$id.'&inCart='.$inCart.'">'.$message.'</a><br>';
  }

  protected function showProductInfo($product, $page){
    $this -> showPicture($product['imageName'], 200, 300);
    $this -> showProductName($product['name'], 'h2');
    $this -> showPrice($product, 'h3');
    $this -> showShopLink('details', $product['id'], false, 'Naar product');
    $this -> showShopLink($this -> model -> page, $product['id'], true, 'In winkelwagen');
    echo '<br><br>';
  }

  protected function showShopList(){
    if (!isset($this -> model -> order)){
      if (is_array($this -> model -> products)){
        $this -> model -> order  = range(1, count($this -> model -> products));
      } else {
        $this -> model -> order = array('1');
      }
    }
    foreach ($this -> model -> order as $key => $value){
      if (isset($value)){
        $this -> showProductInfo($this -> model -> products[$value], $this -> model -> page);
      }
    }
  }

  protected function showContent(){}
}

?>