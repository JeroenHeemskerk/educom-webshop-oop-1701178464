<?php

include_once ("../views/details_doc.php");

$myData = array('page' => 'home', 'products' => array(), 'id' => '1', 'order' => array('1'));
$myData['products']['1'] = array('id' => '2', 'name' => 'kaas', 'description' => 'Een kilo kaas', 
                                 'price' => '16,99', 'imageName' => '');
$view = new DetailsDoc($myData);

$view -> show();

?>