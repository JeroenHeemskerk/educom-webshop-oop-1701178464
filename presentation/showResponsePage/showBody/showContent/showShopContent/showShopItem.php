<?php

include('showProductInfo.php');
include('showShopLink.php');

function showShopItem($x){
  $productInfo = getProductInfo($x);
  showProductInfo($productInfo);
  showShopLink($x, false, 'Link naar het product');
  echo '<br><br>';
}

?>