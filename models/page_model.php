<?php

require_once 'menu_item.php';
require_once '../data/db_repository.php';
require_once '../business/session_manager.php';

class PageModel{
  public $page;
  public $isPost = false;
  public $menu = array();
  public $errs = array();
  public $genericErr = '';

  public function __construct($copy){

    if(empty($copy)){
        // ==> First instance of PageModel
        $this -> sessionManager = new SessionManager();
    } else {
      $this -> page = $copy -> page;
      $this -> isPost = $copy -> isPost;
      $this -> menu = $copy -> menu;
      $this -> genericErr = $copy -> genericErr;
      $this -> sessionManager = $copy -> sessionManager;
    }
  }
  
  protected function setPage($newPage){
    $this -> page = $newPage;
  }

  public function askSessionManagerToLogoutUser(){
    $this -> sessionManager -> logoutUser();
  }
  
  protected function getPostVar($key, $default){
    if(isset($_POST[$key])) {
      return $_POST[$key];
    } 
    return $default;
  }

  protected function getUrlVar($key, $default){
    if(isset($_GET[$key])) {
      return $_GET[$key];
    } 
    return $default;
  }
  
  public function getRequestedpage(){
    $this -> isPost = ($_SERVER['REQUEST_METHOD'] == 'POST');
    if ($this -> isPost){
      $this -> setPage($this -> getPostVar('page', 'home'));
    } else {
      $this -> setPage($this -> getUrlVar('page', 'home'));
    }
  }
  

  public function createMenu(){
    $this -> menu['home'] = new MenuItem('home', 'HOME');
    $this -> menu['about'] = new MenuItem('about', 'ABOUT');
    $this -> menu['contact'] = new MenuItem('contact', 'CONTACT');
    $this -> menu['shop'] = new MenuItem('shop', 'SHOP');
    $this -> menu['top5'] = new MenuItem('top5', 'TOP 5');
    if (!$this -> sessionManager -> isLoggedIn()){
      $this -> menu['register'] = new MenuItem('register', 'REGISTER');
      $this -> menu['login'] = new MenuItem('login', 'LOGIN');
    }
    $this -> menu['cart'] = new MenuItem('cart', 'CART');
    if ($this -> sessionManager -> isLoggedIn()){
      $this -> menu['logout'] = new Menuitem('logout', 'LOGOUT '.$this -> sessionManager -> getUserName());
    }
  }
}

?>