<?php

  function startSession(){
    session_start();
  }

  function makeCart(){
    if (!isset($_SESSION['cart'])){
      $_SESSION['cart'] = array();
    }
    for ($x = 1; $x !== 6; $x ++){
      if (!isset($_SESSION['cart'][$x])){
        $_SESSION['cart'][$x] = 0;
      }
    }
  }

  function addToCart($id){
    if (isset($_SESSION['cart'][$id])){
      $_SESSION['cart'][$id] += 1;
    } else {      
      $_SESSION['cart'][$id] = 1;
    }
  }

  function numberInCart($id){
    if (isset($_SESSION['cart'][$id])){
      return $_SESSION['cart'][$id];
    }
    return 0;
  }



?>