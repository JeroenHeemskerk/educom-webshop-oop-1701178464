<?php

class ModelFactory {
  private $crud;
  public $pageModel;
  public $model;

  public function __construct($crud){
    $this -> crud = $crud;
  }

  public function createCrud($name){
    $crud = $this -> crud;
    $this -> userCrud = new UserCrud($crud);
  }

  public function createModel($name){
    $userCrud = $this -> userCrud;
    $pageModel = $this -> pageModel;
    $this -> pageModel = new UserModel($userCrud, $pageModel);
  }
}



?>