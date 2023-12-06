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
      $data['inputs'] = initInputs($vars['page']);
      $data['id'] = $vars['id'];
      $data['page'] = $vars['page'];
      $data['inCart'] = $vars['inCart'];
      if ($data['page'] == 'shop' | $data['page'] == 'details' | $data['page'] == 'top5' | $data['page'] == 'cart'){
        $data['products'] = $vars['products'];
      }
      if (isset($vars['sortedList'])){
        $data['order'] = $vars['sortedList'];
      }
      if (isset($vars['cart']) && $data['page'] == 'cart'){
        $data['cart'] = $vars['cart'];
        $data['total'] = $vars['total'];
        $data['order'] = array();
        foreach ($data['cart'] as $key => $value){
          if ($value > 0){
            array_push($data['order'], $key);
          }
        }
      }
      $data['errs'] = initErrs($vars['page']);
      return $data;
    }    
  }

  function postPage(){
    $pageTemp = getUrlVar('page', 'home');
    $data['inputs'] = initInputs($pageTemp);
    $data['errs'] = initErrs($pageTemp);
    list($data['inputs'], $data['errs']) = processRequest($data['errs'], $data['inputs'], $pageTemp);
    $valid = false;
    list($data['page'], $data['valid']) = validate($valid, $data['errs'], $pageTemp, $data['inputs']);
    if (!isset($data['id'])){
      $data['id']= '';
    }
    return($data);
  }

  function getPage(){
    $vars = array();
    $vars['page'] = getUrlVar('page', 'home');
    if($vars['page'] == 'shop' | $vars['page'] == 'top5' | $vars['page'] == 'details' | $vars['page'] == 'cart'){
      $products = array(); 
      for($x = 1; $x < 6 ; $x++){
        $products[$x] = getProductInfo($x);
      }
      $vars['products'] = $products;
    }
    if ($vars['page'] == 'shop'){
      $vars['sortedList'] = range(1,count($products));
    }
    if ($vars['page'] == 'cart' && isset($_GET['checkout'])){
      $vars['checkout'] = getUrlVar('checkout', 'false');
    }
    if ($vars['page'] == 'top5'){
      $numberOrdered = getNumbersOrdered();
      arsort($numberOrdered);
      $vars['sortedList'] = array();
      foreach($numberOrdered as $key => $value){
        if ($value > 0){
          array_push($vars['sortedList'], $key);
        }
      }
    }
    $vars['id'] = strval(getUrlVar('id', '0'));
    $vars['inCart'] = getUrlVar('inCart', false);
    if (isset($vars['checkout'])){
      checkout();
    }
    if (!isset($_SESSION['cart'][$vars['id']])){
      $_SESSION['cart'][$vars['id']] = 0;
    }
    if ($vars['page'] == 'cart'){
      $vars['cart'] = $_SESSION['cart'];
      $total = 0;
      for($x = 1; $x !== 6; $x++){
        if (isset($vars['cart'][$x]))
        {
          $total += $vars['cart'][$x]*$vars['products'][$x]['price'];
        }
      }
      $vars['total'] = $total;
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