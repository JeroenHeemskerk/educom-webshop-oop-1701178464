<?php

include('showCartContent/showCartItem.php');
include('showCartContent/showTotal.php');
include('showCartContent/showCheckoutButton.php');

function showCartContent(){
  $total = 0;
  for ($x = 1; $x<=5; $x++){
    if (isset($_SESSION['cart'][strval($x)])){
      $number = $_SESSION['cart'][strval($x)];
      if ($number > 0 ){
        $productInfo = getProductInfo($x);
        $total += showCartItem($productInfo, $number);
      }
    }
  }
  showTotal($total);
  if ($total != 0){
  showCheckoutButton();
}
}



?>