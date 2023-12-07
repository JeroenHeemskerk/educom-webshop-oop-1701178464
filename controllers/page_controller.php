<?php

require_once '../models/page_model.php';

class PageController{
  private $model;

  public function __construct(){
    $this -> model = new PageModel(NULL);
  }

  public function handleRequest(){
    $this -> getRequest();
    $this -> processRequest();
    $this -> showResponse();
  }

  private function getRequest(){
    $this -> model -> getRequestedPage();
  }

  private function processRequest(){
    switch ($this -> model -> page){
      case 'contact':
        include_once '../models/user_model.php';
        $this -> model = new UserModel($this -> model);
        $this -> model -> processForm();
        if ($this -> model -> valid){
          $this -> model -> page = 'thanks';
        }
        break;
      case 'register':
        include_once '../models/user_model.php';
        $this -> model = new UserModel($this -> model);
        $this -> model -> processForm();
        if ($this -> model -> valid){
          $this -> model -> page = 'login';
        }
        break;
      case 'login':
        include_once '../models/user_model.php';
        $this -> model = new UserModel($this -> model);
        $this -> model -> processForm();
        if ($this -> model -> valid){
          $this -> model -> page = 'home';
        }
        break;
      case 'shop':
        include_once '../models/shop_model.php';
        $this -> model = new ShopModel($this -> model);
        $this -> model -> makeShop();
        $this -> model -> handleShopActions();
        break;
      case 'top5':
        include_once '../models/shop_model.php';
        $this -> model = new ShopModel($this -> model);
        $this -> model -> handleShopActions();
        $this -> model -> makeShop();
        break;
      case 'details':
        include_once '../models/shop_model.php';
        $this -> model = new ShopModel($this -> model);
        $this -> model -> makeShop();
        $this -> model -> handleShopActions();
        break;
      case 'cart':
        include_once '../models/shop_model.php';
        $this -> model = new ShopModel($this -> model);
        $this -> model -> handleShopActions();
        $this -> model -> makeShop();
        break;
      case 'logout':
        include_once '../models/page_model.php';
        $this -> model -> askSessionManagerToLogoutUser();
        $this -> model -> page = 'home';
        break;
    }
  }
  
  private function showResponse(){
    $this -> model -> createMenu();
    switch ($this -> model -> page){
      case 'home':
        require_once('../views/home_doc.php');
        $view = new HomeDoc($this -> model);
        break;
      case 'about':
        require_once('../views/about_doc.php');
        $view = new AboutDoc($this -> model);
        break;
      case 'contact':
        require_once('../views/contact_doc.php');
        $view = new ContactDoc($this -> model);
        break;   
      case 'thanks':
        require_once('../views/thanks_doc.php');
        $view = new ThanksDoc($this -> model);
        break;   
      case 'register':
        require_once('../views/register_doc.php');
        $view = new RegisterDoc($this -> model);
        break;   
      case 'login':
        require_once('../views/login_doc.php');
        $view = new LoginDoc($this -> model);
        break;   
      case 'shop':
        require_once('../views/shop_doc.php');
        $view = new ShopDoc($this -> model);
        break;   
      case 'details':
        require_once('../views/details_doc.php');
        $view = new DetailsDoc($this -> model);
        break;   
      case 'top5':
        require_once('../views/top5_doc.php');
        $view = new Top5Doc($this -> model);
        break;   
      case 'cart':
        require_once('../views/cart_doc.php');
        $view = new CartDoc($this -> model);
        break;   
      default:
        require_once('../views/home_doc.php');
        $view = new HomeDoc($this -> model);
        break;
    }
    $view -> show();
  }
}



?>