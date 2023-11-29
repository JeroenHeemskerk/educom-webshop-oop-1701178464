<?php

include_once ("../views/shop_doc.php");

$myData = array('page' => 'home', 'products' => array(), 'order' => array('1'));
$myData['products']['1'] = array('id' => '2', 'name' => 'kaas', 'description' => 'Een kilo kaas', 
                                 'price' => '16,99', 'imageName' => '');
$view = new ShopDoc($myData);

$view -> show();

?>