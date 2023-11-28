<?php

function showShopLink($x, $inCart, $message){
  echo '<a class="button" href="index.php?page=details&id='.strval($x).'&inCart='.$inCart.'">'.$message.'</a>';
}

?>