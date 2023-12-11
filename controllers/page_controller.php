<?php

require_once '../models/page_model.php';

class PageController{
  private $model;
  private $factory;
  private $crud;
  private $userCrud;

  public function __construct($factory){
    $this -> factory = $factory;
    $this -> factory -> pageModel = new PageModel(NULL);
  }

  public function handleRequest(){
    $this -> getRequest();
    $this -> processRequest();
    $this -> showResponse();
  }

  private function getRequest(){
    $this -> factory -> pageModel -> getRequestedPage();
  }

  private function processRequest(){
    switch ($this -> factory -> pageModel -> page){
      case 'contact':
        include_once '../models/user_model.php';
        $this -> factory -> createCrud('hoi');
        $this -> factory -> createModel('hoi');
        $this -> factory -> pageModel -> processForm();
        if ($this -> factory -> pageModel -> valid){
          $this -> factory -> pageModel -> page = 'thanks';
        }
        break;
      case 'register':
        include_once '../models/user_model.php';
        $this -> factory -> createCrud('hoi');
        $this -> factory -> createModel('hoi');
        $this -> factory -> pageModel -> processForm();
        if ($this -> factory -> pageModel -> valid){
          $this -> factory -> pageModel -> page = 'login';
        }
        break;
      case 'login':
        include_once '../models/user_model.php';
        $this -> factory -> createCrud('hoi');
        $this -> factory -> createModel('hoi');
        $this -> factory -> pageModel -> processForm();
        if ($this -> factory -> pageModel -> valid){
          $this -> factory -> pageModel -> page = 'home';
        }
        break;
      case 'shop':
        include_once '../models/shop_model.php';
        $this -> factory -> pageModel = new ShopModel($this -> factory -> pageModel);
        $this -> factory -> pageModel -> makeShop();
        $this -> factory -> pageModel -> handleShopActions();
        break;
      case 'top5':
        include_once '../models/shop_model.php';
        $this -> factory -> pageModel = new ShopModel($this -> factory -> pageModel);
        $this -> factory -> pageModel -> handleShopActions();
        $this -> factory -> pageModel -> makeShop();
        break;
      case 'details':
        include_once '../models/shop_model.php';
        $this -> factory -> pageModel = new ShopModel($this -> factory -> pageModel);
        $this -> factory -> pageModel -> makeShop();
        $this -> factory -> pageModel -> handleShopActions();
        break;
      case 'cart':
        include_once '../models/shop_model.php';
        $this -> factory -> pageModel = new ShopModel($this -> factory -> pageModel);
        $this -> factory -> pageModel -> handleShopActions();
        $this -> factory -> pageModel -> makeShop();
        break;
      case 'logout':
        include_once '../models/page_model.php';
        $this -> factory -> pageModel -> sessionManager -> logoutUser();
        $this -> factory -> pageModel -> page = 'home';
        break;
    }
  }
  
  private function showResponse(){
    $this -> factory -> pageModel -> createMenu();
    switch ($this -> factory -> pageModel -> page){
      case 'home':
        require_once('../views/home_doc.php');
        $view = new HomeDoc($this -> factory -> pageModel);
        break;
      case 'about':
        require_once('../views/about_doc.php');
        $view = new AboutDoc($this -> factory -> pageModel);
        break;
      case 'contact':
        require_once('../views/contact_doc.php');
        $view = new ContactDoc($this -> factory -> pageModel);
        break;   
      case 'thanks':
        require_once('../views/thanks_doc.php');
        $view = new ThanksDoc($this -> factory -> pageModel);
        break;   
      case 'register':
        require_once('../views/register_doc.php');
        $view = new RegisterDoc($this -> factory -> pageModel);
        break;   
      case 'login':
        require_once('../views/login_doc.php');
        $view = new LoginDoc($this -> factory -> pageModel);
        break;   
      case 'shop':
        require_once('../views/shop_doc.php');
        $view = new ShopDoc($this -> factory -> pageModel);
        break;   
      case 'details':
        require_once('../views/details_doc.php');
        $view = new DetailsDoc($this -> factory -> pageModel);
        break;   
      case 'top5':
        require_once('../views/top5_doc.php');
        $view = new Top5Doc($this -> factory -> pageModel);
        break;   
      case 'cart':
        require_once('../views/cart_doc.php');
        $view = new CartDoc($this -> factory -> pageModel);
        break;   
      default:
        require_once('../views/home_doc.php');
        $view = new HomeDoc($this -> factory -> pageModel);
        break;
    }
    $view -> show();
  }
}



?>