<?php

function showCartItem($productInfo, $number){
  echo '<p><img src="Images/'.$productInfo['imageName'].'", height = 200, width = 300 ></h4><br><h3 class = "name">'.$productInfo['name'].'</h3><br>
  <h4 class = "price">€'.$productInfo['price'].' x '.$number.' = €'.$productInfo['price'] * $number.'</h4></p>';
  return($productInfo['price'] * $number);
}

?>