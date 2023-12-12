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

  public function createUserCrud($name){
    $this -> userCrud = new UserCrud($this -> crud);
  }

  public function createUserModel($name){
    $this -> pageModel = new UserModel($this -> userCrud, $this -> pageModel);
  }

  public function createShopCrud($name){
    $crud = $this -> crud;
    $this -> shopCrud = new ShopCrud($crud);
  }

  public function createShopModel($name){
    $this -> pageModel = new ShopModel($this -> shopCrud, $this -> pageModel);
  }
}



?>