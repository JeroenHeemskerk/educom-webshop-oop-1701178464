<?php
include('showMenuItem.php');

function showMenu(){
  echo '<ul class="menu">';
  showMenuItem('home', 'HOME');
  showMenuItem('about', 'ABOUT');
  showMenuItem('contact', 'CONTACT');
  showMenuItem('shop', 'SHOP');
  showMenuItem('top5', 'TOP 5 PAGE');
  if (isset($_SESSION['user'])){
    showMenuItem('logout', 'LOGOUT '.$_SESSION['user']['name']);
  } else {
    showMenuItem('register', 'REGISTER');
    showMenuItem('login', 'LOGIN');
  }
  if (!empty($_SESSION['cart'])){
        showMenuItem('cart', 'SHOPPING CART');
        
      }
  echo '</ul>';
}     
?>