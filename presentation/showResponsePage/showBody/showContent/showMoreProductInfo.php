<?php

function showMoreProductInfo($productInfo){
  echo '<p><br><img src="Images/'.$productInfo['imageName'].'", height = 400, width = 600 >'.
  '<br><h2 class = "name">'.$productInfo['name'].'</h2><br><h3 class = "price">€'.$productInfo['price'].
  '</h3><br><h3 class = "description">'.$productInfo['description'].'</h3></p><br><br>';
}

?>