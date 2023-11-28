<?php

include('showMoreProductInfo.php');

function showDetailsContent($id){
  $productInfo = getProductInfo($id);
  showMoreProductInfo($productInfo);
  if (isset($_SESSION['user'])){
    showShopLink($id, 'true', 'toevoegen aan winkelwagen');
  }
}




?>