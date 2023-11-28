<?php

function showProductInfo($productInfo){
  echo '<p class = "product"><img src="Images/'.$productInfo['imageName'].'", height = 200, width = 300 ></h4><h3 class = "name">'
  .$productInfo['name'].'</h3><h4 class = "price">€'.$productInfo['price'].'</h4></p>';
}

?>