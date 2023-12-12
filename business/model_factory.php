<?php
require_once 'user_crud.php';
require_once 'shop_crud.php';
require_once '../models/user_model.php';
require_once '../models/shop_model.php';

class ModelFactory {
  private $crud;
  public $pageModel;
  public $model;

  public function __construct($crud){
    $this -> crud = $crud;
  }

  public function createCrud($name){
    if ($name == 'user'){
      $this -> crud = new UserCrud($this -> crud);
    } else {
      $this -> crud = new ShopCrud($this -> crud);
    }
  }

  public function createModel($name){
    switch ($name){
      case 'page':
        $this -> pageModel = new pageModel(NULL);
        break;
      case 'user':
        $this -> pageModel = new UserModel($this -> crud, $this -> pageModel);
        break;
      case 'shop':
        $this -> pageModel = new ShopModel($this -> crud, $this -> pageModel);
        break;
    }
  }
}



?>