<?php

include ('showContent/showHomeContent.php');
include ('showContent/showAboutContent.php');
include ('showContent/showContactContent.php');
include ('showContent/show404Content.php');
include ('showContent/showRegContent.php');
include ('showContent/showLoginContent.php');
include ('showContent/showThanks.php');
include ('showContent/showShopContent.php');
include ('showContent/showDetailsContent.php');
include ('showContent/showCartContent.php');
include ('showContent/showTop5Content.php');


function showContent($page, $inputs, $errs){
  switch($page){
    case 'home':
      showHomeContent();
      break;
    case 'about':
      showAboutContent();
      break;
    case 'contact':
      showContactContent($inputs, $errs);
      break;
    case 'register':
      showRegContent($inputs, $errs);
      break;
    case 'login':
      showLoginContent($inputs, $errs);
      break;
    case 'thanks':
      showThanks($inputs);
      break;
    case 'shop':
      showShopContent();
      break;
    case 'details':
      showDetailsContent($inputs['id']);
      break;
    case 'cart':
      showCartContent();
      break;
    case 'top5':
      showTop5Content($inputs['order']);
      break;
    default:
      show404Content();
  }
}
?>