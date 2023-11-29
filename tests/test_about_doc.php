<?php

include_once ("../views/about_doc.php");

$myData = array('page' => 'about');
$view = new HomeDoc($myData);

$view -> show();

?>