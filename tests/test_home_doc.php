<?php

include_once ("../views/home_doc.php");

$myData = array('page' => 'home');
$view = new HomeDoc($myData);

$view -> show();

?>