<?php

include_once ("../views/basic_doc.php");

$myData = array('page' => 'home');
$view = new BasicDoc($myData);

$view -> show();

?>