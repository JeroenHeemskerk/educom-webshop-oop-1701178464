<?php
require_once 'crud.php';
require_once 'user_crud.php';

$testCrud = new Crud();
$testUserCrud = new UserCrud($testCrud);

$testUserCrud -> createUser(array('name' => 'naam1', 'email' => 'email1', 'password' => 'pass1'));
var_dump($testUserCrud -> readUserByEmail('email1'));

$testUserCrud -> updateUser(array('name' => 'naam2', 'email' => 'email1', 'password' => 'pass2'), 'email1');
var_dump($testUserCrud -> readUserByEmail('email1'));
?>