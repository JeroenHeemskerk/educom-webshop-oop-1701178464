<?php

include('showShopContent/showShopItem.php');

function showShopContent(){
  for($x = 1; $x <= 5; $x++){
    showShopItem($x);    
  }
}

?>