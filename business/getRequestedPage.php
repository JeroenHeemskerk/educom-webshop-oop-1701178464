<?php

function getRequestedPage(){  
    if ($_SERVER["REQUEST_METHOD"] == "POST")
	  {
      return(postPage());
	  } else {
      $vars = getPage();
      if( $vars['logout'] == true){
        logout();
      }
      $inputs = initInputs($vars['page']);
      $inputs['id']= $vars['id'];
      $inputs['inCart'] = $vars['inCart'];
      if ($vars['page'] == 'top5'){
        $inputs['order'] = $vars['sortedList'];
      }
      $errs = initErrs($vars['page']);
      return array($vars['page'], $inputs, $errs);
    }    
  }

  function postPage(){
    $pageTemp = getUrlVar('page', 'home');
    $inputs = initInputs($pageTemp);
    $errs = initErrs($pageTemp);
    list($inputs, $errs) = processRequest($errs, $inputs, $pageTemp);
    $valid = false;
    list($page, $valid) = validate($valid, $errs, $pageTemp, $inputs);
    if (!isset($inputs['id'])){
      $inputs['id']= '';
    }
    return(array($page, $inputs, $errs));
  }

  function getPage(){
    $vars = array();
    $vars['page'] = getUrlVar('page', 'home');
    if ($vars['page'] == 'cart' && isset($_GET['checkout'])){
      $vars['checkout'] = getUrlVar('checkout', 'false');
    }
    if ($vars['page'] == 'top5'){
      $numberOrdered = getNumbersOrdered();
      arsort($numberOrdered);
      $vars['sortedList'] = $numberOrdered;
    }
    $vars['id'] = strval(getUrlVar('id', '0'));
    $vars['inCart'] = getUrlVar('inCart', false);
    if (isset($vars['checkout'])){
      checkout($vars['id']);
    }
    if (!isset($_SESSION['cart'][$vars['id']])){
      $_SESSION['cart'][$vars['id']] = 0;
    }
    if ($vars['inCart']){
      addToCart($vars['id']);
    }
    $vars['logout'] = false;
    if($vars['page'] == 'logout'){
      $vars['logout'] = true;
      $vars['page'] = 'home';
    }
    return $vars;
  }
?>