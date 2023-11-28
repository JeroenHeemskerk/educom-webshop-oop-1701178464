<?php
function showHeader($page, $id){
  switch ($page){
    case 'home':
      echo '<h1 class="title">Home</h1>';
      break;
    case 'about': 
      echo '<h1 class="title">About</h1>';
      break;
    case 'contact':
      echo '<h1 class="title">Contact</h1>';
      break;
    case 'register':
      echo '<h1 class="title">Register</h1>';
      break;
    case 'login': 
      echo '<h1 class="title">Login</h1>';
      break;
    case 'thanks': 
      echo '<h1 class="title">Bedankt!</h1>';
      break;
    case 'shop':
      echo '<h1 class="title">Webshop</h1>';
      break;
    case 'cart':
      echo '<h1 class="title">Winkelwagen</h1>';
      break;
    case 'details':
      switch($id){
        case 1:
          echo '<h1 class="title">Badeendje</h1>';
          break;
        case 2:
          echo '<h1 class="title">Kaas</h1>';
          break;
        case 3:
          echo '<h1 class="title">Auto</h1>';
          break;
        case 4:
          echo '<h1 class="title">Citroen</h1>';
          break;
        case 5:
          echo '<h1 class="title">Banaan</h1>';
          break;
      }
      break;
    case 'top5':
      echo '<h1 class="title">Top 5</h1>';
      break;
    default:
      echo '<h1 class="title">Error 404:</h1>';
  }
}
?>