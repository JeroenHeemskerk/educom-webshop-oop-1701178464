<?php
require_once 'crud.php';
require_once 'user_crud.php';

$testCrud = new Crud();
$testUserCrud = new UserCrud($testCrud);

$testUserCrud -> createUser('naam2', 'email2', 'pass2');
var_dump($testUserCrud -> readUserByEmail('email1'));

$testUserCrud -> updateUser(array('name' => 'naam3', 'email' => 'email1', 'password' => 'pass2'), 'email1');
var_dump($testUserCrud -> readUserByEmail('email1'));
?>