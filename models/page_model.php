<?php

class PageModel{
  public $page;
  protected $isPost = false;
  public $menu;
  public $errors = array();
  public $genericErr = '';
  protected $sessionManager;

  public function __construct($copy){}
  
  protected function setPage($newPage){
    $this -> page = $newPage;
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
      $this -> setPage(Util::getPostVar('page', 'home'));
    } else {
      $this -> setPage($this -> getUrlVar('page', 'home'));
    }
  }
  

  public function createMenu(){
    #$this -> menu['home'] = new menuItem('home', 'HOME');
    #$this -> menu['about'] = new menuItem('about', 'ABOUT');
    #$this -> menu['contact'] = new menuItem('contact', 'CONTACT');
    #$this -> menu['shop'] = new menuItem('shop', 'SHOP');
    #$this -> menu['top5'] = new menuItem('top5', 'TOP 5');
  }
}

?>