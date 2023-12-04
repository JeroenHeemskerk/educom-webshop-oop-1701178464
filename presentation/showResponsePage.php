<?php
include('../views/home_doc.php');
include('../views/about_doc.php');
include('../views/contact_doc.php');
include('../views/thanks_doc.php');
include('../views/register_doc.php');
include('../views/login_doc.php');
include('../views/shop_doc.php');
include('../views/details_doc.php');
include('../views/top5_doc.php');
include('../views/cart_doc.php');

function showResponsePage($data){
  switch ($data['page']){
    case 'home':
      $view = new HomeDoc($data);
      break;
    case 'about':
      $view = new AboutDoc($data);
      break;
    case 'contact':
      $view = new ContactDoc($data);
      break;   
    case 'thanks':
      $view = new ThanksDoc($data);
      break;   
    case 'register':
      $view = new RegisterDoc($data);
      break;   
    case 'login':
      $view = new LoginDoc($data);
      break;   
    case 'shop':
      $view = new ShopDoc($data);
      break;   
    case 'details':
      $view = new DetailsDoc($data);
      break;   
    case 'top5':
      $view = new Top5Doc($data);
      break;   
    case 'cart':
      $view = new CartDoc($data);
      break;   
    default:
      $view = new HomeDoc($data);
      break;
  } 
  $view -> show();
}

?>