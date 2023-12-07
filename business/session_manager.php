<?php

class SessionManager{

  public function startSession(){
    session_start();
  }

  public function makeCart(){
    if (!isset($_SESSION['cart'])){
      $_SESSION['cart'] = array();
    }
    for ($x = 1; $x !== 6; $x ++){
      if (!isset($_SESSION['cart'][$x])){
        $_SESSION['cart'][$x] = 0;
      }
    }
  }

  public function addToCart($id){
    if (isset($_SESSION['cart'][$id])){
      $_SESSION['cart'][$id] += 1;
    } else {      
      $_SESSION['cart'][$id] = 1;
    }
  }

  public function numberInCart($id){
    if (isset($_SESSION['cart'][$id])){
      return $_SESSION['cart'][$id];
    }
    return 0;
  }

  public function loginUser($name, $id){
    $_SESSION['user'] = array('name' => $name, 'id' => $id);
  }

  public function emptyCart(){
    unset($_SESSION['cart']);
  }

  public function isLoggedIn(){
    return(!empty($_SESSION['user']));
  }

  public function logoutUser(){
    session_unset();
    session_destroy();
  }

  public function getUserName(){
    return $_SESSION['user']['name'];
  }

  public function getUserId(){
    return $_SESSION['user']['id'];
  }

  public function getCart(){
    if (isset($_SESSION['cart'])){
      return $_SESSION['cart'];
    } else {
      return array();
    }
  }
}

?>