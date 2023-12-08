<?php
require_once 'crud.php';

$crud = new Crud();

/*$row = $crud -> readOneRow('SELECT * FROM users WHERE email = :email', array(':email' => '2'));

var_dump($row);

$id = $crud -> createRow('INSERT INTO users (email, name, password) VALUES(:email, :name, :password)', 
                          array(':email' => 'hoi@hoi.nl', ':name' => 'hoi', ':password' => 'hoi'));

var_dump('id');


$rows = $crud -> readManyRows('SELECT * FROM users', array());

var_dump($rows);
*/

$crud -> updateRow('UPDATE users SET email = :email WHERE email = :email2', 
                          array(':email' => 'hallo@hoi.nl', ':email2' => 'hoi@hoi.nl'));

$crud -> deleteRow('DELETE FROM users WHERE email = :email', array(':email' => 'hallo@hoi.nl'));


?>