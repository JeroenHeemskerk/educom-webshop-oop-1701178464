<?php

require_once '../models/rating_model.php';

class AjaxController{
  private $factory;
  public $page;
  public $ratingModel;
  protected $sessionManager;

  public function __construct($factory){
    $this -> factory = $factory;
  }


  public function handleRequest(){
    $this -> factory -> createCrud('ajax');
    $this -> factory -> createModel('ajax');
    $this -> getRequest();
    $this -> processRequest();
    $this -> showResponse();
  }

  public function getRequest(){
    $this -> factory -> pageModel -> getRequestedAction();
  }

  private function processRequest(){
    switch ($this -> factory -> pageModel -> action)
    {
      case 'rateProduct':
        $this -> factory -> pageModel -> rateProduct();
      case 'getRating':
        $this -> factory -> pageModel -> getRating();
        break;
      case 'getRatings':
        $this -> factory -> pageModel -> getRatings(); 
    }
    
  }

  public function showResponse(){
    require_once "../views/ajax_view.php";
    $ajaxView = new AjaxView($this -> factory -> pageModel);
    $ajaxView -> show();
  }
}


?>