<?php
require_once 'crud.php';
require_once 'user_crud.php';
require_once 'shop_crud.php';

$testCrud = new Crud();
$testUserCrud = new ShopCrud($testCrud);

$orderId = $testUserCrud -> createOrder(2);
$testUserCrud -> createOrderLine($orderId, 3, 8);
?>