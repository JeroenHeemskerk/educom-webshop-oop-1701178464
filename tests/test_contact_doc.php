<?php

include_once ("../views/contact_doc.php");

$myData = array('page' => 'contact');
$view = new ContactDoc($myData);

$view -> show();

?>