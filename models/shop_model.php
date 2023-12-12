<?php

require_once 'page_model.php';

class ShopModel extends PageModel{
  public $products = array();
  private $userId = 0;
  public $order = array();
  private $numberOrdered = array();
  private $inCart;
  private $id = 0;
  private $checkout = false;
  public $total = 0;
  public $cart = array();
  
  public function __construct($crud, $pageModel){
    PARENT::__construct($pageModel);
    $this -> shopCrud = $crud;
  }  
  
  public function makeShop(){
    $this -> setProducts();
    $this -> makeOrder();
  }
  
  private function setProducts(){
    
    for ($x = 1; $x !== 6; $x++){
      $this -> products[$x] = getProductInfo($x);
    }
  }
  
  private function makeOrder(){
    switch ($this ->  page){
      case 'shop':
        $this -> order = range(1, 5);
        break;
      case 'top5':
        for ($x = 1; $x != 6; $x++){
          $this -> numberOrdered[$x] = 0;
          foreach ($this -> shopCrud -> getOrderLinesByProduct($x) as $value){
            $this -> numberOrdered[$x] += $value -> number_ordered;
          }
        }
        arsort($this -> numberOrdered);
        $this -> order = array();
        foreach($this -> numberOrdered as $key => $value){
          if ($value > 0){
            array_push($this -> order, $key);
          }
        }
        break;
      case 'details':
        $this -> order = array($this -> getUrlVar('id', '1'));
        break;
      case 'cart':
        for ($x = 1; $x !== 6; $x++){
          $this -> cart [$x] = $this -> sessionManager -> numberInCart($x);
          $this -> total += $this -> products[$x]['price'] * $this -> cart [$x];
          if ($this -> cart [$x] > 0){
            array_push($this -> order, $x);
          }  
        }
        break;
      }
    }
          
  public function handleShopActions(){
    $this -> id = $this -> getUrlVar('id', '0');
    $this -> inCart = $this -> getUrlVar('inCart', false);
    $this -> checkout = $this -> getUrlVar('checkout', false);
    switch ($this -> page){
      case 'shop':
        if ($this -> inCart){
          $this -> sessionManager -> addToCart($this -> id);
        }
        break;
      case 'top5':
        if ($this -> inCart){
          $this -> sessionManager -> addToCart($this -> id);
        }
        break;
      case 'details':
        if ($this -> inCart){
          $this -> sessionManager -> addToCart($this -> id);
        }
        break;
      case 'cart':
        if ($this -> checkout){
          checkout($this -> sessionManager -> getUserId(), $this -> sessionManager -> getCart());
          $this -> sessionManager -> emptyCart();
        }
        break;
    }
  }
}
          
          
?>