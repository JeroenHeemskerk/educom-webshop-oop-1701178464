<?php

include "basic_doc.php";

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

  protected function showPrice($price, $size){
    echo '<'.$size.' class="productInfo">'.$price.'<'.$size.'><br>';
  }

  protected function showShopLink($id, $inCart, $message){
    echo '<a class="button" href="index.php?page=details&id='.strval($id).'&inCart='.$inCart.'">'.$message.'</a><br>';
  }

  protected function showProductInfo($product){
    $this -> showPicture($product['imageName'], 200, 300);
    $this -> showProductName($product['name'], 'h2');
    $this -> showPrice($product['price'], 'h3');
    $this -> showShopLink($product['id'], false, 'Naar product');
    echo '<br><br>';
  }

  protected function showShopList($data){
    foreach ($data['order'] as $value){
      $this -> showProductInfo($data['products'][$value]);
    }
  }

  protected function showContent(){
    $this -> showShopList($this -> data);
  }
}

?>